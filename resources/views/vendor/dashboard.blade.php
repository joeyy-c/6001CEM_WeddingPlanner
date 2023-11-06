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
              <p class="mb-4">Total Incoming Projects</p>
              <p class="fs-30 mb-2">{{ $total_incoming_project }}</p>
              <p>Total projects that have been received.</p>
              <!-- <p>22.00% (30 days)</p> -->
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Projects Confirmed</p>
              <p class="fs-30 mb-2">{{ $total_project_confirmed }}</p>
              <p>Total projects that has received deposit payment and confimed.</p>
              <!-- <p>2.00% (30 days)</p> -->
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Projects Declined/Cancelled</p>
              <p class="fs-30 mb-2">{{ $total_project_declined_or_cancelled }}</p>
              <p>Total projects that declined or cancelled by your side.</p>
              <!-- <p>0.22% (30 days)</p> -->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Detailed Reports -->
  <div class="row">
    <div class="col-md-12 grid-margin stretch-card">
      <div class="card position-relative">
        <div class="card-body">
          <div class="row">
            <div class="col-md-12 col-xl-3 d-flex flex-column justify-content-start">
              <div class="ml-xl-4 mt-3">
              <p class="card-title">Detailed Reports</p>
                @php
                  $top_services_total_sales = 0;
                  foreach ($top_services_sales as $service) {
                      $top_services_total_sales += $service->sales;
                  }
                @endphp
                <h2 class="text-primary my-3">RM {{ number_format($top_services_total_sales, 2) }}</h2>
                <p class="mb-xl-0">The total sales for current year based on different type of services sold.</p>
              </div>  
              </div>
            <div class="col-md-12 col-xl-9">
              <div class="row">
                <div class="col-md-6 border-right">
                  <div class="table-responsive mb-3 mb-md-0 mt-3">
                    <table class="table table-borderless report-table">
                      @foreach ($top_services_sales as $service)
                        <tr>
                          <td class="text-muted">{{ $service->service_name }}</td>
                          <td class="w-100 px-0">
                            <div class="progress progress-md mx-4">
                              <div class="progress-bar bg-primary" role="progressbar" style="width: {{ ($service->sales / $top_services_total_sales) * 100 }}%" aria-valuenow="{{ ($service->sales / $top_services_total_sales) * 100 }}" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td><h5 class="font-weight-bold mb-0">RM {{ number_format($service->sales, 2) }}</h5></td>
                        </tr>
                      @endforeach
                    </table>
                  </div>
                </div>
                <div class="col-md-6 mt-3">
                  <canvas id="donut-chart"></canvas>
                  <div id="donut-chart-legend"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
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
                  <th>Service Name</th>
                  <th>Project Start Date</th>
                  <th>Project End Date</th>
                  <th>Wedding Date</th>
                  <th>Status</th>
                </tr>  
              </thead>
              <tbody>
                @foreach ($latest_projects as $project)
                  <tr>
                      <td><a href="{{ route('vendor.projects.edit', ['project_service' => $project]) }}">{{ $project->id }}</a></td>
                      <td>{{ $project->project->project_name }}</td>
                      <td><a href="{{ route('vendor.services.edit', ['service' => $project->service]) }}">{{ $project->service->service_name }}</a></td>
                      <td>{{ empty($project->start_date) ? '-' : date('d M Y', strtotime($project->start_date)) }}</td>
                      <td>{{ empty($project->end_date) ? '-' : date('d M Y', strtotime($project->end_date)) }}</td>
                      <td>{{ date('d M Y', strtotime($project->project->wedding_date)) }}</td>
                      <td><x-service-status-badge :status="$project->status"/></td>
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
    var donut_chart_data = {
        labels: JSON.parse("{{ json_encode($donut_chart_data['labels']) }}".replace(/&quot;/g,'"')),
        data: {{ json_encode($donut_chart_data['data']) }}
    };
  </script>

@endpush