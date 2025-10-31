<div class="bg-white p-2 rounded-lg shadow-md max-w-xl">
    <div id="form-fields">
        @if (!empty($package) && isset($package->service))
            @foreach ($package->service as $index => $oldservice)
                <div class="mb-4 flex items-center space-x-4 field-group">
                    <input type="text" name="service[]"
                        class="text-xs border border-gray-300 p-3 rounded mt-1 focus:border-blue-500 placeholder-gray-400 focus:outline-none hover:border-blue-500 w-full"
                        placeholder="Enter service" value="{{ $oldservice }}">

                    <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none remove-field">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                            stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <path d="M4 7l16 0" />
                            <path d="M10 11l0 6" />
                            <path d="M14 11l0 6" />
                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                        </svg>
                    </button>
                </div>
            @endforeach
        @endif

        <!-- Default input field if no services exist -->
        @if (empty($package) || empty($package->service))
            <div class="mb-4 flex items-center space-x-4 field-group">
                <input type="text" name="service[]"
                    class="text-xs border border-gray-300 p-3 rounded mt-1 focus:border-blue-500 placeholder-gray-400 focus:outline-none hover:border-blue-500 w-full"
                    placeholder="Enter service">
                <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none remove-field">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7l16 0" />
                        <path d="M10 11l0 6" />
                        <path d="M14 11l0 6" />
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                    </svg>
                </button>
            </div>
        @endif
    </div>

    <!-- Add More Button -->
    <button type="button" class="flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-gradient-to-r from-[#10B5FC] to-[#1F4A9A] hover:from-[#0E92D0] hover:to-[#174385] focus:outline-none transition duration-150 ease-in-out" onclick="addField()">Add more</button>
</div>

<!-- JavaScript to Add/Remove Fields -->
<script>
    function addField() {
        let fieldHTML = `
            <div class="mb-4 flex items-center space-x-4 field-group">
                <input type="text" name="service[]"
                    class="text-xs border border-gray-300 p-3 rounded mt-1 focus:border-blue-500 placeholder-gray-400 focus:outline-none hover:border-blue-500 w-full"
                    placeholder="Enter service">
                <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none remove-field">
                    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                        fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round"
                        stroke-linejoin="round" class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M4 7l16 0" />
                        <path d="M10 11l0 6" />
                        <path d="M14 11l0 6" />
                        <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                        <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                    </svg>
                </button>
            </div>`;

        document.getElementById('form-fields').insertAdjacentHTML('beforeend', fieldHTML);
    }

    // Remove field event delegation
    document.getElementById('form-fields').addEventListener('click', function(event) {
        if (event.target.closest('.remove-field')) {
            event.target.closest('.field-group').remove();
        }
    });
</script>
