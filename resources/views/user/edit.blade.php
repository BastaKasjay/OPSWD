@extends('layouts.app')

@section('content')
<div class="min-h-screen flex items-center justify-center bg-gray-100">
    <div class="w-full max-w-lg bg-white p-8 rounded shadow-md mx-auto mt-10 mb-20">
        <h2 class="text-2xl font-semibold mb-6 text-center">Edit User</h2>
        <form action="{{ route('users.update', $user->id) }}" method="POST" class="w-full">
            @csrf
            @method('PUT')

            <!-- Username -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">Username:</label>
                <input type="text" name="username" value="{{ old('username', $user->email ? explode('@', $user->email)[0] : '') }}" required class="w-full border border-gray-300 p-2 rounded-md">
            </div>

            <!-- New Password -->
            <div class="mb-4">
                <label class="block text-gray-700 font-medium mb-2">New Password <span class="text-sm text-gray-500">(leave blank to keep current)</span>:</label>
                <input type="password" name="password" class="w-full border border-gray-300 p-2 rounded-md">
            </div>

            <!-- Role -->
            <div class="mb-6">
                <label class="block text-gray-700 font-medium mb-2">Role:</label>
                <select name="role" required class="w-full border border-gray-300 p-2 rounded-md">
                    <option disabled>Select Role</option>
                    <option value="System Admin" {{ $user->role == 'System Admin' ? 'selected' : '' }}>System Admin</option>
                    <option value="Office Admin" {{ $user->role == 'Office Admin' ? 'selected' : '' }}>Office Admin</option>
                    <option value="Office User" {{ $user->role == 'Office User' ? 'selected' : '' }}>Office User</option>
                </select>
            </div>

            <!-- Buttons -->
            <div class="flex space-x-3 justify-center">
                <button type="submit" class="bg-mint-green-600 hover:bg-mint-green-700 text-white px-4 py-2 rounded-md shadow">Save Changes</button>
                <a href="{{ route('users.index') }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 px-4 py-2 rounded-md shadow">Cancel</a>
            </div>
        </form>
    </div>
</div>
@endsection