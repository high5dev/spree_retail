<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('dashboard-vendor/bootstrap/css/bootstrap.min.css')}}">
    <link href="{{asset('dashboard-vendor/fonts/circular-std/style.css')}}" rel="stylesheet">
{{--    <link rel="stylesheet" href="{{asset('css/dashboard/style.css')}}">--}}
    <link rel="stylesheet" href="{{asset('css/dashboard/new-style.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/fonts/fontawesome/css/fontawesome-all.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/charts/chartist-bundle/chartist.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/harts/morris-bundle/morris.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/fonts/material-design-iconic-font/css/materialdesignicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/charts/c3charts/c3.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/fonts/flag-icon-css/flag-icon.min.css')}}">

    @yield('css-files')
    <title>Concept - Bootstrap 4 Admin Dashboard Template</title>
</head>

<body onload="submit_button()">
    @include('vendor.inc.message_popup')
<!-- ============================================================== -->
<!-- main wrapper -->
<!-- ============================================================== -->
<div class="dashboard-main-wrapper">
    <!-- ============================================================== -->
    <!-- navbar -->
    <!-- ============================================================== -->
{{--    @include('vendor.inc.dashboardVendorNavbar')--}}
    <!-- ============================================================== -->
    <!-- end navbar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- left sidebar -->
    <!-- ============================================================== -->
    @include('vendor.inc.dashboardVendorSidebar')
    <!-- ============================================================== -->
    <!-- end left sidebar -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- wrapper  -->
    <!-- ============================================================== -->
    @yield('content')
    <!-- ============================================================== -->
    <!-- end wrapper  -->
    <!-- ============================================================== -->
</div>
<!-- ============================================================== -->
<!-- end main wrapper  -->
<!-- ============================================================== -->
<!-- Optional JavaScript -->
<!-- jquery 3.3.1 -->
<script src="{{asset('dashboard-vendor/jquery/jquery-3.3.1.min.js')}}"></script>
<!-- bootstap bundle js -->
<script src="{{asset('dashboard-vendor/bootstrap/js/bootstrap.bundle.js')}}"></script>
<!-- slimscroll js -->
<script src="{{asset('dashboard-vendor/slimscroll/jquery.slimscroll.js')}}"></script>
<!-- main js -->
<script src="{{asset('js/dashboard/main-js.js')}}"></script>
<!-- chart chartist js -->
<script src="{{asset('dashboard-vendor/charts/chartist-bundle/chartist.min.js')}}"></script>
<!-- sparkline js -->
<script src="{{asset('dashboard-vendor/charts/sparkline/jquery.sparkline.js')}}"></script>
<!-- morris js -->
<script src="{{asset('dashboard-vendor/charts/morris-bundle/raphael.min.js')}}"></script>
<script src="{{asset('dashboard-vendor/charts/morris-bundle/morris.js')}}"></script>
<!-- chart c3 js -->
<script src="{{asset('dashboard-vendor/charts/c3charts/c3.min.j')}}"></script>
<script src="{{asset('dashboard-vendor/charts/c3charts/d3-5.4.0.min.js')}}"></script>
<script src="{{asset('dashboard-vendor/charts/c3charts/C3chartjs.js')}}"></script>
<script src="{{asset('js/dashboard/dashboard-ecommerce.js')}}"></script>

@yield('js-files')
</body>

</html>




