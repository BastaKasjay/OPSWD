@extends('layouts.app')

@section('title', 'Assistance Management')

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
        body, html {
            font-family: 'Inter', sans-serif;
            margin: 0;
            padding: 0;
            overflow: hidden !important;
            height: 100vh;
            max-height: 100vh;
        }
        /* Override layout styles */
        .flex-1 {
            overflow: hidden !important;
        }
        /* Hide scrollbars completely */
        ::-webkit-scrollbar {
            display: none;
        }
        * {
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .main-container {
            height: 100vh;
            max-height: 100vh;
            overflow: hidden !important;
            display: flex;
            flex-direction: column;
        }
        /* Ensure proper layout flow */
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
            overflow: hidden;
        }
        .table-container {
            flex: 1;
            overflow: hidden;
            display: flex;
            flex-direction: column;
        }
        .table-wrapper {
            flex: 1;
            overflow-y: auto;
        }
        .pagination-container {
            flex-shrink: 0;
            position: sticky;
            bottom: 0;
            background: #f3f4f6;
            z-index: 10;
        }
    </style>
@endsection

@section('content')
<div class="main-container w-full bg-gray-100">
    <!-- Main Content -->
    <main class="w-full p-3 content-wrapper">
        <div class="flex flex-col md:flex-row items-center justify-between mb-6 mt-6 space-y-2 md:space-y-0">
            <h1 class="text-4xl font-bold text-gray-800">Assistance Management</h1>
            <form method="GET" action="{{ route('assistance.index') }}" class="flex w-full md:w-auto gap-2">
                <input type="text" name="search" class="form-control border border-gray-300 rounded-lg px-3 py-2 focus:ring-2 focus:ring-mint-green-500" value="{{ request('search') }}" placeholder="Search clients..." oninput="if (this.value === '') this.form.submit()">
                <button type="submit" class="btn btn-primary bg-mint-green-700 hover:bg-mint-green-900 text-white px-4 py-2 rounded-lg">Search</button>
            </form>
        </div>

        @if(request('search'))
        <div class="flex justify-between items-center mb-3">
            <div class="text-gray-600">
                Showing {{ $clients->total() }} result(s) for "{{ request('search') }}"
            </div>
            <div class="text-gray-600 font-medium">
                Total Clients: {{ $clients->total() }}
            </div>
        </div>
        @else
        <div class="flex justify-end mb-3">
            <div class="text-gray-600 font-medium">
                Total Clients: {{ $clients->total() }}
            </div>
        </div>
        @endif

        <div class="bg-white p-3 rounded-lg shadow-md w-full table-container">
            <div class="table-wrapper">
                <table class="w-full table-auto">
                    <thead class="bg-mint-green-100 sticky top-0">
                        <tr class="h-16">
                            <th class="px-3 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Full Name</th>
                            <th class="px-2 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Sex</th>
                            <th class="px-3 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Address</th>
                            <th class="px-3 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Municipality</th>
                            <th class="px-2 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Assistance Type</th>
                            <th class="px-2 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Assistance Category</th>
                            <th class="px-2 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Vulnerability Sectors</th>
                            <th class="px-3 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Representative Full Name</th>
                            <th class="px-3 py-4 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Actions</th>
                        </tr>
                        </thead>
                        <tbody class="bg-white">
                            @foreach ($clients as $client)
                                <tr class="hover:bg-mint-green-50 transition h-14 border-b border-gray-100">
                                    <td class="px-3 py-3 text-sm">
                                        <a href="{{ route('assistance.show', $client->id) }}" class="text-mint-green-700 hover:underline font-medium">
                                            {{ $client->first_name }} {{ $client->middle_name }} {{ $client->last_name }}
                                        </a>
                                    </td>
                                    <td class="px-2 py-3 text-sm text-gray-900">{{ $client->sex }}</td>
                                    <td class="px-3 py-3 text-sm text-gray-900">{{ $client->address }}</td> 
                                    <td class="px-3 py-3 text-sm text-gray-900">{{ $client->municipality ? $client->municipality->name : '-' }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-900">{{ $client->assistanceType ? $client->assistanceType->type_name : '-' }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-900">{{ $client->assistanceCategory ? $client->assistanceCategory->category_name : '-' }}</td>
                                    <td class="px-2 py-3 text-sm text-gray-900">
                                        @if ($client->vulnerabilitySectors->isNotEmpty())
                                            @foreach ($client->vulnerabilitySectors as $sector)
                                                <span class="block">{{ $sector->name }}</span>
                                            @endforeach
                                        @else
                                            None
                                        @endif
                                    </td>
                                    <td class="px-3 py-3 text-sm text-gray-900">
                                        {{ trim($client->representative_first_name . ' ' . $client->representative_middle_name . ' ' . $client->representative_last_name) ?: '-' }}
                                    </td>
                                    <td class="px-3 py-3 text-sm">
                                        <div class="flex space-x-2">
                                            <a href="{{ route('assistance.show', $client->id) }}" class="text-blue-600 hover:text-blue-900" title="View Details">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('assistance.edit', $client->id) }}" class="text-mint-green-600 hover:text-mint-green-900" title="Edit Assistance">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <button type="button" onclick="openDeleteModal('{{ $client->id }}')" class="text-red-600 hover:text-red-900" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>
            </div>
        </div>
        
        <!-- Fixed Pagination Container -->
        <div class="pagination-container mt-6 mb-4 flex justify-center w-full">
            <div class="bg-white p-4 rounded-lg shadow-sm">
                <nav class="flex items-center justify-between">
                    <div class="flex justify-between flex-1 sm:hidden">
                        @if ($clients->onFirstPage())
                            <span class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                Previous
                            </span>
                        @else
                            <a href="{{ $clients->appends(request()->query())->previousPageUrl() }}" class="relative inline-flex items-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                Previous
                            </a>
                        @endif

                        @if ($clients->hasMorePages())
                            <a href="{{ $clients->appends(request()->query())->nextPageUrl() }}" class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 rounded-md hover:text-gray-500 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                Next
                            </a>
                        @else
                            <span class="relative inline-flex items-center px-4 py-2 ml-3 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default leading-5 rounded-md">
                                Next
                            </span>
                        @endif
                    </div>

                    <div class="hidden sm:flex-1 sm:flex sm:items-center sm:justify-between">
                        <div>
                            <p class="text-sm text-gray-700 leading-5">
                                Showing
                                <span class="font-medium">{{ $clients->firstItem() ?? 0 }}</span>
                                to
                                <span class="font-medium">{{ $clients->lastItem() ?? 0 }}</span>
                                of
                                <span class="font-medium">{{ $clients->total() }}</span>
                                results
                            </p>
                        </div>
                        <div>
                            <span class="relative z-0 inline-flex shadow-sm rounded-md">
                                @if ($clients->onFirstPage())
                                    <span class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-l-md leading-5">
                                        <i class="fas fa-chevron-left"></i>
                                    </span>
                                @else
                                    <a href="{{ $clients->appends(request()->query())->previousPageUrl() }}" class="relative inline-flex items-center px-2 py-2 text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-l-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                                        <i class="fas fa-chevron-left"></i>
                                    </a>
                                @endif

                                {{-- Page Numbers --}}
                                @if($clients->lastPage() > 1)
                                    @foreach ($clients->appends(request()->query())->getUrlRange(1, $clients->lastPage()) as $page => $url)
                                        @if ($page == $clients->currentPage())
                                            <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-mint-green-600 border border-mint-green-600 cursor-default leading-5">
                                                {{ $page }}
                                            </span>
                                        @else
                                            <a href="{{ $url }}" class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-gray-700 bg-white border border-gray-300 leading-5 hover:text-gray-500 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-700 transition ease-in-out duration-150">
                                                {{ $page }}
                                            </a>
                                        @endif
                                    @endforeach
                                @else
                                    <span class="relative inline-flex items-center px-4 py-2 -ml-px text-sm font-medium text-white bg-mint-green-600 border border-mint-green-600 cursor-default leading-5">
                                        1
                                    </span>
                                @endif

                                @if ($clients->hasMorePages())
                                    <a href="{{ $clients->appends(request()->query())->nextPageUrl() }}" class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 rounded-r-md leading-5 hover:text-gray-400 focus:z-10 focus:outline-none focus:ring ring-gray-300 focus:border-blue-300 active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150">
                                        <i class="fas fa-chevron-right"></i>
                                    </a>
                                @else
                                    <span class="relative inline-flex items-center px-2 py-2 -ml-px text-sm font-medium text-gray-500 bg-white border border-gray-300 cursor-default rounded-r-md leading-5">
                                        <i class="fas fa-chevron-right"></i>
                                    </span>
                                @endif
                            </span>
                        </div>
                    </div>
                </nav>
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
                <h2 class="text-lg font-semibold text-center mb-3">Confirm Delete</h2>
                <p class="text-center text-gray-700 mb-4">Are you sure you want to delete this client?</p>
                <div class="flex justify-center space-x-3">
                    <button type="button" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md" onclick="closeModal()">Cancel</button>
                    <form id="deleteForm" action="" method="POST" class="inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white px-4 py-2 rounded-md">Delete</button>
                    </form>
                </div>
            </div>
        </div>
        
        <script>
            function openDeleteModal(clientId) {
                document.getElementById('deleteModal').classList.remove('hidden');
                var form = document.getElementById('deleteForm');
                form.action = "{{ route('assistance.destroy', ':id') }}".replace(':id', clientId);
            }
            function closeModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }
        </script>
    </main>
</div>
@endsection
