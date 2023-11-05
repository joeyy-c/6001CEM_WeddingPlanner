@extends('layouts.app')
        
@section('content')
  <section class="section novi-background bg-cover section-lg bg-gray-100">

    <div class="d-flex justify-content-center ">
        <div class="col-4 border-primary p-5 wow blurIn" style="visibility: visible; animation-name: blurIn;">

            <h4>Reset Password</h4>

            <form class="form-style-2 mt-5" method="POST" action="{{ route('password.store') }}">
                @csrf

                <!-- Session Status -->
                @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                @endif

                <!-- E-mail -->
                <div class="form-wrap mb-5">
                    <label class="form-label-2" for="email">E-mail</label>
                    <input class="form-input" id="email" type="email" name="email" value="{{ old('email', $request->email) }}" required autofocus autocomplete="username">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                 <!-- Password -->
                 <div class="form-wrap mb-5">
                    <label class="form-label-2" for="password">Password</label>
                    <input class="form-input" id="password" type="password" name="password" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                 <!-- Confirm Password -->
                 <div class="form-wrap mb-5">
                    <label class="form-label-2" for="password_confirmation">Confirm Password</label>
                    <input class="form-input" id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <!-- Password Reset Token -->
                <input type="hidden" name="token" value="{{ $request->route('token') }}">

                <div class="d-flex align-items-center justify-content-end mt-5">
                    <button class="button button-jerry button-primary-dark ms-3" type="submit">
                        Reset Password
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