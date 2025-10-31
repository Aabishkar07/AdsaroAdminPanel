<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct(
        protected ImageService $imageservice

    ) {
    }


    public function index()
    {
        //

        abort_unless(Gate::allows('View Pages'), 403);

        $pages = Page::get();
        // dd($page);
        return view('admin.pages.index', compact('pages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_unless(Gate::allows('Edit Pages'), 403);
        $pages = Page::find($id);
        return view('admin.pages.edit', compact('pages'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        abort_unless(Gate::allows('Edit Pages'), 403);
        $page = Page::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'nullable|string',
            'secondary_description' => 'nullable|string',
            'main_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'secondary_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        // Handle image uploads
        if ($request->hasFile('main_image')) {
            $mainImage = $this->imageservice->fileUpload($request->main_image, "main_image");

            $validated['main_image'] = $mainImage;
        }

        if ($request->hasFile('secondary_image')) {
            $secondaryImage = $this->imageservice->fileUpload($request->secondary_image, "secondary_image");

            $validated['secondary_image'] = $secondaryImage;
        }

        $page->update($validated);

        return redirect()->route('admin.page.index')->with('success', 'Page updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
