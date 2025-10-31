<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Http\Requests\ChangePasswordRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserManagementController extends Controller
{
    public function index()
    {
        abort_unless(Gate::allows('View AdminUser'), 403);


        $admins = User::all();
        return view('admin.user-management.index', compact('admins'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        abort_unless(Gate::allows('Add AdminUser'), 403);

        $roles = Role::where('name', '!=', 'SuperAdmin')->get();
        return view('admin.user-management.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        abort_unless(Gate::allows('Add AdminUser'), 403);

        try {
            DB::transaction(function () use ($request) {
                $user = User::create([
                    'name' => $request->name,
                    'email' => $request->email,
                    'password' => Hash::make($request->password),
                    'status' => $request->status ?? 'PENDING',
                ]);
                $role = $request->input('role');
                $user->assignRole($role);
            });
            return redirect()->route('admin.usermanagement.index')->with('popsuccess', 'User Successfully Created');
        } catch (\Exception $e) {
            return redirect()->back()->with('poperror', 'Error Creating User: ' . $e->getMessage());
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort_unless(Gate::allows('View AdminUser'), 403);

        $user = User::findOrFail($id);
        return view('admin.user-management.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        abort_unless(Gate::allows('Edit AdminUser'), 403);

        $user = User::findOrFail($id);
        $roles = Role::where('name', '!=', 'SuperAdmin')->get();
        $userRole = $user->roles->first();

        return view('admin.user-management.edit', compact('user', 'roles', 'userRole'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, string $id)
    {
        abort_unless(Gate::allows('Edit AdminUser'), 403);

        try {
            DB::transaction(function () use ($request, $id) {
                $user = User::findOrFail($id);

                $user->update([
                    'name' => $request->name,
                    'email' => $request->email,
                    'status' => $request->status,
                ]);

                // Update role
                $user->syncRoles([$request->role]);
            });

            return redirect()->route('admin.usermanagement.index')->with('popsuccess', 'User Successfully Updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('poperror', 'Error Updating User: ' . $e->getMessage());
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        abort_unless(Gate::allows('Delete AdminUser'), 403);

        try {
            $user = User::findOrFail($id);

            // Prevent deletion of SuperAdmin users
            if ($user->hasRole('SuperAdmin')) {
                return redirect()->back()->with('poperror', 'Cannot delete SuperAdmin user');
            }

            $user->delete();
            return redirect()->route('admin.usermanagement.index')->with('popsuccess', 'User Successfully Deleted');
        } catch (\Exception $e) {
            return redirect()->back()->with('poperror', 'Error Deleting User: ' . $e->getMessage());
        }
    }

    /**
     * Show the form for changing password.
     */
    public function changePassword(string $id)
    {
        $user = User::findOrFail($id);
        return view('admin.user-management.change-password', compact('user'));
    }

    /**
     * Update the user's password.
     */
    public function updatePassword(ChangePasswordRequest $request, string $id)
    {
        try {
            $user = User::findOrFail($id);

            $user->update([
                'password' => Hash::make($request->password),
            ]);

            return redirect()->route('admin.usermanagement.index')->with('popsuccess', 'Password Successfully Updated');
        } catch (\Exception $e) {
            return redirect()->back()->with('poperror', 'Error Updating Password: ' . $e->getMessage());
        }
    }

    /**
     * Update the user's status.
     */
    public function updateStatus(Request $request, string $id)
    {
        try {
            $request->validate([
                'status' => 'required|in:VERIFIED,PENDING',
            ]);

            $user = User::findOrFail($id);
            $user->update(['status' => $request->status]);

            return response()->json([
                'success' => true,
                'message' => 'Status updated successfully',
                'status' => $request->status
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error updating status: ' . $e->getMessage()
            ], 500);
        }
    }
}
