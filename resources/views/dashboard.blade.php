@extends('layouts.app')

@section('content')        
  <section class="section novi-background bg-cover section-sm bg-gray-100">
    <div class="container">
      <h3 class="wow fadeInLeft text-center">Dashboard</h3>
      <p class="title-style-1 wow fadeInRight text-center">Always keep track of your wedding plannig progress.</p>
    </div>
  </section>

  <section class="section section-xs">
    <div class="container">
      @if(session('message'))
        <div class="alert alert-success col-12 mx-auto mt-5">
            {{ session('message') }}
        </div>
      @endif
      @if (empty($project))
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
      <div class="container">
        <div class="row">
          <div class="col-7 border-primary p-5 me-5 wow blurIn rounded d-flex flex-column justify-content-between" style="visibility: visible; animation-name: blurIn;">
            <h2>{{ $project->project_name }}</h2>
            <p>Wedding Date: {{ date('d M Y', strtotime($project->wedding_date)) }}</p>
          </div>
          <div class="col-4 border-primary p-5 ms-5 wow blurIn rounded" style="visibility: visible; animation-name: blurIn;">
            <div class="row">
              <h5>Your budget:</h5>
              <p class="mt-3">RM {{ $project->project_details->budget }}</p>
            </div>
            <hr>
            <div class="row d-flex">
              <h5>Remarks:</h5>
              <button class="col-2 btn btn-secondary btn-sm ms-3 my-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRemark" aria-expanded="false" aria-controls="collapseExample">
                <i class="fa-solid fa-eye"></i>
              </button>
              <div class="collapse pt-3" id="collapseRemark">
                <div class="card card-body">
                {{ $project->project_remark }}
                </div>
              </div>
            </div>
          </div>
        </div>

        @php 
          $declined_history_service_ids = $latest_declined_service_ids = $declined_namelist = array();

          foreach ($project->services as $service) {
            $category = $service->service->vendor->user_info_decoded->business_category;

            if ($service->status == "Vendor Declined" || $service->status == "Cancelled")
              $declined_history_service_ids[$category][] = $service->service->id;

            if (isset($latest_declined_service_ids[$category]) && $service->status != "Vendor Declined" && $service->status != "Cancelled") {
              unset($latest_declined_service_ids[$category]);
              unset($declined_namelist[$category]);
            }
            else if ($service->status == "Vendor Declined" || $service->status == "Cancelled") {
              $latest_declined_service_ids[$category] = $service->service->id;
              $declined_namelist[$category] = '<li><b>' . $service->service->vendor->name . '</b> - ' . $service->service->service_name . '</li>';
            }
          }
        @endphp

        @if (!empty($latest_declined_service_ids))
          <div class="alert alert-danger mt-5" role="alert">
            <h5 class="alert-heading"><i class="fa-solid fa-warning pe-2"></i>Important Notice</h5>
            <form id="getNewRecommendations" action="{{ route('wedding-planning.getRecommendations') }}" method="post">
              @csrf

              <input type="hidden" name="decline" value="true">
              <input type="hidden" name="project_id" value="{{ $project->project_id }}">

              <!-- User Preferences -->
              @foreach ($project->project_details as $key => $value)
                <input type="hidden" name="{{ $key }}" value="{{ $value }}">
              @endforeach
                
              <!-- Service id being declined -->
              @foreach ($declined_history_service_ids as $category => $service_ids) 
                @foreach ($service_ids as $service_id) 
                  <input type="hidden" name="{{ $category }}[]" value="{{ $service_id }}">
                @endforeach
              @endforeach

              <p>We regret to inform you that the vendor listed below is unable to fulfill your project. Kindly consider exploring alternative options.</p>
              <ul>
                @php echo implode('', $declined_namelist); @endphp
              </ul>
              <p>Click <a href="#" class="alert-link text-underline" onclick="document.getElementById('getNewRecommendations').submit(); return false;">here</a> to explore other vendor options.</p>
            </form>
          </div>
        @endif
      </div>

      <!-- Services In Progress -->
      <section class="section section-md">

        <div class="caption-classic">
          <div class="caption-classic-group">
            <h3 class="caption-classic-title wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">Services <span class="font-weight-light">In Progress</span></h3>
            <p class="caption-classic-text wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">Below are the services that have been successfully included in your package. They may be awaiting vendor confirmation, deposit payment, currently in progress, and more.</p>
          </div>
          <div class="caption-classic-decor wow blurIn" style="visibility: visible; animation-name: blurIn;"></div>
        </div>

        @php 
          $counter = 0; 
        @endphp

        @foreach ($project->services as $service)
          @if ($counter % 3 == 0)
          <div class="row">
          @endif
          @if ($service->status != "Vendor Declined" && $service->status != "Cancelled")
            <div class="col-4 d-flex justify-content-center">
                <div class="team-classic wow fadeInUp vendor-card" data-wow-delay=".1s">
                    <div class="vendor-card-img-cont" data-bs-toggle="modal" data-bs-target="#modal-{{ $service->id }}">
                        <img src="images/venue-1.jpg" class="vendor-card-img" />
                        <x-business-category-icon :business_category="$service->service->vendor->user_info_decoded->business_category" />
                    </div>
                    <div class="vendor-card-title">
                        <h5 class="team-classic-name" data-bs-toggle="modal" data-bs-target="#modal-{{ $service->id }}">{{ $service->service->service_name }}</h5>
                    </div>
                    <div class="vendor-card-footer">
                        <div class="team-classic-status">{{ $service->service->vendor->name }}</div>
                        <div class="vendor-card-content">
                            <!-- <ul class="team-classic-list-social list-inline">
                                <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
                            </ul> -->
                            <p class="text-secondary text-justify">Status: <x-service-status-badge :status="$service->status"/></p>
                            <div class="heading-1 vendor-card-placeholder">{{ str_replace('_', ' ', $service->service->vendor->user_info_decoded->business_category) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scrollable modal -->
            <div class="modal fade" id="modal-{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <p><b>{{ $service->service->vendor->name }}</b></p><br/>

                      <!-- Vendor Phone -->
                      <i class="fa-solid fa-phone pe-2"></i> <a href="tel:+6{{ $service->service->vendor->user_info_decoded->phone }}"> +6{{ $service->service->vendor->user_info_decoded->phone }}</a><br/>

                      <!-- Vendor Email -->
                      <i class="fa-solid fa-envelope text-normal pe-2"></i> <a href="mailto:{{ $service->service->vendor->email }}"> {{ $service->service->vendor->email }}</a><br/>
                      
                      <!-- Vendor Address -->
                      <i class="fa-solid fa-location-dot pe-2"></i>&nbsp;
                      {{ $service->service->vendor->user_info_decoded->address }},
                      {{ $service->service->vendor->user_info_decoded->postal_code }} 
                      {{ $service->service->vendor->user_info_decoded->city }},
                      {{ ucfirst(str_replace('_', ' ', $service->service->vendor->user_info_decoded->state)) }}.
                      <br/>

                      <!-- Vendor Website -->
                      <i class="fa-solid fa-link pe-1"></i> <a href="{{ $service->service->vendor->user_info_decoded->website_link }}" target="_blank">{{ $service->service->vendor->user_info_decoded->website_link }} </a><br/>
                    </div>

                    <hr>

                    <div class="p-3 pb-5">
                      <h5 class="text-capitalize text-center">Selected Service</h5>
                      <!-- Service Name -->
                      <p><b>{{ $service->service->service_name }}</b></p><br/>

                      <!-- Service Details -->
                      @if ($service->service->vendor->user_info_decoded->business_category == "venue" || $service->service->vendor->user_info_decoded->business_category == "wedding_rentals")
                        Maximum Guest Capacity: {{ $service->service->service_guest_count }} <br/><br/>
                      @endif
                      Description: <br/>{{ $service->service->service_desc }}
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
          @endif
        @endforeach
      </section>

      <!-- Services Declined/Cancelled by Vendor -->
      <section class="section mb-5">
        <div class="caption-classic">
          <div class="caption-classic-group">
            <h3 class="caption-classic-title wow fadeInLeft" style="visibility: visible; animation-name: fadeInLeft;">Services <span class="font-weight-light">Declined</span></h3>
            <p class="caption-classic-text wow fadeInRight" style="visibility: visible; animation-name: fadeInRight;">Below are the services that have been declined or cancelled by vendor because they are unable to fulfill for your package. Kindly consider alternative options to meet your project needs.</p>
          </div>
          <div class="caption-classic-decor wow blurIn" style="visibility: visible; animation-name: blurIn;"></div>
        </div>

        @php 
          $counter = 0; 
        @endphp

        @foreach ($project->services as $service)
          @if ($counter % 3 == 0)
          <div class="row">
          @endif
          @if ($service->status == "Vendor Declined" || $service->status == "Cancelled")
            <div class="col-4 d-flex justify-content-center">
                <div class="team-classic wow fadeInUp vendor-card" data-wow-delay=".1s">
                    <div class="vendor-card-img-cont" data-bs-toggle="modal" data-bs-target="#modal-{{ $service->id }}">
                        <img src="images/venue-1.jpg" class="vendor-card-img" />
                        <x-business-category-icon :business_category="$service->service->vendor->user_info_decoded->business_category" />
                    </div>
                    <div class="vendor-card-title">
                        <h5 class="team-classic-name" data-bs-toggle="modal" data-bs-target="#modal-{{ $service->id }}">{{ $service->service->service_name }}</h5>
                    </div>
                    <div class="vendor-card-footer">
                        <div class="team-classic-status">{{ $service->service->vendor->name }}</div>
                        <div class="vendor-card-content">
                            <!-- <ul class="team-classic-list-social list-inline">
                                <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                                <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                                <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
                            </ul> -->
                            <p class="text-secondary text-justify">Status: <x-service-status-badge :status="$service->status"/></p>
                            <div class="heading-1 vendor-card-placeholder">{{ str_replace('_', ' ', $service->service->vendor->user_info_decoded->business_category) }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Scrollable modal -->
            <div class="modal fade" id="modal-{{ $service->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                      <p><b>{{ $service->service->vendor->name }}</b></p><br/>

                      <!-- Vendor Phone -->
                      <i class="fa-solid fa-phone pe-2"></i> <a href="tel:+6{{ $service->service->vendor->user_info_decoded->phone }}"> +6{{ $service->service->vendor->user_info_decoded->phone }}</a><br/>

                      <!-- Vendor Email -->
                      <i class="fa-solid fa-envelope text-normal pe-2"></i> <a href="mailto:{{ $service->service->vendor->email }}"> {{ $service->service->vendor->email }}</a><br/>
                      
                      <!-- Vendor Address -->
                      <i class="fa-solid fa-location-dot pe-2"></i>&nbsp;
                      {{ $service->service->vendor->user_info_decoded->address }},
                      {{ $service->service->vendor->user_info_decoded->postal_code }} 
                      {{ $service->service->vendor->user_info_decoded->city }},
                      {{ ucfirst(str_replace('_', ' ', $service->service->vendor->user_info_decoded->state)) }}.
                      <br/>

                      <!-- Vendor Website -->
                      <i class="fa-solid fa-link pe-1"></i> <a href="{{ $service->service->vendor->user_info_decoded->website_link }}" target="_blank"> {{ $service->service->vendor->user_info_decoded->website_link }}</a><br/>
                    </div>

                    <hr>

                    <div class="p-3 pb-5">
                      <h5 class="text-capitalize text-center">Selected Service</h5>
                      <!-- Service Name -->
                      <p><b>{{ $service->service->service_name }}</b></p><br/>

                      <!-- Service Details -->
                      @if ($service->service->vendor->user_info_decoded->business_category == "venue" || $service->service->vendor->user_info_decoded->business_category == "wedding_rentals")
                        Maximum Guest Capacity: {{ $service->service->service_guest_count }} <br/><br/>
                      @endif
                      Description: <br/>{{ $service->service->service_desc }}
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
          @endif
        @endforeach

        @if ($counter == 0) 
          <p>Great News! All services in your package have smoothly progressed without any declines or cancellations.</p>
        @endif
      </section>
      
      @endif
    </div>

   
  </section>
@endsection
