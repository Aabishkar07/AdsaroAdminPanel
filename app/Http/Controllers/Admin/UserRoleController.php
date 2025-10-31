<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class UserRoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        abort_unless(Gate::allows('View Role'), 403);

        $roles = Role::all();
        return view('admin.user-role.index', compact('roles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add Role'), 403);

        $permission = Permission::all();
        return view('admin.user-role.create', compact('permission'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        abort_unless(Gate::allows('Add Role'), 403);

        try {

            DB::transaction(function () use ($request) {
                $role = Role::create(["name" => $request->name, "guard_name" => "web"]);


                $permissionIds = $request->permission;
                $permissions = Permission::whereIn('id', $permissionIds)->pluck('name')->toArray();

                $role->givePermissionTo($permissions);
            });
            return redirect()->back()->with('popsuccess', "Role Added successfully");
        } catch (\Exception $e) {
            return redirect()->back()->with('poperror', "Role addition failed: " . $e->getMessage());
        }
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
    public function edit($roleId)
    {
        abort_unless(Gate::allows('Edit Role'), 403);

        $role = Role::where('id', $roleId)->first();

        // Ensure the role exists before proceeding
        if (!$role) {
            abort(404, 'Role not found');
        }

        $permissions = Permission::get()->groupBy("parent");


        // Get the old permissions associated with the role
        $oldPermissions = $role->permissions->pluck('name')->toArray();

        return view('admin.user-role.edit', compact('role', 'permissions', 'oldPermissions'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $role)
    {
        abort_unless(Gate::allows('Edit Role'), 403);

        $role = Role::where('id', $role)->first();
        $request->validate([
            'rolename' => 'required|max:255',
            'permissions' => 'required',
        ]);

        $role->update(['name' => $request->rolename]);
        $permissions = $request->input('permissions', []); // Get permissions, default to an empty array
        $role->syncPermissions($permissions);

        return redirect()->route('admin.userrole.index')->with('success', 'Role Successfully Updated');
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy($userrole)
    {
        abort_unless(Gate::allows('Delete Role'), 403);

        $role = Role::findOrFail($userrole);

        // Detach related pivot data (if using Spatie or similar)
        $role->permissions()->detach(); // Remove associated permissions
        $role->users()->detach();       // Remove role from users (if applicable)

        // Delete the role itself
        $role->delete();
        return redirect()->route('admin.userrole.index')->with('success', 'Role Successfully Deleted');


    }
}
