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
        html, body, main {
            overflow: hidden !important;
        }
    </style>
@endsection

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <main class="flex-1 p-8 bg-gray-100">
        <div class="flex items-center mb-6">
            <a href="{{ route('clients.show', $client->id) }}" class="text-gray-600 hover:text-gray-900 mr-2">
                <i class="fas fa-arrow-left"></i>
            </a>
            <h1 class="text-3xl font-bold text-gray-800">Edit Client</h1>
        </div>
        <div class="bg-white p-6 rounded-lg shadow-md max-w-6xl mx-auto">
            <form action="{{ route('clients.update', $client->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="grid grid-cols-1 md:grid-cols-3 gap-x-8 gap-y-6">
                    <!-- Personal Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Personal Details</h3>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">First Name</label>
                            <input type="text" name="first_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ $client->first_name }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Middle Name</label>
                            <input type="text" name="middle_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ $client->middle_name }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Last Name</label>
                            <input type="text" name="last_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ $client->last_name }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Sex</label>
                            <select name="sex" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                <option value="Male" {{ $client->sex == 'Male' ? 'selected' : '' }}>Male</option>
                                <option value="Female" {{ $client->sex == 'Female' ? 'selected' : '' }}>Female</option>
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Age</label>
                            <input type="number" name="age" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ $client->age }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Birth Date</label>
                            <input type="date" name="birth_date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ $client->birth_date }}">
                        </div>
                    </div>
                    <!-- Address & Contact -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Address & Contact</h3>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Municipality</label>
                            <select name="municipality_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                <option value="">Select Municipality</option>
                                @foreach($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}" {{ $client->municipality_id == $municipality->id ? 'selected' : '' }}>{{ $municipality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Address</label>
                            <input type="text" name="address" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ $client->address }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Contact Number</label>
                            <input type="text" name="contact_number" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ $client->contact_number }}" required>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Representative First Name</label>
                            <input type="text" name="representative_first_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ old('representative_first_name', $client->representative_first_name ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Representative Middle Name</label>
                            <input type="text" name="representative_middle_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ old('representative_middle_name', $client->representative_middle_name ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Representative Last Name</label>
                            <input type="text" name="representative_last_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ old('representative_last_name', $client->representative_last_name ?? '') }}">
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Representative Contact Number</label>
                            <input type="text" name="representative_contact_number" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" value="{{ old('representative_contact_number', $client->representative_contact_number ?? '') }}">
                        </div>
                    </div>
                    <!-- Assistance Details -->
                    <div>
                        <h3 class="text-lg font-semibold text-gray-700 mb-4">Assistance Details</h3>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Vulnerability Sectors</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach($vulnerabilitySectors as $sector)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="vulnerability_sectors[]" value="{{ $sector->id }}" class="form-checkbox text-mint-green-600 focus:ring-mint-green-500 rounded" {{ $client->vulnerabilitySectors->contains($sector->id) ? 'checked' : '' }}>
                                        <span class="ml-2 text-gray-900">{{ $sector->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Assistance Type</label>
                            <select name="assistance_type_id" id="assistance_type" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                <option value="">Select Assistance Type</option>
                                @foreach($assistanceTypes as $type)
                                    <option value="{{ $type->id }}" {{ $client->assistance_type_id == $type->id ? 'selected' : '' }}>{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-4">
                            <label class="block text-gray-600 text-sm font-medium mb-1">Assistance Category</label>
                            <select name="assistance_category_id" id="assistance_category" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                <option value="">Select Assistance Category</option>
                                @foreach($assistanceCategories as $category)
                                    <option value="{{ $category->id }}" {{ $client->assistance_category_id == $category->id ? 'selected' : '' }}>{{ $category->category_name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                </div>
                <div class="flex justify-end mt-8">
                    <button type="submit" class="bg-mint-green-600 hover:bg-mint-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200 mr-2">Save Changes</button>
                    <a href="{{ route('clients.show', $client->id) }}" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200">Cancel</a>
                </div>
            </form>
        </div>
    </main>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $('#assistance_type').on('change', function () {
        var typeId = $(this).val();
        $('#assistance_category').empty().append('<option>Loading...</option>');
        if (typeId) {
            $.ajax({
                url: '/get-categories/' + typeId,
                type: 'GET',
                success: function (data) {
                    $('#assistance_category').empty().append('<option value="">Select Assistance Category</option>');
                    data.forEach(function (category) {
                        $('#assistance_category').append(
                            '<option value="'+category.id+'">'+category.category_name+'</option>'
                        );
                    });
                }
            });
        }
    });
</script>
@endsection
