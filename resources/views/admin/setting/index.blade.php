@extends('admin.layouts.app')
@section('page_title', 'Admin - Settings')
@section('settings_select', 'bg-[#4456a6] text-white')
@section('body')
    <div class="px-3 bg-background w-full">
        @include('admin.include.toastmessage')
        <div class="flex justify-between">
            <div class="text-2xl font-bold">Settings</div>
            {{-- <a href='{{ route('banner.create') }}'
                        class='bg-[#4456a6] text-white h-10 p-2 text-sm flex items-center font-main rounded-lg'>
                        <span class='material-symbols-outlined text-sm mr-2'>add</span>
                        <span>Add Banner</span>
                    </a> --}}
        </div>
        <div class='product-table bg-white p-3 rounded-lg mt-4 font-main font-light shadow'>
            {{-- <div class="rounded border w-1/2 mx-auto mt-4"> --}}
            <!-- Tabs -->
            <ul id="tabs" class="inline-flex pt-2 px-1 w-full border-b">
                <li class="bg-white px-4 text-gray-800 font-semibold py-2 rounded-t border-t border-r border-l -mb-px"><a
                        id="default-tab" href="#first">Details</a></li>

            </ul>

            <!-- Tab Contents -->
            <div id="tab-contents">
                <div id="first" class="p-4">

                    <form class="w-full mt-5" method="post" action="{{ route('admin.settingdetails') }}">
                        @csrf
                        @method('post')
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-first-name">
                                    Email
                                </label>
                                <input
                                    class="  border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-none"
                                    id="grid-first-name" type="email" value="{{ $setting->email }}" name="email">

                            </div>
                            <div class="w-full md:w-1/2 px-3">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Contact Number
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-last-name" type="number" value="{{ $setting->contact_number }}"
                                    name="contact_number">
                            </div>
                            <div class="w-full md:w-1/2 px-3 mt-6">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-last-name">
                                    Address
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-last-name" type="text" value="{{ $setting->address }}" name="address">
                            </div>
                        </div>



                        <hr class="pt-3">


                        <div class="w-full pb-3">
                            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                for="grid-last-name">
                                Description
                            </label>
                            <textarea
                                class="border tinymce bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                id="grid-last-name" type="text" name="description">
                                {{ $setting->description }}
                            </textarea>
                        </div>

                        <hr class="pt-3">


                        <p class="block tracking-wide text-gray-800 font-bold mb-5">Social Links</p>

                        <div class="flex flex-wrap -mx-3 mb-2">
                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-city">
                                    Facebook
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-city" type="text" value="{{ $setting->facebook }}" name="facebook">
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-city">
                                    Instagram
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-city" type="text" value="{{ $setting->instagram }}" name="instagram">
                            </div>

                            <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-zip">
                                    Linkedin
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-zip" type="text"value="{{ $setting->linkedin }}" name="linkedin">
                            </div>

                            <div class="w-full md:w-1/3 px-3 my-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-zip">
                                    Twitter
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-zip" type="text"value="{{ $setting->twitter }}" name="twitter">
                            </div>
                            <div class="w-full md:w-1/3 px-3 my-6 md:mb-0">
                                <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2"
                                    for="grid-zip">
                                    Google Site Key
                                </label>
                                <input
                                    class="border bg-slate-50 font-normal border-gray-300 p-3 rounded focus:border-[#7065d4] hover:border-[#7065d4] w-full focus:outline-non "
                                    id="grid-zip" type="text"value="{{ $setting->google_site_key }}"
                                    name="google_site_key">
                            </div>


                        </div>
                        <button type="submit"
                            class="border mt-3 hover:border-[#4456a6] px-10 py-1 rounded-md mr-2 hover:text-[#4456a6] hover:bg-white bg-[#4456a6] text-white text-xl font-bold">
                            Save
                        </button>
                    </form>
                </div>


            </div>
            {{-- </div> --}}
        </div>

    </div>

@endsection
