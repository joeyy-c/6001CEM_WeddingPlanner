
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  </head>
  
  <body>

    @include('layouts.site-navbar')
        
    <section class="section novi-background bg-cover section-sm bg-gray-100">
      <div class="container">
        <h3 class="wow fadeInLeft text-center">Dashboard</h3>
        <p class="title-style-1 wow fadeInRight text-center">Always keep track of your wedding plannig progress.</p>
      </div>
    </section>

    <section class="section section-lg">
      <div class="container">
        @if(session('message'))
          <div class="alert alert-success">
              {{ session('message') }}
          </div>
        @endif
        @if (empty($project_services))
          <div class="col-8 mx-auto text-center">
            <p>Haven't started yet? Begin your wedding planning journey by telling us your requirement and budget. We will work its magic and recommend you perfect partners for your special day.</p>

            <a class="button button-jerry button-primary mt-5" href="{{ route('wedding-planning.createPreferencesForm') }}">Get Started
              <span class="button-jerry-line"></span>
              <span class="button-jerry-line"></span>
              <span class="button-jerry-line"></span>
              <span class="button-jerry-line"></span>
            </a>
          </div>
        @else
        <div class="col-11 mx-auto px-3">
          <p>[ Log ] Project Status: {{ $project_services[0]->project }}</p>
            <p><b>Wedding Date:</b> {{ $project_services[0]->project->wedding_date }}</p>
            <p><b>Budget:</b> XXX</p>
            <p><b>Remarks:</b>  
            <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRemark" aria-expanded="false" aria-controls="collapseExample">
              <i class="fa-solid fa-eye"></i>
            </button>
            <div class="collapse pt-3" id="collapseRemark">
              <div class="card card-body">
              {{ $project_services[0]->project->project_remark }}
              </div>
            </div>
          </p>
        </div>
        @endif
      </div>

      <div class="container">
        @php 
          $counter = 0; 

          $status_color = array(
            "Waiting for Vendor's Confirmation" => "warning"
          );
        @endphp

        @foreach ($project_services as $ps)
          @if ($counter % 3 == 0)
          <div class="row">
          @endif
            <div class="col-4">
                <div class="team-classic wow fadeInUp vendor-card" data-wow-delay=".1s">
                    <div class="vendor-card-img-cont" data-bs-toggle="modal" data-bs-target="#modal-{{ $ps->id }}">
                        <img src="images/venue-1.jpg" class="vendor-card-img" />
                        <x-business-category-icon :business_category="$ps->service->vendor->user_info->business_category" />
                    </div>
                    <div class="vendor-card-title">
                        <h5 class="team-classic-name" data-bs-toggle="modal" data-bs-target="#modal-{{ $ps->id }}">{{ $ps->service->vendor->name }}</h5>
                    </div>
                    <div class="vendor-card-footer">
                        <div class="team-classic-status">{{ ucwords(str_replace('_', ' ', $ps->service->vendor->user_info->city)) }}, {{ ucwords(str_replace('_', ' ', $ps->service->vendor->user_info->state)) }}</div>
                        <div class="vendor-card-content">
                            <!-- <ul class="team-classic-list-social list-inline">
                                <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
                            </ul> -->
                            <p class="text-secondary text-justify">Status: <x-service-status-badge :status="$ps->status"/></p>
                            <div class="heading-1 vendor-card-placeholder">{{ str_replace('_', ' ', $ps->service->vendor->user_info->business_category) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scrollable modal -->
            <div class="modal fade" id="modal-{{ $ps->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-dialog-scrollable modal-lg">
                <div class="modal-content">
                  <div class="modal-header">
                    <h1 class="modal-title fs-5 px-3" id="exampleModalLabel">Details</h1>
                    <button type="button" class="btn-close px-3" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <div class="p-3">
                      <h5 class="text-capitalize text-center">Vendor Details</h5>

                      <!-- Vendor Name -->
                      <p><b>{{ $ps->service->vendor->name }}</b></p><br/>

                      <!-- Vendor Phone -->
                      <i class="fa-solid fa-phone pe-2"></i> <a href="tel:+6{{ $ps->service->vendor->user_info->phone }}"> +6{{ $ps->service->vendor->user_info->phone }}</a><br/>

                      <!-- Vendor Email -->
                      <i class="fa-solid fa-envelope text-normal pe-2"></i> <a href="mailto:{{ $ps->service->vendor->email }}"> {{ $ps->service->vendor->email }}</a><br/>
                      
                      <!-- Vendor Address -->
                      <i class="fa-solid fa-location-dot pe-2"></i>&nbsp;
                      {{ $ps->service->vendor->user_info->address }},
                      {{ $ps->service->vendor->user_info->postal_code }} 
                      {{ $ps->service->vendor->user_info->city }},
                      {{ ucfirst(str_replace('_', ' ', $ps->service->vendor->user_info->state)) }}.
                      <br/>

                      <!-- Vendor Website -->
                      <i class="fa-solid fa-link pe-1"></i> <a href="#"> www.company_a.com</a><br/>
                    </div>

                    <hr>

                    <div class="p-3 pb-5">
                      <h5 class="text-capitalize text-center">Selected Service</h5>
                      <!-- Service Name -->
                      <p><b>{{ $ps->service->service_name }}</b></p><br/>

                      <!-- Service Details -->
                      @if ($ps->service->vendor->user_info->business_category == "venue" || $ps->service->vendor->user_info->business_category == "wedding_rentals")
                        Maximum Guest Capacity: {{ $ps->service->service_guest_count }} <br/><br/>
                      @endif
                      Description: <br/>{{ $ps->service->service_desc }}
                    </div>

                  </div>
                </div>
              </div>
            </div>


          @php 
            $counter++; 
          @endphp

          @if ($counter % 3 == 0)
          </div>
          @endif

        @endforeach
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
    <script src="{{ asset('js/bootstrap.js') }}"></script>
    <!-- coded by Ragnar-->
  </body>
</html>