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
        
        @if(session('success'))
          <div class="alert alert-success">
            {{ session('success') }}
          </div>
        @endif

        @if(session('error'))
          <div class="alert alert-danger">
            {{ session('error') }}
          </div>
        @endif

        <!-- <p class="card-description">
          Add class <code>.table-striped</code>
        </p> -->
        <div class="table-responsive">
          <table id="table" class="display expandable-table" style="width:100%">
            <thead>
              <tr>
                  <th>ID</th>
                  <th>Project Name</th>
                  <th>Customer Name</th>
                  <th>Service Name</th>
                  <th>Customer Remark</th>
                  <th>Project Start Date</th>
                  <th>Project End Date</th>
                  <th>Wedding Date</th>
                  <th>Status</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($projects as $project)
                <tr>
                    <td><a href="{{ route('vendor.projects.edit', ['project_service' => $project]) }}">{{ $project->id }}</a></td>
                    <td>{{ $project->project->project_name }}</td>
                    <td>{{ $project->project->cust->name }}</td>
                    <td>{{ $project->service->service_name }}</td>
                    <td>{{ $project->project->project_remark }}</td>
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
@endsection

@push('scripts')
  <script>
    $(document).ready(function() {
      let table = $('#table').DataTable({
        responsive: true
      });
    });
  </script>
@endpush