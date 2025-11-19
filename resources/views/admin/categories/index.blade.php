@extends('admin.layouts.app')

@section('body')
<div class="max-w-screen-2xl mx-auto px-4">
    <div class="mb-6">
        <h1 class="text-xl font-semibold text-gray-900">Category Management</h1>
        <p class="text-sm text-gray-500 mt-1">Create main categories and two-level subcategories. Edit or delete inline.</p>
    </div>
    @if(session('popsuccess'))
        <div class="mb-4 p-3 rounded bg-green-100 text-green-700 text-sm">{{ session('popsuccess') }}</div>
    @endif
    @if($errors->any())
        <div class="mb-4 p-3 rounded bg-red-100 text-red-700 text-sm">
            <ul class="list-disc ml-5">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h2 class="font-medium text-gray-900 mb-4">Add Main Category</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-3">
                @csrf
                <input type="hidden" name="parent_id" value="">
                <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400" placeholder="e.g. Electronics" value="{{ old('name') }}">
                <button class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700 active:bg-indigo-800 transition">Add</button>
            </form>
        </div>

        <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6">
            <h2 class="font-medium text-gray-900 mb-4">Add Subcategory</h2>
            <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-3">
                @csrf
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Parent Category</label>
                    <select name="parent_id" class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                        <option value="">Select parent</option>
                        @foreach($parents as $p)
                            <option value="{{ $p->id }}" {{ old('parent_id') == $p->id ? 'selected' : '' }}>{{ $p->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <label class="block text-xs text-gray-600 mb-1">Subcategory Name</label>
                    <input type="text" name="name" class="w-full border border-gray-300 rounded-lg p-2.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400" placeholder="e.g. Smartphones" value="{{ old('name') }}">
                </div>
                <button class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg text-sm hover:bg-indigo-700 active:bg-indigo-800 transition">Add</button>
            </form>
        </div>
    </div>

    <div class="bg-white border border-gray-200 rounded-xl shadow-sm p-6 mt-6">
        <div class="flex items-center justify-between mb-4">
            <h2 class="font-medium text-gray-900">Categories</h2>
        </div>
        <div class="overflow-x-auto overflow-y-auto rounded-lg ring-1 ring-gray-200 max-h-96">
            <table class="min-w-full text-sm">
                <thead class="sticky top-0 z-10">
                    <tr class="text-left text-gray-600 bg-gray-50">
                        <th class="py-3 pr-4 pl-4">Name</th>
                        <th class="py-3 pr-4">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($parents as $parent)
                        <tr class="border-t border-gray-200 hover:bg-gray-50">
                            <td class="py-3 pr-4 pl-4 font-medium text-gray-900">{{ $parent->name }}</td>
                            <td class="py-3 pr-4">
                                <div class="flex flex-wrap items-center gap-2">
                                    <form action="{{ route('admin.categories.update', $parent) }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        @method('PUT')
                                        <input type="text" name="name" value="{{ $parent->name }}" class="border border-gray-300 rounded-md p-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                        <button class="px-3 py-1.5 bg-blue-600 text-white rounded-md text-xs hover:bg-blue-700">Save</button>
                                    </form>
                                    <form action="{{ route('admin.categories.destroy', $parent) }}" method="POST" onsubmit="return confirm('Delete this category and its subcategories?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="px-3 py-1.5 bg-red-600 text-white rounded-md text-xs hover:bg-red-700">Delete</button>
                                    </form>
                                </div>
                                <div class="mt-3">
                                    <form action="{{ route('admin.categories.store') }}" method="POST" class="flex items-center gap-2">
                                        @csrf
                                        <input type="hidden" name="parent_id" value="{{ $parent->id }}">
                                        <input type="text" name="name" placeholder="Add subcategory" class="border border-gray-300 rounded-md p-1.5 text-sm w-64 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 placeholder-gray-400">
                                        <button class="px-3 py-1.5 bg-indigo-600 text-white rounded-md text-xs hover:bg-indigo-700">Add</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @foreach($parent->children->sortBy('name') as $child)
                            <tr class="border-t border-gray-100 bg-gray-50 hover:bg-gray-100/60">
                                <td class="py-2.5 pr-4 pl-10 text-gray-800">— {{ $child->name }}</td>
                                <td class="py-2.5 pr-4">
                                    <div class="flex flex-wrap items-center gap-2">
                                        <form action="{{ route('admin.categories.update', $child) }}" method="POST" class="flex items-center gap-2">
                                            @csrf
                                            @method('PUT')
                                            <input type="text" name="name" value="{{ $child->name }}" class="border border-gray-300 rounded-md p-1.5 text-sm focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500">
                                            <button class="px-3 py-1.5 bg-blue-600 text-white rounded-md text-xs hover:bg-blue-700">Save</button>
                                        </form>
                                        <form action="{{ route('admin.categories.destroy', $child) }}" method="POST" onsubmit="return confirm('Delete this subcategory?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="px-3 py-1.5 bg-red-600 text-white rounded-md text-xs hover:bg-red-700">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    @empty
                        <tr>
                            <td colspan="2" class="py-6 text-center text-gray-500">No categories yet.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
