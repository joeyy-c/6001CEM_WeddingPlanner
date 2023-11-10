@extends('layouts.administrator')

@section('content')
  <div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <form action="{{ route('vendor.services.disableService') }}" method="post">
        @csrf
        @method('post')

        <div class="card-body">
          <!-- <div class="row">
            <div class="col">
              <h4 class="card-title">Services</h4>
            </div>
            <div class="col">
              <div style="text-align: right;">
                <a href="{{ route('vendor.services.create') }}" class="btn btn-primary btn-icon-text btn-sm mb-3">Add<i class="ti-plus btn-icon-append"></i></a>
              </div>
            </div>
          </div> -->

          <div class="row">
            <h4 class="card-title">Services</h4>
          </div>
          <div class="row">
            <a href="{{ route('vendor.services.create') }}" class="btn btn-primary btn-icon-text btn-sm mb-3">Add<i class="ti-plus btn-icon-append"></i></a>
            <button type="submit" id="btn_disable" class="btn btn-secondary btn-icon-text btn-sm ml-2 mb-3 text-light" data-bs-toggle="tooltip" data-placement="top" title="This action will disable the service, and it will no longer be recommended to users by the system." name="service_enable" value="0">Mark as disable<i class="ti-close btn-icon-append"></i></button>
            <button type="submit" id="btn_enable" style="display:none" class="btn btn-success btn-icon-text btn-sm ml-2 mb-3 text-light" data-bs-toggle="tooltip" data-placement="top" title="Enable the service and make it available for recommendation to users by the system." name="service_enable" value="1">Mark as enable<i class="ti-check btn-icon-append"></i></button>
          </div>

          @if(session('success'))
            <div class="alert alert-success">
              {{ session('success') }}
            </div>
          @endif

          @if(session('warning'))
            <div class="alert alert-warning">
              {{ session('warning') }}
            </div>
          @endif

          <!-- <p class="card-description">
            Add class <code>.table-striped</code>
          </p> -->
          <div class="table-responsive">
            <table id="table" class="display expandable-table" style="width:100%">
              <thead>
                <tr>
                  <th></th>
                  <th>ID</th>
                  <th>Status</th>
                  <th>Name</th>
                  <th>Description</th>
                  <th>
                    @php
                      $guest_count_header = array(
                        "venue" => "Maximum Guest Capacity",
                        "wedding_rentals" => "Count of Guest",
                        "catering" => "",
                        "stylist" => "",
                        "photography_and_videography" => ""
                      );
                    @endphp

                    {{ $guest_count_header[json_decode(Auth::user()->user_info)->business_category] }}
                  </th>
                  <th>
                    @php
                      $price_header = array(
                        "venue" => "Price per night (RM)",
                        "wedding_rentals" => "Price (RM)",
                        "catering" => "Price per table (RM)",
                        "stylist" => "Price per pax (RM)",
                        "photography_and_videography" => "Price (RM)"
                      );
                    @endphp

                    {{ $price_header[json_decode(Auth::user()->user_info)->business_category] }}
                  </th>
                </tr>
              </thead>
              <tbody>
                @foreach ($services as $service)
                <tr>
                  <td><input type="checkbox" name="disable[]" value="{{ $service->id }}"></td>
                  <td><a href="{{ route('vendor.services.edit', ['service' => $service]) }}" target="_blank">{{ $service->id }}</a></td>
                  <td>
                    <span class="badge {{ ($service->service_enable == 1) ? 'bg-success' : 'bg-secondary' }} text-light">
                      {{ ($service->service_enable == 1) ? 'Enabled' : 'Disabled' }}
                    </span>
                  </td>
                  <td>{{ $service->service_name }}</td>
                  <td>{{ $service->service_desc }}</td>
                  <td>{{ $service->service_guest_count }}</td>
                  <td>{{ $service->service_price }}</td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/administrator/tooltips.js') }}"></script>

  <script>
    function createSelectDropdown() {
      // Create a select element
      var select = document.createElement("select");
      select.classList.add("col-4", "ml-2");
      select.id = "service-enable-filter";

      // Create and append option elements to the select element
      var optionsLabel = ["-- Select Status --", "Enabled", "Disabled"];
      var optionsValue = ["", "Enabled", "Disabled"];
      for (var i = 0; i < optionsLabel.length; i++) {
        var option = document.createElement("option");
        option.text = optionsLabel[i];
        option.value = optionsValue[i];
        select.appendChild(option);
      }
      
      var tableFilter = document.getElementById("table_filter");
      tableFilter.style.display = "flex";
      tableFilter.appendChild(select);
    }

    $(document).ready(function() {
      window.onload = function() {
        let table = $('#table').DataTable({
          responsive: true,
          columnDefs: [
              {
                  targets: 0, // First column (0-based index)
                  orderable: false // Make it unsortable
              }
          ]
        });

        createSelectDropdown();
        table.column(2).search('').draw();

        $('#service-enable-filter').on('change', function () {
          table.column(2).search(this.value).draw();
          if (this.value == "Disabled") {
            document.getElementById('btn_disable').style.display = 'none';
            document.getElementById('btn_enable').style.display = 'block';
          }
          else {
            document.getElementById('btn_disable').style.display = 'block';
            document.getElementById('btn_enable').style.display = 'none';
          }
        });

        $('[data-bs-toggle="tooltip"]').tooltip();
      };      
    });
  </script>
  
@endpush