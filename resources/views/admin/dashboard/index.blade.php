@extends('admin.layouts.app')
@section('body')
    <div class="flex-1">
        <h2 class="w-full text-2xl font-bold text-secondary ">Dashboard</h2>
    </div>
    <div class="grid grid-cols-1 gap-5 mt-6 sm:grid-cols-2 lg:grid-cols-4">
        <div class="p-4 transition-shadow border rounded-lg shadow-sm hover:shadow-lg hover:border-green-700">
            <div class="flex items-start justify-between">
                <div class="flex flex-col space-y-2">
                    <span class="">Total Blogs</span>
                    <span class="text-lg font-semibold">{{ $blogs }}</span>
                </div>
                <div class="p-10 rounded-md">
                </div>
                <svg class="w-10 h-10 text-gray-800 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                    viewBox="0 0 24 24">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M5 4h1.5L9 16m0 0h8m-8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm8 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4Zm-8.5-3h9.3L19 7h-1M8 7h-.7M13 5v4m-2-2h4" />
                </svg>
            </div>
        </div>



    </div>
@endsection
