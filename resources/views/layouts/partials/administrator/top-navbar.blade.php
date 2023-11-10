<nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
    <!-- Logo -->
    <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
        <a class="navbar-brand brand-logo mr-5" href="index.html"><img src="{{ asset('images/logo.png') }}" class="mr-2 navbar-logo-dark" alt="logo"/></a>
        <a class="navbar-brand brand-logo-mini" href="index.html"><img src="{{ asset('images/logo.png') }}" class="navbar-logo-dark" alt="logo"/></a>
    </div>

    <!-- Dropdown Menu -->
    <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
        <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
            <span class="icon-menu"></span>
        </button>
        <ul class="navbar-nav navbar-nav-right">
            <li class="nav-item dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true">
            {{ Auth::user()->name }}
            </button>
            <div class="dropdown-menu navbar-dropdown" aria-labelledby="dropdownMenuButton1">
                <!-- <h6 class="dropdown-header">Settings</h6> -->
                <!-- <a class="dropdown-item" href="#">Another action</a>
                <a class="dropdown-item" href="#">Something else here</a>
                <div class="dropdown-divider"></div> -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <a class="dropdown-item text-danger" href="{{ route('logout') }}" onclick="event.preventDefault();
                                    this.closest('form').submit();">
                    <i class="ti-power-off text-danger"></i>
                    Logout
                    </a>
                </form>
            </div>
            </li>
        </ul>
        <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="offcanvas">
        <span class="icon-menu"></span>
        </button>
    </div>
</nav>