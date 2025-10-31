@extends('admin.layouts.app')

@section('body')
    <div class="bg-white">

        <div class="flex gap-4 px-4 ">
            <a href="{{ route('admin.metapages.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="22"
                    height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>
            <div class="text-lg font-bold">Add Page</div>
        </div>
        <div class="row  bg-white rounded-lg shadow-lg text-slate-600">
            <form method="post" action="{{ route('admin.metapages.store') }} " enctype="multipart/form-data">
                @csrf
                <div class="py-3 px-6  mt-3">
                    <div class="flex flex-col ">
                        <div>
                            <label class="text-xs font-semibold w-full" htmlFor="">
                                PageName
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    name="page_name" placeholder="Enter PageName Here" type="text"
                                    value="{{ old('page_name') }}" />
                                @error('page_name')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class='text-xs font-semibold'>Og Image</label>
                            <div
                                class='text-xs p-1.5 form-control border border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                                <input type="file" name="ogimage"
                                    class="image hover:border-blue-500 focus:outline-none focus:ring-blue-500 focus:border-blue-500 "
                                    onchange="loadFile(event)" />
                            </div>
                            <img id="output" style="width: 70px; margin-bottom: 2px;" />
                            @error('ogimage')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>





                        {{-- <div>
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
                        </div> --}}


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
                                    name="meta_description" placeholder="Type Meta Description">{{ old('meta_description') }}</textarea>
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
                            <button
                                class="border mt-3 border-[#8380d4] px-4 py-1 rounded-md mr-2 text-white bg-[#8380d4] hover:bg-[#8380d4] hover:text-white">
                                Add
                            </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
