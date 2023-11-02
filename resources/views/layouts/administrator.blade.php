<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="wide wow-animation">
    
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link rel="stylesheet" href="{{ asset('vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/administrator/select.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/administrator/vertical-layout-light/style.css') }}">
    <link rel="shortcut icon" href="{{ asset('images/administrator/favicon.png') }}" />
  </head>

  <body>

    <div class="container-scroller">
      
      <!-- Top Navigation Bar -->
      @include('layouts.partials.administrator.top-navbar')

      <div class="container-fluid page-body-wrapper">        
        <!-- Side Navigation Bar -->
        @include('layouts.partials.administrator.side-navbar')
        
        <div class="main-panel">
          <div class="content-wrapper">
            @yield('content')
          </div>

          @include('layouts.partials.administrator.footer')
        </div>

      </div>  
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="{{ asset('vendors/js/vendor.bundle.base.js') }}"></script>
    <script src="{{ asset('vendors/chart.js/Chart.min.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('vendors/datatables.net-bs4/dataTables.bootstrap4.js') }}"></script>


    <script src="{{ asset('js/administrator/off-canvas.js') }}"></script>
    <script src="{{ asset('js/administrator/hoverable-collapse.js') }}"></script>
    <script src="{{ asset('js/administrator/template.js') }}"></script>
    <script src="{{ asset('js/administrator/settings.js') }}"></script>
    <script src="{{ asset('js/administrator/todolist.js') }}"></script>
    <script src="{{ asset('js/administrator/dataTables.select.min.js') }}"></script>

    @stack('scripts')
  </body>
</html>