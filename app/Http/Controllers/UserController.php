<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index() {
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

    public function updateVendor(User $vendor) {
        $vendor->user_info = json_decode($vendor->user_info);
        
        // return $vendor;

        return view('admin.vendors.edit', ['vendor' => $vendor]);
    }
}
