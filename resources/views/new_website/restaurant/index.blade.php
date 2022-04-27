@extends('layouts.job')
@section('bootstrap')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/new_style.css')}}">
@endsection
@section('css-files')
    <style>
        body{
            background-color: white !important;
        }
        .footer-link{
            color: black !important;
        }
        .nav-link{
            color: black;
        }
        .navbar-brand{
            color: black;
        }
        .text-white{
            color: black !important;
        }
        .img-fluid{
            border-radius: 50px;
            width: 75%;
        }
        .paragraph{
            font-size: 18px;
            font-weight: 500;
            line-height: 30px;
        }
        .content-k{
            margin-top: 4.5rem;
        }
        .heading-k{
            font-weight: bold;
            font-size: 40px;
        }
        .main-heading{
            font-weight: 700;
        }
        .sub-text{
        }
    </style>
@endsection
@section('content')
    <!-- Start Banner -->

    <div>
        <h1 class="main-heading mt-5">
            Become A Kitchen Partner
        </h1>
        <p class="sub-text mt-3 text-muted">Grow your business and serve new customers by partnering with us</p>
        <button form="kitchen-form" class="btn btn-lg btn-outline-dark mt-3">Apply Now</button>
        <form id="kitchen-form" action="{{route('kitchen.partner.form')}}" method="GET">

        </form>
    </div>
    <!-- End Banner -->
    <!-- Start Content -->
    <div class="row content-k">
        <div class="col-md-6">
            <h1 class="text-center heading-k">Wow Bao Now</h1>
            <p class="text-center paragraph">
                Wow Bao ships our delicious food, including our famous Potstickers, Rice Bowls, and Bao to local restaurants we have partnered with.
                Wow Bao trains restaurant partners to freshly steam Bao and offers pick up
                or delivery for customers through DoorDash, GrubHub, Uber Eats, and Postmates. Our food. Your restaurant. Your team. Your sales.
            </p>
        </div>
        <div class="col-md-6 text-center">
            <img class="img-fluid" src="{{asset('images/restaurant.jpeg')}}">
        </div>
    </div>
    <div class="row content-k">
        <div class="col-md-6 text-center">
            <img class="img-fluid" src="{{asset('images/restaurant.jpeg')}}">
        </div>
        <div class="col-md-6">
            <h1 class="text-center heading-k ml-5 mr-5">We partner with local restaurants</h1>
            <p class="text-center paragraph">
                Wow Bao ships our delicious food, including our famous Potstickers, Rice Bowls, and Bao to local restaurants we have partnered with.
                Wow Bao trains restaurant partners to freshly steam Bao and offers pick up
                or delivery for customers through DoorDash, GrubHub, Uber Eats, and Postmates. Our food. Your restaurant. Your team. Your sales.
            </p>
        </div>
    </div>
    <div style="margin-top: 6rem">

    </div>
    <!--- End Content -->
@endsection
@section('js-files')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
