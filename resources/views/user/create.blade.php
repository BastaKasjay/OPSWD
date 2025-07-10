@extends('layouts.app')
@section('content')

<body class="bg-gray-100">

    <h1 class="text-[38px] font-semibold mb-4 text-center mt-10 title-text-dark-taupe">Create User</h1>

    <div class="container mx-auto mt-7 mb-16">
        <div class="w-1/2 mx-auto bg-light-beige border-light-taupe custom-border-width rounded-lg shadow-md p-6">
            <form id="userCreateForm" method="POST" action="{{ route('users.store') }}">
                @csrf

                <!-- EMPLOYEE INFO -->
                <h2 class="text-lg font-bold text-gray-800 mb-4">Employee Information</h2>

                <!-- First Name -->
                <div class="mb-4 flex items-center space-x-5">
                    <label class="font-medium text-gray-700">First Name:</label>
                    <input type="text" name="first_name" required class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <!-- Middle Name -->
                <div class="mb-4 flex items-center space-x-5">
                    <label class="font-medium text-gray-700">Middle Name:</label>
                    <input type="text" name="middle_name" class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <!-- Last Name -->
                <div class="mb-4 flex items-center space-x-5">
                    <label class="font-medium text-gray-700">Last Name:</label>
                    <input type="text" name="last_name" required class="border border-gray-300 rounded-md p-2 w-full">
                </div>

                <!-- USER INFO -->
                <h2 class="text-lg font-bold text-gray-800 mb-4 mt-6">User Account</h2>

                <div class="mb-4 flex items-center space-x-4">
                    <label class="w-[150px] font-medium text-gray-700">Username:</label>
                    <input type="text" name="username" required maxlength="20" class="rounded-md border border-gray-300 shadow-sm p-1">
                </div>

                <div class="mb-4 flex items-center space-x-4">
                    <label class="w-[150px] font-medium text-gray-700">Role:</label>
                    <select name="role" required class="w-[200px] border p-1 rounded-sm shadow-sm">
                        <option disabled selected>Select Role</option>
                        <option value="System Admin">System Admin</option>
                        <option value="Office Admin">Office Admin</option>
                        <option value="Office User">Office User</option>
                    </select>
                </div>

                <div class="mb-4 flex items-center space-x-4">
                    <label class="w-[150px] font-medium text-gray-700">Password:</label>
                    <input type="password" name="password" required minlength="8" class="w-[250px] border border-gray-300 rounded-md shadow-sm p-1">
                </div>

                <div class="mb-4 flex items-center space-x-4">
                    <label class="w-[150px] font-medium text-gray-700">Confirm Password:</label>
                    <input type="password" name="password_confirmation" required class="w-[250px] border border-gray-300 rounded-md shadow-sm p-1">
                </div>

                <!-- Buttons -->
                <div class="flex space-x-2 mt-4">
                    <button type="submit" class="bg-mint-green-600 hover:bg-mint-green-700 text-white px-4 py-1 rounded-md shadow-lg">Submit</button>
                    <a href="{{ route('users.index') }}" class="border-2 px-4 shadow-lg border-taupe text-taupe py-1 rounded-md hover:bg-soft-white">Cancel</a>
                </div>
            </form>
        </div>
    </div>

</body>
@endsection