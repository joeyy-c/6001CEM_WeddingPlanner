
@php
  $navDark = request()->is('/');
@endphp

@if ($navDark)
<div class="position-relative bg-gray-800">
@endif

<div class="col-6 mx-auto">
  <header class="blog-header py-3">
      <div class="row flex-nowrap justify-content-between align-items-center">
        <div class="col-4">
        </div>
        <div class="col-4 text-center">
          <a class="blog-header-logo text-dark" href="#">LOGO</a>
        </div>
        <div class="col-4 d-flex justify-content-end align-items-center">
          <a href="{{ route('login') }}">Login </a> &nbsp;|&nbsp; <a href="{{ route('register') }}"> Register</a>
        </div>
      </div>
    </header>
  <div class="rd-navbar-sidebar nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
          <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="/">Home</a>
          </li>
          <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="about_us.html">About Us</a>
          </li>
          <!-- <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="vendors.html">Vendors</a>
          </li> -->
          <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="{{ route('wedding-planning.createPreferencesForm') }}">Plan a Wedding</a>
          </li>
          <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="{{ route('contact-us') }}">Contact Us</a>
          </li>
      </nav>
  </div>
</div>

@if ($navDark)
  @include('layouts.partials.home-banner')
</div>
@endif