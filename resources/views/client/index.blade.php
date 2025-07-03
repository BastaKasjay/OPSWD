@extends('layouts.app')

@section('title', 'Clients')

@section('head')
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        'mint-green': {
                            50: '#F8FCFA',
                            100: '#EEF6F0',
                            200: '#DDEEE1',
                            300: '#CDE5D3',
                            400: '#BCE0C5',
                            500: '#aee0c1',
                            600: '#9CD1B5',
                            700: '#89C0A3',
                            800: '#76AE91',
                            900: '#639D7F',
                            DEFAULT: '#aee0c1',
                        },
                    },
                }
            }
        }
    </script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap');
        body {
            font-family: 'Inter', sans-serif;
        }
        ::-webkit-scrollbar {
            width: 8px;
            height: 8px;
        }
        ::-webkit-scrollbar-track {
            background: #f1f1f1;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb {
            background: #888;
            border-radius: 10px;
        }
        ::-webkit-scrollbar-thumb:hover {
            background: #555;
        }
    </style>
@endsection

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-mint-green-900 text-white flex flex-col p-4">
        <div class="flex items-center justify-center mb-8">
            <div class="bg-mint-green-800 p-4 rounded-full">
                <svg class="w-12 h-12 text-mint-green-300" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm0 3c1.66 0 3 1.34 3 3s-1.34 3-3 3-3-1.34-3-3 1.34-3 3-3zm0 14.2c-2.5 0-4.71-1.28-6-3.22.03-1.99 4-3.08 6-3.08 1.99 0 5.97 1.09 6 3.08-1.29 1.94-3.5 3.22-6 3.22z"/>
                </svg>
            </div>
        </div>
        <nav class="flex-grow">
            <ul>
                <li class="mb-2">
                   <a href="{{ url('/home') }}" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg bg-mint-green-700 text-mint-green-100 font-semibold shadow-inner">
                        <i class="fas fa-users mr-3"></i>
                        Client Management
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-hand-holding-usd mr-3"></i>
                        System Management
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-user-cog mr-3"></i>
                        User Management
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-file-invoice-dollar mr-3"></i>
                        Settings
                    </a>
                </li>
            </ul>
        </nav>
        <div class="mt-auto">
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="w-full flex items-center justify-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200 focus:outline-none focus:ring-2 focus:ring-mint-green-400">
                    <i class="fas fa-sign-out-alt mr-3"></i>
                    <span>Log out</span>
                </button>
            </form>
        </div>
    </aside>
    <!-- Main Content -->
    <main class="flex-1 p-8 overflow-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">Clients</h1>
        <div class="flex flex-col md:flex-row items-center justify-between mb-6 space-y-4 md:space-y-0">
            <a href="{{ route('clients.create') }}" class="btn btn-primary bg-mint-green-700 hover:bg-mint-green-900 text-white font-semibold px-4 py-2 rounded-lg shadow">Add Client</a>
            <form method="GET" action="{{ route('clients.index') }}" class="flex w-full md:w-auto gap-2">
                @if (request('municipality_id'))
                    <input type="hidden" name="municipality_id" value="{{ request('municipality_id') }}">
                @endif
                <input type="text" name="search" class="form-control border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-mint-green-500" value="{{ request('search') }}" placeholder="Search by name" oninput="if (this.value === '') this.form.submit()">
                <button type="submit" class="btn btn-primary bg-mint-green-700 hover:bg-mint-green-900 text-white px-4 py-2 rounded-lg">Search</button>
            </form>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200 table-fixed">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="w-56">Full Name</th>
                        <th>Sex</th>
                        <th>Address</th>
                        <th>
                            Municipality
                            <form method="GET" action="{{ route('clients.index') }}">
                                <input type="hidden" name="search" value="{{ request('search') }}">
                                <select name="municipality_id" class="form-control border border-gray-300 rounded-lg px-2 py-1 mt-1" onchange="this.form.submit()">
                                    <option value="">All</option>
                                    @foreach($municipalities as $municipality)
                                        <option value="{{ $municipality->id }}" {{ request('municipality_id') == $municipality->id ? 'selected' : '' }}>
                                            {{ $municipality->name }}
                                        </option>
                                    @endforeach
                                </select>
                            </form>
                        </th>
                        <th>Assistance Type</th>
                        <th>Assistance Category</th>
                        <th>
                            Vulnerability Sectors
                            <div class="dropdown inline-block ml-2">
                                <button class="btn btn-secondary dropdown-toggle bg-mint-green-700 text-white px-2 py-1 rounded" type="button" data-bs-toggle="dropdown">
                                    Summary
                                </button>
                                <ul class="dropdown-menu bg-white shadow rounded mt-2">
                                    <li class="dropdown-item font-bold">All: {{ $totalVulnerable }}</li>
                                    @foreach ($vulnerabilityCounts as $sector)
                                        <li class="dropdown-item">{{ $sector->name }}: {{ $sector->clients_count }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        </th>
                        <th>Representative First Name</th>
                        <th>Representative Middle Name</th>
                        <th>Representative Last Name</th>
                        <th>Representative Contact</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach ($clients as $client)
                        <tr>
                            <td class="w-56 whitespace-nowrap overflow-hidden text-ellipsis">
                                <a href="{{ route('clients.show', $client->id) }}" class="text-mint-green-700 hover:underline">
                                    {{ $client->first_name }} {{ $client->middle_name }} {{ $client->last_name }}
                                </a>
                            </td>
                            <td>{{ $client->sex }}</td>
                            <td>{{ $client->address }}</td> 
                            <td>{{ $client->municipality ? $client->municipality->name : '-' }}</td>
                            <td>{{ $client->assistanceType ? $client->assistanceType->type_name : '-' }}</td>
                            <td>{{ $client->assistanceCategory ? $client->assistanceCategory->category_name : '-' }}</td>
                            <td>
                                @if ($client->vulnerabilitySectors->isNotEmpty())
                                    <ul class="list-disc ml-4">
                                        @foreach ($client->vulnerabilitySectors as $sector)
                                            <li>{{ $sector->name }}</li>
                                        @endforeach
                                    </ul>
                                @else
                                    None
                                @endif
                            </td>
                            <td>{{ $client->representative_first_name }}</td>
                            <td>{{ $client->representative_middle_name }}</td>
                            <td>{{ $client->representative_last_name }}</td>
                            <td>{{ $client->representative_contact_number }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </main>
</div>
@endsection