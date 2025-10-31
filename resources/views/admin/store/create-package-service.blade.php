<div class="bg-white p-2 rounded-lg shadow-md max-w-xl">
    <div id="form-fields">
        @if (old('service'))
            @foreach (old('service') as $index => $oldservice)
                <div class="mb-4 flex items-center space-x-4">
                    <input type="text" name="service[]"
                        class="text-xs border border-gray-300 p-3 rounded mt-1 focus:border-secondary placeholder-gray-400 focus:outline-none hover:border-secondary w-full"
                        placeholder="Enter service" value="{{ $oldservice }}">

                    @if ($index > 0)
                        <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none"
                            onclick="removeField(this)"><svg xmlns="http://www.w3.org/2000/svg" width="24" 
                                height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2"
                                stroke-linecap="round" stroke-linejoin="round"
                                class="icon icon-tabler icons-tabler-outline icon-tabler-trash">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7l16 0" />
                                <path d="M10 11l0 6" />
                                <path d="M14 11l0 6" />
                                <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                            </svg></button>
                    @endif

                </div>
            @endforeach
        @else
            <div class="mb-4 flex items-center space-x-4">
                <input type="text" name="service[]"
                    class="text-xs border border-gray-300 p-3 rounded mt-1 focus:border-secondary placeholder-gray-400 focus:outline-none hover:border-secondary w-full"
                    placeholder="Enter service">
            </div>
        @endif
    </div>
    <button type="button"
        class="flex justify-center py-2 px-4 text-sm font-medium rounded-md text-white bg-gradient-to-r from-[#10B5FC] to-[#1F4A9A]  hover:from-[#0E92D0] hover:to-[#174385] focus:outline-none transition duration-150 ease-in-out "
        onclick="addField()">Add more</button>

</div>

<script>
    function addField() {
        const container = document.getElementById('form-fields');
        const newField = document.createElement('div');
        newField.className = 'mb-4 flex items-center space-x-4';
        newField.innerHTML = `
            <input type="text" name="service[]" class="text-xs border border-gray-300 p-3 rounded mt-1 focus:border-secondary placeholder-gray-400 focus:outline-none hover:border-secondary w-full" placeholder="Enter service">
            <button type="button" class="text-red-500 hover:text-red-700 focus:outline-none" onclick="removeField(this)"><svg  xmlns="http://www.w3.org/2000/svg"  width="24"  height="24"  viewBox="0 0 24 24"  fill="none"  stroke="currentColor"  stroke-width="2"  stroke-linecap="round"  stroke-linejoin="round"  class="icon icon-tabler icons-tabler-outline icon-tabler-trash"><path stroke="none" d="M0 0h24v24H0z" fill="none"/><path d="M4 7l16 0" /><path d="M10 11l0 6" /><path d="M14 11l0 6" /><path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" /><path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" /></svg></button>
        `;
        container.appendChild(newField);
    }

    function removeField(button) {
        const container = document.getElementById('form-fields');
        if (container.children.length > 1) {
            container.removeChild(button.parentElement);
        }
    }
</script>
