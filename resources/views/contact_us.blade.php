
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
    <style>.ie-panel{display: none;background: #212121;padding: 10px 0;box-shadow: 3px 3px 5px 0 rgba(0,0,0,.3);clear: both;text-align:center;position: relative;z-index: 1;} html.ie-10 .ie-panel, html.lt-ie-10 .ie-panel {display: block;}</style>
  </head>
  <body>

    @include('layouts.site-navbar')
        
    <section class="section novi-background bg-cover bg-white section-inset-1 parallax-scene-js" id="contacts">
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-6 d-none d-lg-block wow fadeInLeft"><img src="images/index-6-538x694.png" alt="" width="538" height="694"/>
          </div>
          <div class="col-md-8 col-lg-6">
            <div class="inset-xl-left-35 section-sm">
              <h3 class="wow fadeInRight">Get in touch with<br>our team</h3>
              <h6 class="title-style-1 wow fadeInRight" data-wow-delay=".05s">Let’s work together!</h6>
              <div class="form-style-1 context-dark wow blurIn">
                <!-- RD Mailform-->
                <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                  <div class="form-wrap">
                    <label class="form-label" for="contact-name-2">Name</label>
                    <input class="form-input" id="contact-name-2" type="text" name="name">
                  </div>
                  <div class="form-wrap">
                    <label class="form-label" for="contact-email-2">Email</label>
                    <input class="form-input" id="contact-email-2" type="email" name="email">
                  </div>
                  <div class="form-wrap">
                    <label class="form-label" for="contact-phone-2">Phone</label>
                    <input class="form-input" id="contact-phone-2" type="text" name="phone">
                  </div>
                  <div class="form-button">
                    <button class="button button-jerry button-primary" type="submit">Submit<span class="button-jerry-line"></span><span class="button-jerry-line"></span><span class="button-jerry-line"></span><span class="button-jerry-line"></span>
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="layer-wrap layer-3">
        <div class="layer" data-depth="0.4"><img src="images/index-9-1047x531.png" alt="" width="1047" height="531"/>
        </div>
      </div>
    </section>
    <footer class="section novi-background bg-cover section-sm footer-classic context-dark" id="contacts">
      <div class="container"><a class="brand wow blurIn" href="index.html"><img src="images/logo-inverse-2-108x124.png" alt="" width="54" height="62"/></a>
        <ul class="contacts-modern footer-classic-list">
          <li class="wow fadeInLeft"><a class="heading-3" href="tel:#">1-800-901-234</a></li>
          <li class="wow fadeInRight"><a class="heading-3" href="mailto:#">info@demolink.org</a></li>
        </ul>
        <ul class="list-inline list-inline-xxl list-social footer-classic-list">
          <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
          <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
          <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
        </ul>
        <p class="rights"><span>&copy;&nbsp; </span><span class="copyright-year"></span><span>&nbsp;</span><span>Spectrum</span><span>. All Rights Reserved. Design by Zemez</span></p>
      </div>
    </footer>
      
    <div class="snackbars" id="form-output-global"></div>
    <script src="{{ asset('js/core.min.js') }}"></script>
    <script src="{{ asset('js/script.js') }}"></script>
    <!-- coded by Ragnar-->
  </body>
</html>