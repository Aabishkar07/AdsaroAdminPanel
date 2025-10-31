<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class PermissionController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('View Permission'), 403);



        $permissions = Permission::latest()->get();
        // dd($permissions);
        return view("admin.permissions.index", compact("permissions"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Permission'), 403);




        return view("admin.permissions.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_unless(Gate::allows('Add Permission'), 403);



        $request->validate([
            'name' => 'required|unique:permissions,name||max:255',
            'parent' => 'required',
        ]);
        $req = $request->all();
        $req['guard_name'] = "web";
        $permission = Permission::create($req);

        $role = Role::where('name', 'SuperAdmin')->first();
        if ($role) {
            $role->givePermissionTo($permission);
        }
        return redirect()->route('admin.permissions.index')->with('success', 'Permission Successfully Added');
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
    public function edit(Permission $permission)
    {
        abort_unless(Gate::allows('Edit Permission'), 403);



        return view('admin.permissions.edit', compact('permission'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Permission $permission)
    {
        abort_unless(Gate::allows('Edit Permission'), 403);



        $request->validate([
            'name' => 'required|max:255',
            'parent' => 'required',
        ]);
        $req = $request->all();
        $req['guard_name'] = "web";
        $permission->update($req);

        return redirect()->route('admin.permissions.index')->with('success', 'Permission Successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Permission $permission)
    {
        abort_unless(Gate::allows('Delete Permission'), 403);



        $permission->delete();
        return redirect()->route('admin.permissions.index')->with('success', 'Permission Successfully Deleted');
    }
}
