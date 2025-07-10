@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar is included in layouts.app -->
    <main class="flex-1 p-8 overflow-auto">
        <h1 class="text-3xl font-bold text-gray-800 mb-6">User Management</h1>

        <div class="flex flex-col md:flex-row items-center justify-between mb-6 space-y-4 md:space-y-0">
            <a href="{{ route('users.create') }}" class="bg-mint-green-600 hover:bg-mint-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200 w-full md:w-auto flex items-center justify-center">
                <i class="fas fa-user-plus mr-2"></i> Create User
            </a>
            <form action="{{ route('users.index') }}" method="GET" class="flex flex-col sm:flex-row items-stretch sm:items-center space-y-2 sm:space-y-0 sm:space-x-2 w-full md:w-auto">
                <div class="relative flex-grow">
                    <input type="text" name="search" placeholder="Search " value="{{ request('search') }}" class="pl-10 pr-4 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500 w-full">
                    <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                </div>
                <button type="submit" class="bg-mint-green-600 hover:bg-mint-green-700 text-white px-4 py-2 rounded-lg w-full sm:w-auto transition-colors duration-200">
                    Search
                </button>
            </form>
        </div>

        @if(request('search'))
        <div class="flex justify-between items-center mb-3">
            <div class="text-gray-600">
                Showing {{ $users->total() }} result(s) for "{{ request('search') }}"
            </div>
            <div class="text-gray-600 font-medium">
                Total Users: {{ $users->total() }}
            </div>
        </div>
        @else
        <div class="flex justify-end mb-3">
            <div class="text-gray-600 font-medium">
                Total Users: {{ $users->total() }}
            </div>
        </div>
        @endif

        <div class="bg-white p-6 rounded-lg shadow-md overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-mint-green-100">
                    <tr>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider rounded-tl-lg">ID</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Name</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Username</th>
                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-700 uppercase tracking-wider">Role</th>
                        <th class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider rounded-tr-lg">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($users as $user)
                    <tr class="hover:bg-mint-green-50">
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ str_pad($user->id, 4, '0', STR_PAD_LEFT) }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">
                            {{ $user->employee->first_name ?? '' }}
                            @if($user->employee && $user->employee->middle_name)
                                {{ strtoupper(substr($user->employee->middle_name, 0, 1)) }}.
                            @endif
                            {{ $user->employee->last_name ?? '' }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->email ? explode('@', $user->email)[0] : '-' }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-900">{{ $user->role }}</td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                            <div class="flex space-x-2 justify-center">
                                <a href="{{ route('users.edit', $user) }}" class="text-mint-green-600 hover:text-mint-green-900" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <button type="button" onclick="openDeleteModal('{{ $user->id }}')" class="text-red-600 hover:text-red-900" title="Delete">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="px-6 py-4 text-center text-gray-500">No users found.</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

            <div class="mt-4 flex justify-end">
                {{ $users->links() }}
            </div>
        </div>

        <!-- Delete Modal -->
        <div id="deleteModal" class="hidden fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-40">
            <div class="bg-white rounded-lg shadow-lg p-6 w-full max-w-sm">
                <h2 class="text-lg font-semibold text-center mb-3">Confirm Delete</h2>
                <p class="text-center text-gray-700 mb-4">Are you sure you want to delete this user?</p>
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
            function openDeleteModal(userId) {
                document.getElementById('deleteModal').classList.remove('hidden');
                // Use route() helper for delete action
                var form = document.getElementById('deleteForm');
                form.action = "{{ route('users.destroy', ':id') }}".replace(':id', userId);
            }
            function closeModal() {
                document.getElementById('deleteModal').classList.add('hidden');
            }
        </script>
    </main>
</div>
@endsection