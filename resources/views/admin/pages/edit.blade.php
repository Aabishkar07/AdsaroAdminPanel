@extends('admin.layouts.app')

@section('body')
    <div class="flex items-center gap-2 mb-4">
        <a href="{{ route('admin.page.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512">
                <path
                    d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z" />
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Page</div>
    </div>

    <div class="w-full bg-white rounded-lg shadow-lg text-slate-600 p-6">
        <form method="POST" action="{{ route('admin.page.update', $pages->id) }}" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Title --}}
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900">Title</label>
                <input
                    class="border border-gray-300 text-gray-900 text-sm rounded-md focus:ring-[#7065d4] focus:border-[#7065d4] block w-full p-2.5"
                    name="title" type="text" value="{{ old('title', $pages->title) }}" placeholder="Enter title" />
                @error('title')
                    <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                @enderror
            </div>

            {{-- Description --}}
            <div class="mb-4">
                <label class="block mb-2 text-sm font-medium text-gray-900">Description</label>
                <textarea
                    class="border tinymce border-gray-300 text-gray-900 text-sm rounded-md focus:ring-[#7065d4] focus:border-[#7065d4] block w-full p-2.5"
                    name="description" rows="4" placeholder="Enter description">{{ old('description', $pages->description) }}</textarea>
                @error('description')
                    <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                @enderror
            </div>

            {{-- Main Image --}}

            @if ($pages->main_image)
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Main Image</label>
                    <input type="file" name="main_image"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer">
                    @if ($pages->main_image)
                        <img src="{{ asset('uploads/' . $pages->main_image) }}" alt="Main Image" class="mt-2 w-24">
                    @endif
                    @error('main_image')
                        <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                    @enderror
                </div>
            @endif


            @if ($pages->secondary_image)
                {{-- Secondary Image --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Secondary Image</label>
                    <input type="file" name="secondary_image"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer">
                    @if ($pages->secondary_image)
                        <img src="{{ asset('uploads/' . $pages->secondary_image) }}" alt="Secondary Image"
                            class="mt-2 w-24">
                    @endif
                    @error('secondary_image')
                        <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                    @enderror
                </div>
            @endif


            @if ($pages->secondary_description)
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">secondary_Description</label>
                    <textarea
                        class="border tinymce border-gray-300 text-gray-900 text-sm rounded-md focus:ring-[#7065d4] focus:border-[#7065d4] block w-full p-2.5"
                        name="secondary_description" rows="4" placeholder="Enter secondary_description">{{ old('secondary_description', $pages->secondary_description) }}</textarea>
                    @error('secondary_description')
                        <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                    @enderror
                </div>
            @endif



            @if ($pages->third_description)
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Third_description</label>
                    <textarea
                        class="border tinymce border-gray-300 text-gray-900 text-sm rounded-md focus:ring-[#7065d4] focus:border-[#7065d4] block w-full p-2.5"
                        name="third_description" rows="4" placeholder="Enter third_description">{{ old('third_description', $pages->third_description) }}</textarea>
                    @error('third_description')
                        <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                    @enderror
                </div>
            @endif

             @if ($pages->third_image)
                {{-- Secondary Image --}}
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Third Image</label>
                    <input type="file" name="third_image"
                        class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer">
                    @if ($pages->third_image)
                        <img src="{{ asset('uploads/' . $pages->third_image) }}" alt="Secondary Image"
                            class="mt-2 w-24">
                    @endif
                    @error('third_image')
                        <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                    @enderror
                </div>
            @endif

              @if ($pages->fourth_description)
                <div class="mb-4">
                    <label class="block mb-2 text-sm font-medium text-gray-900">Fourth_description</label>
                    <textarea
                        class="border tinymce border-gray-300 text-gray-900 text-sm rounded-md focus:ring-[#7065d4] focus:border-[#7065d4] block w-full p-2.5"
                        name="fourth_description" rows="4" placeholder="Enter fourth_description">{{ old('fourth_description', $pages->fourth_description) }}</textarea>
                    @error('fourth_description')
                        <div class="text-sm text-red-500 mt-1">* {{ $message }}</div>
                    @enderror
                </div>
            @endif

            {{-- Submit --}}
            <div class="flex justify-end">

                <button type="submit"
                    class="border mt-5 bg-[#4456a6] border-[#4456a6] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#4456a6]">
                    Update
                </button>
            </div>
        </form>
    </div>
@endsection
