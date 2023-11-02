@extends('layouts.administrator')

@section('content')
  <!-- Profile Information -->
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Service Details</h4>
        <form class="form-style-2">
          @csrf
          @method('patch')

          <div id="general_field">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">ID</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" id="id" name="id" value="{{ $service->id }}" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Status</label>
                  <div class="col-sm-9">
                    <div class="btn-group" role="group" aria-label="Basic example">
                      <span class="badge {{ ($service->service_enable == 1) ? 'bg-success' : 'bg-secondary' }} text-light">{{ ($service->service_enable == 1) ? 'Enabled' : 'Disabled'}}</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Name</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" id="name" name="name" value="{{ $service->service_name }}" readonly />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description" readonly>{{ $service->service_desc }}</textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @switch ($service->vendor->user_info->business_category)
              @case('venue')
                  <div id="venue_field">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Maximum guest capacity</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="guest_count" name="guest_count" value="{{ $service->service_guest_count }}" readonly />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Price per night (RM)</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="price" name="price" value="{{ $service->service_price }}" readonly />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @break
          
              @case('wedding_rentals')
                  <div id="wedding_rentals_field">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Count of guest</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="guest_count" name="guest_count" value="{{ $service->service_guest_count }}" readonly />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Price (RM)</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="price" name="price" value="{{ $service->service_price }}" readonly />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @break
          
              @case('catering')
                  <div id="catering_field">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price per table (RM)</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="number" id="price" name="price" value="{{ $service->service_price }}" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  @break

              @case('stylist')
                  <div id="stylist_field">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Price per pax (RM)</label>
                            <div class="col-sm-9">
                              <input class="form-control" type="number" id="price" name="price" value="{{ $service->service_price }}" readonly />
                            </div>
                          </div>
                        </div>
                      </div>
                  </div>
                  @break

              @case('photography_and_videography')
                  <div id="photography_and_videography_field">
                    <!-- <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Durations (hours)</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="photography_and_videography_duration" name="photography_and_videography_duration" min="1" step="1" placeholder="Eg. 4, 8, ..." required />
                          </div>
                        </div>
                      </div>
                    </div> -->

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Price (RM)</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="price" name="price" value="{{ $service->service_price }}" readonly />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @break

              @default
                  @break
          @endswitch

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Vendor</label>
                <div class="col-sm-9">
                  <a href="{{ route('vendors.edit', ['vendor' => $service->vendor]) }}" target="_blank" class="form-control-plaintext">{{ $service->vendor->name }}</a>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-6">
              <div class="form-group row">
                <label class="col-sm-3 col-form-label">Created At</label>
                <div class="col-sm-9">
                  <input class="form-control" type="text" id="created_at" name="created_at" value="{{ $service->created_at }}" readonly />
                </div>
              </div>
            </div>
          </div>
          
          <a href="{{ route('admin.services.index') }}" class="btn btn-secondary">Back</a>
        </form>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
<script>
function selectButton(selectedValue) {
  const radioButtons = document.getElementsByName("service_enable");

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