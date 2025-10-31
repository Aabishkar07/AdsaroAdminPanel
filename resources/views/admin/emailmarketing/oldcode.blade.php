@extends('admin.layouts.app')
@section('body')

    @if (session('success'))
        <div class="mb-4 p-3 bg-green-100 text-green-700 rounded">
            {{ session('success') }}
        </div>
    @endif

    @if ($errors->any())
        <div class="mb-4 p-3 bg-red-100 text-red-700 rounded">
            <ul class="list-disc pl-5">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class=" gap-x-3  flex p-4">
        <div class=" h-full w-full max-w-xl">
            <div class="bg-white p-8 rounded-lg shadow-md">

                <h1 class="text-2xl font-bold mb-6 text-center">Import CSV File</h1>
                <form action="{{ route('admin.emailmarketing.store') }}" method="POST" enctype="multipart/form-data"
                    class="space-y-6">
                    @csrf
                    <div>
                        <label for="csv_file" class="block text-sm font-medium text-gray-700 mb-1">Choose CSV File</label>
                        <input type="file" name="csv_file" id="csv_file" required
                            class="block w-full text-sm text-gray-500
                    file:mr-4 file:py-2 file:px-4
                    file:rounded file:border-0
                    file:text-sm file:font-semibold
                    file:bg-blue-50 file:text-blue-700
                    hover:file:bg-blue-100
                    cursor-pointer" />
                    </div>

                    <button type="submit"
                        class="w-full bg-blue-600 text-white py-2 rounded hover:bg-blue-700 transition-colors duration-300">
                        Import
                    </button>
                </form>
            </div>
        </div>


        <!-- CSV Preview -->
        <div id="csv-preview" class="w-full  h-[75vh] overflow-auto bg-white shadow rounded p-4 hidden">
            <div class="flex border-b border-gray-200">
                {{-- <div class="px-5 py-3 font-semibold text-left w-12">SN</div> --}}
                <div class="flex-1 py-3 px-6 text-left leading-4 font-medium uppercase tracking-wider">Name</div>
                <div class="flex-1 py-3 px-6 text-left leading-4 font-medium uppercase tracking-wider">Email</div>
            </div>
            <div id="csv-rows" class="divide-y divide-gray-200"></div>
        </div>



        <script>
            document.getElementById('csv_file').addEventListener('change', function(e) {
                const file = e.target.files[0];
                if (!file) return;

                const reader = new FileReader();

                reader.onload = function(event) {
                    const text = event.target.result;
                    const lines = text.trim().split('\n');
                    const previewContainer = document.getElementById('csv-rows');
                    const previewBox = document.getElementById('csv-preview');
                    previewContainer.innerHTML = '';

                    if (lines.length <= 1) {
                        previewBox.classList.add('hidden');
                        return;
                    }

                    previewBox.classList.remove('hidden');

                    lines.forEach((line, index) => {
                        if (index === 0) return; // Skip header row
                        const [name, email] = line.split(',');

                        const row = document.createElement('div');
                        row.className = 'flex';
                        row.innerHTML = `

                    <div class="flex-1 py-2 px-6">${name?.trim() ?? ''}</div>
                    <div class="flex-1 py-2 px-6">${email?.trim() ?? ''}</div>
                `;
                        previewContainer.appendChild(row);
                    });
                };

                reader.readAsText(file);
            });
        </script>
    </div>
@endsection
