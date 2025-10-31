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

    <div class="flex items-center">
        <div class="flex-1">

            <div class="text-gray-700 text-xl font-medium p-2">Emails ({{ count($emails) }})</div>
        </div>
        <div class="text-right ">

            <div class="text-right ">
                <a href="{{ route('admin.emailmarketing.create') }}"
                    class="flex items-center px-3 py-2 mb-1 mr-1  font-bold text-white uppercase transition-all ease-linear bg-[#6a68AF] border border-[#6a68AF] rounded outline-none hover:bg-transparent hover:text-[#6a68AF] focus:outline-none duration-400 ">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-plus" width="24"
                        height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                        stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M12 5l0 14"></path>
                        <path d="M5 12l14 0"></path>
                    </svg>
                    Add Email</a>
            </div>
        </div>
    </div>



    <div class="flex flex-col mt-2">


        <div class="grid ">

            <form class="" method="post" action="
            {{ route('admin.newsletter.create') }}
             ">
                @csrf
                <div class="bg-white ">

                    <div class=" border-gray-200 rounded-lg overflow-hidden">
                        <div class="relative  text-white bg-[#151265] shadow data-tablerounded-lg flex ">
                            <div class="px-5 py-3 font-semibold text-left">
                                <input type="checkbox" id="checkall">
                            </div>
                            <div class=" px-5 py-3 font-semibold text-left">
                                SN</div>
                            <div class="flex-1 py-3 px-6 text-left  leading-4 font-medium  uppercase tracking-wider">
                                Name</div>
                            <div class="flex-1 py-3 px-6 text-left  leading-4 font-medium  uppercase tracking-wider">
                                Email</div>
                            <div class="flex-1 py-3 px-6 text-left  leading-4 font-medium  uppercase tracking-wider">
                                Created_at</div>
                        </div>
                        <div class="overflow-y-auto max-h-[60vh]">

                            @foreach ($emails as $key => $user)
                                <div class="flex border-t border-gray-200">
                                    <div class="py-4 px-5 text-center whitespace-no-wrap">
                                        <input type="checkbox" name="email[]"  value="{{ $user->email }}">
                                    </div>
                                    <div class=" py-3 px-3 whitespace-no-wrap text-sm text-gray-500">{{ $key + 1 }}
                                    </div>
                                    <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                        {{ $user->name }}
                                    </div>
                                    <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                        {{ $user->email }}
                                    </div>
                                    <div class="flex-1 py-3 px-6 whitespace-no-wrap text-sm text-gray-500">
                                        {{ $user->created_at->format('jS M Y') }}
                                    </div>


                                    {{-- <div class="flex items-center p-2">
                                        <form method="POST" action="{{ route('admin.productenquire.destroy', $user->id) }}"
                                            id="delete-form-{{ $user->id }}">
                                            @csrf
                                            @method('delete')
                                            <button type="button" onclick="deleteItem({{ $user->id }})"
                                                class="flex px-2 py-1 mx-2 text-white bg-red-500 rounded-md">
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

                                    </div> --}}

                                </div>
                            @endforeach
                        </div>
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
