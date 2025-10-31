@extends('admin.layouts.app')
@section('body')
    <div class="flex gap-4">
        <a href="{{ route('admin.product.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Products</div>
    </div>

    <div class="bg-white rounded-lg shadow-md ">
        <form action="{{ route('admin.product.update', $product->id) }}" method="POST" class="space-y-6"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="p-6 mt-3">
                <div class="flex flex-col ">
                    <div>
                        <label class="w-full text-sm font-semibold" htmlFor="">
                            Title
                        </label>

                        <div>
                            <input
                                class="w-full p-3 mt-3 text-xs border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500 hover:border-blue-500"
                                name="title" placeholder="Enter Title Here" type="text"
                                value="{{ old('title', $product->title) }}" required/>
                            @error('title')
                                <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>




                    <div class="mt-5">
                        <label for="service_id" class="w-full text-sm font-semibold text-gray-700">
                            Select Service
                        </label>

                        <div class="relative mt-2">
                            <select name="service_id" id="service_id"
                                class="form-select block w-full px-3 py-2 border border-gray-300 rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-blue-500 focus:border-blue-500">
                                <option value="" disabled>Select Options</option>
                                @foreach ($store as $service)
                                    <option value="{{ $service->id }}"
                                        {{ old('service_id', $product->service_id) == $service->id ? 'selected' : '' }}>
                                        {{ $service->title }}
                                    </option>
                                @endforeach
                            </select>

                            @error('service_id')
                                <div class="text-sm text-red-500 mt-1">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>





                    <div class="mt-3">
                        <label class='text-sm font-semibold'> Image</label>
                        <div class='w-full p-2 mt-2 mb-1 text-sm border rounded-md shadow-sm form-control border-grey-400'>
                            <input type="file" name="image"
                                class="image hover:border-blue-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 "
                                onchange="loadFile(event)" />
                        </div>
                        <img class="oldimage" src="{{ asset('/uploads/' . $product->image) }}" alt="Card"
                            style="width: 70px;margin-bottom:2px;">
                        <img id="output" style="width: 70px; margin-bottom: 2px;" />


                        @error('image')
                            <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <div>
                        <label class="w-full text-sm font-semibold" htmlFor="">
                            Link
                        </label>

                        <div>
                            <input
                                class="w-full p-3 mt-3 text-xs border border-gray-300 rounded focus:outline-none focus:ring-blue-500 focus:border-blue-500 hover:border-blue-500"
                                name="link" placeholder="Enter link Here" type="text"
                                value="{{ old('link', $product->link) }}" required/>
                            @error('link')
                                <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <div>
                        <button
                            class="px-4 py-1 mt-3 mr-2 text-white bg-[#6a68AF] border border-black rounded-md hover:bg-[#6a68AF] hover:text-white">
                            Edit
                        </button>
                    </div>
                </div>
            </div>

    </div>
@endsection
