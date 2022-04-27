@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/partner.css')}}">
    <style>
        .header{
            font-weight: 500;
            font-size: 50px;
            margin-top: 3rem;
            font-family: AEmb,Helvetica,Arial,sans-serif;
        }
        .paragraph{
            margin-top: 1rem;
            font-family: AEmb,Helvetica,Arial,sans-serif;
        }
        ul.b {
            list-style-type: square;
        }
        ul li{
            margin-top: 10px;
        }
    </style>
@endsection
@section('content')
    <div class="hero_section">

        <div class="heading">
            <h2>
                The Spree Business Vendor / Seller Network
            </h2>
            <p>
                If you love building and leading teams, start your own business as an Spree Service Partner,
                delivering smiles to customers across your community. Apply today or sign up to learn more.
            </p>
            <a href="{{route('sellOnSpree.form')}}" class="button">
                Be Our Vendor / Seller
            </a>

        </div>

    </div>
    <main>

        <div class="container">
            <h1 class="header">
                Sell on Spree
            </h1>
            <p class="paragraph">
                It’s no secret: At Amazon, we obsess over customers. And our customers want a trusted destination where they can purchase a wide
                variety of goods—which is what makes sellers like you so important. We’re always looking for ways to add value for our customers and be Earth’s most customer-centric company.
                As an Amazon seller, you take part in offering those customers better selection, better prices, and a top-notch customer experience.
            </p>
            <h1 class="header">
                How to register
            </h1>
            <p class="paragraph">
                It’s no secret: At Amazon, we obsess over customers. And our customers want a trusted destination where they can purchase a wide
                variety of goods—which is what makes sellers like you so important. We’re always looking for ways to add value for our customers and be Earth’s most customer-centric company.
                As an Amazon seller, you take part in offering those customers better selection, better prices, and a top-notch customer experience.
            </p>
            <h1 class="header">
                What you'll need to get started
            </h1>
            <p class="paragraph">
                In order to complete your registration, make sure you have access to:
            </p>
            <ul class="b ml-5 mt-4">
                <li>Bank account number and bank routing number</li>
                <li>Chargeable credit card</li>
                <li>Government issued national ID</li>
                <li>Tax information</li>
                <li>Phone number</li>
            </ul>
        </div>













        <!-- partner section -->
{{--        <section class="partner mt-2">--}}

{{--            <div class="wrapper">--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <div class="rowImg">--}}
{{--                            <img src="../images/vendor1.jpg" alt="image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <div class="desc">--}}
{{--                            <h4 class="mb-4">--}}
{{--                                Pro Seller Badge--}}
{{--                            </h4>--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, reiciendis iure?--}}
{{--                                Sequi, et iure quam officiis sed quaerat velit mollitia ad culpa voluptates totam--}}
{{--                                excepturi dicta commodi corrupti magni dignissimos?--}}
{{--                            </p>--}}
{{--                            <div class="mt-3">--}}
{{--                                <a href="">--}}
{{--                                    Learn More &rarr;--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row reverse">--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <div class="rowImg">--}}
{{--                            <img src="../images/vendor1.jpg" alt="image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <div class="desc">--}}
{{--                            <h4 class="mb-4">--}}
{{--                                Pro Seller Badge--}}
{{--                            </h4>--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, reiciendis iure?--}}
{{--                                Sequi, et iure quam officiis sed quaerat velit mollitia ad culpa voluptates totam--}}
{{--                                excepturi dicta commodi corrupti magni dignissimos?--}}
{{--                            </p>--}}
{{--                            <div class="mt-3">--}}
{{--                                <a href="">--}}
{{--                                    Learn More &rarr;--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="row">--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <div class="rowImg">--}}
{{--                            <img src="../images/vendor1.jpg" alt="image">--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-6 col-sm-12">--}}
{{--                        <div class="desc">--}}
{{--                            <h4 class="mb-4">--}}
{{--                                Pro Seller Badge--}}
{{--                            </h4>--}}
{{--                            <p>--}}
{{--                                Lorem ipsum dolor sit amet consectetur adipisicing elit. Cupiditate, reiciendis iure?--}}
{{--                                Sequi, et iure quam officiis sed quaerat velit mollitia ad culpa voluptates totam--}}
{{--                                excepturi dicta commodi corrupti magni dignissimos?--}}
{{--                            </p>--}}
{{--                            <div class="mt-3">--}}
{{--                                <a href="">--}}
{{--                                    Learn More &rarr;--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}

{{--        </section>--}}
    </main>
@endsection
