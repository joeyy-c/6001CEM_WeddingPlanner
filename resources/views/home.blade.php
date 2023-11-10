@extends('layouts.app')

@section('content')
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
            <div class="q">I selected Spectrum because of their architects' rigorous design background and education. They exceeded my expectations and did a great a job on extending and redesigning my house.</div>
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
  <section class="section novi-background bg-cover section-xl bg-white text-center decoration-1">
    <h3>Interested in joining us?</h3>
    <p>Register now to open the door of opportunities to work with us.</p>
    <a href="{{ route('vendor-register') }}" class="button button-primary m-5">Register</a>
  </section>
@endsection