
<style>
    .navbar-light a.back_home {
        color: #000000;
        padding: 10px;
    }
    .navbar-dark a.back_home {
        color: #ffff;
        padding: 10px;
    }

    .dark-layout .navbar-light a.back_home {
        color: #fff;
    }
    button.logout {
        padding: 5px 20px !important;
    }
</style>
<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
        <div class="bookmark-wrapper d-flex align-items-center">
            <ul class="nav navbar-nav d-xl-none">
                <li class="nav-item"><a class="nav-link menu-toggle" href="#"><svg xmlns="http://www.w3.org/2000/svg" width="14" height="14" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-menu ficon"><line x1="3" y1="12" x2="21" y2="12"></line><line x1="3" y1="6" x2="21" y2="6"></line><line x1="3" y1="18" x2="21" y2="18"></line></svg></a></li>
            </ul>
            
        </div>
        {{-- <a class="back_home" href="!#">Back to site</a> --}}
        <ul class="nav navbar-nav align-items-center ms-auto">
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            
            
            <li class="nav-item dropdown dropdown-user"><a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none"><span class="user-name fw-bolder">Admin</span></div><span class="avatar"><img class="round" src="{{ asset('/assets/images/avatar.png ') }}" alt="avatar" height="40" width="40"><span class="avatar-status-online"></span></span>
                </a>
                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="dropdown-user">
                    
                    <!-- <a class="dropdown-item" href="" >
                        <i class="me-50" data-feather="settings"></i> 
                        Settings
                    </a> -->
                    <form method="POST" action="">
                        @csrf
                        <button type="submit" class="dropdown-item logout" style="background: none; border: none; padding: 0; margin: 0;">
                            <i class="me-50" data-feather="power"></i> Logout
                        </button>
                    </form>
                   
                </div>
            </li>
        </ul>
    </div>
</nav>