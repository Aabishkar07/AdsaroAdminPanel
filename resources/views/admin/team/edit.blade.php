@extends('admin.layouts.app')

@section('body')
    <div class="px-10 py-4">

        <div class="flex gap-4">
            <a href="{{ route('admin.teams.index') }}">
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-arrow-left" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M5 12l14 0"></path>
                    <path d="M5 12l6 6"></path>
                    <path d="M5 12l6 -6"></path>
                </svg>
            </a>
            <div class="text-xl font-bold">Edit Team</div>
        </div>
        <div class="bg-white rounded-lg shadow-lg row mt-30 text-slate-600">
            <form method="post" action="{{ route('admin.teams.update', $team->id) }} " enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="p-6 mt-3">
                    <div class="flex flex-col ">
                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Full Name
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="name" placeholder="Enter name Here" type="text"
                                    value="{{ old('name', $team->name) }}" />
                                @error('name')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div class="mt-3">
                            <label class='text-sm font-semibold'> Image</label>
                            <div
                                class='w-full p-2 mt-2 mb-1 text-sm border rounded-md shadow-sm form-control border-grey-400'>
                                <input type="file" name="image"
                                    class="image hover:border-[#7065d4] focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] "
                                    onchange="loadFile(event)" />
                            </div>
                            <img class="oldimage" src="{{ asset('/uploads/' . $team->image) }}" alt="Card"
                                style="width: 70px;margin-bottom:2px;">
                            <img id="output" style="width: 70px; margin-bottom: 2px;" />
                            @error('image')
                                <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                    * {{ $message }}
                                </div>
                            @enderror
                        </div>




                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Designation
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="designation" placeholder="Enter designation Here" type="text"
                                    value="{{ old('designation', $team->designation) }}" />
                                @error('designation')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Order
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="order" placeholder="Enter order Here" type="text"
                                    value="{{ old('order', $team->order) }}" />
                                @error('order')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Website link
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="website" placeholder="Enter website Here" type="text"
                                    value="{{ old('website', $team->website) }}" />
                                @error('website')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div>
                            <label class="w-full text-sm font-semibold" htmlFor="">
                                Linkedin link
                            </label>

                            <div>
                                <input
                                    class="text-xs focus:outline-none focus:ring-[#7065d4] focus:border-[#7065d4] border border-gray-300 p-3 rounded mt-3 hover:border-[#7065d4] w-full"
                                    name="linkedin" placeholder="Enter linkedin Here" type="text"
                                    value="{{ old('linkedin', $team->linkedin) }}" />
                                @error('linkedin')
                                    <div class="text-sm text-red-400 invalid-feedback" style="display: block;">
                                        * {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button
                                class="border mt-5 bg-[#2e3092] border-[#2e3092] px-4 py-2 rounded-md mr-2 text-white hover:bg-white transition duration-500 ease-in-out hover:text-[#2e3092]">
                                Edit </button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
