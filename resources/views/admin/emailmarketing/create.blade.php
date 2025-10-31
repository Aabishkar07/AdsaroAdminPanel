@extends('admin.layouts.app')
@section('body')
    <div class=" gap-x-3  flex p-4">
        <div class=" h-full w-full max-w-xl">
            <div class="bg-white p-8 rounded-lg shadow-md">

                <h1 class="text-2xl font-bold mb-6 text-center">Import CSV File</h1>
                <form action="{{ route('admin.csvs.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                    @csrf
                    <div class="">
                        <label for="username">Filename </label>
                        <span class="text-red-600">* </span>
                        <div class="">
                            <input type="text" name="filename" id="filename"
                                class="text-xs border border-gray-300 p-3 w-full rounded mt-1 focus:border-green-500 hover:border-black">
                        </div>
                        @error('filename')
                            <div class="text-red-600">* {{ $message }}</div>
                        @enderror
                    </div>

                    <div>
                        <label for="csv_file" class="block text-sm font-medium text-gray-700 mb-1">Choose CSV File

                            <span class="text-red-600">* </span>

                        </label>

                        <input type="file" name="csv_file" id="csv_file" required
                            class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100
                    cursor-pointer" />
                    </div>
                    @error('csv_file')
                        <div class="text-red-600">* {{ $message }}</div>
                    @enderror

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition-colors duration-300">
                        Save
                    </button>
                </form>
            </div>
        </div>
    </div>
@endsection
