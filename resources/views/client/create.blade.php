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
+    </style>
@endsection

@section('content')
<div class="flex min-h-screen bg-gray-100">
    <!-- Sidebar -->
    <aside class="w-64 bg-mint-green-900 text-white flex flex-col p-4 shadow-lg rounded-r-lg min-h-screen h-screen">
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
                    <a href="#" class="flex items-center p-3 rounded-lg bg-mint-green-700 text-mint-green-100 font-semibold shadow-inner">
                        <i class="fas fa-tachometer-alt mr-3"></i>
                        Dashboard
                    </a>
                </li>
                <li class="mb-2">
                    <a href="{{ route('clients.index') }}" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-users mr-3"></i>
                        Client Management
                    </a>
                </li>
                <li class="mb-2">
                    <a href="#" class="flex items-center p-3 rounded-lg hover:bg-mint-green-700 transition-colors duration-200">
                        <i class="fas fa-hand-holding-usd mr-3"></i>
                        Sytsem Management
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
                        <i class="fas fa-book-open mr-3"></i>
                        Libraries
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
    <main class="flex-1 p-8 bg-gray-100 overflow-x-auto">

        <div class="bg-white p-6 rounded-lg shadow-md mb-6">
            <div class="flex justify-between items-center mb-6">
                <h2 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-plus-circle mr-2 text-mint-green-600"></i>
                    Add Client
                </h2>
                
            </div>
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
                    <!-- Left: Client Info -->
                    <div class="space-y-4">
                        <div>
                            <label for="first_name" class="block text-sm font-medium text-gray-700 mb-1">First Name<span class="text-red-500">*</span></label>
                            <input type="text" id="first_name" name="first_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                        </div>
                        <div>
                            <label for="middle_name" class="block text-sm font-medium text-gray-700 mb-1">Middle Name</label>
                            <input type="text" id="middle_name" name="middle_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500">
                        </div>
                        <div>
                            <label for="last_name" class="block text-sm font-medium text-gray-700 mb-1">Last Name<span class="text-red-500">*</span></label>
                            <input type="text" id="last_name" name="last_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                        </div>
                        <div>
                            <label for="sex" class="block text-sm font-medium text-gray-700 mb-1">Sex<span class="text-red-500">*</span></label>
                            <select id="sex" name="sex" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                <option value="">Select Sex</option>
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select>
                        </div>
                        <div>
                            <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age<span class="text-red-500">*</span></label>
                            <input type="number" id="age" name="age" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                        </div>
                        <div>
                            <label for="municipality_id" class="block text-sm font-medium text-gray-700 mb-1">Municipality<span class="text-red-500">*</span></label>
                            <select id="municipality_id" name="municipality_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                <option value="">Select Municipality</option>
                                @foreach($municipalities as $municipality)
                                    <option value="{{ $municipality->id }}">{{ $municipality->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label for="address" class="block text-sm font-medium text-gray-700 mb-1">Address<span class="text-red-500">*</span></label>
                            <input type="text" id="address" name="address" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                        </div>
                        <div>
                            <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">Contact Number<span class="text-red-500">*</span></label>
                            <input type="text" id="contact_number" name="contact_number" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                        </div>
                        <div>
                            <label for="inputDate" class="block text-sm font-medium text-gray-700 mb-1">Birth Date</label>
                            <div class="relative">
                                <input type="date" id="inputDate" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500 pr-10">
                                <i class="fas fa-calendar-alt absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                    </div>
                    <!-- Right: Representative, Assistance, Requirements -->
                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Vulnerability Sectors</label>
                            <div class="flex flex-wrap gap-3">
                                @foreach($vulnerabilitySectors as $sector)
                                    <label class="inline-flex items-center">
                                        <input type="checkbox" name="vulnerability_sectors[]" value="{{ $sector->id }}" class="form-checkbox text-mint-green-600 focus:ring-mint-green-500 rounded">
                                        <span class="ml-2 text-gray-900">{{ $sector->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label for="assistance_type_id" class="block text-sm font-medium text-gray-700 mb-1">Assistance Type<span class="text-red-500">*</span></label>
                            <select id="assistance_typess" name="assistance_type_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                <option value="">Select Assistance Type</option>
                                @foreach($assistanceTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Assistance Categories</label>
                            <div id="categories_section" class="space-y-2">
                                <p class="text-gray-500 text-sm">Please select an assistance type to view categories.</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Requirements</label>
                            <div id="requirements_section" class="space-y-2">
                                <p class="text-gray-500 text-sm">Please select an assistance type to view requirements.</p>
                            </div>
                        </div>
                        <div>
                            <label for="Case" class="block text-sm font-medium text-gray-700 mb-1">Case<span class="text-red-500"></span></label>
                            <select id="Case" name="Case" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" >
                                <option value="">Select Case</option>
                                <option value="CKD">CKD</option>
                                <option value="Cancer">Cancer</option>
                                <option value="Heart Illness">Heart Illness</option>
                                <option value="Diabetes">Diabetes</option>
                                <option value="Hypertension">Hypertension</option>
                                <option value="Others">Others</option>
                            </select>
                        </div>
                        <!-- Representative fields moved below requirements -->
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">
                            <div>
                                <label for="representative_first_name" class="block text-sm font-medium text-gray-700 mb-1">Representative First Name</label>
                                <input type="text" id="representative_first_name" name="representative_first_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500">
                            </div>
                            <div>
                                <label for="representative_middle_name" class="block text-sm font-medium text-gray-700 mb-1">Representative Middle Name</label>
                                <input type="text" id="representative_middle_name" name="representative_middle_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500">
                            </div>
                            <div>
                                <label for="representative_last_name" class="block text-sm font-medium text-gray-700 mb-1">Representative Last Name</label>
                                <input type="text" id="representative_last_name" name="representative_last_name" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500">
                            </div>
                        </div>
                        <div class="mt-4">
                            <label for="representative_contact_number" class="block text-sm font-medium text-gray-700 mb-1">Representative Contact Number</label>
                            <input type="text" id="representative_contact_number" name="representative_contact_number" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500">
                        </div>
                    </div>
                </div>
                <div class="mt-6">
                    <button type="submit" id="saveBtn" class="bg-mint-green-600 hover:bg-mint-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200" disabled>
                        <i class="fas fa-save mr-2"></i> Save
                    </button>
                     <a href="{{ route('clients.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200">Cancel</a>
            </form>
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const saveBtn = document.getElementById('saveBtn');

    document.getElementById('assistance_typess').addEventListener('change', function() {
        const typeId = this.value;
        saveBtn.disabled = true; // Always disable on change
        console.log
        // Load requirements
        fetch(`/get-requirements/${typeId}`)
            .then(res => res.json())
            .then(data => {
                let html = '';
                if (data.length === 0) {
                    html = '<p>No requirements found.</p>';
                } else {
                    data.forEach(r => {
                        html += `
                            <div class="form-check">
                                <input type="checkbox" name="requirements[]" value="${r.id}" class="form-check-input requirement-checkbox" id="requirement_${r.id}">
                                <label class="form-check-label" for="requirement_${r.id}">${r.requirement_name}</label>
                            </div>
                        `;
                    });
                }
                document.getElementById('requirements_section').innerHTML = html;
                addValidationListeners();
            });

        // Load categories
        fetch(`/get-categories/${typeId}`)
            .then(res => res.json())
            .then(data => {
                let html = '';
                if (data.length === 0) {
                    html = '<p>No categories found.</p>';
                } else {
                    data.forEach(c => {
                        html += `
                            <div class="form-check">
                                <input type="radio" name="assistance_category_id" value="${c.id}" class="form-check-input category-radio" id="category_${c.id}">
                                <label class="form-check-label" for="category_${c.id}">${c.category_name}</label>
                            </div>
                        `;
                    });
                }
                document.getElementById('categories_section').innerHTML = html;
                addValidationListeners();
            });

        
    });

    function addValidationListeners() {
        document.querySelectorAll('.requirement-checkbox').forEach(checkbox => {
            checkbox.addEventListener('change', validateForm);
        });
        document.querySelectorAll('.category-radio').forEach(radio => {
            radio.addEventListener('change', validateForm);
        });
        validateForm();
    }

    function validateForm() {
        const requirementCheckboxes = document.querySelectorAll('.requirement-checkbox');
        const allChecked = Array.from(requirementCheckboxes).every(cb => cb.checked);
        const categorySelected = document.querySelector('.category-radio:checked') !== null;

        if ((requirementCheckboxes.length === 0 || allChecked) && categorySelected) {
            saveBtn.disabled = false;
        } else {
            saveBtn.disabled = true;
        }
    }
});
document.addEventListener('DOMContentLoaded', function () {
    // Initial validation on page load
    validateForm();
});

</script>
@endsection
