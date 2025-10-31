@extends('admin/layouts/app')
@section('page_title', 'Blog')
@section('blog_select', 'bg-black text-white')
@section('body')
    <div class="flex gap-4 px-4 bg-white">
        <a href="{{ route('admin.blogs.index') }}">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M5 12l14 0"></path>
                <path d="M5 12l6 6"></path>
                <path d="M5 12l6 -6"></path>
            </svg>
        </a>
        <div class="text-xl font-bold">Edit Blog </div>
    </div>

    <div class="  bg-white w-full rounded-lg shadow-lg text-slate-600">
        <form method="post" action="{{ route('admin.blogs.update', $blog->id) }}
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
                                name="post_title" placeholder="Enter Title Here" type="text"
                                value="{{ old('post_title', $blog->post_title) }}" />
                            @error('post_title')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>




                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Status
                        </label>

                        <div>
                            <select name="post_status" class="text-xs border text-black border-gray-300 p-2 mb-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full">
                                <option value="publish" {{ old('post_status', $blog->post_status) === 'publish' ? 'selected' : '' }}>Publish</option>
                                <option value="draft" {{ old('post_status', $blog->post_status) === 'draft' ? 'selected' : '' }}>Draft</option>
                            </select>
                            @error('post_status')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div>
                        <label class="text-xs font-semibold w-full" htmlFor="">
                            Excerpt
                        </label>

                        <div>
                            <textarea name="post_excerpt" placeholder="Short summary" class="text-xs border text-black border-gray-300 p-2 mb-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full">{{ old('post_excerpt', $blog->post_excerpt) }}</textarea>
                            @error('post_excerpt')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>



                    <div>
                        <label class="text-xs font-semibold w-full" for="post_content">
                            Content
                        </label>

                        <div>
                            <textarea id="post_content" name="post_content" placeholder="Write your content here"
                                class="tinymce text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full">{{ old('post_content', $blog->post_content) }}</textarea>

                            @error('post_content')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>
                    </div>




                    <div class="mt-1">
                        <label class="text-xs font-semibold w-full">Image</label>
                        <div>
                            <input type="file" name="image" class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full" />
                            @error('image')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">* {{ $message }}</div>
                            @enderror
                            @if (!empty($blog->image))
                                <div class="mt-2">
                                    <img src="{{ asset('uploads/' . $blog->image) }}" alt="Current Image" class="h-20 w-28 object-cover rounded border" />
                                </div>
                            @endif
                        </div>
                    </div>

                    <div class="mt-1">
                        <label class="text-xs font-semibold w-full">Meta Title</label>
                        <div>
                            <input type="text" name="meta_title" value="{{ old('meta_title', $blog->meta_title) }}" class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full" />
                            @error('meta_title')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-1">
                        <label class="text-xs font-semibold w-full">Meta Description</label>
                        <div>
                            <textarea name="meta_description" class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full">{{ old('meta_description', $blog->meta_description) }}</textarea>
                            @error('meta_description')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">* {{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="mt-1">
                        <label class="text-xs font-semibold w-full">Keywords</label>
                        <div>
                            <input type="text" name="keywords" value="{{ old('keywords', $blog->keywords) }}" class="text-xs border text-black border-gray-300 p-2 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full" placeholder="comma,separated,keywords" />
                            @error('keywords')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">* {{ $message }}</div>
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

