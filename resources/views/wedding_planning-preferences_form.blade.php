
<!DOCTYPE html>
<html class="wide wow-animation" lang="en">
  <head>
    <title>Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
    <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800"> -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('css/fonts.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
  </head>
  <body>
    @include('layouts.site-navbar')
    
    <div class="row g-0">
      <div class="col-6">
        <img src="/images/about-us-banner.jpg" style="height: 100%; object-fit: cover;">
      </div>
      <div class="col-6">
        <section class="section novi-background bg-cover section-lg bg-gray-100" id="team">
          <div class="container">
            <h3 class="wow fadeInLeft text-center">Plan your dream wedding with us</h3>
            <p class="title-style-1 wow fadeInRight text-center">Tell us your vision, we'll make it a reality.</p>

            <div class="wow blurIn col-8 mx-auto">
              <form class="form-style-2 mt-5" method="POST" action="{{ route('wedding-planning.getMinBudget') }}">
                @csrf

                <!-- Wedding Date -->
                <div class="row">
                  <p class="fw-bold fs-6 mb-4">Tell us your preferences and desires:</p>
                  <label for="state" class="col-3 col-form-label form-label-2">Wedding Date</label>
                  <div class="col-9">
                    <input class="form-input" type="date" name="wedding_date" id="wedding_date" required>
                  </div>
                </div>

                <!-- State -->
                <div class="row">
                  <label for="state" class="col-3 col-form-label form-label-2">State</label>
                  <div class="col-9">
                    <select class="form-select" name="state" id="state">
                      @php
                          $states = [
                              'johor' => 'Johor',
                              'kedah' => 'Kedah',
                              'kelantan' => 'Kelantan',
                              'malacca' => 'Malacca',
                              'negeri_sembilan' => 'Negeri Sembilan',
                              'pahang' => 'Pahang',
                              'penang' => 'Penang',
                              'perak' => 'Perak',
                              'perlis' => 'Perlis',
                              'sabah' => 'Sabah',
                              'sarawak' => 'Sarawak',
                              'selangor' => 'Selangor',
                              'terengganu' => 'Terengganu',
                          ];
                      @endphp

                      @foreach ($states as $value => $label)
                          <option value="{{ $value }}" {{ old('user_info.state') === $value ? 'selected' : '' }}>{{ $label }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <!-- Guest Count -->
                <div class="row">
                  <label for="guest_count" class="col-3 col-form-label form-label-2">Number of Guest</label>
                  <div class="col-9">
                    <input class="form-input" type="number" name="guest_count" id="guest_count" min="50" step="1" placeholder="Eg. 200" required>
                    <div class="text-secondary mt-3 input-desc">Total number of guests attending your wedding ceremony.</div>
                  </div>
                </div>
    
                <!-- Stylist -->
                <div class="row">
                  <label for="num_of_pax_requiring_stylist" class="col-3 col-form-label form-label-2">Number of Pax requiring Stylist</label>
                  <div class="col-9">
                    <input class="form-input" type="number" name="num_of_pax_requiring_stylist" id="num_of_pax_requiring_stylist" min="0" step="1" placeholder="Eg. 10" required>
                    <div class="text-secondary mt-3 input-desc">The number of people requiring hair and makeup services (including bride and groom).</div>
                  </div>
                </div>
    
                <!-- Photographer and Videographer -->
                <!-- <div class="row mb-5">
                  <label for="photography_videography_duration" class="col-3 col-form-label form-label-2">Duration for Photography and Videography</label>
                  <div class="col-9">
                    <input class="form-input" type="number" name="photography_videography_duration" id="photography_videography_duration" min="0" step="1" placeholder="Eg. 4" required>
                    <div class="text-secondary mt-3 input-desc">The number of hours requiring photography and videography services.</div>
                  </div>
                </div> -->

                <!-- Service Priority -->
                <div class="row">
                  <p class="fw-bold fs-6 mb-4">Select the service that holds the highest priority for you:</p>
                  <label for="catering_priority" class="col-3 col-form-label form-label-2">Highest Priority</label>
                  <div class="col-9 mb-4">
                    <select class="form-select" id="highest_priority" name="highest_priority">
                      @php
                        $business_categories = [
                            'venue' => 'Venue',
                            'wedding_rentals' => 'Wedding Rentals (Table and Chair)',
                            'catering' => 'Catering',
                            'stylist' => 'Stylist',
                            'photography_and_videography' => 'Photography & Videography'
                        ];
                      @endphp

                      @foreach ($business_categories as $value => $label)
                          <option value="{{ $value }}">{{ $label }}</option>
                      @endforeach
                    </select>
                </div>
    
                <!-- Services Priority -->
                <!-- <div class="row">
                  <p class="fw-bold fs-6 mb-4">Prioritize the services by ranking them based on their importance to you:</p>
                  <label for="catering_priority" class="col-3 col-form-label form-label-2">Catering</label>
                  <div class="col-9 mb-4">
                    <select class="form-select" id="catering_priority" name="catering_priority">
                      <option value="3" selected>Most Important</option>
                      <option value="2">Important</option>
                      <option value="1">Least Important</option>
                    </select>
                  </div>
    
                  <label for="stylist_priority" class="col-3 col-form-label form-label-2">Stylist</label>
                  <div class="col-9 mb-4">
                    <select class="form-select" id="stylist_priority" name="stylist_priority" disabled>
                      <option value="3">Most Important</option>
                      <option value="2" selected>Important</option>
                      <option value="1">Least Important</option>
                    </select>
                  </div>
    
                  <label for="venue_priority" class="col-3 col-form-label form-label-2">Venue</label>
                  <div class="col-9">
                    <select class="form-select" id="venue_priority" name="venue_priority" disabled>
                      <option value="3">Most Important</option>
                      <option value="2">Important</option>
                      <option value="1" selected>Least Important</option>
                    </select>
                  </div>
                </div> -->
    
                <!-- Budget -->
                <!-- <div class="row">
                  <label for="budget" class="col-3 col-form-label form-label-2">Budget (RM)</label>
                  <div class="col-9">
                    <input class="form-input" type="number" name="budget" id="budget" min="0" step="1" placeholder="100000" required>
                    <div class="text-secondary mt-3 input-desc">Your budget for the wedding.</div>
                    
                    <div class="text-secondary mt-3 input-desc">
                      <input type="checkbox" name="budget_tolerance" id="budget_tolerance">
                      <label for="budget_tolerance">Allow expenses to exceed budget within 10% tolerances.</label>
                    </div>
                  </div>
                </div> -->

                <!-- <div class="row">
                  <label for="remark" class="col-3 col-form-label form-label-2">Remark</label>
                  <div class="col-9">
                    <textarea class="form-input" name="remark" id="remark" placeholder="Remark"></textarea>
                    <div class="text-secondary mt-3 input-desc">Any remark of additional request you would like to mention.</div>
                  </div>
                </div> -->
    
                <div class="row form-button">
                  <button class="button button-jerry button-primary" type="submit">Proceed
                    <span class="button-jerry-line"></span>
                    <span class="button-jerry-line"></span>
                    <span class="button-jerry-line"></span>
                    <span class="button-jerry-line"></span>
                  </button>
                </div>

                <!-- <div class="row form-button">
                  <a class="button button-jerry button-primary" href="#">Submit
                    <span class="button-jerry-line"></span>
                    <span class="button-jerry-line"></span>
                    <span class="button-jerry-line"></span>
                    <span class="button-jerry-line"></span>
                  </a>
                </div> -->
    
              </form>
            </div>
            
          </div>
        </section>
      </div>
    </div>
    
    <footer class="section novi-background bg-cover section-sm footer-classic context-dark" id="contacts">
    <div class="container"><a class="brand wow blurIn" href="index.html"><img src="/images/logo-inverse-2-108x124.png" alt="" width="54" height="62"/></a>
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
    
    
    <script>
      // const cateringPrioritySelect = document.getElementById("catering_priority");
      // const stylistPrioritySelect = document.getElementById("stylist_priority");
      // const venuePrioritySelect = document.getElementById("venue_priority");

      // // Store the initial options for each select element
      // const initialCateringOptions = cateringPrioritySelect.innerHTML;
      // const initialStylistOptions = stylistPrioritySelect.innerHTML;
      // const initialVenueOptions = venuePrioritySelect.innerHTML;


      // cateringPrioritySelect.addEventListener("change", function () {
      //   // Reset the second and third fields
      //   stylistPrioritySelect.innerHTML = initialStylistOptions;
      //   venuePrioritySelect.innerHTML = initialVenueOptions;

      //   // Get the selected option in the first field
      //   const selectedCateringOption = cateringPrioritySelect.value;

      //   // Adjust the disabled field
      //   cateringPrioritySelect.disabled = true;
      //   stylistPrioritySelect.removeAttribute("disabled");

      //   // Remove the selected option from the second and third fields
      //   stylistPrioritySelect.querySelector(`option[value="${selectedCateringOption}"]`).remove();
      //   venuePrioritySelect.querySelector(`option[value="${selectedCateringOption}"]`).remove();
      // });


      // stylistPrioritySelect.addEventListener("change", function () {
      //   // Reset the third field
      //   venuePrioritySelect.innerHTML = initialVenueOptions;

      //   // Get the selected options in the first and second fields
      //   const selectedCateringOption = cateringPrioritySelect.value;
      //   const selectedStylistOption = stylistPrioritySelect.value;

      //   // Adjust the disabled field
      //   stylistPrioritySelect.disabled = true;
      //   cateringPrioritySelect.removeAttribute("disabled");

      //   // Remove the selected option from the third field
      //   venuePrioritySelect.querySelector(`option[value="${selectedCateringOption}"]`).remove();
      //   venuePrioritySelect.querySelector(`option[value="${selectedStylistOption}"]`).remove();
      // });

      // document.querySelector('form').addEventListener('submit', function(event) {
      //   event.preventDefault(); 
      //   const disabledElements = this.querySelectorAll('[disabled]');

      //   // remove the 'disabled' attribute so that able to get value in php when submitted
      //   disabledElements.forEach(function(element) {
      //     element.removeAttribute('disabled');
      //   });

      //   this.submit();
      // });
    </script>
  </body>
</html>