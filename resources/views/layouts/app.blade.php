<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="wide wow-animation">
    
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, height=device-height, initial-scale=1.0">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">

        <title>{{ config('app.name', 'Laravel') }}</title>

        <link rel="icon" href="/images/favicon.ico" type="image/x-icon">
        <!-- <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Montserrat:300,400,500,700,800"> -->
        <link rel="stylesheet" href="{{ asset('css/bootstrap.css') }}">
        <!-- <link rel="stylesheet" href="{{ asset('css/fonts.css') }}"> -->
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" integrity="sha512-iecdLmaskl7CVkqkXNQ/ZH/XLlvWZOJyj7Yy7tcenmpD1ypASozpmT/E0iPtmFIB46ZmdtAc9eNBvH0H/ZpiBw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>

    <body>
        <div class="min-h-screen bg-gray-100">
            @include('layouts.partials.site.navbar')

            <!-- Page Content -->
            <main>
                @yield('content')
            </main>

            @include('layouts.partials.site.footer')
        </div>

        <script src="{{ asset('js/core.min.js') }}"></script>
        <script src="{{ asset('js/script.js') }}"></script>
        <script src="{{ asset('js/bootstrap.js') }}"></script>

        @stack('scripts')
    </body>
</html>
