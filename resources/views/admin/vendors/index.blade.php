@extends('layouts.administrator')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h4 class="card-title">Vendors</h4>
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
                <th>Category</th>
                <th>Name</th>
                <th>Phone</th>
                <th>E-mail</th>
                <th>Address</th>
                <th>City/State</th>
                <th>Website</th>
                <!-- <th>Status</th> -->
              </tr>
            </thead>
            <tbody>
              @foreach ($vendors as $vendor)
              <tr>
                <td><a href="{{ route('vendors.edit', ['vendor' => $vendor]) }}">{{ $vendor->id }}</a></td>
                <td><span class="badge bg-secondary text-light">{{ ucwords(str_replace('_', ' ', $vendor->user_info->business_category)) }}</span></td>
                <td>{{ $vendor->name }}</td>
                <td>{{ $vendor->user_info->phone }}</td>
                <td>{{ $vendor->email }}</td>
                <td>{{ $vendor->user_info->address }}</td>
                <td>{{ ucwords(str_replace('_', ' ', $vendor->user_info->city)) . ', ' . ucwords(str_replace('_', ' ', $vendor->user_info->state)) }}</td>
                <td><a href="{{ $vendor->user_info->website_link }}" target="_blank">{{ $vendor->user_info->website_link }}</a></td>
                <!-- <td></td> -->
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