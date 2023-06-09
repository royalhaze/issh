<!DOCTYPE html>
<html lang="fa" class="light-style layout-navbar-fixed layout-menu-fixed" dir="rtl" data-theme="theme-default" data-assets-path="/assets/" data-template="vertical-menu-template">
<head>
    @include('panel.partials.head')
    @yield('head')
    <title>@yield('title')</title>
</head>

<body>
<!-- Layout wrapper -->
<div id="app" class="layout-wrapper layout-content-navbar">
    <div class="layout-container">

        <!-- Menu -->
    @include('panel.partials.sidebar')
    <!-- / Menu -->
        <!-- Layout container -->
        <div class="layout-page">
            <!-- Navbar -->
        @include('panel.partials.navbar')
        <!-- / Navbar -->

            <!-- Content wrapper -->
            <div class="content-wrapper">
                <!-- Content -->
                @yield('content')
            </div>
            <!-- Content wrapper -->
        </div>
        <!-- / Layout page -->
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>
</div>
<!-- / Layout wrapper -->
@yield('script')
@include('panel.partials.scripts')
</body>
</html>
