
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

                @foreach ($preferences as $key => $value) 
                  @if ($key != '_token')
                    <input type="hidden" name="{{ $key }}" value="{{ $value }}"/>
                  @endif
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

  </body>
</html>