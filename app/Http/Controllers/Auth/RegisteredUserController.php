<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    public function createVendor(): View
    {
        return view('auth.vendor-register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate(
            [
                'name' => ['required', 'string', 'max:255'],
                'email' => ['required', 'string', 'email', 'max:255', 'unique:'.User::class],
                'password' => ['required', 'confirmed', Rules\Password::defaults()],
                'user_info.phone' => ['numeric', 'digits_between:9,11', new \App\Rules\PhoneNumber],
                'user_info.postal_code' => ['numeric', 'digits:5'],
            ], 
            [
                'user_info.phone' => 'The phone number is in an incorrect format.', 
                'user_info.postal_code' => 'The postal code must be 5 digits.', 
            ]
        );

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_info' => $request->user_info ? json_encode($request->user_info) : '{}',
            'role_id' => isset($request->user_info['business_category']) ? 3 : 1,
        ]);

        event(new Registered($user));

        Auth::login($user);

        // Identify role
        $user = Auth::user();

        if ($user->role->role_name == 'User') {
            return redirect()->intended(RouteServiceProvider::USER_DASHBOARD);
        } elseif ($user->role->role_name == 'Vendor') {
            return redirect()->intended(RouteServiceProvider::VENDOR_DASHBOARD);
        } else {
            return redirect('/'); // Default redirect 
        }

        // return redirect(RouteServiceProvider::HOME);
    }
}
