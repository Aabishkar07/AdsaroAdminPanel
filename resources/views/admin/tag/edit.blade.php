@extends('admin/layouts/app')
@section('page_title', 'tag')
@section('tag_select', 'bg-black text-white')
@section('body')
    <div class="flex gap-4 px-4 bg-white">
        <a href="{{ route('admin.tag.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Tag </div>
    </div>

    <div class="  bg-white w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('admin.tag.update', $tag->id) }}
        " enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="py-1 px-6 ">
                <div class="flex flex-col ">
                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Title
                        </label>

                        <div>
                            <input
                                class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full"
                                name="name" placeholder="Enter name Here" type="text"
                                value="{{ old('name', $tag->name) }}" />
                            @error('name')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>







                    <div class=" text-md font-semibold w-full mt-1">
                        Description
                    </div>
                    <textarea class="tinymce border block w-full mt-1 rounded-md focus:border-[#7065d4] hover:border-[#7065d4]"
                        name="description" rows="6">{{ old('description', $tag->description) }}</textarea>

                    @error('description')
                        <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                            * {{ $message }}
                        </div>
                    @enderror
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
