@extends('layouts.job')
@section('bootstrap')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
@endsection
@section('css-files')
    <style>
        body{
            background-color: black;
        }
        .p-text{
            font-size: 22px;
            color: white;
            margin-left: 20px;
        }
        .footer-link{
            font-size: 15px;
            color: white;
            margin-bottom: 22px;
        }
        .nav-link{
            font-size: 20px;
            color: white;
            margin-left: 17px;
            font-family: Lato, sans-serif;
        }
        .navbar-brand{
            font-size: 27px;
            font-weight: 700;
            color: white;
            margin-bottom: 4px;
        }
        a:hover{
            color: #007bff;
        }
        .fa{
            font-size: 1.2rem;
        }

        @media (max-width: 700px) {
            .p-text{
                font-size: 15px;
                color: white;
                margin-left: 0px;
                padding-left: 0px;
                margin-top: 15px;
            }
            .banner{
                width: 100%;
                height: 200px;
            }
            .container-fluid{
                width: 95%;
            }
            .links{
                margin-bottom: 0px !important;
            }
            .link-r{
                margin-top: 15px !important;
            }
            .icons{
                padding-left: 0px !important;
                margin-left: 0px !important;
            }
        }

        @media (min-width: 700px) {
            .banner{
                width: 100%;
                height: 300px;
            }
            .container-fluid{
                width: 70%;
            }
        }

        @media (min-width: 992px) {

        }

        @media (min-width: 1200px) {

        }
    </style>
@endsection
@section('content')
    <!-- Start Banner -->
    <div class="">
        <img class="banner" src="{{asset('images/career.png')}}">
    </div>
    <!-- End Banner -->
    <!-- Start Content -->
    <div class="row mt-5">
        <div class="col-sm-12 col-md-2">
            <h5 class="text-white">About Us</h5>
        </div>
        <div class="col-sm-12 col-md-10 text-justify">
            <p class="p-text">Spree is a technology company focused on developing consumer products and services. Our core mission is to
                develop customer driven platforms across many verticals with a long-term outlook.
                From developing technologies, creating products and establishing services that enrich people's daily lives.</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-12 col-md-2">
            <h5 class="text-white">What We Do</h5>
        </div>
        <div class="col-sm-12 col-md-10 text-justify">
            <p class="p-text">We're invested in several business areas that center on value. From creating online retail platforms that
                enable small to medium sized brands, to creating intellectual property
                that we're passionate about from the ground up that we hope can delight and inspire the masses in multiple entertainment mediums.</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-12 col-md-2">
            <h5 class="text-white">Developing Partners</h5>
        </div>
        <div class="col-sm-12 col-md-10 text-justify">
            <p class="p-text">Having partners we can build strong relationships with is the foundation of our company.
                From our several retail platforms built on the sole purpose of the development and growth of emerging brands.</p>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col-sm-12 col-md-2 col-md-2">
            <h5 class="text-white">Our Workplace Culture</h5>
        </div>
        <div class="col-sm-12 col-md-10 text-justify">
            <p class="p-text">Focused on building the best possible culture to help individuals grow and realize their full potential. We are a remote
                team seeking talented individuals from around the globe, who can handle a fast paced work-environment and are committed to the long-term.</p>
        </div>
    </div>
    <!--- End Content -->
@endsection
@section('js-files')
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection
