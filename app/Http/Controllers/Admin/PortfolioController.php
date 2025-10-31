<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\Portfolio;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class PortfolioController extends Controller
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
        abort_unless(Gate::allows('View Portfolio'), 403);

        $banners = Portfolio::latest()->get();
        return view("admin.portfolio.index", compact("banners"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

        abort_unless(Gate::allows('Add Portfolio'), 403);
        return view("admin.portfolio.create");

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //

        abort_unless(Gate::allows('Add Portfolio'), 403);
        $banner_image = $this->imageservice->fileUpload($request->banner_image, "portfolio");
        $req = $request->all();
        $req['banner_image'] = $banner_image;
        $req['slug'] = Str::slug($request->title);
        Portfolio::create($req);
        return redirect()->route('admin.portfolio.index')->with('popsuccess', 'Portfolio Added');
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
    public function edit(Portfolio $portfolio)
    {
        abort_unless(Gate::allows('Edit Portfolio'), 403);
        return view("admin.portfolio.edit", compact("portfolio"));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Portfolio $portfolio)
    {
        abort_unless(Gate::allows('Edit Portfolio'), 403);
        $req = $request->all();
        if ($request->hasFile('banner_image')) {
            if ($portfolio->banner_image) {
                $this->imageservice->imageDelete($portfolio->banner_image);
            }
            $banner_img = $this->imageservice->fileUpload($request->banner_image, "portfolio");
            $req['banner_image'] = $banner_img;
        }

        $req['slug'] = Str::slug($request->title);
        $portfolio->update($req);

        return redirect()->route('admin.portfolio.index')->with('popsuccess', 'Portfolio Updated');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Portfolio $portfolio)
    {
        abort_unless(Gate::allows('Delete Portfolio'), 403);
        if ($portfolio->banner_image) {
            $this->imageservice->imageDelete($portfolio->banner_image);
        }
        $portfolio->delete();
        return redirect()->route('admin.portfolio.index')->with('popsuccess', 'Portfolio Deleted');
    }
}
