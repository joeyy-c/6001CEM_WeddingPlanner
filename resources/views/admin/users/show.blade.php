@extends('layouts.administrator')

@section('content')

<h3 class="pl-3 pb-3">User Details</h3>

<!-- Profile Information -->

<div class="card">
  <div class="card-body">
    <h4 class="card-title">Basic Information</h4>
    <form class="form-style-2">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">ID</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="id" name="id" value="{{ $user->id }}" readonly />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="name" name="name" value="{{ $user->name }}" readonly />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">E-mail</label>
            <div class="col-sm-9">
              <input class="form-control" type="email" id="email" name="email" value="{{ $user->email }}" readonly />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Phone</label>
            <div class="col-sm-9">
              <input class="form-control" type="tel" id="phone" name="phone" value="{{ $user->user_info->phone }}" readonly />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Created At</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="created_at" name="created_at" value="{{ $user->created_at }}" readonly />
            </div>
          </div>
        </div>
      </div>
      
      <!-- <input type="submit" class="btn btn-primary" value="Update"> -->
      <a href="{{ route('users.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>

@endsection