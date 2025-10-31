@extends('admin.layouts.app')

@section('body')

    <div class=" sm:px-6 lg:px-8">
        <div class="mt-8 item-center bg-white shadow sm:rounded-lg sm:px-5 py-4 ">
            <div class="flex gap-4  item-center">
                <a class="pt-1" href="{{ route('admin.store.index') }}">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M5 12l14 0"></path>
                        <path d="M5 12l6 6"></path>
                        <path d="M5 12l6 -6"></path>
                    </svg>
                </a>
                <div class="text-2xl leading-9 text-primary font-extrabold text-gray-900">
                    Edit Package
                </div>
            </div>
            <div class="py-5  ">
                <form method="POST" action="{{ route('admin.store.update', $package->id) }}"
                    enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div>
                        <label for="email" class="block text-sm font-medium leading-5  text-gray-700">Package
                            Title</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="name" name="title" placeholder="Enter packages title " type="text"
                                value="{{ old('title', $package->title) }}"
                                class="text-xs border border-gray-300 p-3 rounded mt-3 focus:border-secondary placeholder-gray-400 focus:outline-none hover:border-secondary w-full">
                        </div>

                        @error('title')
                            <div class="invalid-feedback text-red-500 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label for="email" class="block text-sm font-medium leading-5 mt-5 text-gray-700">Package
                            price</label>
                        <div class="mt-1 relative rounded-md shadow-sm">
                            <input id="name" name="price" placeholder="Enter packages price " type="text"
                                value="{{ old('price', $package->price) }}"
                                class="text-xs border border-gray-300 p-3 rounded mt-3 focus:border-secondary placeholder-gray-400 focus:outline-none hover:border-secondary w-full">
                        </div>

                        @error('price')
                            <div class="invalid-feedback text-red-500 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>



                    <div class="mt-7">
                        <div class="block mb-2 text-sm font-semibold">Package Service<span class="text-red-500">*</span>
                        </div>
                        @include('admin.store.edit-package-service')
                    </div>




                    <div class="mt-6">

                        <button type="submit"
                            class="flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-gradient-to-r from-[#1F4A9A] to-[#10B5FC]  hover:from-[#174385] hover:to-[#0E92D0] focus:outline-none transition duration-150 ease-in-out">
                            Edit package
                        </button>

                    </div>
                </form>

            </div>
        </div>
    </div>
@endsection
