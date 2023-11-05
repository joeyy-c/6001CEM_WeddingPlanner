@extends('layouts.app')
        
@section('content')
  <section class="section novi-background bg-cover section-lg bg-gray-100">

    <div class="d-flex justify-content-center ">
        <div class="col-4 border-primary p-5 wow blurIn" style="visibility: visible; animation-name: blurIn;">

            <h4>Forgot Password</h4>
            <p>Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.</p>

            <form class="form-style-2 mt-5" method="POST" action="{{ route('password.email') }}">
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
                    <input class="form-input" id="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <div class="d-flex align-items-center justify-content-end mt-5">
                    <button class="button button-jerry button-primary-dark ms-3" type="submit">
                        Email Password Reset Link
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