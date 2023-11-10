@extends('layouts.app')
        
@section('content')
    <!-- Basic Information -->
    <section class="section novi-background bg-cover section-sm bg-gray-100">

        <div class="d-flex justify-content-center" >
            <div class="col-8 border-primary p-5 wow blurIn" style="visibility: visible; animation-name: blurIn;">

                <h5>Edit Profile</h5>
                <p>Update your account's profile information.</p>

                <form class="form-style-2 mt-5" method="POST" action="{{ route('profile.update') }}">
                    @csrf
                    @method('patch')

                    @if (session('status') === 'profile-updated')
                        <div class="alert alert-success col-8">Profile has been successfully updated.</div>
                    @endif

                    <!-- Name -->
                    <div class="row" style="margin-top: 25px">
                        <label class="form-label-2 col-2" for="name">Name</label>
                        <div class="col-6">
                            <input class="form-input" id="name" type="text" name="name" value="{{ old('name', $user->name) }}" required>
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                    </div>

                    <!-- E-mail -->
                    <div class="row" style="margin-top: 25px">
                        <label class="form-label-2 col-2" for="email">E-mail</label>
                        <div class="col-6">
                            <input class="form-input" id="email" type="email" name="email" value="{{ old('email', $user->email) }}" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Phone -->
                    <div class="row" style="margin-top: 25px">
                        <label class="form-label-2 col-2" for="phone">Phone</label>
                        <div class="col-6">
                            <input class="form-input" id="phone" type="tel" name="user_info[phone]" value="{{ old('user_info.phone', $user->user_info->phone) }}" required>
                            <x-input-error :messages="$errors->get('user_info.phone')" class="mt-2" />
                        </div>
                    </div>

                    <button class="button button-jerry button-primary-dark mt-5" type="submit">
                        Save
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                    </button>
                </form>
            </div>
        </div>

    </section>

    <!-- Change Password -->
    <section class="section novi-background bg-cover section-sm bg-gray-100">

        <div class="d-flex justify-content-center" >
            <div class="col-8 border-primary p-5 wow blurIn" style="visibility: visible; animation-name: blurIn;">

                <h5>Change Password</h5>
                <p>Ensure your account is using a long, random password to stay secure.</p>

                <form class="form-style-2 mt-5" method="POST" action="{{ route('password.update') }}">
                    @csrf
                    @method('put')

                    @if (session('status') === 'password-updated')
                        <div class="alert alert-success col-8">Password has been successfully changed.</div>
                    @endif

                    <!-- Current Password -->
                    <div class="row" style="margin-top: 25px">
                        <label class="form-label-2 col-2" for="current_password">Current Password</label>
                        <div class="col-6">
                            <input class="form-input" id="current_password" type="password" name="current_password" required>
                            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
                        </div>
                    </div>

                    <!-- New Password -->
                    <div class="row" style="margin-top: 25px">
                        <label class="form-label-2 col-2" for="password">New Password</label>
                        <div class="col-6">
                            <input class="form-input" id="password" type="password" name="password" required>
                            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="row" style="margin-top: 25px">
                        <label class="form-label-2 col-2" for="password_confirmation">Confirm Password</label>
                        <div class="col-6">
                            <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required>
                            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
                        </div>
                    </div>

                    <button class="button button-jerry button-primary-dark mt-5" type="submit">
                        Save
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                    </button>
                </form>

            </div>
        </div>

    </section>
@endsection