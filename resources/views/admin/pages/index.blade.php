@extends('admin.layouts.app')
@section('body')
    <div class="p-4 z-0">
        <div class=" mx-auto px-5 ">
            <div class="mt-10  relative z-[0]">
                <div class="overflow-x-auto">
                    <table class="w-[100%] divide-x-2 divide-y divide-gray-200 z-[0]">
                        <thead class="font-normal  divide-x-2 bg-slate-800 ">
                            <tr class="">
                                <th scope="col " class="p-2 font-semibold text-white ">
                                    Page
                                </th>

                                <th scope="col" class="font-semibold text-white ">
                                    Edited At
                                </th>
                                <th scope="col" class="font-semibold text-white ">
                                    Actions
                                </th>
                            </tr>
                        </thead>


                        @foreach ($pages as $key => $page)
                            <tbody class="bg-white divide-y divide-gray-200 text-center">
                                <tr>
                                    <td class=" divide border">
                                        {{ $page->title }}
                                    </td>
                                    <td class=" divide border">
                                        {{ $page->updated_at->format('Y/m/d') }}
                                    </td>


                                    <td class="p-2   border divide flex justify-center items-center">

                                        @can('Edit Pages')
                                            <a href="{{ route('admin.page.edit', $page->id) }}">
                                                <button class="mr-2 py-1 px-3 bg-green-500 text-white rounded-md">
                                                    Edit
                                                </button>
                                            </a>
                                        @endcan




                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>


    </div>
    </div>
@endsection
