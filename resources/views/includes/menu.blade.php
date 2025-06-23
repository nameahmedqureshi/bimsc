
<style>
    img.dark-logo, img.light-logo{
        display: none;
    }
    .main-menu .navbar-header .navbar-brand .brand-logo img {
        max-width: 130px;
    }
    
    html.light-layout.dark-layout img.dark-logo {
        display: none;
    }
    html.dark-layout img.light-logo, html.light-layout.dark-layout img.light-logo{
        display: block;
    }
    html.light-layout img.dark-logo {
        display: block;
    }

</style>
<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item me-auto"><a class="navbar-brand" href=""><span class="brand-logo">
                        <img class="dark-logo" src="{{ asset('/assets/images/bimsc-logo.png ') }}" alt="logo">
                        <img class="light-logo" src="{{ asset('/assets/images/bimsc-logo.png ') }}" alt="">
                    </span>
                    <!-- <h2 class="brand-text">Julianna<br><small>Moda</small></h2> -->
                </a></li>
            <!-- <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li> -->
        </ul>
    </div>
    <div class="shadow-bottom"></div>
    <div class="main-menu-content">
        <!-- adminstrators -->
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">

            <li class="nav-item"><a class="d-flex align-items-center" href="{{ route('dashboard') }}"><i data-feather="home"></i><span class="menu-title text-truncate" data-i18n="Dashboard">Dashboard</span></a></li>
            @auth
             @if(auth()->user()->role === 'admin')
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='users'></i><span class="menu-title text-truncate" data-i18n="Users">Users</span></a>
                <ul class="menu-content">
                    <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('admin.user.create') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Add New User ">Add New User </span></a></li>
                    <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('admin.user.index') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="All Users ">All Users </span></a></li>
                </ul>
            </li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='package'></i><span class="menu-title text-truncate" data-i18n="Packages">Packages</span></a>
                <ul class="menu-content">
                    <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('admin.packages.create') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Add New User ">Add New Package </span></a></li>
                    <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('admin.packages.index') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="All Packages">All Packages </span></a></li>
                </ul>
            </li>
               @endif
                @endauth
           
        </ul>
    </div>
</div>