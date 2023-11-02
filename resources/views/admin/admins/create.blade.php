@extends('layouts.administrator')

@section('content')
  <!-- Profile Information -->
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Admin</h4>
        <form class="form-style-2" action="{{ route('register') }}" method="post">
          @csrf
          @method('post')

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input class="form-control" id="name" type="text" name="name" value="{{ old('name') }}" required autofocus autocomplete="name">
                  <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-9">
                  <input class="form-control" id="email" type="email" name="email" value="{{ old('email') }}" required>
                  <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Password</label>
                <div class="col-sm-9">
                  <input class="form-control" id="password" type="password" name="password" required>
                  <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Confirm Password</label>
                <div class="col-sm-9">
                  <input class="form-control" id="password_confirmation" type="password" name="password_confirmation" required>
                  <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>
              </div>
            </div>
          </div>
          
          <input type="hidden" name="admin" value="true">
          
          <input type="submit" class="btn btn-primary" value="Add">
          <a href="{{ route('admins.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection