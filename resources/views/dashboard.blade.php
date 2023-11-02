@extends('layouts.app')

@section('content')        
  <section class="section novi-background bg-cover section-sm bg-gray-100">
    <div class="container">
      <h3 class="wow fadeInLeft text-center">Dashboard</h3>
      <p class="title-style-1 wow fadeInRight text-center">Always keep track of your wedding plannig progress.</p>
    </div>
  </section>

  <section>
    <div class="container">
      @if(session('message'))
        <div class="alert alert-success col-11 mx-auto">
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
      <div class="col-11 mx-auto px-3">
        <p><b>Title:</b> {{ $project->project_name }}</p>
        <p><b>Wedding Date:</b> {{ date('d M Y', strtotime($project->wedding_date)) }}</p>
        <p><b>Budget:</b> RM {{ $project->budget }}</p>
        <p><b>Remarks:</b>  
          <button class="btn btn-secondary btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#collapseRemark" aria-expanded="false" aria-controls="collapseExample">
            <i class="fa-solid fa-eye"></i>
          </button>
          <div class="collapse pt-3" id="collapseRemark">
            <div class="card card-body">
            {{ $project->project_remark }}
            </div>
          </div>
        </p>
      </div>
      @endif
    </div>

    <div class="container">
      @php 
        $counter = 0; 
      @endphp

      @foreach ($project->services as $service)
        @if ($counter % 3 == 0)
        <div class="row">
        @endif
          <div class="col-4">
              <div class="team-classic wow fadeInUp vendor-card" data-wow-delay=".1s">
                  <div class="vendor-card-img-cont" data-bs-toggle="modal" data-bs-target="#modal-{{ $service->id }}">
                      <img src="images/venue-1.jpg" class="vendor-card-img" />
                      <x-business-category-icon :business_category="$service->service->vendor->user_info->business_category" />
                  </div>
                  <div class="vendor-card-title">
                      <h5 class="team-classic-name" data-bs-toggle="modal" data-bs-target="#modal-{{ $service->id }}">{{ $service->service->vendor->name }}</h5>
                  </div>
                  <div class="vendor-card-footer">
                      <div class="team-classic-status">{{ ucwords(str_replace('_', ' ', $service->service->vendor->user_info->city)) }}, {{ ucwords(str_replace('_', ' ', $service->service->vendor->user_info->state)) }}</div>
                      <div class="vendor-card-content">
                          <!-- <ul class="team-classic-list-social list-inline">
                              <li><a class="icon novi-icon mdi mdi-facebook" href="#"></a></li>
                              <li><a class="icon novi-icon mdi mdi-instagram" href="#"></a></li>
                              <li><a class="icon novi-icon mdi mdi-youtube-play" href="#"></a></li>
                          </ul> -->
                          <p class="text-secondary text-justify">Status: <x-service-status-badge :status="$service->status"/></p>
                          <div class="heading-1 vendor-card-placeholder">{{ str_replace('_', ' ', $service->service->vendor->user_info->business_category) }}</div>
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
                    <i class="fa-solid fa-phone pe-2"></i> <a href="tel:+6{{ $service->service->vendor->user_info->phone }}"> +6{{ $service->service->vendor->user_info->phone }}</a><br/>

                    <!-- Vendor Email -->
                    <i class="fa-solid fa-envelope text-normal pe-2"></i> <a href="mailto:{{ $service->service->vendor->email }}"> {{ $service->service->vendor->email }}</a><br/>
                    
                    <!-- Vendor Address -->
                    <i class="fa-solid fa-location-dot pe-2"></i>&nbsp;
                    {{ $service->service->vendor->user_info->address }},
                    {{ $service->service->vendor->user_info->postal_code }} 
                    {{ $service->service->vendor->user_info->city }},
                    {{ ucfirst(str_replace('_', ' ', $service->service->vendor->user_info->state)) }}.
                    <br/>

                    <!-- Vendor Website -->
                    <i class="fa-solid fa-link pe-1"></i> <a href="#"> www.company_a.com</a><br/>
                  </div>

                  <hr>

                  <div class="p-3 pb-5">
                    <h5 class="text-capitalize text-center">Selected Service</h5>
                    <!-- Service Name -->
                    <p><b>{{ $service->service->service_name }}</b></p><br/>

                    <!-- Service Details -->
                    @if ($service->service->vendor->user_info->business_category == "venue" || $service->service->vendor->user_info->business_category == "wedding_rentals")
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

      @endforeach
    </div>
  </section>
@endsection
