@extends('layouts.app')

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
                    }
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
        /* Hide scrollbars for a clean look */
        html, body, main {
            overflow: hidden !important;
        }
    </style>
@endsection

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <main class="flex-1 p-8 bg-gray-100">
        <div class="flex items-center mb-6">
            <a href="{{ route('clients.index') }}" class="text-gray-600 hover:text-gray-900 mr-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Client Management</h1>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md max-w-6xl mx-auto">
            <div class="flex items-center mb-6 border-b pb-4 border-gray-200">
                <h2 class="text-2xl font-semibold text-gray-800 flex-grow">Client Details</h2>
                <a href="{{ route('clients.edit', $client->id) }}" class="bg-mint-green-600 hover:bg-mint-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200">
                    <i class="fas fa-edit mr-2"></i>Edit Client
                </a>
            </div>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-6">
                <!-- Personal Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Personal Details</h3>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">First Name</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->first_name }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Middle Name</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->middle_name }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Last Name</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->last_name }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Sex</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->sex }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Age</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->age }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Birth Date</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->birth_date ?? '-' }}</div>
                    </div>
                </div>
                <!-- Address & Contact -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Address & Contact</h3>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Municipality</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ optional($client->municipality)->name ?? '-' }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Address</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->address }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Contact Number</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->contact_number }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Representative Name</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">
                            {{ $client->representative_first_name }} {{ $client->representative_middle_name }} {{ $client->representative_last_name }}
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Representative Contact Number</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->representative_contact_number ?? '-' }}</div>
                    </div>
                </div>
                <!-- Assistance Details -->
                <div>
                    <h3 class="text-lg font-semibold text-gray-700 mb-4">Assistance Details</h3>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Vulnerability Sectors</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">
                            @if ($client->vulnerabilitySectors->isNotEmpty())
                                {{ $client->vulnerabilitySectors->pluck('name')->join(', ') }}
                            @else
                                None
                            @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Assistance Type</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ optional($client->assistanceType)->type_name ?? '-' }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Assistance Categories</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ optional($client->assistanceCategory)->category_name ?? '-' }}</div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Requirements</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">
                            @if(isset($client->requirements) && count($client->requirements))
                                {{ collect($client->requirements)->pluck('requirement_name')->join(', ') }}
                            @else
                                None
                            @endif
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-600 text-sm font-medium mb-1">Case</label>
                        <div class="p-2 border border-gray-200 rounded-md bg-gray-50 text-gray-800">{{ $client->Case ?? '-' }}</div>
                    </div>
                </div>
            </div>
            <div class="flex justify-end mt-8">
                <a href="{{ route('clients.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 mr-2">
                    Back to List
                </a>
            </div>
        </div>
    </main>
</div>
@endsection
