<?php

namespace App\Http\Controllers\Admin;

use App\FileService\ImageService;
use App\Http\Requests\StoreServiceRequest;
use App\Http\Requests\UpdateServiceRequest;
use App\Models\Service;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;

class ServiceController extends Controller
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
        abort_unless(Gate::allows('View Services'), 403);

        $services = Service::latest()->paginate(10);
        return view('admin.services.index', compact('services'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Services'), 403);
        return view('admin.services.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreServiceRequest $request)
    {
        abort_unless(Gate::allows('Add Services'), 403);
        $service_img = $this->imageservice->fileUpload($request->image, "service");
        $service_icon = $this->imageservice->fileUpload($request->icon, "icon");
        $req = $request->all();
        $req['image'] = $service_img;
        $req['slug'] = Str::slug($request->title);
        $req['icon'] = $service_icon;
        Service::create($req);

        return redirect()->route('admin.services.index')->with('popsuccess', 'Service Successfully Added');
    }

    /**
     * Display the specified resource.
     */
    public function show(Service $service)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Service $service)
    {
        abort_unless(Gate::allows('Edit Services'), 403);
        return view('admin.services.edit', compact('service'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateServiceRequest $request, Service $service)
    {
        abort_unless(Gate::allows('Edit Services'), 403);
        $req = $request->all();

        if ($request->hasFile('image')) {
            if ($service->image) {
                $this->imageservice->imageDelete($service->image);
            }
            $service_image = $this->imageservice->fileUpload($request->image, "service");
            $req['image'] = $service_image;
        }
        if ($request->hasFile('icon')) {
            if ($service->icon) {
                $this->imageservice->imageDelete($service->icon);
            }
            $icon_service = $this->imageservice->fileUpload($request->icon, "icon");
            $req['icon'] = $icon_service;
        }

        $req['slug'] = Str::slug($request->title);

        $service->update($req);

        return redirect()->route('admin.services.index')->with('popsuccess', 'Services Edited');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Service $service)
    {
        abort_unless(Gate::allows('Delete Services'), 403);
        if ($service->image) {
            $this->imageservice->imageDelete($service->image);
        }
        $service->delete();
        return redirect()->route('admin.services.index')->with('popsuccess', 'Services Deleted');
    }
}
