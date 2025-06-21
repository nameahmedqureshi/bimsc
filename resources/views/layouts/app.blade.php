<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'Dashboard')</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    @include('includes.styles')

    @yield('page-styles') 
</head>
<body class="vertical-layout vertical-menu-modern 2-columns">

    @include('includes.header')
    @include('includes.menu')

    <div class="app-content content">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        @yield('content')
    </div>
    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    @include('includes.scripts')
    @yield('page-scripts') 

</body>
</html>