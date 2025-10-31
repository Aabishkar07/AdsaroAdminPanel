<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    // List blogs with pagination and filtering by post_type
    public function blogs(Request $request)
    {
        try {
            // $perPage = $request->input('per_page', 10); 

            $blogs = Blog::where('post_status', 'publish')
                ->orderBy('post_modified', 'DESC')->get();
                // ->paginate($perPage);
            return response()->json([   
                'status' => true,
                'data' => $blogs
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }


    public function limitblogs()
{
    try {
        $blogs = Blog::where('post_status', 'publish')
                     ->orderBy('post_modified', 'DESC')
                     ->take(4) 
                     ->get();

        return response()->json([
            'status' => 'OK',
            'data' => $blogs
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'ERROR',
            'message' => 'Failed to fetch blogs'
        ], 500);
    }
}

    // Show single blog details
    public function singleblog($id)
    {
        try {
            $blog = Blog::findOrFail($id);

            return response()->json([
                'status' => true,
                'data' => $blog
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'error' => $e->getMessage()
            ], 500);
        }
    }


public function relatedBlogs($slug)
{
    try {
        // Find the current blog by slug
        $currentBlog = Blog::where('slug', $slug)->first();

        if (!$currentBlog) {
            return response()->json([
                'status' => 'ERROR',
                'message' => 'Blog not found'
            ], 404);
        }

        // Fetch other published blogs excluding the current one
        $relatedBlogs = Blog::where('post_status', 'publish')
            ->where('id', '!=', $currentBlog->id)
            ->orderBy('post_modified', 'DESC')
            ->take(4) // limit to 4 related blogs
            ->get(['id', 'title', 'slug', 'excerpt', 'featured_image', 'author', 'post_date']);

        return response()->json([
            'status' => 'OK',
            'data' => $relatedBlogs
        ]);
    } catch (\Exception $e) {
        return response()->json([
            'status' => 'ERROR',
            'message' => 'Failed to load related blogs'
        ], 500);
    }
}



}
