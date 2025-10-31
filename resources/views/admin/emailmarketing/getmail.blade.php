@extends('admin.layouts.app')
@section('body')
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
            border: 1px solid #ccc;
        }

        th,
        td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>


    @include('admin.include.toastmessage')

    {{-- <div class="flex items-center">
        <div class="flex-1">

            <div class="text-gray-700 text-xl font-medium p-2">Emails ({{ count($emails) }})</div>
        </div>

    </div> --}}


    <div class="flex-1 py-3">
        <span class="w-full text-2xl font-bold text-secondary ">
            <a href=" {{ route('admin.csvs.index') }}">
                CSVs
            </a>
            /
            <span class="text-[#201baf] font-bold">
                Sendmail
            </span>
        </span>
    </div>
    <div class="flex flex-col mt-2">


        <div class="grid ">

            <form class="" method="post" action="
            {{ route('admin.newsletter.create') }}
             ">
                @csrf
                <div class="bg-white ">

                    <div class=" border-gray-200 rounded-lg overflow-hidden">
                        <div class="relative  text-white bg-[#151265] shadow data-tablerounded-lg flex items-center ">
                            <div class="px-5 py-3 font-semibold text-left">
                                <input type="checkbox" id="checkall">
                            </div>
                            <div class=" py-3 px-6 font-semibold text-left">
                                SN</div>
                            <div class="flex-1 py-3 px-6 text-left  leading-4 font-medium  uppercase tracking-wider">
                                Name</div>
                            <div class="flex-1 py-3 px-6 text-left  leading-4 font-medium  uppercase tracking-wider">
                                Email</div>

                        </div>
                        <div class="overflow-y-auto max-h-[60vh]">
                            @foreach ($parsedDatas as $key => $data)
                                <div class="flex border-t border-gray-200">
                                    <div class="py-4 px-5 text-center whitespace-no-wrap">
                                        <input type="checkbox" name="email[]" value="{{ $data['gmail'] }}">
                                    </div>
                                    <div class=" py-3 px-3 whitespace-no-wrap text-sm text-gray-500">{{ $key + 1 }}
                                    </div>
                                    <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                        {{ $data['name'] }}
                                    </div>
                                    <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                        {{ $data['gmail'] }}
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        {{-- @foreach ($emails as $key => $user)
                            <div class="flex border-t border-gray-200">
                                <div class="py-4 px-5 text-center whitespace-no-wrap">
                                    <input type="checkbox" name="email[]" value="{{ $user->email }}">
                                </div>
                                <div class=" py-3 px-3 whitespace-no-wrap text-sm text-gray-500">{{ $key + 1 }}
                                </div>
                                <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                    {{ $user->name }}
                                </div>
                                <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                    {{ $user->email }}
                                </div>
                            </div>
                        @endforeach --}}
                        {{-- @foreach ($parsedDatas as $key => $parsedData)
                            <div class="flex border-t border-gray-200">
                                <div class="py-4 px-5 text-center whitespace-no-wrap">
                                    <input type="checkbox" name="email[]" value="{{ $user->email }}">
                                </div>
                                <div class=" py-3 px-3 whitespace-no-wrap text-sm text-gray-500">{{ $key + 1 }}
                                </div>
                                <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                    {{ $user->name }}
                                </div>
                                <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                    {{ $user->email }}
                                </div>
                            </div>
                        @endforeach --}}
                    </div>

                    <div class="bg-sky-500 flex justify-center rounded-md mt-6 mb-4 mx-6">
                        <button class="text-white py-3 w-full">Send Email</button>
                    </div>
                </div>
            </form>

        </div>

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#checkall').change(function() {
                $(this).closest('form').find('input[type="checkbox"]').prop('checked', $(this).prop(
                    'checked'));
            });
            $('#checkalls').change(function() {
                $(this).closest('form').find('input[type="checkbox"]').prop('checked', $(this).prop(
                    'checked'));
            });
        });
    </script>
    <script>
        function deleteSingleImages(imageId) {

            Swal.fire({
                title: 'Are you sure?',
                text: 'You will not be able to recover this Property!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3085d6',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-forms-' + imageId).submit();
                }
            });
        }
    </script>
@endsection
