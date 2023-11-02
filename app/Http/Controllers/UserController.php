<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

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

    public function show(string $id) {
        $user = User::findOrFail($id);
        $user->user_info = json_decode($user->user_info);
        
        // return $user;
        return view('admin.users.show', ['user' => $user]);
    }

    public function updateVendor(User $vendor) {
        $vendor->user_info = json_decode($vendor->user_info);
        
        // return $vendor;

        return view('admin.vendors.edit', ['vendor' => $vendor]);
    }
}
