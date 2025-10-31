<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Store;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function __construct(
        protected ImageService $imageservice
    ) {}
    public function index()
    {
        //
        $products=Product::latest()->get();
        return view('admin.product.index',compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $store=Store::get();
        return view('admin.product.create',compact('store'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $req = $request->all();
        $partner_image = $this->imageservice->fileUpload($req["image"], "Product");
       $req["image"] = $partner_image;
       $req["service_id"] = $request->service;
       $product = Product::create($req);
       return redirect()->route("admin.product.index")->with("popsuccess", "Product Added");
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
        //
        $store=Store::get();

        $product=Product::find($id);

        return view("admin.product.edit", compact("product",'store'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $product = Product::find($id);
        $req = $request->all();
        if ($request->hasFile('image')) {
            if ($product->image) {
                $this->imageservice->imageDelete($product->image);
            }
            $product_image = $this->imageservice->fileUpload($req["image"], "product");
            $req['image'] = $product_image;
            $req["service_id"] = $request->service;
        }


        $product->update($req);
        return redirect()->route("admin.product.index")->with("popsuccess", "Product Edited");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $product=Product::find($id);
        if ($product->featured_image) {
            $this->imageservice->imageDelete($product->featured_image);
        }
        $product->delete();
        return redirect()->route("admin.product.index")->with("popsuccess", "Product Deleted");
    }
}
