@extends('layouts.administrator')

@section('content')

<h3 class="pl-3 pb-3">Vendor Details</h3>


<!-- Profile Information -->
<div class="row">
  <div class="col">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Basic Information</h4>
        <form class="form-style-2" action="{{ route('vendors.update', ['vendor' => $vendor]) }}" method="post">
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
                  <label class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-9">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <label class="btn btn-sm @if($vendor->user_info->enable == 1) btn-primary @else btn-outline-primary @endif">
                        <input type="radio" style="display:none" name="user_info[enable]" value="1" @if($vendor->user_info->enable == 1) checked @endif onclick="selectButton(this.value)"> Enable
                      </label>
                      <label class="btn btn-sm @if($vendor->user_info->enable == 0) btn-primary @else btn-outline-primary @endif">
                        <input type="radio" style="display:none" name="user_info[enable]" value="0" @if($vendor->user_info->enable == 0) checked @endif onclick="selectButton(this.value)"> Disable
                      </label>
                    </div>
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
                  <input class="form-control" type="tel" id="phone" name="user_info[phone]" value="{{ $vendor->user_info->phone }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Website Link</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="phone" name="user_info[website_link]" value="{{ $vendor->user_info->website_link }}" readonly />
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
          
          <input type="submit" class="btn btn-primary" value="Update">
          <a href="{{ route('vendors.index') }}" class="btn btn-secondary">Back</a>
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
                  <input type="hidden" id="business_category" name="user_info[business_category]" value="{{ $vendor->user_info->business_category }}"  />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Address</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="address" name="user_info[address]" value="{{ $vendor->user_info->address }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">State</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="state" name="user_info[state]" value="{{ ucwords(str_replace('_', ' ', $vendor->user_info->state)) }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">City</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="city" name="user_info[city]" value="{{ $vendor->user_info->city }}" readonly />
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Postal Code</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="postal_code" name="user_info[postal_code]" value="{{ $vendor->user_info->postal_code }}" readonly />
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

@push('scripts')
<script>
function selectButton(selectedValue) {
  const radioButtons = document.getElementsByName("user_info[enable]");

  for (let i = 0; i < radioButtons.length; i++) {
    const label = radioButtons[i].parentElement;
    if (radioButtons[i].value === selectedValue) {
      label.classList.add("btn-primary");
      label.classList.remove("btn-outline-primary");
    } else {
      label.classList.remove("btn-primary");
      label.classList.add("btn-outline-primary");
    }
  }
}
</script>
@endpush