
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
          <a class="blog-header-logo {{ $navDark ? 'text-light' : 'text-dark' }}" href="/">
            <img class="{{ $navDark ? 'navbar-logo' : 'navbar-logo-dark' }}" src="{{ asset('images/logo.png') }}" alt="">
          </a>
        </div>
        <!-- Navbar Login/User Name Dropdown Button -->
        <div class="col-4 btn-group dropdown-center justify-content-end">
          @auth
            <!-- Show user name and dropdown button if user logged in -->
            <button type="button" class="button button-primary-outline dropdown-toggle" style="width: 60%; padding: 12px" data-bs-toggle="dropdown" aria-expanded="false">
            {{ (strlen(auth()->user()->name) > 10) ? substr(auth()->user()->name, 0, 10) . '...' : auth()->user()->name }}
            </button>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="{{ route('userProfile.edit') }}"><i class="fa-solid fa-user fa-sm px-1"></i> Profile</a></li>
              <li><hr class="dropdown-divider"></li>
              <li>
                <form method="POST" action="{{ route('logout') }}">
                  @csrf
                  <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                  this.closest('form').submit();"><i class="fa-solid fa-arrow-right-from-bracket fa-sm text-danger px-1"></i>
                  Logout</a>
                </form>
              </li>
            </ul>
          @else
            <!-- Show login button if user not logged in & user not in the login page -->
            @if (\Route::currentRouteName() != 'login')
              <a href="{{ route('login') }}" class="button button-primary-outline" style="width: 45%; padding: 12px">Login</a>
            @else
              <a href="{{ route('register') }}" class="button button-primary-outline" style="width: 45%; padding: 12px">Register</a>
            @endif
          @endauth
        </div>
      </div>
    </header>
  <div class="rd-navbar-sidebar nav-scroller py-1 mb-2">
      <nav class="nav d-flex justify-content-between">
          <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="/">Home</a>
          </li>
          <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="{{ route('about-us') }}">About Us</a>
          </li>
          <!-- <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="vendors.html">Vendors</a>
          </li> -->
          @auth
            <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="{{ route('contact-us') }}">Contact Us</a>
            </li>
            <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="{{ route('dashboard') }}">Dashboard</a>
            </li>
          @else
            <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="{{ route('wedding-planning.createPreferencesForm') }}">Plan a Wedding</a>
            </li>
            <li class="p-2 rd-nav-item">
              <a class="rd-nav-link {{ $navDark ? 'text-white' : '' }}" href="{{ route('contact-us') }}">Contact Us</a>
            </li>
          @endauth
      </nav>
  </div>
</div>

@if ($navDark)
  @include('layouts.partials.site.home-banner')
</div>
@endif