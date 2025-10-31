@extends('admin.layouts.app')

@section('page_title', 'Edit Portfolio')
@section('banner_select', 'bg-[#F1612D] text-white')
@section('body')
    <div class="flex items-center gap-x-2 px-4">
        <a href="{{ route('admin.portfolio.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512"><path d="M9.4 233.4c-12.5 12.5-12.5 32.8 0 45.3l160 160c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L109.2 288 416 288c17.7 0 32-14.3 32-32s-14.3-32-32-32l-306.7 0L214.6 118.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0l-160 160z"/></svg>
        </a>
        <div class="text-lg font-bold">Edit Portfolio</div>
    </div>
    <div class=" bg-white w-full mt-2 rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('admin.portfolio.update', $portfolio->id) }}" enctype="multipart/form-data">
            @csrf
            @method('put')

            <div class="px-4">
                <div class="flex flex-col my-2">
                    <div>
                        <label class="block mb-2 text-sm font-medium text-gray-900" htmlFor="">
                            Portfolio name
                        </label>
                        <div>
                            <input
                                class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                name="title" placeholder="Type Banner name here" type="text"
                                value="{{ old('title', $portfolio->title) }}" />
                            @error('title')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}

                                </div>
                            @enderror
                        </div>
                    </div>
                    <div>
                        <label class="block my-2 text-sm font-medium text-gray-900 " htmlFor="">
                            Banner order
                        </label>
                        <div>
                            <input
                                class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                name="banner_order" placeholder="Type banner order here" type="text"
                                value="{{ old('banner_order', $portfolio->banner_order) }}" />
                            @error('banner_order')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>








<div>
    <label class="block my-2 text-sm font-medium text-gray-900">
        Portfolio Category
    </label>
    <div>
        <select
            class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
            name="category">
            <option value="">Select a category</option>
            <option value="App" {{ old('category', $portfolio->category) == 'App' ? 'selected' : '' }}>App</option>
            <option value="Web" {{ old('category', $portfolio->category) == 'Web' ? 'selected' : '' }}>Web</option>
            <option value="Graphics" {{ old('category', $portfolio->category) == 'Graphics' ? 'selected' : '' }}>Graphics</option>
        </select>
        @error('category')
            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                * {{ $message }}
            </div>
        @enderror
    </div>
</div>





                    {{-- image --}}
                    <div class="mt-3">

                        <label class='text-sm font-semibold'>Image</label>
                        <div
                            class='text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full'>
                            <input type="file" name="banner_image" onchange="loadFile(event)" />
                        </div>

                        <img class="myoldimage mt-1" src="{{ asset('/uploads/' . $portfolio->banner_image) }}" alt="banner_image"
                            style="width: 70px;margin-bottom:2px;">
                        <img id="myoutput" style="width: 70px; margin-bottom: 2px;" />
                        @error('banner_image')
                            <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>




  <div>
                        <label class="block my-2 text-sm font-medium text-gray-900 " htmlFor="">
                            Portfolio Link
                        </label>
                        <div>
                            <input
                                class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                name="link" placeholder="Type banner order here" type="text"
                                value="{{ old('link', $portfolio->link) }}" />
                            @error('link')
                                <div class="invalid-feedback text-red-400 text-sm" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>


                    <script>
                        var loadFile = function(event) {
                            var output = document.getElementById('myoutput');
                            output.src = URL.createObjectURL(event.target.files[0]);
                            var old = document.getElementsByClassName('myoldimage')[0];
                            console.log(old)

                            old.classList.add("hidden");

                        };
                    </script>
                    <div class="">
                        <button
                            class="border mt-5 bg-[#05034b] border-[#05034b] px-4 py-1 mb-4 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#05034b]">
                            Edit
                        </button>
                    </div>

                </div>
            </div>
        </form>
    </div>

@endsection
