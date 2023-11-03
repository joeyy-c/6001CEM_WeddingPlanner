<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        $user = $request->user()->load('role');
        $user->user_info = json_decode($user->user_info);
        
        // return $user;

        if ($user->role->role_name == 'User') {
            return view('profile.edit', [
                'user' => $request->user(),
            ]);
        }
        else if ($user->role->role_name == 'Vendor') {
            return view('profile.vendor-edit', [
                'user' => $request->user(),
            ]);
        }
        
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());  

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        $user = $request->user()->load('role');

        // return $user;

        if ($user->role->role_name == 'User') {
            return Redirect::route('userProfile.edit')->with('status', 'profile-updated');
        }
        else if ($user->role->role_name == 'Vendor') {
            return Redirect::route('vendorProfile.edit')->with('status', 'profile-updated');
        }

    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
}
