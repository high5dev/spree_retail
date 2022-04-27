<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Spree</title>

    <!-- Bootstrap -->
    @yield('bootstrap')

    @yield('css-files')

</head>

<body onload="submit_button()">

<div class="container-fluid p-0">


    @include('inc.new_header')

    @yield('content')

    @include('inc.new_footer')


</div>





@yield('js-files')
<script src="https://kit.fontawesome.com/15ce08dfb5.js" crossorigin="anonymous"></script>

</body>
</html>
