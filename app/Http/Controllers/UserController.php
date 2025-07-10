<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Client; // <--- ADD THIS LINE if Client model is in App\Models
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index(Request $request)
    {
        $query = User::query();

        if ($request->filled('search')) {
            $search = $request->input('search');
            $query->where(function($q) use ($search) {
                $q->where('id', '=', $search)
                  ->orWhere('name', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('role', 'like', "%{$search}%")
                  ->orWhereHas('employee', function($employeeQuery) use ($search) {
                      $employeeQuery->where('first_name', 'like', "%{$search}%")
                        ->orWhere('last_name', 'like', "%{$search}%");
                  });
            });
        }

        $users = $query->with('employee')->paginate(10);

        return view('user.index', compact('users'));
    }

    public function create()
    {
        return view('user.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'middle_name' => 'nullable|string|max:255',
            'username' => 'required|string|max:20',
            'role' => 'required|string',
            'password' => 'required|string|min:8|confirmed',
        ]);

        // Create employee first
        $employee = \App\Models\Employee::create([
            'first_name' => $request->first_name,
            'middle_name' => $request->middle_name,
            'last_name' => $request->last_name,
            'position' => $request->role, // Use role as position
        ]);

        // Create user with employee relationship - store username in email field
        User::create([
            'name' => $request->first_name . ' ' . $request->last_name,
            'email' => strtolower($request->username) . '@opswd.local',
            'role' => $request->role,
            'employee_id' => $employee->id,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('users.index')->with('success', 'User created successfully.');
    }

    public function show(User $user)
    {
        return view('user.show', compact('user'));
    }

    public function edit(User $user)
    {
        return view('user.edit', compact('user'));
    }

    public function update(Request $request, User $user)
    {
        $data = [
            'name' => $request->first_name . ' ' . $request->last_name,
            'role' => $request->role
        ];

        if ($request->filled('username')) {
            $data['email'] = strtolower($request->username) . '@opswd.local';
        }

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $user->update($data);

        return redirect()->route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy(User $user)
    {
        // Prevent delete if user is referenced in clients table
        $hasClients = \App\Models\Client::where('assessed_by', $user->id)->exists();
        if ($hasClients) {
            return redirect()->route('users.index')->with('error', 'Cannot delete user: user is referenced by one or more clients.');
        }
        $user->delete();
        return redirect()->route('users.index')->with('success', 'User deleted successfully.');
    }
}