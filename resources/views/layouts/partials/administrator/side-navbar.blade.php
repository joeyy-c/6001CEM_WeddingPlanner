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
        <a class="nav-link" href="{{ route('vendors.index') }}">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Vendors</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="icon-grid menu-icon"></i>
            <span class="menu-title">Users</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" data-toggle="collapse" href="#ui-basic" aria-expanded="false" aria-controls="ui-basic">
            <i class="icon-layout menu-icon"></i>
            <span class="menu-title">UI Elements</span>
            <i class="menu-arrow"></i>
        </a>
        <div class="collapse" id="ui-basic">
            <ul class="nav flex-column sub-menu">
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/buttons.html">Buttons</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/dropdowns.html">Dropdowns</a></li>
                <li class="nav-item"> <a class="nav-link" href="pages/ui-features/typography.html">Typography</a></li>
            </ul>
        </div>
    </li>
    </ul>
</nav>