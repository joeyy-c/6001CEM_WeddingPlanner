@extends('layouts.app')
        
@section('content')
  <section class="section novi-background bg-cover section-lg bg-gray-100">

    <div class="d-flex justify-content-center ">
        <div class="col-4 border-primary p-5 wow blurIn" style="visibility: visible; animation-name: blurIn;">

            <!-- Session Status -->
            <x-auth-session-status class="mb-4" :status="session('status')" />

            <h4>Hello, welcome back!</h4>

            <form class="form-style-2 mt-5" method="POST" action="{{ route('login') }}">
                @csrf

                <!-- E-mail -->
                <div class="form-wrap mb-5">
                    <label class="form-label-2" for="email">E-mail</label>
                    <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="form-wrap mb-3">
                    <label class="form-label-2" for="password">Password</label>
                    <input class="form-input" id="password" type="password" name="password" required autocomplete="current-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- <div class="form-wrap mb-5">
                    <label class="form-label-2" for="remember_me">Remember me</label>
                    <input id="remember_me" type="checkbox" name="remember"> Remember me
                </div> -->

                <!-- Email Address -->
                <!-- <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div> -->

                <!-- Password -->
                <!-- <div class="mt-4">
                    <x-input-label for="password" :value="__('Password')" />

                    <x-text-input id="password" class="block mt-1 w-full"
                                    type="password"
                                    name="password"
                                    required autocomplete="current-password" />

                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div> -->

                <!-- Remember Me -->
                <!-- <div class="block mt-4">
                    <label for="remember_me" class="inline-flex items-center">
                        <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                        <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
                    </label>
                </div> -->

                <div class="d-flex align-items-center justify-content-end mt-5">
                    @if (Route::has('password.request'))
                        <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                            {{ __('Forgot your password?') }}
                        </a>
                    @endif

                    <button class="button button-jerry button-primary-dark ms-3" type="submit">
                        Login
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