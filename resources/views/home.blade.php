@extends('layouts.app')

@section('content')
  <section class="section novi-background bg-cover section-xl bg-white parallax-scene-js" id="about">
    <div class="container">
      <div class="row row-50 align-items-center justify-content-md-between">
        <div class="col-md-4 col-lg-3">
          <div class="row row-40 row-md-60">
            <div class="col-sm-4 col-md-12 col-xl-11 wow fadeInLeft">
              <article class="box-icon-classic">
                <div class="box-icon-classic-header">
                  <div class="box-icon-classic-icon novi-icon linearicons-apartment"></div>
                  <h6 class="box-icon-classic-title"><a href="#">Architecture</a></h6>
                </div>
                <div class="box-icon-classic-text">We provide high-quality architecture services.</div>
              </article>
            </div>
            <div class="col-sm-4 col-md-12 col-xl-11 wow fadeInLeft" data-wow-delay=".05s">
              <article class="box-icon-classic">
                <div class="box-icon-classic-header">
                  <div class="box-icon-classic-icon novi-icon linearicons-pen2"></div>
                  <h6 class="box-icon-classic-title"><a href="#">Interior design</a></h6>
                </div>
                <div class="box-icon-classic-text">Our team offers unique and stylish architecture solutions.</div>
              </article>
            </div>
            <div class="col-sm-4 col-md-12 col-xl-11 wow fadeInLeft" data-wow-delay=".1s">
              <article class="box-icon-classic">
                <div class="box-icon-classic-header">
                  <div class="box-icon-classic-icon novi-icon linearicons-lamp"></div>
                  <h6 class="box-icon-classic-title"><a href="#">Lighting design</a></h6>
                </div>
                <div class="box-icon-classic-text">Let our team design unique lighting for your home.</div>
              </article>
            </div>
          </div>
        </div>
        <div class="col-md-7 col-lg-6">
          <div class="inset-xl-left-35">
            <h3 class="wow fadeInRight">Find out the price<br>of your home</h3>
            <h6 class="title-style-1 wow fadeInRight" data-wow-delay=".05s">We will contact you within 24 hours</h6>
            <div class="form-style-1 context-dark wow blurIn">
              <!-- RD Mailform-->
              <form class="rd-mailform text-left" data-form-output="form-output-global" data-form-type="contact" method="post" action="bat/rd-mailform.php">
                <div class="form-wrap">
                  <label class="form-label" for="contact-name">Name</label>
                  <input class="form-input" id="contact-name" type="text" name="name">
                </div>
                <div class="form-wrap">
                  <label class="form-label" for="contact-email">Email</label>
                  <input class="form-input" id="contact-email" type="email" name="email">
                </div>
                <div class="form-wrap">
                  <label class="form-label" for="contact-phone">Phone</label>
                  <input class="form-input" id="contact-phone" type="text" name="phone">
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
    <div class="layer-wrap layer-1">
      <div class="layer" data-depth="0.4"><img src="images/index-7-694x539.png" alt="" width="694" height="539"/>
      </div>
    </div>
  </section>
  <section class="section novi-background bg-cover section-xl bg-gray-800 decoration-1">
    <div class="tabs-custom container" id="tabs-1" data-view-triggerable="true">
      <div class="row row-30 row-md-40 justify-content-lg-between">
        <div class="col-lg-5">
          <h6 class="title-style-1 wow fadeInLeft">4 steps to a new home</h6>
          <h1 class="wow fadeInLeft" data-wow-delay=".05s">How we<br class="d-none d-lg-block">Do <span class="font-weight-light">It</span></h1>
          <!-- Tab panes-->
          <div class="tab-content wow fadeInLeft" data-wow-delay=".1s">
            <div class="tab-pane fade show active" id="tabs-1-1">
              <h3 class="title-style-1">Meet and define goals</h3>
              <p>The first thing we do is meeting with our clients and talk through their goals on a future project. During this meeting, feel free to communicate your ideas and ask lots of questions.</p>
              <p>This stage is highly decisive as you can evaluate the work of your potential architect by browsing their portfolio. As a client, you may also assess whether the architect listens to your needs and confirms that he or she understands them.</p>
            </div>
            <div class="tab-pane fade" id="tabs-1-2">
              <h3 class="title-style-1">Working on the Concept</h3>
              <p>The next step of our cooperation lies in developing the concept of your future home. It helps us define every single factor that makes the construction process of your home successful.</p>
              <p>Our team of designers and architects has to plan every single step of the project to make sure that the final result will meet not only your requirements but also international construction and safety standards. This is when monitoring & control begin.</p>
            </div>
            <div class="tab-pane fade" id="tabs-1-3">
              <h3 class="title-style-1">Building Your Home</h3>
              <p>There’s no doubt that the most important and responsible part of building a home is its construction process. As we work with reliable contractors, a great result is guaranteed.</p>
              <p>This stage is one of the most complex ones as it includes a variety of tasks that must be controlled - from preparing the construction site to installing insulation and completing drywall as well as working on exterior.</p>
            </div>
            <div class="tab-pane fade" id="tabs-1-4">
              <h3 class="title-style-1">Completing a project</h3>
              <p>When the project gets to its final stage, our quality control team conducts the final check of the building to make sure everything has been carried out the proper way.</p>
              <p>Our employees will also make sure that all interior elements & fixtures are correctly installed  during this final step. After everything is completed, we invite our client to assess the final result and experience the quality performance of our project.</p>
            </div>
          </div>
        </div>
        <div class="col-lg-7 col-xl-6">
          <div class="inset-xl-left-35">
            <ul class="nav nav-style-1">
              <li class="nav-item wow blurIn" role="presentation"><a class="nav-link active" href="#tabs-1-1" data-toggle="tab">Acquaintance with the customer</a></li>
              <li class="nav-item wow blurIn" role="presentation" data-wow-delay=".05s"><a class="nav-link" href="#tabs-1-2" data-toggle="tab">Project Concept Development</a></li>
              <li class="nav-item wow blurIn" role="presentation" data-wow-delay=".1s"><a class="nav-link" href="#tabs-1-3" data-toggle="tab">Working on Interior and Exterior</a></li>
              <li class="nav-item wow blurIn" role="presentation" data-wow-delay=".15s"><a class="nav-link" href="#tabs-1-4" data-toggle="tab">Finishing Touches for your future home</a></li>
            </ul>
            <div class="project-creative wow blurIn">
              <div class="project-creative-figure active" data-view-trigger="#tabs-1-1"><img src="images/index-1-531x327.jpg" alt="" width="531" height="327"/>
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
  <section class="section novi-background bg-cover section-lg bg-gray-100 text-center" id="team">
    <div class="container">
      <h3 class="wow fadeInLeft">Our team</h3>
      <h6 class="title-style-1 wow fadeInRight">People behind our success</h6>
      <!-- Owl Carousel-->
      <div class="owl-carousel" data-items="1" data-sm-items="2" data-md-items="3" data-xl-items="4" data-margin="5" data-dots="true" data-mouse-drag="false">
        <article class="team-classic wow fadeInUp" data-wow-delay=".1s">
          <div class="team-classic-figure"><img src="images/team-1-290x284.jpg" alt="" width="290" height="284"/>
          </div>
          <div class="team-classic-body">
            <h5 class="team-classic-name"><a href="#">Mary Scott</a></h5>
          </div>
          <div class="team-classic-footer">
            <div class="team-classic-status">Lead Interior Designer</div>
            <div class="team-classic-list-panel">
              <ul class="team-classic-list-social list-inline">
                <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
              </ul>
              <div class="heading-1 team-classic-placeholder">Mary</div>
            </div>
          </div>
        </article>
        <article class="team-classic wow fadeInUp">
          <div class="team-classic-figure"><img src="images/team-2-290x284.jpg" alt="" width="290" height="284"/>
          </div>
          <div class="team-classic-body">
            <h5 class="team-classic-name"><a href="#">John Balmer</a></h5>
          </div>
          <div class="team-classic-footer">
            <div class="team-classic-status">Senior Architect</div>
            <div class="team-classic-list-panel">
              <ul class="team-classic-list-social list-inline">
                <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
              </ul>
              <div class="heading-1 team-classic-placeholder">John</div>
            </div>
          </div>
        </article>
        <article class="team-classic wow fadeInUp" data-wow-delay=".05s">
          <div class="team-classic-figure"><img src="images/team-3-290x284.jpg" alt="" width="290" height="284"/>
          </div>
          <div class="team-classic-body">
            <h5 class="team-classic-name"><a href="#">Ann Smith</a></h5>
          </div>
          <div class="team-classic-footer">
            <div class="team-classic-status">Exterior &amp; Landscape Designer</div>
            <div class="team-classic-list-panel">
              <ul class="team-classic-list-social list-inline">
                <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
              </ul>
              <div class="heading-1 team-classic-placeholder">Ann</div>
            </div>
          </div>
        </article>
        <article class="team-classic wow fadeInUp" data-wow-delay=".15s">
          <div class="team-classic-figure"><img src="images/team-4-290x284.jpg" alt="" width="290" height="284"/>
          </div>
          <div class="team-classic-body">
            <h5 class="team-classic-name"><a href="#">Kate McMillan</a></h5>
          </div>
          <div class="team-classic-footer">
            <div class="team-classic-status">Project Manager</div>
            <div class="team-classic-list-panel">
              <ul class="team-classic-list-social list-inline">
                <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
              </ul>
              <div class="heading-1 team-classic-placeholder">Kate</div>
            </div>
          </div>
        </article>
      </div>
    </div>
  </section>
  <section class="section novi-background bg-cover section-lg section-inset-3 bg-white parallax-scene-js">
    <div class="container">
      <div class="row row-50 justify-content-md-between">
        <div class="col-md-6">
          <h3 class="wow fadeInRight">Award-winning<br>Architecture company</h3>
          <h6 class="title-style-1 wow fadeInRight" data-wow-delay=".05s">We deliver the best solutions</h6>
          <article class="video-classic wow blurIn">
            <div class="video-classic-figure"><img src="images/index-5-533x362.jpg" alt="" width="533" height="362"/>
            </div><a class="video-classic-link" data-lightgallery="item" href="https://www.youtube.com/watch?v=1UWpbtUupQQ"><span class="icon mdi mdi-play"></span></a>
          </article>
        </div>
        <div class="col-md-4 col-xl-3 inset-xl-top-70">
          <div class="row row-30 row-md-50 justify-content-center justify-content-md-start">
            <div class="col-6 col-sm-4 col-md-12 col-lg-11 wow fadeInRight">
              <article class="counter-classic">
                <div class="counter-classic-header">
                  <div class="heading-1 counter-classic-number"><span class="counter">7</span></div>
                  <h6 class="counter-classic-title">Years</h6>
                </div>
                <div class="counter-classic-text">We have been working in the industry since 2011.</div>
              </article>
            </div>
            <div class="col-6 col-sm-4 col-md-12 col-lg-11 wow fadeInRight" data-wow-delay=".05s">
              <article class="counter-classic">
                <div class="counter-classic-header">
                  <div class="heading-1 counter-classic-number"><span class="counter">54</span></div>
                  <h6 class="counter-classic-title">Projects</h6>
                </div>
                <div class="counter-classic-text">To this day, we have designed 54 residential projects.</div>
              </article>
            </div>
            <div class="col-6 col-sm-4 col-md-12 col-lg-11 wow fadeInRight" data-wow-delay=".1s">
              <article class="counter-classic">
                <div class="counter-classic-header">
                  <div class="heading-1 counter-classic-number"><span class="counter">11</span></div>
                  <h6 class="counter-classic-title">Awards</h6>
                </div>
                <div class="counter-classic-text">Spectrum has been awarded for creativity many times.</div>
              </article>
            </div>
            <div class="col-xl-12 wow fadeInUp"><a class="button button-jerry button-primary" href="#">Contact Us<span class="button-jerry-line"></span><span class="button-jerry-line"></span><span class="button-jerry-line"></span><span class="button-jerry-line"></span></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="layer-wrap layer-2">
      <div class="layer" data-depth="0.4"><img src="images/index-8-853x574.png" alt="" width="853" height="574"/>
      </div>
    </div>
  </section>
  <section class="section novi-background bg-cover section-lg section-inset-2 bg-gray-100" id="portfolio">
    <div class="container">
      <div class="caption-classic">
        <div class="caption-classic-group">
          <h1 class="caption-classic-title wow fadeInLeft">Pro<span class="font-weight-light">jects</span></h1>
          <p class="caption-classic-text wow fadeInRight">Below you can take a look at our featured and recent projects that have been numerously awarded for our unique architectural approach.</p>
        </div>
        <div class="caption-classic-decor wow blurIn"></div>
      </div>
      <!-- Owl Carousel-->
      <div class="owl-carousel owl-style-1" data-autoplay="false" data-items="1" data-margin="30" data-xl-margin="90" data-nav="true" data-dots="true" data-mouse-drag="false" data-smart-speed="600">
        <article class="project-mary">
          <div class="project-mary-figure"><img src="images/project-1-775x524.jpg" alt="" width="775" height="524"/>
            <div class="project-mary-link-wrap"><a class="project-mary-link mdi mdi-magnify" data-lightgallery="item" href="images/project-1-1200x800-original.jpg"><img src="images/project-1-775x524.jpg" alt="" width="775" height="524"/></a></div>
          </div>
          <div class="project-mary-content">
            <ul class="project-mary-panel">
              <li class="project-mary-panel-item">
                <time class="project-mary-time" datetime="2019-03-15">March 15, 2019</time>
              </li>
              <li class="project-mary-panel-item">
                <div class="project-mary-tag">Architecture</div>
              </li>
            </ul>
            <h3 class="project-mary-title"><a href="#">3119 Mulberry Ln, Newcastle, OK</a></h3>
            <p class="project-mary-text">We have worked on this project for three months to completely extend and redesign the old 2-storey house.</p>
          </div>
        </article>
        <article class="project-mary">
          <div class="project-mary-figure"><img src="images/project-2-775x524.jpg" alt="" width="775" height="524"/>
            <div class="project-mary-link-wrap"><a class="project-mary-link mdi mdi-magnify" data-lightgallery="item" href="images/project-2-1200x800-original.jpg"><img src="images/project-2-775x524.jpg" alt="" width="775" height="524"/></a></div>
          </div>
          <div class="project-mary-content">
            <ul class="project-mary-panel">
              <li class="project-mary-panel-item">
                <time class="project-mary-time" datetime="2019-06-19">June 19, 2019</time>
              </li>
              <li class="project-mary-panel-item">
                <div class="project-mary-tag">Exterior design</div>
              </li>
            </ul>
            <h3 class="project-mary-title"><a href="#">4367 Liberty St, irving, TX</a></h3>
            <p class="project-mary-text">Our team of exterior designers and architects integrated the latest innovations in this residential project.</p>
          </div>
        </article>
        <article class="project-mary">
          <div class="project-mary-figure"><img src="images/project-3-775x524.jpg" alt="" width="775" height="524"/>
            <div class="project-mary-link-wrap"><a class="project-mary-link mdi mdi-magnify" data-lightgallery="item" href="images/project-3-1200x800-original.jpg"><img src="images/project-3-775x524.jpg" alt="" width="775" height="524"/></a></div>
          </div>
          <div class="project-mary-content">
            <ul class="project-mary-panel">
              <li class="project-mary-panel-item">
                <time class="project-mary-time" datetime="2019-01-10">January 10, 2019</time>
              </li>
              <li class="project-mary-panel-item">
                <div class="project-mary-tag">Landscape design</div>
              </li>
            </ul>
            <h3 class="project-mary-title"><a href="#">2560 Russell st, Boston, MA</a></h3>
            <p class="project-mary-text">As one of our first projects in 2019, this house features unique landscape design solutions and work on exterior.</p>
          </div>
        </article>
      </div>
    </div>
  </section>
  <section class="section novi-background bg-cover section-xl bg-white text-center decoration-1">
    <div class="container">
      <h3 class="wow fadeInRight">Find new ideas and<br>inspiration in our blog</h3>
      <h6 class="title-style-1 wow fadeInLeft">Latest blog posts</h6>
      <div class="row row-xl row-30 justify-content-center justify-content-xl-between">
        <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInUp" data-wow-delay=".05s">
          <article class="post-classic">
            <div class="heading-3 post-classic-time">
              <time datetime="2019-06-19">June 19, 2019</time>
            </div><a class="post-classic-figure" href="#"><img src="images/post-1-270x182.jpg" alt="" width="270" height="182"/></a>
            <h5 class="post-classic-title"><a href="#">How Art Influences Modern Architecture</a></h5>
            <p class="post-classic-text">Looking through our recent, impactful projects, we set out to ask the designers about their opinion...</p>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInUp">
          <article class="post-classic">
            <div class="heading-3 post-classic-time">
              <time datetime="2019-05-30">May 30, 2019</time>
            </div><a class="post-classic-figure" href="#"><img src="images/post-2-270x182.jpg" alt="" width="270" height="182"/></a>
            <h5 class="post-classic-title"><a href="#">New Trends in Architecture: overview</a></h5>
            <p class="post-classic-text">Architecture is constantly evolving based on changes in our culture, society and the environment. While...</p>
          </article>
        </div>
        <div class="col-sm-6 col-md-4 col-xl-3 wow fadeInUp" data-wow-delay=".05s">
          <article class="post-classic">
            <div class="heading-3 post-classic-time">
              <time datetime="2019-04-15">April 15, 2019</time>
            </div><a class="post-classic-figure" href="#"><img src="images/post-3-270x182.jpg" alt="" width="270" height="182"/></a>
            <h5 class="post-classic-title"><a href="#">Working with an Architect: 10 useful tips</a></h5>
            <p class="post-classic-text">A skilled architect will elevate the work you do to your home from the ordinary to the wonderful. Here’s...</p>
          </article>
        </div>
      </div>
    </div>
  </section>
  <section class="section novi-background bg-cover section-xl section-inset-2 bg-gray-800 bg-image" style="background-image: url(images/bg-image-1.jpg)">
    <div class="container">
      <!-- Owl Carousel-->
      <div class="owl-carousel owl-style-2" data-loop="true" data-autoplay="true" data-items="1" data-margin="30" data-dots="true" data-mouse-drag="false" data-animation-in="fadeIn" data-animation-out="fadeOut">
        <article class="quote-classic">
          <div class="quote-classic-text">
            <div class="q">I have worked with many companies offering design &amp; architecture services, and out of all you were one who really stood out from the rest and did a great job.</div>
          </div>
          <div class="unit unit-spacing-md align-items-center text-left d-inline-flex">
            <div class="unit-left">
              <div class="quote-classic-figure"><img src="images/user-1-80x80.jpg" alt="" width="80" height="80"/>
              </div>
            </div>
            <div class="unit-body">
              <div class="quote-classic-author">kate williams</div>
              <div class="quote-classic-status">Entrepreneur</div>
            </div>
          </div>
          <div class="quote-classic-decor-wrap">
            <div class="quote-classic-decor"></div>
            <div class="quote-classic-decor"></div>
          </div>
        </article>
        <article class="quote-classic">
          <div class="quote-classic-text">
            <div class="q">I was looking for top-notch creativity and quality service and I found what I needed in your team. You took all my ideas and demands into consideration and made a great project.</div>
          </div>
          <div class="unit unit-spacing-md align-items-center text-left d-inline-flex">
            <div class="unit-left">
              <div class="quote-classic-figure"><img src="images/user-2-80x80.jpg" alt="" width="80" height="80"/>
              </div>
            </div>
            <div class="unit-body">
              <div class="quote-classic-author">Ann Lee</div>
              <div class="quote-classic-status">Freelancer</div>
            </div>
          </div>
          <div class="quote-classic-decor-wrap">
            <div class="quote-classic-decor"></div>
            <div class="quote-classic-decor"></div>
          </div>
        </article>
        <article class="quote-classic">
          <div class="quote-classic-text">
            <div class="q">I selected Spectrum because of their architects’ rigorous design background and education. They exceeded my expectations and did a great a job on extending and redesigning my house.</div>
          </div>
          <div class="unit unit-spacing-md align-items-center text-left d-inline-flex">
            <div class="unit-left">
              <div class="quote-classic-figure"><img src="images/user-3-80x80.jpg" alt="" width="80" height="80"/>
              </div>
            </div>
            <div class="unit-body">
              <div class="quote-classic-author">Sam McMillan</div>
              <div class="quote-classic-status">Manager</div>
            </div>
          </div>
          <div class="quote-classic-decor-wrap">
            <div class="quote-classic-decor"></div>
            <div class="quote-classic-decor"></div>
          </div>
        </article>
      </div>
      <div class="inset-md-left-custom-1 text-sm-left">
        <h5 class="title-style-2">Trusted by</h5>
        <div class="clients-classic-wrap wow fadeInUp"><a class="clients-classic" href="#"><img src="images/clients-1-87x54.png" alt="" width="87" height="54"/></a><a class="clients-classic" href="#"><img src="images/clients-2-112x45.png" alt="" width="112" height="45"/></a><a class="clients-classic" href="#"><img src="images/clients-3-146x28.png" alt="" width="146" height="28"/></a><a class="clients-classic" href="#"><img src="images/clients-4-84x47.png" alt="" width="84" height="47"/></a><a class="clients-classic" href="#"><img src="images/clients-5-131x29.png" alt="" width="131" height="29"/></a></div>
      </div>
    </div>
  </section>
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
@endsection