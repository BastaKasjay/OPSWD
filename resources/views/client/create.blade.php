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
        html, body, main {
            overflow: hidden !important;
        }
        /* Hide scrollbars for all browsers */
        ::-webkit-scrollbar { display: none; }
        html { -ms-overflow-style: none; scrollbar-width: none; }
    </style>
@endsection

@section('content')
<div class="flex min-h-screen bg-gray-100">
   
    <!-- Main Content -->
    <main class="flex-1 p-4 bg-gray-100">

        <div class="bg-white p-4 rounded-lg shadow-md mb-4">
            <div class="flex justify-between items-center mb-4">
                <h2 class="text-xl font-bold text-gray-800 flex items-center">
                    <i class="fas fa-plus-circle mr-2 text-mint-green-600"></i>
                    Add Client
                </h2>
                
            </div>
            <form action="{{ route('clients.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Left: Client Info -->
                    <div class="space-y-3">
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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                              <div>
                            <label for="birth_date" class="block text-sm font-medium text-gray-700 mb-1">Birth Date</label>
                            <div class="relative">
                                <input type="date" id="birth_date" name="birth_date" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500 pr-10">
                                <i class="fas fa-calendar-alt absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                            </div>
                        </div>
                        
                            <div>
                                <label for="age" class="block text-sm font-medium text-gray-700 mb-1">Age<span class="text-red-500">*</span></label>
                                <input type="number" id="age" name="age" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                            </div>
                        </div>
                        <div>
                            <label for="contact_number" class="block text-sm font-medium text-gray-700 mb-1">Contact Number<span class="text-red-500">*</span></label>
                            <input type="text" id="contact_number" name="contact_number" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
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
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            <div>
                                <label for="valid_id" class="block text-sm font-medium text-gray-700 mb-1">Valid ID<span class="text-red-500">*</span></label>
                                <select id="valid_id" name="valid_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                                    <option value="">Select Valid ID</option>
                                    <option value="Driver's License">Driver's License</option>
                                    <option value="Passport">Passport</option>
                                    <option value="PhilHealth ID">PhilHealth ID</option>
                                    <option value="SSS ID">SSS ID</option>
                                    <option value="UMID">UMID</option>
                                    <option value="Voter's ID">Voter's ID</option>
                                    <option value="Senior Citizen ID">Senior Citizen ID</option>
                                    <option value="PWD ID">PWD ID</option>
                                    <option value="Barangay ID">Barangay ID</option>
                                    <option value="Others">Others</option>
                                </select>
                            </div>
                            <div>
                                <label for="id_number" class="block text-sm font-medium text-gray-700 mb-1">ID Number<span class="text-red-500">*</span></label>
                                <input type="text" id="id_number" name="id_number" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500" required>
                            </div>
                        </div>
                      
                        <!-- Action Buttons -->
                        <div class="mt-4 pt-3 border-t border-gray-200">
                            <button type="submit" id="saveBtn" class="bg-mint-green-600 hover:bg-mint-green-700 text-white font-medium py-2 px-4 rounded-lg shadow-md transition-colors duration-200" disabled>
                                <i class="fas fa-save mr-2"></i> Save
                            </button>
                            <a href="{{ route('clients.index') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-medium py-2 px-4 rounded-lg shadow-sm transition-colors duration-200 ml-2">Cancel</a>
                        </div>
                    </div>
                    <!-- Right: Representative, Assistance, Requirements -->
                    <div class="space-y-3">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Vulnerability Sectors</label>
                            <div class="flex flex-wrap gap-2">
                                @foreach($vulnerabilitySectors as $sector)
                                    <label class="inline-flex items-center text-xs">
                                        <input type="checkbox" name="vulnerability_sectors[]" value="{{ $sector->id }}" class="form-checkbox text-mint-green-600 focus:ring-mint-green-500 rounded">
                                        <span class="ml-1 text-gray-900">{{ $sector->name }}</span>
                                    </label>
                                @endforeach
                            </div>
                        </div>
                        <div>
                            <label for="assistance_type_id" class="block text-sm font-medium text-gray-700 mb-1">Assistance Type<span class="text-red-500">*</span></label>
                            <select id="assistance_typess" name="assistance_type_id" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500 text-sm" required>
                                <option value="">Select Assistance Type</option>
                                @foreach($assistanceTypes as $type)
                                    <option value="{{ $type->id }}">{{ $type->type_name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Assistance Categories</label>
                            <div id="categories_section" class="space-y-1">
                                <p class="text-gray-500 text-xs">Please select an assistance type to view categories.</p>
                            </div>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Requirements</label>
                            <div id="requirements_section" class="space-y-1">
                                <p class="text-gray-500 text-xs">Please select an assistance type to view requirements.</p>
                            </div>
                        </div>
                        <div id="case-field" style="display: none;">
                            <label for="Case" class="block text-sm font-medium text-gray-700 mb-1">Case</label>
                            <select id="Case" name="Case" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500 text-sm">
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
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-3 mt-3">
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
                        <div class="mt-3">
                            <label for="representative_contact_number" class="block text-sm font-medium text-gray-700 mb-1">Representative Contact Number</label>
                            <input type="text" id="representative_contact_number" name="representative_contact_number" class="w-full p-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-mint-green-500">
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>
</div>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const saveBtn = document.getElementById('saveBtn');

    document.getElementById('assistance_typess').addEventListener('change', function() {
        const typeId = this.value;
        const selectedOptionText = this.options[this.selectedIndex].text;
        
        saveBtn.disabled = true; // Always disable on change
        
        // Toggle Case field visibility based on assistance type
        const caseField = document.getElementById('case-field');
        if (selectedOptionText === 'Medical Assistance') {
            caseField.style.display = 'block';
        } else {
            caseField.style.display = 'none';
            // Clear the case value when hidden
            document.getElementById('Case').value = '';
        }
        
        // Load requirements
        fetch(`/get-requirements/${typeId}`)
            .then(res => res.json())
            .then(data => {
                let html = '';
                if (data.length === 0) {
                    html = '<p class="text-gray-500 text-xs">No requirements found.</p>';
                } else {
                    data.forEach(r => {
                        html += `
                            <div class="form-check mb-1">
                                <input type="checkbox" name="requirements[]" value="${r.id}" class="form-check-input requirement-checkbox" id="requirement_${r.id}">
                                <label class="form-check-label text-xs ml-1" for="requirement_${r.id}">${r.requirement_name}</label>
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
                    html = '<p class="text-gray-500 text-xs">No categories found.</p>';
                } else {
                    data.forEach(c => {
                        html += `
                            <div class="form-check mb-1">
                                <input type="radio" name="assistance_category_id" value="${c.id}" class="form-check-input category-radio" id="category_${c.id}">
                                <label class="form-check-label text-xs ml-1" for="category_${c.id}">${c.category_name}</label>
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
