@extends('layouts.administrator')

@section('content')

<h3 class="pl-3 pb-3">Admin Details</h3>

<!-- Profile Information -->

<div class="card">
  <div class="card-body">
    <form class="form-style-2">

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">ID</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="id" name="id" value="{{ $admin->id }}" readonly />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Name</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="name" name="name" value="{{ $admin->name }}" readonly />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">E-mail</label>
            <div class="col-sm-9">
              <input class="form-control" type="email" id="email" name="email" value="{{ $admin->email }}" readonly />
            </div>
          </div>
        </div>
      </div>

      <div class="row">
        <div class="col-md-6">
          <div class="form-group row">
            <label class="col-sm-3 col-form-label">Created At</label>
            <div class="col-sm-9">
              <input class="form-control" type="text" id="created_at" name="created_at" value="{{ $admin->created_at }}" readonly />
            </div>
          </div>
        </div>
      </div>
      
      <!-- <input type="submit" class="btn btn-primary" value="Update"> -->
      <a href="{{ route('admins.index') }}" class="btn btn-secondary">Back</a>
    </form>
  </div>
</div>

@endsection