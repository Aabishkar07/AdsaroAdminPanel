<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $store=Store::get();

        return view('admin.store.index',compact('store'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.store.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


            $req = $request->all();
            $req['slug'] = Str::slug($req["title"]);

            $store = Store::create([
                'title' => $req["title"],
                'price' => $req["price"],

                'slug' => $req["slug"],
                'service' => json_encode($req['service']),
            ]);

            $store->update(['package_id' => $store->id]);

            return redirect()->route('admin.store.index')->with([
                'popsuccess' => 'Package Added',
            ]);


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
        $package=Store::find($id);
        $package->service = json_decode($package->service, true); // Decode JSON string to array
        return view("admin.store.edit", compact("package"));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $store = Store::findOrFail($id);

        $slug = Str::slug($request->title);

        $store->update([
            'title' => $request->title,
            'price' => $request->price,
            'slug' => $slug,
            'service' => json_encode($request->service),
        ]);

        return redirect()->route('admin.store.index')->with([
            'popsuccess' => 'Package Updated',
        ]);
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $store = Store::findOrFail($id);
        $store->delete();

        return redirect()->route('admin.store.index')->with([
            'popsuccess' => 'Package Deleted',
        ]);
    }
}
