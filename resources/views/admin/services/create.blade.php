@extends('admin.layouts.app')

@section('body')
    <div class="px-6">

        <div class="flex gap-4">
            <a href="{{ route('admin.services.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>
            <div class="text-xl font-bold">Add Advertising Formats</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg row mt-30 text-slate-600">
            <form method="post" action="{{ route('admin.services.store') }} " enctype="multipart/form-data">
                @csrf
                <div class="p-6 mt-3">
                    <div class="flex flex-col ">
                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Title
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="title" placeholder="Enter title Here" type="text"
                                    value="{{ old('title') }}" />
                                @error('title')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class='text-sm font-semibold'> Image</label>
                            <div
                                class='w-full p-2 mt-2 mb-1 text-sm border rounded-md shadow-sm form-control border-grey-400'>
                                <input type="file" name="image"
                                    class="image hover:border-[#7065d4] focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] "
                                    onchange="loadFile(event)" />
                            </div>
                            <img id="output" style="width: 70px; margin-bottom: 2px;" />
                            @error('image')
                                <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class='text-sm font-semibold'> Icon</label>
                            <div
                                class='w-full p-2 mt-2 mb-1 text-sm border rounded-md shadow-sm form-control border-grey-400'>
                                <input type="file" name="icon"
                                    class="icon hover:border-[#7065d4] focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] "
                                    onchange="loadFile2(event)" />
                            </div>
                            <img id="output2" style="width: 70px; margin-bottom: 2px;" />
                            @error('icon')
                                <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div>
                            <label class="text-xs font-semibold w-full " htmlFor="">
                                Image Alt
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-blue-500 mb-2 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    name="img_alt" placeholder="Enter image alt Here" type="text"
                                    value="{{ old('img_alt') }}" />
                                @error('img_alt')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>


                        <div>
                            <label class="text-xs font-semibold w-full " htmlFor="">
                                Meta Title
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-blue-500 mb-2 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    name="meta_title" placeholder="Enter meta title Here" type="text"
                                    value="{{ old('meta_title') }}" />
                                @error('meta_title')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-semibold w-full mt-2" htmlFor="">
                                Meta Description
                            </label>

                            <div>
                                <textarea
                                    class="text-xs focus:outline-none focus:ring-blue-500 mb-2 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    placeholder="Meta Description" name="meta_description">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-semibold w-full" htmlFor="">
                                Keywords
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    name="keywords" placeholder="Enter Keywords Here" type="text"
                                    value="{{ old('keywords') }}" />
                                @error('keywords')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Order
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="order" placeholder="Enter order Here" type="text"
                                    value="{{ old('order') }}" />
                                @error('order')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Short Description
                            </label>

                            <div>
                                <textarea
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="description" placeholder="Enter description Here" type="text">{{ old('description') }}</textarea>
                                @error('description')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Long Description
                            </label>

                            <div>
                                <textarea
                                    class="tinymce text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="long_description" placeholder="Enter Long description Here" type="text">{{ old('long_description') }}</textarea>
                                @error('long_description')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button
                                class="border mt-5 bg-[#2e3092] border-[#2e3092] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#2e3092]">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
