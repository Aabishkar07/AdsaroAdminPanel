@extends('admin/layouts/app')
@section('page_title', 'Testimonials')
@section('testimonial_select', 'bg-black text-white')
@section('body')
    <div class="w-full">
        @include('admin.include.toastmessage')

        <div class="px-4 flex justify-between w-full">
            <div class="text-xl font-bold">Testimonials</div>
            @can('Add Testimonials')
                <div class="flex">
                    <a href="{{ route('admin.testimonials.create') }}"
                        class="bg-[#04033b] rounded-lg text-white px-3 py-1 text-sm flex gap-2 items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path fill="currentColor"
                                d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z" />
                        </svg>
                        <span>Add Testimonial</span>
                    </a>
                </div>
            @endcan
        </div>

        <div class="py-1">
            <div class="product-table bg-[#e5e3e8] mt-3 shadow">
                <div class="relative overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="">
                            <tr class="text-xs text-center text-gray-600 uppercase">
                                <th class="p-2 font-semibold">Order</th>
                                <th class="p-2 font-semibold">Name</th>
                                <th class="p-2 font-semibold">Designation</th>
                                <th class="p-2 font-semibold">Image</th>
                                <th class="p-2 font-semibold">Status</th>
                                <th class="p-2 font-semibold">Created at</th>
                                <th class="p-2 font-semibold text-left">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-200">
                            @foreach ($testimonials as $key => $testimonial)
                                <tr class="hover:bg-[#eeeef7] text-center cursor-pointer">
                                    <td class="px-5 py-3">
                                        <p class="text-black whitespace-no-wrap">{{ $testimonial->order }}</p>
                                    </td>

                                    <td class="px-5 py-3">
                                        <p class="text-black whitespace-no-wrap">{{ $testimonial->name }}</p>
                                    </td>

                                    <td class="px-5 py-3">
                                        <p class="text-black whitespace-no-wrap">{{ $testimonial->designation }}</p>
                                    </td>

                                    <td class="p-2" style="width: 100px;">
                                        @if ($testimonial->image)
                                            <img class="w-full h-full rounded-full"
                                                src="{{ asset('uploads/' . $testimonial->image) }}"
                                                alt="{{ $testimonial->name }}"
                                                style="width: 70px; height: 70px; object-fit: cover;">
                                        @else
                                            <div
                                                class="w-[70px] h-[70px] bg-gray-300 rounded-full flex items-center justify-center">
                                                <span class="text-gray-500 text-xs">No Image</span>
                                            </div>
                                        @endif
                                    </td>

                                    <td class="px-5 py-3">
                                        <span
                                            class="px-2 py-1 text-xs rounded-full {{ $testimonial->status ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                                            {{ $testimonial->status ? 'Active' : 'Inactive' }}
                                        </span>
                                    </td>

                                    <td class="px-5 py-3 text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $testimonial->updated_at->format('jS M Y') }}
                                        </p>
                                    </td>

                                    <td>
                                        <div class="flex">
                                            @can('Edit Testimonials')
                                                <a href="{{ route('admin.testimonials.edit', $testimonial->id) }}">
                                                    <div class="bg-slate-500 py-1 px-2 mx-2 text-white flex rounded-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-edit" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path
                                                                d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                            </path>
                                                            <path
                                                                d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                            </path>
                                                            <path d="M16 5l3 3"></path>
                                                        </svg>
                                                    </div>
                                                </a>
                                            @endcan

                                            @can('Delete Testimonials')
                                                <form action="{{ route('admin.testimonials.destroy', $testimonial->id) }}"
                                                    id="delete-form-{{ $testimonial->id }}" method="POST" class="inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button" onclick="deleteItem({{ $testimonial->id }})"
                                                        class="bg-red-500 py-1 px-2 mx-2 text-white flex rounded-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                                            viewBox="0 0 24 24" fill="none" stroke="currentColor"
                                                            stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                                            <path d="M3 6h18"></path>
                                                            <path d="M19 6v14c0 1-1 2-2 2H7c-1 0-2-1-2-2V6"></path>
                                                            <path d="M8 6V4c0-1 1-2 2-2h4c1 0 2 1 2 2v2"></path>
                                                        </svg>
                                                    </button>
                                                </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
