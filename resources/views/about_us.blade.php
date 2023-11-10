@extends('layouts.app')

@section('content')
<section class="section novi-background bg-cover section-xl bg-gray-800 decoration-1">
    <div class="tabs-custom container" id="tabs-1" data-view-triggerable="true">
      <div class="row row-30 row-md-40 justify-content-lg-between">
        <div class="col-lg-5">
          <h6 class="title-style-1 wow fadeInLeft">4 steps to plan a wedding</h6>
          <h1 class="wow fadeInLeft" data-wow-delay=".05s">How we<br class="d-none d-lg-block">Do <span class="font-weight-light">It</span></h1>
          <!-- Tab panes-->
          <div class="tab-content wow fadeInLeft" data-wow-delay=".1s">
            <div class="tab-pane fade show active" id="tabs-1-1">
              <h3 class="title-style-1">Tell us your preferences</h3>
              <p>To kick off our journey together, let's have a conversation about your wedding preferences and budget. This initial meeting is a wonderful opportunity for you to express your ideas and pose any questions you may have.</p>
              <p>This phase is particularly significant, as it allows you to review our past work and assess whether our approach aligns with your vision. As our client, you'll also be able to gauge how well we understand your wedding needs and preferences. Please take a moment to fill in the form and let us know about your unique wedding dreams and budget considerations.</p>
            </div>
            <div class="tab-pane fade" id="tabs-1-2">
              <h3 class="title-style-1">Tell us your budget</h3>
              <p>The next step of our cooperation lies in developing the concept of your future home. It helps us define every single factor that makes the construction process of your home successful.</p>
              <p>Our team of designers and architects has to plan every single step of the project to make sure that the final result will meet not only your requirements but also international construction and safety standards. This is when monitoring & control begin.</p>
            </div>
            <div class="tab-pane fade" id="tabs-1-3">
              <h3 class="title-style-1">Select your prefer services</h3>
              <p>There’s no doubt that the most important and responsible part of building a home is its construction process. As we work with reliable contractors, a great result is guaranteed.</p>
              <p>This stage is one of the most complex ones as it includes a variety of tasks that must be controlled - from preparing the construction site to installing insulation and completing drywall as well as working on exterior.</p>
            </div>
            <div class="tab-pane fade" id="tabs-1-4">
              <h3 class="title-style-1">Wait for vendor's confirmation</h3>
              <p>When the project gets to its final stage, our quality control team conducts the final check of the building to make sure everything has been carried out the proper way.</p>
              <p>Our employees will also make sure that all interior elements & fixtures are correctly installed  during this final step. After everything is completed, we invite our client to assess the final result and experience the quality performance of our project.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-xl-6">
          <div class="inset-xl-left-35">
            <ul class="nav nav-style-1">
              <li class="nav-item wow blurIn" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Tell us your preferences</a></li>
              <li class="nav-item wow blurIn" role="presentation" data-wow-delay=".05s"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Tell us your budget</a></li>
              <li class="nav-item wow blurIn" role="presentation" data-wow-delay=".1s"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Select your prefer services</a></li>
              <li class="nav-item wow blurIn" role="presentation" data-wow-delay=".15s"><a class="nav-link" href="#tabs-1-4" data-toggle="tab">Wait for vendor's confirmation</a></li>
            </ul>
            <div class="project-creative wow blurIn">
              <div class="project-creative-figure active" data-view-trigger="#tabs-1-1"><img src="{{ asset('images/about-us_step1.jpg') }}" alt="" width="531" height="327"/>
              </div>
              <div class="project-creative-figure" data-view-trigger="#tabs-1-2"><img src="images/index-2-531x327.jpg" alt="" width="531" height="327"/>
              </div>
              <div class="project-creative-figure" data-view-trigger="#tabs-1-3"><img src="images/index-3-531x327.jpg" alt="" width="531" height="327"/>
              </div>
              <div class="project-creative-figure" data-view-trigger="#tabs-1-4"><img src="images/index-4-531x327.jpg" alt="" width="531" height="327"/>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  @endsection