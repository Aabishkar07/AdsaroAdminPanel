@extends('admin.layouts.app')

@section('page_title', ' Banner')
@section('banner_select', 'bg-[#4456a6] text-white')
@section('body')
    <div class=" bg-background w-full">
        @include('admin.include.toastmessage')

        <div class="px-5 flex items-center justify-between">
            <div class="text-xl font-bold">Banners</div>
            @can('Add Banner')
                <a href='{{ route('admin.banner.create') }}'
                    class='bg-[#04033b] rounded-lg text-white px-3 py-1 text-sm flex gap-2 items-center '>
                    <svg xmlns="http://www.w3.org/2000/svg" class="svgicon" height="1em" viewBox="0 0 448 512">
                        <style>
                            .svgicon {
                                fill: #ffffff;
                            }
                        </style>
                        <path
                            d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                    </svg>
                    <span>Add Banner</span>
                </a>
            @endcan
        </div>
        <div class='product-table bg-[#e5e3e8]  mt-3   shadow'>

            <div class="relative overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="font-normal p-10">
                        <tr class="text-xs text-gray-600 uppercase">
                            <th scope="col " class="p-2 font-semibold ">
                                Banner Name
                            </th>
                            <th scope="col" class="font-semibold ">
                                Banner Order
                            </th>


                            <th scope="col" class="font-semibold ">
                                Image
                            </th>
                            <th scope="col" class="font-semibold ">
                                Created At
                            </th>
                            <th scope="col" class="font-semibold ">
                                Actions
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach ($banners as $key => $baner)
                            <tr class="hover:bg-[#eeeef7] text-center cursor-pointer">
                                <td class="w-[60vh] px-5 py-1  text-sm">
                                    <div>{{ $baner->title }}</div>
                                </td>
                                <td class="px-5 py-1   text-sm">
                                    <div>{{ $baner->banner_order }}</div>
                                </td>


                                <td class="p-2" style="width: 100px;">
                                    <img class="" src="{{ asset('/uploads/' . $baner->banner_image) }}" alt="Card"
                                        style="width: 70px;">
                                </td>
                                <td class="px-5 py-1  text-sm">
                                    @if ($baner->created_at)
                                        <div>{{ $baner->created_at->format('F j, Y') }}</div>
                                    @else
                                        <div>-</div>
                                    @endif
                                </td>


                                <td class="px-5 py-1  text-sm">
                                    <div class="flex p-2 justify-center">
                                        @can('Edit Banner')
                                            <a href="{{ route('admin.banner.edit', $baner->id) }}">
                                                <div class="bg-[#266688] py-1 px-2 mx-2 text-white flex rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-edit" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M7 7h-1a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-1">
                                                        </path>
                                                        <path
                                                            d="M20.385 6.585a2.1 2.1 0 0 0 -2.97 -2.97l-8.415 8.385v3h3l8.385 -8.415z">
                                                        </path>
                                                        <path d="M16 5l3 3"></path>
                                                    </svg>


                                                </div>
                                            </a>
                                        @endcan
                                        @can('Delete Banner')
                                            <form method="POST" action="{{ route('admin.banner.destroy', $baner->id) }}"
                                                id="delete-form-{{ $baner->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="deleteItem({{ $baner->id }})"
                                                    class="bg-red-500  py-1 px-2 mx-2 flex text-white rounded-md">
                                                    <svg xmlns="http://www.w3.org/2000/svg"
                                                        class="icon icon-tabler icon-tabler-trash" width="24" height="24"
                                                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                                                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                        <path d="M4 7l16 0"></path>
                                                        <path d="M10 11l0 6"></path>
                                                        <path d="M14 11l0 6"></path>
                                                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12"></path>
                                                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3"></path>
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
@endsection
