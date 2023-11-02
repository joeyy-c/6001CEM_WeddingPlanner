@extends('layouts.administrator')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <div class="row">
        <div class="col">
            <h4 class="card-title">Projects</h4>
        </div>
      </div>

      <div class="table-responsive">
        <table id="table" class="display expandable-table" style="width:100%">
          @foreach ($projectsDetails as $project)
          <!-- <thead> -->
            <tr class="text-primary" style="height: 50px; background-color: rgba(75, 73, 172, 0.2);">
              <th>{{ $project->project_id }}</th>
              <th>{{ $project->cust_name }}</th>
              <th>Wedding Date: {{ $project->wedding_date }}</th>
            </tr>
            <!-- </thead> -->
            @foreach ($project->services as $service)
              <tr>
                <td colspan="2"><b>{{ $service['vendor_name'] }}</b> - {{ $service['service_name'] }}</td>
                <td><x-service-status-badge :status="$service['service_status']"/></td>
              </tr>
            @endforeach
            <tr class="border-top border-bottom">
              <td colspan="3">Budget: {{ $project->budget }}</td>
              <!-- <td>Project Date: 11 Dec 2023 - 12 Jan 2024</td> -->
            </tr>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection