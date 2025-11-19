@extends('admin.layouts.app')

@section('body')
    <div class="bg-white">

        <div class="flex gap-4 px-4 ">
            <a href="{{ route('admin.blogs.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="22"
                    height="22" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>
            <div class="text-lg font-bold">Add Blog</div>
        </div>
        <div class="row  bg-white rounded-lg shadow-lg text-slate-600">
            <form method="post" action="{{ route('admin.blogs.store') }} " enctype="multipart/form-data">
                @csrf
                <div class="py-3 px-6  mt-3">
                    <div class="flex flex-col ">
                        <div>
                            <label class="text-xs font-semibold w-full" htmlFor="">
                                Title
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    name="post_title" placeholder="Enter Title Here" type="text"
                                    value="{{ old('post_title') }}" />
                                @error('post_title')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-semibold w-full " htmlFor="">
                                Status
                            </label>

                            <div>
                                <select name="post_status" class="text-xs focus:outline-none focus:ring-blue-500 mb-2 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full">
                                    <option value="publish" {{ old('post_status') === 'publish' ? 'selected' : '' }}>Publish</option>
                                    <option value="draft" {{ old('post_status') === 'draft' ? 'selected' : '' }}>Draft</option>
                                </select>
                                @error('post_status')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="text-xs font-semibold w-full " htmlFor="">
                                Excerpt
                            </label>

                            <div>
                                <textarea
                                    class="text-xs focus:outline-none focus:ring-blue-500 mb-2 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full"
                                    name="post_excerpt">{{ old('post_excerpt') }}</textarea>
                                @error('post_excerpt')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class=" text-xs font-semibold w-full mt-2">
                            Content
                        </div>
                        <textarea
                            class="tinymce outline-none px-3 py-2 border block w-full mt-1 rounded-md focus:border-[#7065d4] hover:border-[#7065d4]"
                            name="post_content" rows="5">{{ old('post_content') }}</textarea>
                        @error('post_content')
                            <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                * {{ $message }}
                            </div>
                        @enderror

                        <div class="mt-3">
                            <label class="text-xs font-semibold w-full">Image</label>
                            <div>
                                <input type="file" name="image" class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full" />
                                @error('image')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-4">
                            <label class="text-xs font-semibold w-full">Category</label>
                            @php($oldCategoryId = old('category_id'))
                            <div class="mt-2 border border-gray-200 rounded-lg divide-y">
                                @forelse($categories as $parent)
                                    <div class="p-3">
                                        <div class="text-xs font-medium text-gray-800">{{ $parent->name }}</div>
                                        @if($parent->children->count())
                                            <div class="mt-2 grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-2">
                                                @foreach($parent->children->sortBy('name') as $child)
                                                    <label class="inline-flex items-center gap-2 text-xs text-gray-700 bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                                                        <input type="radio" name="category_id" value="{{ $child->id }}"
                                                            class="h-3.5 w-3.5 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                                            {{ (string)$oldCategoryId === (string)$child->id ? 'checked' : '' }}>
                                                        <span>{{ $child->name }}</span>
                                                    </label>
                                                @endforeach
                                            </div>
                                        @else
                                            <label class="mt-2 inline-flex items-center gap-2 text-xs text-gray-700 bg-gray-50 border border-gray-200 rounded-md px-3 py-2">
                                                <input type="radio" name="category_id" value="{{ $parent->id }}"
                                                    class="h-3.5 w-3.5 text-indigo-600 border-gray-300 focus:ring-indigo-500"
                                                    {{ (string)$oldCategoryId === (string)$parent->id ? 'checked' : '' }}>
                                                <span>{{ $parent->name }}</span>
                                            </label>
                                        @endif
                                    </div>
                                @empty
                                    <div class="p-3 text-xs text-gray-500">No categories yet.</div>
                                @endforelse
                            </div>
                            @error('category_id')
                                <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <div class="mt-3">
                            <label class="text-xs font-semibold w-full">Meta Title</label>
                            <div>
                                <input type="text" name="meta_title" value="{{ old('meta_title') }}" class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full" />
                                @error('meta_title')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="text-xs font-semibold w-full">Meta Description</label>
                            <div>
                                <textarea name="meta_description" class="text-xs focus:outline-none focus:ring-blue-500 mb-2 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full">{{ old('meta_description') }}</textarea>
                                @error('meta_description')
                                    <div class="invalid-feedback text-red-400 text-xs" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class="text-xs font-semibold w-full">Keywords</label>
                            <div>
                                <input type="text" name="keywords" value="{{ old('keywords') }}" class="text-xs focus:outline-none focus:ring-blue-500 focus:border-blue-500 border border-gray-300 p-2 rounded mt-1 hover:border-blue-500 w-full" placeholder="comma,separated,keywords" />
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

