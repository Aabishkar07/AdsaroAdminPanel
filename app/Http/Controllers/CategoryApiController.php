<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoryApiController extends Controller
{
    public function index(): JsonResponse
    {
        $categories = Category::with(['children' => function ($q) {
            $q->select('id', 'name', 'parent_id');
        }])
            ->whereNull('parent_id')
            ->select('id', 'name', 'parent_id')
            ->orderBy('name')
            ->get();

        return response()->json([
            'data' => $categories,
        ]);
    }



    public function blogsByCategory(Request $request, $categoryId)
{
    try {
        // Fetch the category
        $category = Category::with('children')->findOrFail($categoryId);

        // Fetch blogs for this category (and optionally for child categories)
        $categoryIds = $category->children->pluck('id')->push($category->id);

        $blogs = Blog::where('post_status', 'publish')
            ->whereIn('category_id', $categoryIds)
            ->orderBy('post_modified', 'DESC')
            ->paginate(12);

        return response()->json([
            'status' => true,
            'category' => $category->name,
            'data' => $blogs
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => false,
            'error' => $e->getMessage()
        ], 500);
    }
}

}
