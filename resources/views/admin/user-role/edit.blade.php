@extends('admin.layouts.app')
@section('body')
    <div class="min-h-screen bg-gradient-to-br from-gray-50 to-gray-100 py-8">
        <div class=" px-4 sm:px-6 lg:px-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div class="flex items-center space-x-4">
                        <a href="{{ route('admin.userrole.index') }}"
                           class="inline-flex items-center p-2.5 border border-gray-300 rounded-lg shadow-sm text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 hover:shadow-md">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"></path>
                            </svg>
                        </a>
                        <div>
                            <h1 class="text-3xl font-bold text-gray-900">Edit Role</h1>
                            <p class="mt-2 text-sm text-gray-600">Update role information and permissions for: <span class="font-semibold text-blue-600">{{ $role->name }}</span></p>
                        </div>
                    </div>
                    <div class="hidden sm:flex items-center space-x-3">
                        <div class="bg-blue-50 px-4 py-2 rounded-lg">
                            <div class="flex items-center">
                                <div class="w-2 h-2 bg-blue-500 rounded-full mr-2"></div>
                                <span class="text-sm font-medium text-blue-700">Role Management</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            @include('admin.include.toastmessage')

            <!-- Form Section -->
            <div class="bg-white shadow-xl rounded-xl overflow-hidden border border-gray-200">
                <form id="roleForm" action="{{ route('admin.userrole.update', $role->id) }}" method="POST" class="space-y-0">
                    @csrf
                    @method('PUT')

                    <!-- Role Information Section -->
                    <div class="px-6 py-8 border-b border-gray-200 bg-gradient-to-r from-blue-50 to-indigo-50">
                        <div class="">
                            <div class="text-center mb-8">
                                <div class="w-16 h-16 bg-blue-100 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                    </svg>
                                </div>
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Role Information</h2>
                                <p class="text-gray-600">Update the basic details for this role</p>
                            </div>

                            <div class="bg-white rounded-lg p-6 shadow-sm border border-gray-200">
                                <div class="mb-6">
                                    <label for="name" class="block text-sm font-semibold text-gray-700 mb-3">
                                        Role Name <span class="text-red-500">*</span>
                                    </label>
                                    <div class="relative">
                                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                                            </svg>
                                        </div>
                                        <input type="text" name="rolename" id="name" required
                                            class="focus:ring-blue-500 focus:border-blue-500 block w-full pl-12 pr-4 py-3 border border-gray-300 rounded-lg transition-all duration-200 text-gray-900 placeholder-gray-500"
                                            value="{{ old('name', $role->name) }}"
                                            placeholder="Enter role name">
                                    </div>
                                    @error('rolename')
                                        <p class="mt-2 text-sm text-red-600 flex items-center">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            {{ $message }}
                                        </p>
                                    @enderror
                                </div>

                                <!-- Role Status -->
                                <div class="mb-6">
                                    <label class="block text-sm font-semibold text-gray-700 mb-3">
                                        Role Status
                                    </label>
                                    <div class="flex items-center space-x-4">
                                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-green-100 text-green-800">
                                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            Active
                                        </span>
                                        <span class="text-sm text-gray-500">
                                            Created {{ $role->created_at ? $role->created_at->format('M d, Y') : 'N/A' }}
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Permissions Section -->
                    <div class="px-6 py-8">
                        <div class="max-w-6xl mx-auto">
                            <div class="text-center mb-8">
                                <h2 class="text-2xl font-bold text-gray-900 mb-2">Role Permissions</h2>
                                <p class="text-gray-600">Manage the permissions assigned to this role</p>
                            </div>

                            <!-- Permission Controls -->
                            <div class="flex flex-wrap items-center justify-center gap-4 mb-8">
                                <button type="button" id="selectAllBtn"
                                    class="inline-flex items-center px-4 py-2.5 bg-green-50 border border-green-200 rounded-lg text-sm font-medium text-green-700 hover:bg-green-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                    </svg>
                                    Select All Permissions
                                </button>
                                <button type="button" id="clearAllBtn"
                                    class="inline-flex items-center px-4 py-2.5 bg-red-50 border border-red-200 rounded-lg text-sm font-medium text-red-700 hover:bg-red-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500 transition-all duration-200">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                    </svg>
                                    Clear All Permissions
                                </button>
                                <div class="bg-blue-50 px-4 py-2 rounded-lg">
                                    <span class="text-sm font-medium text-blue-700">
                                        <span id="selectedCount">0</span> of <span id="totalCount">0</span> permissions selected
                                    </span>
                                </div>
                            </div>

                            <!-- Permissions Grid -->
                            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4">
                                @foreach ($permissions as $key => $permission)
                                    <div class="bg-white border border-gray-200 rounded-lg shadow-sm hover:shadow-md transition-all duration-200 overflow-hidden">
                                        <div class="bg-gradient-to-r from-gray-50 to-gray-100 px-4 py-3 border-b border-gray-200">
                                            <div class="flex items-center justify-between">
                                                <div class="flex items-center">
                                                    <input id="parent-{{ Str::slug($key) }}" type="checkbox"
                                                        class="parent-checkbox h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded"
                                                        data-group="{{ Str::slug($key) }}">
                                                    <label for="parent-{{ Str::slug($key) }}"
                                                        class="ml-2 text-sm font-semibold text-gray-900">{{ $key }}</label>
                                                </div>
                                                <div class="w-6 h-6 bg-blue-100 rounded-full flex items-center justify-center">
                                                    <svg class="w-3 h-3 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                                    </svg>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="p-4 space-y-2">
                                            @foreach ($permission as $childPermission)
                                                <div class="flex items-center group hover:bg-gray-50 rounded-md p-1.5 transition-colors duration-150">
                                                    <input type="checkbox"
                                                        value="{{ $childPermission->name }}"
                                                        name="permissions[]"
                                                        id="permission-{{ $childPermission->id }}"
                                                        {{ $role->getPermissionNames() && $role->hasPermissionTo($childPermission->name) ? 'checked' : '' }}
                                                        class="permission-checkbox {{ Str::slug($key) }} h-4 w-4 text-blue-600 focus:ring-blue-500 border-gray-300 rounded">
                                                    <label for="permission-{{ $childPermission->id }}"
                                                        class="ml-2 text-sm text-gray-700 group-hover:text-gray-900 cursor-pointer flex-1">
                                                        {{ $childPermission->name }}
                                                    </label>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    @error('permission')
                        <div class="px-6 py-4 bg-red-50 border border-red-200 rounded-lg mx-6 mb-6">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-red-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-red-700">{{ $message }}</p>
                                </div>
                            </div>
                        </div>
                    @enderror

                    <!-- Form Actions -->
                    <div class="px-6 py-6 bg-gray-50 border-t border-gray-200">
                        <div class="max-w-6xl mx-auto">
                            <div class="flex flex-col sm:flex-row items-center justify-between space-y-4 sm:space-y-0 sm:space-x-4">
                                <div class="flex items-center text-sm text-gray-600">
                                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                    </svg>
                                    All fields marked with <span class="text-red-500">*</span> are required
                                </div>
                                <div class="flex items-center space-x-3">
                                    <a href="{{ route('admin.userrole.index') }}"
                                        class="inline-flex items-center px-6 py-3 border border-gray-300 shadow-sm text-sm font-medium rounded-lg text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                        </svg>
                                        Cancel
                                    </a>
                                    <button type="submit"
                                        class="inline-flex items-center px-6 py-3 border border-transparent shadow-sm text-sm font-medium rounded-lg text-white bg-gradient-to-r from-blue-600 to-blue-700 hover:from-blue-700 hover:to-blue-800 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-all duration-200 transform hover:scale-105">
                                        <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                                        </svg>
                                        Update Role
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Parent checkbox functionality
            const parentCheckboxes = document.querySelectorAll('.parent-checkbox');
            const allPermissionCheckboxes = document.querySelectorAll('.permission-checkbox');

            parentCheckboxes.forEach(parentCheckbox => {
                parentCheckbox.addEventListener('change', function() {
                    const group = this.getAttribute('data-group');
                    const childCheckboxes = document.querySelectorAll(`.${group}`);

                    childCheckboxes.forEach(childCheckbox => {
                        childCheckbox.checked = this.checked;
                    });
                    updateSelectedCount();
                });
            });

            // Select All functionality
            const selectAllBtn = document.getElementById('selectAllBtn');
            const clearAllBtn = document.getElementById('clearAllBtn');

            selectAllBtn.addEventListener('click', function() {
                allPermissionCheckboxes.forEach(checkbox => {
                    checkbox.checked = true;
                });
                parentCheckboxes.forEach(checkbox => {
                    checkbox.checked = true;
                });
                updateSelectedCount();
            });

            clearAllBtn.addEventListener('click', function() {
                allPermissionCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                parentCheckboxes.forEach(checkbox => {
                    checkbox.checked = false;
                });
                updateSelectedCount();
            });

            // Update selected count
            function updateSelectedCount() {
                const selectedCount = document.querySelectorAll('input[name="permissions[]"]:checked').length;
                const totalCount = allPermissionCheckboxes.length;

                // Update the description text
                const descriptionElement = document.querySelector('.md\\:col-span-1 p');
                if (descriptionElement) {
                    descriptionElement.textContent = `Manage the permissions assigned to this role. (${selectedCount}/${totalCount} selected)`;
                }
            }

            // Add event listeners to all permission checkboxes
            allPermissionCheckboxes.forEach(checkbox => {
                checkbox.addEventListener('change', updateSelectedCount);
            });

            // Form validation
            const form = document.getElementById('roleForm');
            form.addEventListener('submit', function(e) {
                const roleName = document.getElementById('name').value.trim();
                const selectedPermissions = document.querySelectorAll('input[name="permissions[]"]:checked');

                if (!roleName) {
                    e.preventDefault();
                    alert('Please enter a role name');
                    return;
                }

                if (selectedPermissions.length === 0) {
                    e.preventDefault();
                    alert('Please select at least one permission');
                    return;
                }
            });

            // Initialize count
            updateSelectedCount();
        });
    </script>
@endsection
