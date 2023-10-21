
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="images/favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    
    @include('layouts.site-navbar')

    @php
      $business_category = array("venue", "wedding_rentals", "catering", "stylist", "photography_and_videography");
    @endphp

    <section class="section novi-background bg-cover section-lg bg-gray-100" id="team">
        <div class="container">
          <h3 class="wow fadeInLeft text-center">Create your dream wedding team</h3>
          <p class="title-style-1 wow fadeInRight text-center">You're one step away from completing your planning.</p>
          
          <p class="mt-5 mb-4 ms-2">Considering your budget and preferences, we've recommended two suitable vendors for each type of service. You can choose your preferred vendor from these options for each service below:</p>

          <form action="{{ route('projects.store') }}" method="post">
            @csrf
            <div class="accordion" id="accordionExample">
              @foreach ($business_category as $category)
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

                        @foreach ($category_services as $category_service)
                          <input type="radio" class="btn-check" name="{{ $category }}" value="{{ $category_service->id }}" id="{{ $category_service->id }}" autocomplete="off" onchange="updateCheckIcon(this)" {{ $loop->first ? 'checked' : '' }}>
                          <label class="btn btn-light border-0" for="{{ $category_service->id }}">
                            <div class="pb-5">
                              <!-- Check Icon -->
                              <div class="row text-end">
                                <i class="row text-end fa fa-{{ $loop->first ? 'check-circle' : 'check-circle-o' }} fs-3 fst-normal py-2 pe-4"></i>
                              </div>

                              <!-- Service Name -->
                              <h5 class="mb-3">{{ $category_service->service_name }}</h5>
                              <p>[ Log ] Service Price: {{ $category_service->service_price }}</p>
                              <p>
                                @php 
                                  $vendor_info = json_decode($category_service->vendor->user_info, true);
                                @endphp
                                <!-- Vendor Phone No-->
                                <a href="tel:+6{{ $vendor_info['phone'] }}">+6{{ $vendor_info['phone'] }}</a><br/>
                                <a href="mailto:{{ $category_service->vendor->email }}"><i class="fa fa-envelope text-normal"></i> {{ $category_service->vendor->email }}</a><br/>

                                <!-- Vendor Address -->
                                {{ $vendor_info['address'] }},
                                {{ $vendor_info['postal_code'] }} 
                                {{ $vendor_info['city'] }},
                                {{ ucfirst(str_replace('_', ' ', $vendor_info['state'])) }}.
                              </p>

                              <!-- Vendor Website -->
                              <a href="#"><i class="fa fa-link"></i> www.company_a.com</a>

                              <!-- Service Details -->
                              @if ($category == "venue" || $category == "wedding_rentals")
                                <p>Maximum Guest Capacity: {{ $category_service->service_guest_count }}</p>
                              @endif

                              <!-- Service Description -->
                              <p>{{ $category_service->service_desc }}</p>
                            </div>
                          </label>
                        @endforeach

                      </div>
                    </div>
                  </div>
                </div>
              @endforeach

              <!-- Remark -->
              <div class="row">
                <label for="remark" class="col-2 col-form-label form-label-2">Remark</label>
                <div class="col-10">
                  <textarea class="form-input" name="remark" id="remark" maxlength="500"></textarea>
                  <div class="text-secondary mt-3 input-desc">Any additional remark or request you would like to mention.</div>
                </div>
              </div>

              <input type="hidden" name="wedding_date" value="{{ $wedding_date }}">
              
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

    
    <footer class="section novi-background bg-cover section-sm footer-classic context-dark" id="contacts">
    <div class="container"><a class="brand wow blurIn" href="index.html"><img src="images/logo-inverse-2-108x124.png" alt="" width="54" height="62"/></a>
        <ul class="contacts-modern footer-classic-list">
        <li class="wow fadeInLeft"><a class="heading-3" href="tel:#">1-800-901-234</a></li>
        <li class="wow fadeInRight"><a class="heading-3" href="mailto:#">info@delavish.com</a></li>
        </ul>
        <ul class="list-inline list-inline-xxl list-social footer-classic-list">
        <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
        <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
        <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
        </ul>
        <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>De Lavish</span><span>. All Rights Reserved.</span></p>
    </div>
    </footer>  

    <div class="snackbars" id="form-output-global"></div>

    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <script src="{{ asset('js/bootstrap.js') }}"></script>

    <script>
      function updateCheckIcon(radioBtn) {
        const radioBtns = document.querySelectorAll(`input[type="radio"][name="${radioBtn.name}"]`);
        
        radioBtns.forEach((btn) => {
          const label = document.querySelector(`label[for="${btn.id}"]`);
          const icon = label.querySelector('i');

          if (btn === radioBtn) {
            icon.classList.replace('fa-check-circle-o', 'fa-check-circle');
          } else {
            icon.classList.replace('fa-check-circle', 'fa-check-circle-o');
          }
        });
      }

      // // handle checked icon based on radio button state
      // document.addEventListener("DOMContentLoaded", function() {
      //   const radioButtons = document.querySelectorAll(".btn-check");
      //   const icons = document.querySelectorAll(".btn-group i.fa");

      //   radioButtons.forEach(function(radioButton, index) {
      //     radioButton.addEventListener("change", function() {
      //       if (radioButton.checked) {
      //         icons[index].classList.remove("fa-check-circle-o");
      //         icons[index].classList.add("fa-check-circle");
      //       } else {
      //         icons[index].classList.remove("fa-check-circle");
      //         icons[index].classList.add("fa-check-circle-o");
      //       }
      //     });
      //   });
      // });
    </script>
    
    <script>
      // function swapVendor(button, service_category) {
      //   // Find the parent accordion item
      //   var accordionItem = button.closest(".accordion-item");

      //   // Find the accordion header and body elements within this accordion item
      //   var accordionHeader = accordionItem.querySelector(".accordion-header");
      //   var accordionBody = accordionItem.querySelector(".accordion-body");

      //   var currentDate = new Date();
      //   var currentSeconds = currentDate.getSeconds();

      //   // Change the accordion heading text
      //   accordionHeader.querySelector("button").innerHTML = `<b>${service_category}</b>&nbsp; - Company ${currentSeconds}`;

      //   // Change the accordion body content
      //   accordionBody.innerHTML = `
      //     <p class="text-end mb-3 ">
      //       <a href="#" class="text-decoration-none" role="button" onclick="swapVendor(this, '${service_category}')">Swap Vendor <i class="fa fa-refresh"></i></a>
      //     </p>
      //     New services description. ${currentSeconds}`;
      // }
    </script>
  </body>
</html>