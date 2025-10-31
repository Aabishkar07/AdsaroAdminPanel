<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Requests\StoreMetaPageRequest;
use App\Http\Requests\UpdateMetaPageRequest;
use App\Models\MetaPage;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MetaPageController extends Controller
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
        abort_unless(Gate::allows('View Meta Page'), 403);

        $metapages = MetaPage::paginate(10);

        return view('admin.metapage.index', compact('metapages'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        return view('admin.metapage.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMetaPageRequest $request)
    {
        $req = $request->all();
        if ($request->hasFile('featured_image')) {
            $og_image = $this->imageservice->fileUpload($request->ogimage, "ogimage");
            $req['ogimage'] = $og_image;
        }
        MetaPage::create($req);
        return redirect()->route('admin.metapages.index')->with('popsuccess', 'Page Added');

    }

    /**
     * Display the specified resource.
     */
    public function show(MetaPage $metaPage)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(MetaPage $metapage)
    {
        abort_unless(Gate::allows('Edit Meta Page'), 403);
        return view('admin.metapage.edit', compact('metapage'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMetaPageRequest $request, MetaPage $metapage)
    {
        abort_unless(Gate::allows('Edit Meta Page'), 403);
        $req = $request->all();
        if ($request->hasFile('ogimage')) {
            if ($metapage->ogimage) {
                $this->imageservice->imageDelete($metapage->ogimage);
            }
            $og_img = $this->imageservice->fileUpload($request->ogimage, "ogimage");
            $req['ogimage'] = $og_img;
        }

        $metapage->update($req);

        return redirect()->route('admin.metapages.index')->with('popsuccess', 'Page Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(MetaPage $metapage)
    {
        if ($metapage->ogimage) {
            $this->imageservice->imageDelete($metapage->ogimage);
        }
        $metapage->delete();
        return redirect()->route('admin.metapages.index')->with('popsuccess', 'Page Deleted');
    }
}
