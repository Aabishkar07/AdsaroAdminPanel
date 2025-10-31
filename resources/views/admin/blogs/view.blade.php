@extends('admin.layouts.app')
@section('page_title', 'View Blog')
@section('blog_select', 'bg-black text-white')
@section('container')
<div class="flex gap-4">
    <a href="{{ route('blogs.index') }}">
        <span class="material-symbols-outlined text-2xl">
            west
        </span>
    </a>
    <div class="text-xl font-bold">View Blogs</div>
</div>
<div class="flow-root rounded-lg border border-gray-100 py-3 shadow-sm mt-14">
    <dl class="-my-3 divide-y divide-gray-100 text-sm">
        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Blog Title</dt>
            <dd class="text-gray-700 sm:col-span-2">{{ $blog->title }}</dd>
        </div>

        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Blog Description</dt>
            <dd class="text-gray-700 sm:col-span-2">{!! $blog->description !!}</dd>
        </div>



        <div class="grid grid-cols-1 gap-1 p-3 even:bg-gray-50 sm:grid-cols-3 sm:gap-4">
            <dt class="font-medium text-gray-900">Blog Image</dt>
            <dd class="text-gray-700 sm:col-span-2"> <img src="{{asset('/images/blogs/'.$blog->featured_image)}}"
                    alt="herosectionimage" class="oldimage h-32 w-32" /></dd>
        </div>

















    </dl>
</div>
@endsection
