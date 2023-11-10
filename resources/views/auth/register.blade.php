@extends('layouts.app')
        
@section('content')
    <section class="section novi-background bg-cover section-lg bg-gray-100">

        <div class="d-flex justify-content-center" >
            <div class="col-4 border-primary p-5 wow blurIn" style="visibility: visible; animation-name: blurIn;">

            <h4>Register</h4>

            <form class="form-style-2 mt-5" method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="form-wrap mb-5">
                    <label class="form-label-2" for="name">Name</label>
                    <input class="form-input" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- E-mail -->
                <div class="form-wrap mb-5">
                    <label class="form-label-2" for="email">E-mail</label>
                    <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                 <!-- Phone -->
                <div class="form-wrap mb-5">
                    <label class="form-label-2" for="phone">Phone</label>
                    <input class="form-input" id="phone" type="tel" name="user_info[phone]" value="{{ old('user_info.phone') }}" required autofocus autocomplete="phone">
                    <x-input-error :messages="$errors->get('user_info.phone')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-wrap mb-5">
                    <label class="form-label-2" for="password">Password</label>
                    <input class="form-input" id="password" type="password" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="form-wrap mb-5">
                    <label class="form-label-2" for="password_confirmation">Confirm Password</label>
                    <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Name -->
                <!-- <div>
                    <x-input-label for="name" value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name" />
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div> -->

                <!-- Email Address -->
                <!-- <div class="mt-4">
                    <x-input-label for="email" value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" value="{{ old('email') }}" required autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div> -->

                <!-- Password -->
                <!-- <div class="mt-4">
                    <x-input-label for="password" value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div> -->

                <!-- Confirm Password -->
                <!-- <div class="mt-4">
                    <x-input-label for="password_confirmation" value="__('Confirm Password')" />

                    <x-text-input id="password_confirmation" class="block mt-1 w-full"
                                    type="password"
                                    name="password_confirmation" required autocomplete="new-password" />

                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div> -->

                <div class="d-flex align-items-center justify-content-end mt-5">
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                        {{ __('Already registered?') }}
                    </a>

                    <button class="button button-jerry button-primary-dark ms-3" type="submit">
                        Register
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                        <span class="button-jerry-line"></span>
                    </button>
                </div>
            </form>

            </div>
        </div>

    </section>
@endsection