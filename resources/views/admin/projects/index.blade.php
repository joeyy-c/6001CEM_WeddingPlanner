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
          @foreach ($projectsDetails as $project)
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
          </tbody>
          @endforeach
        </table>
      </div>
    </div>
  </div>
</div>
@endsection