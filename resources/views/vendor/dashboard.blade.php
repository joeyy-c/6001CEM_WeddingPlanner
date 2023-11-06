@extends('layouts.administrator')

@section('content')
  <div class="row">
    <div class="col-md-12 grid-margin">
      <div class="row">
        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
          <h3 class="font-weight-bold">Welcome <span class="text-primary">{{ auth()->user()->name }}</span></h3>
          <p class="font-weight-normal mb-0">Always monitor and keep track of sales reports, project progress, and service-related statistics here. <br/>Only projects that have received a deposit payment and have not been declined or cancelled by the vendor will be included in the calculation.</p>
        </div>
        <div class="col-12 col-xl-4">
          <div class="justify-content-end d-flex">
          <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
            <button type="button" class="btn btn-outline-primary" disabled>Year {{ date("Y") }}</button>
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
              <p>10.00% (30 days)</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 mb-4 stretch-card transparent">
          <div class="card card-dark-blue">
            <div class="card-body">
              <p class="mb-4">Total Incoming Projects</p>
              <p class="fs-30 mb-2">12</p>
              <p>22.00% (30 days)</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
          <div class="card card-light-blue">
            <div class="card-body">
              <p class="mb-4">Projects Confirmed</p>
              <p class="fs-30 mb-2">34040</p>
              <p>2.00% (30 days)</p>
            </div>
          </div>
        </div>
        <div class="col-md-6 stretch-card transparent">
          <div class="card card-light-danger">
            <div class="card-body">
              <p class="mb-4">Projects Declined/Cancelled</p>
              <p class="fs-30 mb-2">47033</p>
              <p>0.22% (30 days)</p>
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
          <p class="card-title mb-0">Latest Projects</p>
          <div class="table-responsive">
            <table class="table table-striped table-borderless">
              <thead>
                <tr>
                  <th>Product</th>
                  <th>Price</th>
                  <th>Date</th>
                  <th>Status</th>
                </tr>  
              </thead>
              <tbody>
                <tr>
                  <td>Search Engine Marketing</td>
                  <td class="font-weight-bold">$362</td>
                  <td>21 Sep 2018</td>
                  <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                </tr>
                <tr>
                  <td>Search Engine Optimization</td>
                  <td class="font-weight-bold">$116</td>
                  <td>13 Jun 2018</td>
                  <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                </tr>
                <tr>
                  <td>Display Advertising</td>
                  <td class="font-weight-bold">$551</td>
                  <td>28 Sep 2018</td>
                  <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                </tr>
                <tr>
                  <td>Pay Per Click Advertising</td>
                  <td class="font-weight-bold">$523</td>
                  <td>30 Jun 2018</td>
                  <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                </tr>
                <tr>
                  <td>E-Mail Marketing</td>
                  <td class="font-weight-bold">$781</td>
                  <td>01 Nov 2018</td>
                  <td class="font-weight-medium"><div class="badge badge-danger">Cancelled</div></td>
                </tr>
                <tr>
                  <td>Referral Marketing</td>
                  <td class="font-weight-bold">$283</td>
                  <td>20 Mar 2018</td>
                  <td class="font-weight-medium"><div class="badge badge-warning">Pending</div></td>
                </tr>
                <tr>
                  <td>Social media marketing</td>
                  <td class="font-weight-bold">$897</td>
                  <td>26 Oct 2018</td>
                  <td class="font-weight-medium"><div class="badge badge-success">Completed</div></td>
                </tr>
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