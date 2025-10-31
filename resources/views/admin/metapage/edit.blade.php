@extends('admin/layouts/app')
@section('page_title', 'metapage')
@section('metapage_select', 'bg-black text-white')
@section('body')
    <div class="flex gap-4 px-4 bg-white">
        <a href="{{ route('admin.metapages.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Page </div>
    </div>

    <div class="  bg-white w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('admin.metapages.update', $metapage->id) }}
        "
            enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="py-1 px-6 ">
                <div class="flex flex-col ">
                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Page Name
                        </label>

                        <div>
                            <div
                                class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full">
                                {{ $metapage->page_name }}
                            </div>

                        </div>
                    </div>



                    <div class="mt-1">
                        <label class='text-xs font-semibold'>metapage Image</label>
                        <div
                            class='text-xs p-1.5 form-control border border-grey-400 w-full rounded-md shadow-sm mb-1 mt-2'>
                            <input type="file" name="ogimage" id="image"
                                class="image focus:border-[#7065d4] hover:border-[#7065d4]" onchange="loadFile(event)" />
                        </div>
                        <img class="myoldimage" src="{{ asset('/uploads/' . $metapage->ogimage) }}" alt="Card"
                            style="width: 70px;margin-bottom:2px;">
                        <img id="myoutput" style="width: 70px; margin-bottom: 2px;" />

                        <script>
                            var loadFile = function(event) {
                                var output = document.getElementById('myoutput');
                                output.src = URL.createObjectURL(event.target.files[0]);
                                var old = document.getElementsByClassName('myoldimage')[0];
                                console.log(old)

                                old.classList.add("hidden");

                            };
                        </script>

                        @error('ogimage')
                            <div class="invalid-feedback text-red-400 font-medium  text-xs" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror
                    </div>






                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Meta Title
                        </label>

                        <div>
                            <input
                                class="text-xs border text-black border-gray-300 p-2 mb-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="meta_title" placeholder="Enter  Meta Title Here" type="text"
                                value="{{ old('meta_title', $metapage->meta_title) }}" />
                            @error('meta_title')
                                <div class="invalid-feedback text-red-400 font-medium  text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div>
                        <label class="text-xs font-semibold w-full" for="meta_description">
                            Meta Description
                        </label>

                        <div>
                            <textarea id="meta_description" name="meta_description" placeholder="Enter meta description here"
                                class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full">{{ $metapage->meta_description }}</textarea>

                            @error('meta_description')
                                <div class="invalid-feedback text-red-400 font-medium  text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>




                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            keywords
                        </label>

                        <div>
                            <input
                                class="text-xs border text-black border-gray-300 p-2 mb-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="keywords" placeholder="Enter keywords Here" type="text"
                                value="{{ old('keywords', $metapage->keywords) }}" />
                            @error('keywords')
                                <div class="invalid-feedback text-red-400 font-medium  text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>





                    <div>
                        <button
                            class="border mt-3 border-[#8380d4] px-4 py-1 rounded-md mr-2 text-white bg-[#8380d4] hover:bg-[#8380d4] hover:text-white">
                            Edit
                        </button>
                    </div>
                </div>
            </div>



        </form>
    </div>


@endsection
