@extends('layouts.app')
    
@section('content')
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
            <form class="form-style-2 mt-5" method="POST" action="{{ route('wedding-planning.getRecommendations') }}">
              @csrf
  
              <!-- Budget -->
              <div class="row">
                <p class="fw-bold fs-6 mb-4">Specify your wedding budget:</p>
                <label for="budget" class="col-3 col-form-label form-label-2">Budget (RM)</label>
                <div class="col-9">
                  <input class="form-input" type="number" name="budget" id="budget" min="{{ $min_budget }}" step="1" placeholder="100000" required>
                  <!-- <div class="text-secondary mt-3 input-desc">Your budget for the wedding.</div> -->
                  
                  <!-- <div class="text-secondary mt-3 input-desc">
                    <input type="checkbox" name="budget_tolerance" id="budget_tolerance">
                    <label for="budget_tolerance">Allow expenses to exceed budget within 10% tolerances.</label>
                  </div> -->
                </div>
              </div>

              @foreach ($form_data as $key => $value) 
                @if ($key != '_token')
                  <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
                @endif
              @endforeach

              @php
                $business_category = array("venue", "wedding_rentals", "catering", "stylist", "photography_and_videography");
              @endphp

              @foreach ($business_category as $category) 
                <input type="hidden" name="{{ $category }}" value="true"/>
              @endforeach
  
              <div class="row form-button">
                <button class="button button-jerry button-primary" type="submit">Submit
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
@endsection