@extends('admin/layouts/app')
@section('body')
    {{-- @php
dd(Auth::guard('user_profiles')->user()->email)
@endphp --}}
    <div class=" w-full">

        @include('admin.include.toastmessage')


        <div class="px-4 flex justify-between w-full">
            <div class="text-xl font-bold"> Tag</div>
            <div class="flex">
                <a href='{{ route('admin.tag.create') }} '
                    class=' bg-[#04033b] rounded-lg text-white px-3 py-1 text-sm flex gap-2 items-center '>
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                        <path fill="currentColor"
                            d="M18 13h-5v5c0 .55-.45 1-1 1s-1-.45-1-1v-5H6c-.55 0-1-.45-1-1s.45-1 1-1h5V6c0-.55.45-1 1-1s1 .45 1 1v5h5c.55 0 1 .45 1 1s-.45 1-1 1z" />
                    </svg>
                    <span>Add Tags</span>
                </a>
            </div>
        </div>
        <div class=" py-1">

            <div class='product-table bg-[#e5e3e8]  mt-3   shadow'>

                <div class="relative overflow-x-auto">
                    <table class="w-full divide-y divide-gray-200">
                        <thead class="">
                            <tr class="text-xs text-gray-600 uppercase">
                                <th class="p-2 font-semibold   ">
                                    Title</th>


                                <th class="p-2 font-semibold   ">
                                    Created at</th>

                                <th class="p-2 font-semibold   ">
                                    Actions</th>
                            </tr>
                        </thead>


                        <tbody class="bg-white divide-y divide-gray-200 ">
                            @foreach ($tags as $key => $tag)
                                <tr class="hover:bg-[#eeeef7] text-center cursor-pointer ">
                                    <td class="px-5 py-3  ">
                                        <p class="text-black whitespace-no-wrap">{{ $tag->name }}</p>
                                    </td>



                                    <td class="px-5 py-3  text-sm">
                                        <p class="text-gray-900 whitespace-no-wrap">
                                            {{ $tag->updated_at->format('jS M Y') }}
                                        </p>
                                    </td>


                                    <td>
                                        <div class="flex">


                                            <a href="  {{ route('admin.tag.edit', $tag->id) }}  ">
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


                                            <form
                                                action="
                                                {{ route('admin.tag.destroy', $tag->id) }}
                                                "
                                                class="delete-form-{{ $tag->id }}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="button"
                                                    class="bg-red-500 py-1 px-2 mx-2 flex text-white rounded-md"
                                                    onclick="deleteItem('{{ $tag->id }}')">
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
            @if ($tags->isEmpty())
                <div class="text-center bg-gray-100 font-semibold text-red-600 border p-10">
                    No Tags Found.
                </div>
            @endif
            {{-- <div class="z-0 mt-3">
                {{ $tags->links('vendor.pagination.tailwind') }}
            </div> --}}

        </div>



        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
        <script>
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
