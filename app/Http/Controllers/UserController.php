<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Models\ProjectService;
use App\Models\Project;

class UserController extends Controller
{
    public function indexVendor() {
        $user = Auth::user();
        $vendors = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Vendor');
        })->get();

        foreach ($vendors as $vendor) {
            $vendor->user_info = json_decode($vendor->user_info);
        }

        // return $vendors;

        return view('admin.vendors.index', ['vendors' => $vendors]);
    }

    public function indexUser() {
        $user = Auth::user();
        $users = User::whereHas('role', function ($query) {
            $query->where('role_name', 'User');
        })->get();

        foreach ($users as $user) {
            $user->user_info = json_decode($user->user_info);
        }

        // return $users;

        return view('admin.users.index', ['users' => $users]);
    }

    public function indexAdmin() {
        $admin = Auth::user();
        $admins = User::whereHas('role', function ($query) {
            $query->where('role_name', 'Admin');
        })->get();

        foreach ($admins as $admin) {
            $admin->user_info = json_decode($admin->user_info);
        }

        // return $admins;

        return view('admin.admins.index', ['admins' => $admins]);
    }

    public function create() {
        return view('admin.admins.create');
    }

    public function show(string $id) {
        $user = User::with('role')->findOrFail($id);
        $user->user_info = json_decode($user->user_info);
        
        // return $user;

        if ($user->role->role_name == 'User') {
            return view('admin.users.show', ['user' => $user]);
        }
        else {
            return view('admin.admins.show', ['admin' => $user]);
        }
    }

    public function editVendor(User $vendor) {
        $vendor->user_info = json_decode($vendor->user_info);
        
        // return $vendor;

        return view('admin.vendors.edit', ['vendor' => $vendor]);
    }

    public function updateVendor(User $vendor, Request $request) {
        $updateVendor = $vendor->update([
            'user_info' => json_encode($request->input('user_info'))
        ]);

        if (!$request->input('user_info')['enable']) {
            // cancel all project by this vendor
            ProjectService::whereHas('service', function ($query) use ($vendor) {
                $query->where('vendor_id', $vendor->id);
            })->update([
                'status' => 'Cancelled',
            ]);
        }

        if ($updateVendor) {
            return redirect()->route('vendors.index')->with('success', 'Vendor #' . $vendor->id . ' has been successfully ' . ($request->input('user_info')['enable'] ? 'enabled.' : 'disabled.'));
        } else {
            return redirect()->route('vendors.index')->with('error', 'Failed to update vendor #' . $vendor->id . '.');
        }
    }

    public function destroy(User $user) {
        $project = Project::where('cust_id', $user->id)->first();

        if ($project) {
            $project->projectServices()->delete(); // Delete project_services of this project
            $project->delete();
        }

        $user->delete();

        return redirect()->route('users.index')->with('success', 'User has been successfully deleted.');
    }
}
