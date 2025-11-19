<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    public function index()
    {
        $parents = Category::with('children')->parents()->orderBy('name')->get();
        return view('admin.categories.index', compact('parents'));
    }

    public function store(Request $request)
    {
        $parentId = $request->input('parent_id');

        $request->validate([
            'name' => [
                'required',
                Rule::unique('categories', 'name')->where(function ($q) use ($parentId) {
                    if (is_null($parentId)) {
                        return $q->whereNull('parent_id');
                    }
                    return $q->where('parent_id', $parentId);
                }),
            ],
            'parent_id' => [
                'nullable',
                'exists:categories,id',
                function ($attribute, $value, $fail) {
                    if (!is_null($value) && Category::where('id', $value)->whereNotNull('parent_id')->exists()) {
                        $fail('Parent must be a main category.');
                    }
                }
            ],
        ]);

        Category::create([
            'name' => $request->name,
            'parent_id' => $parentId,
        ]);

        return back()->with('popsuccess', 'Category created');
    }

    public function update(Request $request, Category $category)
    {
        $parentId = $category->parent_id; // parent cannot be changed in this simple UI

        $request->validate([
            'name' => [
                'required',
                Rule::unique('categories', 'name')->ignore($category->id)->where(function ($q) use ($parentId) {
                    if (is_null($parentId)) {
                        return $q->whereNull('parent_id');
                    }
                    return $q->where('parent_id', $parentId);
                }),
            ],
        ]);

        $category->update([
            'name' => $request->name,
        ]);

        return back()->with('popsuccess', 'Category updated');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return back()->with('popsuccess', 'Category deleted');
    }
}
