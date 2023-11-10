@extends('layouts.app')
        
@section('content')
  <section class="section novi-background bg-cover bg-white section-inset-1 parallax-scene-js" id="contacts">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 d-none d-lg-block wow fadeInLeft"><img src="images/index-6-538x694.png" alt="" width="538" height="694"/>
        </div>
        <div class="col-md-8 col-lg-6">
          <div class="inset-xl-left-35 section-sm">
            <h3 class="wow fadeInRight">Get in touch with<br>our team</h3>
            <h6 class="title-style-1 wow fadeInRight" data-wow-delay=".05s">Let's work together!</h6>
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

@endsection