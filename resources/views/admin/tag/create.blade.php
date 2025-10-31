@extends('admin.layouts.app')

@section('body')
    <div class="bg-white">

        <div class="flex gap-4 px-4 ">
            <a href="{{ route('admin.tag.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="22"
                    height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>
            <div class="text-lg font-bold">Add Tag</div>
        </div>
        <div class="row  bg-white rounded-lg shadow-lg text-slate-600">
            <form method="post" action="{{ route('admin.tag.store') }} " enctype="multipart/form-data">
                @csrf
                <div class="py-3 px-6  mt-3">
                    <div class="flex flex-col ">
                        <div>
                            <label class="text-xs font-semibold w-full" htmlFor="">
                                Name
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    name="name" placeholder="Enter name Here" type="text"
                                    value="{{ old('name') }}" />
                                    <span class="text-[10px]  text-gray-600">This name is how it appears on your sites</span>
                                @error('name')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>





                        <div class=" text-xs font-semibold w-full mt-2">
                            Description
                        </div>
                        <textarea
                            class="tinymce outline-none px-3 py-2 border block w-full mt-1 rounded-md focus:border-[#7065d4] hover:border-[#7065d4]"
                            name="description" rows="5">{{ old('description') }}</textarea>
                        @error('description')
                            <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror

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
