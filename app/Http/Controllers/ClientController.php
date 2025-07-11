<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Municipality;
use App\Models\VulnerabilitySector;
use App\Models\AssistanceType;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ClientController extends Controller
{
    public function index(Request $request)
    {
        $query = Client::with(['municipality', 'vulnerabilitySectors', 'assistanceType', 'assistanceCategory']);

        if ($request->search) {
            $search = $request->search;
            $query->where(function ($q) use ($search) {
                $q->where('first_name', 'like', '%' . $search . '%')
                    ->orWhere('middle_name', 'like', '%' . $search . '%')
                    ->orWhere('last_name', 'like', '%' . $search . '%')
                    ->orWhere('sex', 'like', '%' . $search . '%')
                    ->orWhere('address', 'like', '%' . $search . '%')
                    ->orWhere('representative_first_name', 'like', '%' . $search . '%')
                    ->orWhere('representative_middle_name', 'like', '%' . $search . '%')
                    ->orWhere('representative_last_name', 'like', '%' . $search . '%')
                    ->orWhere('representative_contact_number', 'like', '%' . $search . '%')
                    ->orWhereHas('municipality', function ($municipalityQuery) use ($search) {
                        $municipalityQuery->where('name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('assistanceType', function ($typeQuery) use ($search) {
                        $typeQuery->where('type_name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('assistanceCategory', function ($categoryQuery) use ($search) {
                        $categoryQuery->where('category_name', 'like', '%' . $search . '%');
                    })
                    ->orWhereHas('vulnerabilitySectors', function ($sectorQuery) use ($search) {
                        $sectorQuery->where('name', 'like', '%' . $search . '%');
                    });
            });
        }

        $clients = $query->paginate(10);
        $municipalities = Municipality::all();

        // Get total count for current search/filter
        $totalCount = $query->count();

        // Vulnerability sectors count per sector (for current results)
        $clientIds = $clients->pluck('id')->toArray();
        $vulnerabilityCounts = VulnerabilitySector::withCount([
            'clients as clients_count' => function ($q) use ($clientIds) {
                $q->whereIn('client_id', $clientIds);
            }
        ])->get();

        $totalVulnerable = DB::table('client_vulnerability_sector')
            ->whereIn('client_id', $clientIds)
            ->count();

        // Check if the request is coming from assistance routes
        $routeName = request()->route()->getName();
        if (str_contains($routeName, 'assistance.')) {
            return view('assistance.index', compact('clients', 'municipalities', 'vulnerabilityCounts', 'totalVulnerable', 'totalCount'));
        }

        return view('client.index', compact('clients', 'municipalities', 'vulnerabilityCounts', 'totalVulnerable', 'totalCount'));
    }

    public function show($id)
    {
        $client = Client::with([
            'municipality',
            'vulnerabilitySectors',
            'assistanceType',
            'assistanceCategory'
        ])->findOrFail($id);

        // Only serve assistance views since show is removed from clients
        return view('assistance.show', compact('client'));
    }

    public function create()
    {
        $municipalities = Municipality::all();
        $vulnerabilitySectors = VulnerabilitySector::all();
        $assistanceTypes = AssistanceType::with('categories')->get();

        return view('client.create', compact('municipalities', 'vulnerabilitySectors', 'assistanceTypes'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'sex' => 'required',
            'age' => 'required|integer',
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'birth_date' => 'nullable|date',
            'Case' => 'nullable|string',
            'valid_id' => 'required|string',
            'id_number' => 'required|string',
            'representative_first_name' => 'nullable|string',
            'representative_middle_name' => 'nullable|string',
            'representative_last_name' => 'nullable|string',
            'representative_contact_number' => 'nullable|string',
            'municipality_id' => 'required|exists:municipalities,id',
            'assistance_type_id' => 'required|exists:assistance_types,id',
            'assistance_category_id' => 'required|exists:assistance_categories,id',
            'vulnerability_sectors' => 'array|nullable'
        ]);

        $client = Client::create($validated);

        if ($request->has('vulnerability_sectors')) {
            $client->vulnerabilitySectors()->attach($request->vulnerability_sectors);
        }

        return redirect()->route('assistance.show', $client->id)->with('success', 'Client created successfully');
    }

    public function edit($id)
    {
        $client = Client::with(['vulnerabilitySectors'])->findOrFail($id);

        $municipalities = Municipality::all();
        $vulnerabilitySectors = VulnerabilitySector::all();
        
        // 🟢 The important part: eager load categories for all assistance types
        $assistanceTypes = AssistanceType::with('categories')->get();

        // 🟢 Get the categories based on the client's selected assistance type
        $assistanceCategories = $client->assistance_type_id 
            ? AssistanceType::find($client->assistance_type_id)->categories 
            : collect();

        // Only serve assistance views since edit is removed from clients
        return view('assistance.edit', compact(
            'client',
            'municipalities',
            'vulnerabilitySectors',
            'assistanceTypes',
            'assistanceCategories'
        ));
    }




    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'sex' => 'required',
            'age' => 'required|integer',
            'address' => 'required|string',
            'contact_number' => 'required|string',
            'birth_date' => 'nullable|date',
            'Case' => 'nullable|string',
            'representative_first_name' => 'nullable|string',
            'representative_middle_name' => 'nullable|string',
            'representative_last_name' => 'nullable|string',
            'representative_contact_number' => 'nullable|string',
            'municipality_id' => 'required|exists:municipalities,id',
            'assistance_type_id' => 'required|exists:assistance_types,id',
            'assistance_category_id' => 'required|exists:assistance_categories,id',
            'vulnerability_sectors' => 'array|nullable',
            'valid_id' => 'required|string',
            'id_number' => 'required|string'
        ]);

        $client = Client::findOrFail($id);
        $client->update($validated);

        // Sync vulnerability sectors
        $client->vulnerabilitySectors()->sync($request->vulnerability_sectors ?? []);

        // ✅ Redirect to assistance show page after successful update
        return redirect()->route('assistance.show', $client->id)
            ->with('success', 'Client updated successfully');
    }

    public function destroy($id)
    {
        $client = Client::findOrFail($id);
        
        // Delete the client and all related records will be handled by foreign key constraints
        $client->delete();

        return redirect()->route('assistance.index')
            ->with('success', 'Client deleted successfully');
    }
}
