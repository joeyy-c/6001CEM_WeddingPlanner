@extends('layouts.administrator')

@section('content')
<div class="col-lg-12 grid-margin stretch-card">
    <div class="card">
      <div class="card-body">
        <div class="row">
          <div class="col">
            <h4 class="card-title">Admins</h4>
          </div>
        </div>

        <div class="row">
            <a href="{{ route('admins.create') }}" class="btn btn-primary btn-icon-text btn-sm mb-3">Add<i class="ti-plus btn-icon-append"></i></a>
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
                <th>Name</th>
                <th>E-mail</th>
              </tr>
            </thead>
            <tbody>
              @foreach ($admins as $admin)
              <tr>
                <td><a href="{{ route('admins.show', ['admin' => $admin]) }}">{{ $admin->id }}</a></td>
                <td>{{ $admin->name }}</td>
                <td>{{ $admin->email }}</td>
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