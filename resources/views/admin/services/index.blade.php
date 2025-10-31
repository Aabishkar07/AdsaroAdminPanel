@extends('admin.layouts.app')

@section('body')
    <div class="w-full px-5">

        @include('admin.include.toastmessage')
        <div class="flex justify-between">
            <div class="text-2xl font-bold"> Advertising Formats</div>
            <div class="flex">

                @can('Add Services')
                    <a href='{{ route('admin.services.create') }}'
                        class='bg-[#4456a6] text-white h-10 p-2 text-sm flex gap-2 items-center font-main rounded-lg'>
                        <svg xmlns="http://www.w3.org/2000/svg" class="svgicon" height="1em" viewBox="0 0 448 512">
                            <style>
                                .svgicon {
                                    fill: #ffffff;
                                }
                            </style>
                            <path
                                d="M256 80c0-17.7-14.3-32-32-32s-32 14.3-32 32V224H48c-17.7 0-32 14.3-32 32s14.3 32 32 32H192V432c0 17.7 14.3 32 32 32s32-14.3 32-32V288H400c17.7 0 32-14.3 32-32s-14.3-32-32-32H256V80z" />
                        </svg>
                        <span>Add Formats</span>
                    </a>
                @endcan
            </div>
        </div>

        <div class="py-3 ">
            <div class="mt-1">
                <div class="relative mt-1 text-white bg-[#6a68AF] shadow product-tablerounded-lg ">
                    <div class="overflow-x-auto ">
                        <table class="min-w-full divide-y text-left  divide-gray-200">
                            <thead class="">
                                <tr>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Title</th>
                                    {{-- <th class="px-5 py-3 font-semibold text-left ">
                                        Description</th> --}}

                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Image</th>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Icon</th>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Order</th>
                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Created at</th>

                                    <th class="px-5 py-3 font-semibold text-left ">
                                        Actions</th>
                                </tr>
                            </thead>


                            @foreach ($services as $key => $service)
                                <tbody class="bg-white divide-y divide-gray-200 ">
                                    <tr>
                                        <td class="px-5 py-3 ">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $service->title }}</p>
                                        </td>
                                        {{-- <td class="px-5 py-3 ">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $service->description }}</p>
                                        </td> --}}

                                        <td class="p-2" style="width: 100px;">
                                            <img class="w-full h-full " src="{{ asset('/uploads/' . $service->image) }}"
                                                alt="Card" style="width: 70px;">
                                        </td>
                                        <td class="p-2" style="width: 100px;">
                                            <img class="w-full h-full " src="{{ asset('/uploads/' . $service->icon) }}"
                                                alt="Card" style="width: 70px;">
                                        </td>
                                        <td class="px-5 py-3 ">
                                            <p class="text-gray-900 whitespace-no-wrap">{{ $service->order }}</p>
                                        </td>
                                        <td class="px-5 py-3 text-sm">
                                            <p class="text-gray-900 whitespace-no-wrap">
                                                {{ $service->created_at->format('jS M Y') }}
                                            </p>
                                        </td>


                                        <td class="z-[999]">
                                            <div class="flex gap-x-2">

                                                @can('Edit Services')
                                                    <div class="">
                                                        <a href="{{ route('admin.services.edit', $service->id) }}"
                                                            class="block px-4 py-2 text-sm text-white rounded-md hover:bg-sky-500 bg-sky-600">Edit
                                                        </a>
                                                    </div>
                                                @endcan

                                                @can('Delete Services')
                                                    <form method="POST"
                                                        action="{{ route('admin.services.destroy', $service->id) }}"
                                                        id="delete-form-{{ $service->id }}">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="button" onclick="deleteItem({{ $service->id }})"
                                                            class="flex w-full items-center gap-2    px-4 py-1.5 text-md openModal text-white rounded text-center bg-red-700 hover:bg-red-600">
                                                            <span class="pl-2">
                                                                Delete
                                                            </span>
                                                        </button>
                                                    </form>
                                                @endcan
                                            </div>

                                        </td>

                                    </tr>
                                </tbody>
                            @endforeach

                        </table>

                    </div>
                </div>
                <div class="z-0 mt-3">
                    {{ $services->links('vendor.pagination.tailwind') }}
                </div>
            </div>
        </div>
    </div>
@endsection
