@extends('admin.layouts.app')
@section('body')
    @include('admin.include.toastmessage')

    <div class="flex px-5 items-center">
        <div class="flex-1">
            <h2 class="w-full text-lg font-bold text-secondary ">Contacts</h2>
        </div>
        <a href="{{ route('admin.admin.contacts.export') }}"
            class="bg-[#04033b] rounded text-white px-3 py-1 text-sm flex gap-2 items-center">
            Export CSV
        </a>
    </div>



    <div class="mt-1">
        <div class='product-table bg-[#e5e3e8]  mt-3   shadow'>

            <div class="relative overflow-x-auto">
                <table class="w-full divide-y divide-gray-200">
                    <thead class="font-normal p-10">
                        <tr class="text-xs text-gray-600 uppercase">
                            <th class="p-2 font-semibold ">
                                Name</th>
                            <th class="p-2 font-semibold ">
                                Email</th>
                            <th class="p-2 font-semibold ">
                                Phone Number</th>
                            <th class="p-2 font-semibold ">
                                Subject</th>


                            <th class="p-2 font-semibold ">
                                Conatct Date</th>

                            <th class="p-2 font-semibold ">
                                Actions</th>
                        </tr>
                    </thead>



                    <tbody class="bg-white divide-y divide-gray-200 ">
                        @foreach ($contacts as $key => $contact)
                            <tr>
                                <td class="px-5 py-3 ">
                                    <p class="text-gray-900 ">{{ $contact->name }}</p>
                                </td>

                                <td class="px-5 py-3 ">
                                    <p class="text-gray-900 ">{{ $contact->email }}</p>
                                </td>
                                <td class="px-5 py-3 ">
                                    <p class="text-gray-900 ">{{ $contact->phone }}</p>
                                </td>
                                </td>
                                <td class="px-5 py-3 ">
                                    <p class="text-gray-900 ">{{ $contact->subject }}</p>
                                </td>
                                </td>





                                <td class="w-48 px-5 py-3 text-sm">
                                    <p class="text-gray-900 ">
                                        {{ $contact->created_at->format('jS M Y') }}
                                    </p>
                                </td>


                                <td>
                                    <div class="flex items-center p-2">
                                        <!-- View Button -->
                                        <button type="button" onclick="viewItem({{ $contact->id }})"
                                            class="flex px-2 py-1 mx-2 text-white bg-blue-500 hover:bg-blue-600 rounded-md">
                                            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-eye"
                                                width="24" height="24" viewBox="0 0 24 24" stroke-width="2"
                                                stroke="currentColor" fill="none" stroke-linecap="round"
                                                stroke-linejoin="round">
                                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                                <path d="M12 4c-5 0 -9 4 -9 8s4 8 9 8s9 -4 9 -8s-4 -8 -9 -8z"></path>
                                                <path d="M15 12c0 1.5 -1.5 3 -3 3s-3 -1.5 -3 -3s1.5 -3 3 -3s3 1.5 3 3z">
                                                </path>
                                            </svg>
                                        </button>

                                        @can('Delete Contact')
                                            <!-- Delete Button -->
                                            <form method="POST" action="{{ route('admin.contactdelete', $contact->id) }}"
                                                id="delete-form-{{ $contact->id }}">
                                                @csrf
                                                @method('delete')
                                                <button type="button" onclick="deleteItem({{ $contact->id }})"
                                                    class="flex px-2 py-1 mx-2 text-white bg-red-500 hover:bg-red-600 rounded-md">
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

                                <!-- Modal for Viewing Contact Details -->
                                <div id="view-modal-{{ $contact->id }}"
                                    class=" max-sm:p-4 fixed z-[999] inset-0 flex justify-center items-center bg-gray-800 bg-opacity-50 hidden"
                                    onclick="closeViewModalIfClickedOutside(event, {{ $contact->id }})">
                                    <div class="bg-white max-h-[60vh] overflow-auto text-gray-600 p-6 rounded-lg w-96 shadow-lg"
                                        onclick="event.stopPropagation()">
                                        <h3 class="text-2xl font-semibold text-center mb-4">Contact Details</h3>
                                        <div class="space-y-2">
                                            <p><strong>Name:</strong> {{ $contact->name }}</p>
                                            <p><strong>Email:</strong> {{ $contact->email }}</p>
                                            <p><strong>Phone:</strong> {{ $contact->phone }}</p>
                                            <p><strong>Subject:</strong> {{ $contact->subject }}</p>
                                            <p><strong>Message:</strong> {{ $contact->message }}</p>
                                        </div>
                                        <div class="mt-4 ">
                                            <button onclick="closeViewModal({{ $contact->id }})"
                                                class="px-4 py-2 bg-gray-500 text-white rounded-md hover:bg-gray-600">
                                                Close
                                            </button>
                                        </div>
                                    </div>
                                </div>

                                <script>
                                    // Show View Modal
                                    function viewItem(contactId) {
                                        const modal = document.getElementById(`view-modal-${contactId}`);
                                        modal.classList.remove('hidden');
                                    }

                                    // Close View Modal
                                    function closeViewModal(contactId) {
                                        const modal = document.getElementById(`view-modal-${contactId}`);
                                        modal.classList.add('hidden');
                                    }

                                    // Close View Modal when clicking outside the modal content
                                    function closeViewModalIfClickedOutside(event, contactId) {
                                        // Close modal if the click is outside the modal content (on the background overlay)
                                        if (event.target === event.currentTarget) {
                                            closeViewModal(contactId);
                                        }
                                    }
                                </script>




                            </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>
        </div>
        @if ($contacts->isEmpty())
            <div class="text-center bg-gray-100 font-semibold text-red-600 border p-10">
                No Contacts Found.
            </div>
        @endif
        <div class="z-0 mt-3">
            {{ $contacts->links('vendor.pagination.tailwind') }}
        </div>
    </div>
@endsection
