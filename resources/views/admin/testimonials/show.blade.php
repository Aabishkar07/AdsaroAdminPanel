@extends('admin/layouts/app')
@section('page_title', 'View Testimonial')
@section('testimonial_select', 'bg-black text-white')
@section('body')
    <div class="w-full">
        @include('admin.include.toastmessage')

        <div class="px-4 flex justify-between w-full">
            <div class="text-xl font-bold">View Testimonial</div>
            <div class="flex gap-2">
                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}"
                    class="bg-blue-500 rounded-lg text-white px-3 py-1 text-sm flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M11 4H4a2 2 0 0 0-2 2v14a2 2 0 0 0 2 2h14a2 2 0 0 0 2-2v-7"></path>
                        <path d="M18.5 2.5a2.121 2.121 0 0 1 3 3L12 15l-4 1 1-4 9.5-9.5z"></path>
                    </svg>
                    <span>Edit</span>
                </a>
                <a href="{{ route('admin.testimonials.index') }}"
                    class="bg-gray-500 rounded-lg text-white px-3 py-1 text-sm flex gap-2 items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
                        stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="M19 12H5M12 19l-7-7 7-7" />
                    </svg>
                    <span>Back to Testimonials</span>
                </a>
            </div>
        </div>

        <div class="py-1">
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <!-- Image -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Image</label>
                        @if ($testimonial->image)
                            <img src="{{ asset($testimonial->image) }}" alt="{{ $testimonial->name }}"
                                class="w-32 h-32 rounded-full object-cover border-2 border-gray-300">
                        @else
                            <div class="w-32 h-32 bg-gray-300 rounded-full flex items-center justify-center">
                                <span class="text-gray-500">No Image</span>
                            </div>
                        @endif
                    </div>

                    <!-- Name -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Name</label>
                        <p class="text-gray-900 font-medium">{{ $testimonial->name }}</p>
                    </div>

                    <!-- Designation -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Designation</label>
                        <p class="text-gray-900">{{ $testimonial->designation }}</p>
                    </div>

                    <!-- Order -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Order</label>
                        <p class="text-gray-900">{{ $testimonial->order }}</p>
                    </div>

                    <!-- Status -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Status</label>
                        <span class="px-2 py-1 text-xs rounded-full {{ $testimonial->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                            {{ $testimonial->status ? 'Active' : 'Inactive' }}
                        </span>
                    </div>

                    <!-- Description -->
                    <div class="md:col-span-2">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <div class="bg-gray-50 p-4 rounded-md">
                            <p class="text-gray-900 whitespace-pre-wrap">{{ $testimonial->description }}</p>
                        </div>
                    </div>

                    <!-- Created At -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Created At</label>
                        <p class="text-gray-900">{{ $testimonial->created_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>

                    <!-- Updated At -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Updated At</label>
                        <p class="text-gray-900">{{ $testimonial->updated_at->format('F j, Y \a\t g:i A') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
