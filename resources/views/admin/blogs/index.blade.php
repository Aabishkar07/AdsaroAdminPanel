@extends('admin/layouts/app')
@section('page_title', 'Blog')
@section('blog_select', 'bg-black text-white')
@section('body')
    {{-- @php
dd(Auth::guard('user_profiles')->user()->email)
@endphp --}}
    <div class=" w-full">

        @include('admin.include.toastmessage')


        <div class="px-4 py-4 flex items-center justify-between w-full">
            <div>
                <div class="text-2xl font-bold text-gray-900">Blogs</div>
                <p class="text-sm text-gray-500">Manage and curate your published content{{ isset($blogs) && method_exists($blogs, 'total') ? ' · ' . $blogs->total() . ' total' : '' }}</p>
            </div>

            <div class="flex items-center gap-3">

                <a href='{{ route('admin.blogs.create') }} '
                    class='bg-[#04033b] hover:bg-indigo-900 rounded-lg text-white px-3 py-2 text-sm flex gap-2 items-center shadow-sm transition'>
                    <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z" />
                    </svg>
                    <span>Add Blog</span>
                </a>
            </div>

        </div>
        <div class=" py-1">

            <div class='product-table bg-white border border-gray-200 rounded-xl mt-3 shadow-sm'>

                <div class="relative overflow-x-auto rounded-xl">
                    <table class="min-w-full table-auto divide-y divide-gray-200">
                        <thead class="bg-gray-50">
                            <tr class="text-xs text-gray-600 uppercase tracking-wider">
                                <th class="px-6 py-3 text-left font-semibold">Image</th>
                                <th class="px-6 py-3 text-left font-semibold">Title</th>
                                <th class="px-6 py-3 text-center font-semibold">Status</th>
                                <th class="px-6 py-3 text-center font-semibold">Modified</th>
                                <th class="px-6 py-3 text-right font-semibold">Actions</th>
                            </tr>
                        </thead>

                        <tbody class="bg-white divide-y divide-gray-100">
                            @foreach ($blogs as $key => $blog)
                                <tr class="blog-row hover:bg-indigo-50/60 even:bg-gray-50 text-gray-900">
                                    <td class="px-6 py-4 text-left align-middle">
                                        @if (!empty($blog->image))
                                            <img src="{{ asset('uploads/' . $blog->image) }}" alt="Image" class="h-12 w-16 object-cover rounded border" />
                                        @else
                                            <div class="h-12 w-16 bg-gray-100 border rounded flex items-center justify-center text-gray-400 text-xs">No Image</div>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 text-left align-middle">
                                        <p class="blog-title font-medium text-gray-900 truncate" title="{{ $blog->post_title }}">{{ $blog->post_title }}</p>
                                    </td>

                                    <td class="px-6 py-4 text-center align-middle text-sm text-gray-700">
                                        {{ strtoupper($blog->post_status) }}
                                    </td>

                                    <td class="px-6 py-4 text-center text-sm text-gray-600 align-middle whitespace-nowrap">
                                        {{ \Carbon\Carbon::parse($blog->post_modified)->format('jS M Y') }}
                                    </td>

                                    <td class="px-6 py-4 text-right align-middle">
                                        <div class="flex justify-end items-center gap-2">

                                            {{-- <a href='{{ route('admin.blogs.show', $blog->id) }}'>

                                                    <div class="bg-slate-500 py-1 px-2 mx-2 text-white flex  rounded-md">
                                                        <svg xmlns="http://www.w3.org/2000/svg" width="24"
                                                            height="24" fill="currentColor" class="bi bi-eye-fill"
                                                            viewBox="0 0 16 16">
                                                            <path d="M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z" />
                                                            <path
                                                                d="M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z" />
                                                        </svg>
                                                    </div>
                                                </a> --}}

                                                <a
                                                    href="
                                                    {{ route('admin.blogs.edit', $blog->id) }}
                                                    " title="Edit">
                                                    <div class="bg-indigo-600 hover:bg-indigo-700 py-1.5 px-2.5 text-white flex rounded-md shadow-sm transition">
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

                                                <form
                                                    action="
                                                {{ route('admin.blogs.destroy', $blog->id) }}
                                                "
                                                    class="delete-form-{{ $blog->id }}" method="post">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="button"
                                                        class="bg-red-600 hover:bg-red-700 py-1.5 px-2.5 flex text-white rounded-md shadow-sm transition"
                                                        title="Delete" onclick="deleteItem('{{ $blog->id }}')">
                                                        <svg xmlns="http://www.w3.org/2000/svg"
                                                            class="icon icon-tabler icon-tabler-trash" width="24"
                                                            height="24" viewBox="0 0 24 24" stroke-width="2"
                                                            stroke="currentColor" fill="none" stroke-linecap="round"
                                                            stroke-linejoin="round">
                                                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                            <path d="M4 7l16 0"></path>
                                                            <path d="M10 11l0 6"></path>
                                                            <path d="M14 11l0 6"></path>
                                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
                                                        </svg>
                                                    </button>
                                                </form>

                                        </div>
                                    </td>

                                </tr>
                            @endforeach
                        </tbody>

                    </table>

                </div>
            </div>

            @if ($blogs->isEmpty())
                <div class="text-center bg-gray-100 font-semibold text-red-600 border p-10">
                    No Blogs Found.
                </div>
            @endif
            <div class="z-0 mt-3">
                {{ $blogs->links('vendor.pagination.tailwind') }}
            </div>

        </div>



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <script>
            // Delete confirmation (unchanged)
            function deleteItem(itemSlug) {
                Swal.fire({
                    title: 'Are you sure?',
                    text: 'You will not be able to recover this !',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // alert("delete-form-"+itemSlug)
                        let form = document.querySelector(".delete-form-" + itemSlug)
                        form.submit();
                    }
                });
            }


        </script>
    </div>
@endsection
