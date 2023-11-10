@extends('layouts.app')
    
@section('content')
  @php
    $business_categories = array("venue", "wedding_rentals", "catering", "stylist", "photography_and_videography");   
  @endphp

  <section class="section novi-background bg-cover section-lg bg-gray-100" id="team">
      <div class="container">
        <h3 class="wow fadeInLeft text-center">Create your dream wedding team</h3>
        <p class="title-style-1 wow fadeInRight text-center">You're one step away from completing your planning.</p>
        
        <p class="mt-5 mb-4 ms-2">Considering your budget and preferences, we've recommended two suitable vendors for each type of service. You can choose your preferred vendor from these options for each service below:</p>

        <form action="{{ route('projects.store') }}" method="post">
          @csrf
          <div class="accordion" id="accordionExample">
            @foreach ($business_categories as $category)
              @if (array_key_exists($category, $form_data))
                @php
                  $category_label = ucfirst(str_replace('_', ' ', $category));
                  $category_services = $recommendations->where('vendor.business_category', $category);
                @endphp

                <div class="accordion-item">
                  <!-- Service Category Header -->
                  <h2 class="accordion-header" id="heading_{{ $category }}">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_{{ $category }}" aria-expanded="true" aria-controls="collapse_{{ $category }}">
                      <b>{{ $category_label }}</b>
                    </button>
                  </h2>

                  <!-- Service Body -->
                  <div id="collapse_{{ $category }}" class="accordion-collapse collapse show" aria-labelledby="heading_{{ $category }}">
                    <div class="accordion-body">
                      <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                        @if (count($category_services) == 0)
                          <p>Sorry, we couldn't find any vendors matching your budget or preferences.</p>
                        @else
                          @foreach ($category_services as $category_service)
                            <input type="radio" class="btn-check" name="{{ $category }}" value="{{ $category_service->id }}" id="{{ $category_service->id }}" autocomplete="off" onchange="updateCheckIcon(this)" {{ $loop->first ? 'checked' : '' }}>
                            <label class="btn btn-light border-0 col-6 text-start px-5 pt-5 pb-3" for="{{ $category_service->id }}">
                              <div class="pb-5">
                                <!-- Check Icon -->
                                <div class="row text-end">
                                  <i class="row text-end {{ $loop->first ? 'fa-solid fa-circle-check' : 'fa-regular fa-circle-check' }} fs-3 fst-normal py-2 pe-4"></i>
                                </div>

                                <!-- Service Name -->
                                <h5 class="mb-3 text-center">{{ $category_service->service_name }}</h5>
                                <!-- <p>[ Log ] Service Price: {{ $category_service->service_price }}</p> -->
                                <p class="pb-3">
                                  @php 
                                    $vendor_info = json_decode($category_service->vendor->user_info, true);
                                  @endphp
                                  <!-- Vendor Phone No-->
                                  <i class="fa-solid fa-phone pe-2"></i> <a href="tel:+6{{ $vendor_info['phone'] }}"> +6{{ $vendor_info['phone'] }}</a><br/>

                                  <!-- Vendor Email-->
                                  <i class="fa-solid fa-envelope text-normal pe-2"></i> <a href="mailto:{{ $category_service->vendor->email }}"> {{ $category_service->vendor->email }}</a><br/>

                                  <!-- Vendor Address -->
                                  <i class="fa-solid fa-location-dot pe-2"></i>&nbsp;
                                  {{ $vendor_info['address'] }},
                                  {{ $vendor_info['postal_code'] }} 
                                  {{ $vendor_info['city'] }},
                                  {{ ucfirst(str_replace('_', ' ', $vendor_info['state'])) }}.
                                  <br/>

                                  <!-- Vendor Website -->
                                <i class="fa-solid fa-link pe-1"></i> <a href="{{ $vendor_info['website_link'] }}" target="_blank"> {{ $vendor_info['website_link'] }}</a>
                                </p>

                                <hr>

                                <!-- Service Details -->
                                @if ($category == "venue" || $category == "wedding_rentals")
                                  <p class="pt-3">Maximum Guest Capacity: {{ $category_service->service_guest_count }}</p>
                                @endif

                                <!-- Service Description -->
                                <p style="text-align: justify">{{ $category_service->service_desc }}</p>
                              </div>
                            </label>
                          @endforeach
                        @endif
                        

                      </div>
                    </div>
                  </div>
                </div>
              @endif
            @endforeach

            {{-- If user are getting new vendor recommendation because of vendor decline --}}
            @if (isset($form_data['decline']))
              <input type="hidden" name="decline" value="true">
              <input type="hidden" name="project_id" value="{{ $form_data['project_id'] }}">
            @else
              <!-- Wedding Title -->
              <div class="row">
                <label for="project_name" class="col-2 col-form-label form-label-2">Wedding Title</label>
                <div class="col-10">
                <input class="form-input" type="text" name="project_name" id="project_name" placeholder="eg. John & Jane" required>
                </div>
              </div>

              <!-- Remark -->
              <div class="row">
                <label for="remark" class="col-2 col-form-label form-label-2">Remark</label>
                <div class="col-10">
                  <textarea class="form-input" name="remark" id="remark" maxlength="500"></textarea>
                  <div class="text-secondary mt-3 input-desc">Any additional remark or request you would like to mention.</div>
                </div>
              </div>

              <input type="hidden" name="wedding_date" value="{{ $form_data['wedding_date'] }}">

              @foreach ($form_data as $key => $value) 
                @if ($key != '_token' && $key != 'wedding_date' && !in_array($key, $business_categories))
                  <input type="hidden" name="project_details[{{ $key }}]" value="{{ $value }}"/>
                @endif
              @endforeach
            @endif
            
            <!-- <div class="accordion-item">
              <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  <b>Venue</b>
                </button>
              </h2>
              <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingOne">
                <div class="accordion-body">
                  <div class="btn-group w-100" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" name="venue" id="venue1" autocomplete="off" onchange="updateCheckIcon(this)" checked>
                    <label class="btn btn-light border-0" for="venue1">
                      <div class="pb-5">
                        <div class="row text-end">
                          <i class="row text-end fa fa-check-circle fs-3 fst-normal py-2 pe-4"></i>
                        </div>

                        <h5 class="mb-3">Company A</h5>
                        <a href="#"><i class="fa fa-link"></i> www.company_a.com</a>
                        <p class="mt-5">This a service description.</p>
                      </div>
                    </label>

                    <input type="radio" class="btn-check" name="venue" id="venue2" autocomplete="off" onchange="updateCheckIcon(this)">
                    <label class="btn btn-light border-0" for="venue2">
                      <div class="pb-5">
                        <div class="row text-end">
                          <i class="fa fa-check-circle-o fs-3 fst-normal py-2 pe-4"></i>
                        </div>

                        <h5 class="mb-3">Company B</h5>
                        <a href="#"><i class="fa fa-link"></i> www.company_b.com</a>
                        <p class="mt-5">This a service description.</p>
                      </div>
                    </label>
                  </div>
                </div>
              </div>
            </div> -->

            <div class="row form-button col-2 mx-auto mt-5">
              <button class="button button-jerry button-primary" type="submit">Confirm Package
                <span class="button-jerry-line"></span>
                <span class="button-jerry-line"></span>
                <span class="button-jerry-line"></span>
                <span class="button-jerry-line"></span>
              </button>
            </div>
            
          </div>
        </form>

      </div>
  </section>
@endsection

@push('scripts')
  <script>
    function updateCheckIcon(radioBtn) {
      const radioBtns = document.querySelectorAll(`input[type="radio"][name="${radioBtn.name}"]`);
      
      radioBtns.forEach((btn) => {
        const label = document.querySelector(`label[for="${btn.id}"]`);
        const icon = label.querySelector('i');

        if (btn === radioBtn) {
          icon.classList.replace('fa-regular', 'fa-solid');
        } else {
          icon.classList.replace('fa-solid', 'fa-regular');
        }
      });
    }
  </script>
@endpush