@php
    $user = Auth::user();
    $isAdmin = optional($user->role)->role_name === 'Admin';
@endphp

<nav class="sidebar sidebar-offcanvas" id="sidebar">
    <ul class="nav">
    <li class="nav-item">
        <a class="nav-link" href="{{ route('vendor.dashboard') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Dashboard</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ $isAdmin ? route('admin.projects.index') : route('vendor.projects.index') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Projects</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="{{ $isAdmin ? route('admin.services.index') : route('vendor.services.index') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Services</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Service Availability</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#users" aria-expanded="false" aria-controls="users">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">Users</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="users">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="{{ route('vendors.index') }}">Vendors</a></li>
                <li class="nav-item"> <a class="nav-link" href="{{ route('users.index') }}">Normal Users</a></li>
                <!-- <li class="nav-item"> <a class="nav-link" href="#">Admin</a></li> -->
            </ul>
        </div>
    </li>
    </ul>
</nav>