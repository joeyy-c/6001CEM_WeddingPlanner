@extends('layouts.administrator')

@section('content')
  <!-- Profile Information -->
  <div class="col-12 grid-margin">
    <div class="card">
      <div class="card-body">
        <h4 class="card-title">Add Service</h4>
        <form class="form-style-2" action="{{ route('vendor.services.store') }}" method="post">
          @csrf
          @method('post')

          <p class="card-description mb-4">
            Add your service details to showcase your offerings on our platform.
          </p>

          <div id="general_field">
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Service Name</label>
                  <div class="col-sm-9">
                    <input class="form-control" type="text" id="name" name="name" required />
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-md-6">
                <div class="form-group row">
                  <label class="col-sm-3 col-form-label">Description</label>
                  <div class="col-sm-9">
                    <textarea class="form-control" id="description" name="description" placeholder="The details of this service. What is included in this service?" required></textarea>
                  </div>
                </div>
              </div>
            </div>
          </div>

          @switch (json_decode(Auth::user()->user_info)->business_category)
              @case('venue')
                  <div id="venue_field">
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Maximum guest capacity</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="guest_count" name="guest_count" min="1" step="1" placeholder="Eg. 200, 400, 600, ..." required />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Price per night (RM)</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="price" name="price" min="1" step="0.01" required />
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
                            <input class="form-control" type="number" id="guest_count" name="guest_count" min="1" step="1" placeholder="Eg. 200, 400, 600, ..." required />
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group row">
                          <label class="col-sm-3 col-form-label">Price (RM)</label>
                          <div class="col-sm-9">
                            <input class="form-control" type="number" id="price" name="price" min="1" required />
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
                              <input class="form-control" type="number" id="price" name="price" min="1" required />
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
                              <input class="form-control" type="number" id="price" name="price" min="1" required />
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
                            <input class="form-control" type="number" id="price" name="price" min="1" required />
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                  @break

              @default
                  @break
          @endswitch
          
          <input type="submit" class="btn btn-primary" value="Add">
          <a href="{{ route('vendor.services.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
      </div>
    </div>
  </div>
@endsection