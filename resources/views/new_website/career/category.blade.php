@extends('layouts.job')
@section('bootstrap')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{asset('css/job/style.css')}}">

    <script src="https://kit.fontawesome.com/93e0313e1a.js"></script>
@endsection
@section('css-files')
    <style>
        body{
            background-color: #f7f7f7 !important;
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
            color: black;
            margin-left: 17px;
            font-family: Lato, sans-serif;
        }
        .navbar-brand{
            font-size: 27px;
            font-weight: 700;
            color: black;
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
    <style>
        .text-white{
            color: black !important;
        }
        .footer-color{
            background-color: #f7f7f7 !important;
        }
    </style>
@endsection
@section('content')

    <!--search bar -->
    <div class="    ">
        <div class="row py-5">
            <div class="col-lg-12  ">
                <h2 class="mb-4">Find Jobs</h2>
                <form method="POST" action="{{route('job.search','default')}}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-7   col-12">
                            <input type="text" class=" px-4 form-control" placeholder="Search Jobs" value="{{$search}}" name="search" id="">
                        </div>
                        <div class="col-lg-4 col-12  ">
                            <i class="fas location fa-map-marker-alt mr-auto"></i>
                            <select class="form-control pl-4">
                                <option class="">USA</option>
                            </select>
                        </div>
                        <div class="col-lg-1 col-12    ">
                            <button class="btn w-100 btn-primary"><i class="fas fa-search"></i></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <style>
        .filterContainer {
            display: block;
        }

        .firstInFilter h1{

            font-size: 28px;
            font-weight: 700;
        }

        .plus{
            float: right;
            font-size: 20px;
            color:  rgba(128, 128, 128, 0.747);

        }


        .filters{
            background-color: white;
            padding-top: 10px;
            color: rgb(51, 51, 51);
        }
        .filters h3 {
            padding-bottom: 1px;
            font-size: 18px;
        }
        .underline{
            height: 1px;
            background-color: rgba(128, 128, 128, 0.274);
            margin-top: 10px;
        }
    </style>
    <!--Explore opportunities-->
    <div class="  ">
        <div class="row  ">
            <div class="col-lg-12">

                <div class="row ">

                    <div class="col-lg-4  mb-3  ">
                        <div class="filterContainer">
                            <div class="firstInFilter">
                                <h1 class="mb-4" style="white-space: nowrap;">Categories</h1>
                                <div class="boldUnderline"></div>
                            </div>
                            <div class="filters">
                                <a data-toggle="collapse" href="#collapseExample-1" role="button" aria-expanded="false" aria-controls="collapseExample-1" style="color: black">
                                    <h3 class="ml-3">Job Type<span class="plus mr-3">+</span></h3>
                                </a>
                                <div class="collapse" id="collapseExample-1">
                                    @foreach(config('enums.job_type') as $type)
                                        <div class="filters">
                                            <input class="ml-3" type="checkbox">
                                            <a style="color: black" href="" class="toggle__text text-gray garage-title">{{$type}}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="underline"></div>
                            </div>
                            <div class="filters">
                                <a data-toggle="collapse" href="#collapseExample-2" role="button" aria-expanded="false" aria-controls="collapseExample-2" style="color: black">
                                    <h3 class="ml-3">Job Category<span class="plus mr-3">+</span></h3>
                                </a>
                                <div class="collapse" id="collapseExample-2">
                                    @foreach(config('enums.job_category') as $type)
                                        <div class="filters">
                                            <input class="ml-3" type="checkbox">
                                            <a style="color: black" href="" class="toggle__text text-gray garage-title">{{$type}}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="underline"></div>
                            </div>
                            <div class="filters">
                                <a data-toggle="collapse" href="#collapseExample-3" role="button" aria-expanded="false" aria-controls="collapseExample-3" style="color: black">
                                    <h3 class="ml-3">City<span class="plus mr-3">+</span></h3>
                                </a>
                                <div class="collapse" id="collapseExample-3">
                                    @foreach($city as $type)
                                        <div class="filters">
                                            <input class="ml-3" type="checkbox">
                                            <a style="color: black" href="" class="toggle__text text-gray garage-title">{{$type}}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="underline"></div>
                            </div>
                            <div class="filters">
                                <a data-toggle="collapse" href="#collapseExample-4" role="button" aria-expanded="false" aria-controls="collapseExample-4" style="color: black">
                                    <h3 class="ml-3">Country<span class="plus mr-3">+</span></h3>
                                </a>
                                <div class="collapse" id="collapseExample-4">
                                    @foreach($country as $type)
                                        <div class="filters">
                                            <input class="ml-3" type="checkbox">
                                            <a style="color: black" href="" class="toggle__text text-gray garage-title">{{$type}}</a>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="underline"></div>
                            </div>
                        </div>




                    </div>

                    <div class="col-lg-8 col-12 ">
                        <div class="d-flex justify-content-between  flex-wrap  ">
                            <div class="most_recent">

                                <div class="row mt-5">
                                    @if(count($jobs) > 0)
                                        @foreach($jobs as $job)
                                            <div class="col-lg-12 my-2 border jobdiv " style="padding: 24px;">
                                                <a style="color: black;text-decoration: none" href="{{route('career.apply',$job->id)}}">
                                                    <h4>{{$job->name}}</h4>
                                                    <div class="iconpage d-flex justify-content-between">
                                                        <p>{{$job->city}}, {{$job->country}} | {{$job->category}} | {{\Carbon\Carbon::parse($job->created_at)->toDayDateTimeString()}}</p>
                                                    </div>
                                                    <li class="joblist">
                                                        {{implode(' ', array_slice(explode(' ', $job->description), 0, 30))}}...
                                                    </li>
                                                </a>
                                            </div>

                                        @endforeach
                                    @else
                                    @endif
                                </div>

                            </div>

                        </div>
                        {{$jobs->links()}}


                    </div>

                </div>
            </div>
        </div>
    </div>



@endsection
@section('js-files')
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection

