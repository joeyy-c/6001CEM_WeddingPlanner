@extends('layouts.administrator')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome <span class="text-primary">{{ auth()->user()->name }}</span></h3>
          <p class="font-weight-normal mb-0">Always monitor and keep track of sales reports, project progress, and service-related statistics here. <br/>Only projects that have received a deposit payment and have not been declined or cancelled by your side will be included in the calculation.</p>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button type="button" class="btn btn-primary" disabled>Year {{ date("Y") }}</button>
          </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Chart and 4 container statistic -->
  <div class="row">
    <div class="col-md-8 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Sales Report</p>
          <canvas id="sales-chart"></canvas>
        </div>
      </div>
    </div>
    <div class="col-md-4 grid-margin transparent">
      <div class="row">
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-tale">
            <div class="card-body">
              <p class="mb-4">Total Sales (RM)</p>
              <p class="fs-30 mb-2">{{ $total_sales }}</p>
              <p>Total sales amount for current year.</p>
              <!-- <p>10.00% (30 days)</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Total Projects</p>
              <p class="fs-30 mb-2">{{ $total_project }}</p>
              <p>Total projects that have been received.</p>
              <!-- <p>22.00% (30 days)</p> -->
            </div>
          </div>
        </div>
      </div>
      @if (auth()->user()->role->role_name == "Vendor")
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Projects Confirmed</p>
              {{-- <p class="fs-30 mb-2">{{ $total_project_confirmed }}</p> --}}
              <p>Total projects that has received deposit payment and confimed.</p>
              <!-- <p>2.00% (30 days)</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Projects Declined/Cancelled</p>
              {{-- <p class="fs-30 mb-2">{{ $total_project_declined_or_cancelled }}</p> --}}
              <p>Total projects that declined or cancelled by your side.</p>
              <!-- <p>0.22% (30 days)</p> -->
            </div>
          </div>
        </div>
      </div>
      @endif
    </div>
  </div>

  <!-- Latest Projects -->
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card">
        <div class="card-body">
          <p class="card-title">Latest Projects</p>
          <div class="table-responsive">
            <table class="display expandable-table" style="width:100%">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Project Name</th>
                  <th>Customer Name</th>
                  <th>Budget (RM)</th>
                  <th>Wedding Date</th>
                  <th>Services Included</th>
                  <th>Services Status</th>
              </tr>
              </thead>
              <tbody>
                @foreach ($latest_projects as $project)
                <tr>
                   <td><a href="{{ route('admin.projects.show', ['project' => $project->project_id]) }}">{{ $project->project_id }}</a></td>
                   <td>{{ $project->project_name }}</td>
                   <td>{{ $project->cust_name }}</td>
                   <td>{{ $project->budget }}</td>
                   <td>{{ date('d M Y', strtotime($project->wedding_date)) }}</td>
                   <td>
                     @foreach ($project->services as $service)
                       <div class="pb-2">
                         <b>{{ $service['vendor_category'] }}</b>: {{ $service['service_name'] }} <br/>
                       </div>
                     @endforeach
                   </td>
                   <td>
                     @foreach ($project->services as $service)
                       <div class="pb-2">
                         <x-service-status-badge :status="$service['service_status']"/><br/>
                       </div>
                     @endforeach
                   </td>
                 </tr>
               @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@push('scripts')
  <script src="{{ asset('js/administrator/dashboard.js') }}"></script>
  <script src="{{ asset('js/administrator/Chart.roundedBarCharts.js') }}"></script>
  <script>
    var line_chart_data = JSON.parse("{{ json_encode($line_chart_data) }}");
  </script>

@endpush