@extends('layouts.administrator')

@section('content')

<h3 class="pl-3 pb-3">Vendor Details</h3>


<!-- Profile Information -->
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic Information</h4>
        <form class="form-style-2" action="{{ route('vendors.edit', ['vendor' => $vendor]) }}" method="post">
          @csrf
          @method('patch')

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">ID</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="id" name="id" value="{{ $vendor->id }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Name</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="name" name="name" value="{{ $vendor->name }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">E-mail</label>
                <div class="col-sm-9">
                  <input class="form-control" type="email" id="email" name="email" value="{{ $vendor->email }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Phone</label>
                <div class="col-sm-9">
                  <input class="form-control" type="tel" id="phone" name="phone" value="{{ $vendor->user_info->phone }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Created At</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="created_at" name="created_at" value="{{ $vendor->created_at }}" readonly />
                </div>
              </div>
            </div>
          </div>
          
          <!-- <input type="submit" class="btn btn-primary" value="Update"> -->
          <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>

  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Details Information</h4>
          @csrf
          @method('patch')

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Business Category</label>
                <div class="col-sm-9 d-flex align-items-center">
                  <span class="badge bg-secondary text-light">{{ ucwords(str_replace('_', ' ', $vendor->user_info->business_category)) }}</span>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="address" name="address" value="{{ $vendor->user_info->address }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">State</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="state" name="state" value="{{ ucwords(str_replace('_', ' ', $vendor->user_info->state)) }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="city" name="city" value="{{ $vendor->user_info->city }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Postal Code</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="postal_code" name="postal_code" value="{{ $vendor->user_info->postal_code }}" readonly />
                </div>
              </div>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection