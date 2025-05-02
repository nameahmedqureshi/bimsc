
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

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='bold'></i><span class="menu-title text-truncate" data-i18n="Blogs">Blogs</span></a>
                    <ul class="menu-content">
                        <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('blogs.create') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Add New Blog ">Add New Blog </span></a></li>
                        <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('blogs.index') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="All Blogs ">All Blogs </span></a></li>
                        <li><a class="d-flex align-items-center" href="{{ route('blogs.categories') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Categories">Categories </span></a></li>
                        <li><a class="d-flex align-items-center" href="{{ route('blogs.tags') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Tags">Tags </span></a></li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='codepen'></i><span class="menu-title text-truncate" data-i18n="Blogs">Services</span></a>
                    <ul class="menu-content">
                        <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('service.create') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Add New Service ">Add New Service </span></a></li>
                        <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('service.index') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="All Services ">All Services </span></a></li>
                        <li><a class="d-flex align-items-center" href="{{ route('service.categories') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Categories">Categories </span></a></li>
                    </ul>
                </li>

                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i data-feather='dollar-sign'></i><span class="menu-title text-truncate" data-i18n="Invoices">Invoices</span></a>
                    <ul class="menu-content">
                        <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('service.create') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="Add New Invoice ">Add New Invoice </span></a></li>
                        <li class="d-flex align-items-center"><a class="d-flex align-items-center" href="{{ route('service.index') }}"><i data-feather='circle'></i><span class="menu-item text-truncate" data-i18n="All Services ">All Invoices </span></a></li>
                    </ul>
                </li>
              
            </ul>
          
        </div>
    </div>