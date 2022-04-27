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
        .job-type{
            font-weight: 400;
            font-size: 16px;
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


    <!--Explore opportunities-->
    <div class="row ">

        <div class="col-lg-12 mr-auto pl-0">
            <div class="description   p-2 ">
                <h2>{{$job->name}}</h2>
                <h5 class="job-type col-12 text-muted pl-0 mt-4">{{$job->type}}</h5>
                <h5 class="job-type col-12 text-muted pl-0 mt-4">Remote</h5>
                    <h5 class="mt-5"><u style="font-size: 18px;">Job Description:</u></h5>
                    <p class="text-justify" style="font-size: 19px">{{$job->description}}</p>

                    <h5 class="pt-5"> <u style="font-size: 18px">Job Requirements:</u></h5>
                    <p class="text-justify" style="font-size: 19px">{{$job->qualification}}</p>

            </div>


            <h4 class="mt-5"> Apply for this job  </h4>
            <div class="most_recent">


                <div class="col-lg-12 d-flex justify-content-between    mb-2 "  style="padding: 0;">

                </div>
                <div class="col-lg-12 my-2 " style="padding: 24px;">
                    <form action="{{route('career.apply.store',$job->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <div class="row p-3">
                                <div class="col-lg-3">
                                    <label for="name" >Name</label>
                                </div>
                                <div class="col-lg-9">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input type="text " class="form-control"  placeholder="First Name" name="first_name" id="">
                                        </div>
                                        <div class="col-lg-6">
                                            <input type="text " class="form-control" placeholder="Last Name" name="last_name" id="">
                                        </div>
                                    </div>

                                </div>

                            </div>

                            <div class="row p-3 ">
                                <div class="col-lg-3">
                                    <label for="name" >Resume / CV</label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="file" name="cv" class="form-control" id="">
                                </div>

                            </div>
                            <div class="row p-3">
                                <div class="col-lg-3">
                                    <label for="name" >Linked-In Profile </label>
                                </div>
                                <div class="col-lg-9">
                                    <input type="text " placeholder="Enter Linked in Profile" class="form-control" name="linkedin_profile" id="">
                                </div>

                            </div>
                            <div class="row p-3">
                                <div class="col-lg-3">
                                    <label for="name" >Tell us about yourself</label>
                                </div>
                                <div class="col-lg-9">
                                    <textarea name="about" rows="4" class="form-control"></textarea>
                                </div>

                            </div>
                            <div class="row p-3">
                                <div class="col-lg-9">

                                </div>
                                <div class="col-lg-3">
                                    <button class="btn w-100 btn-primary">SUBMIT</button>
                                </div>


                            </div>
                        </div>
                    </form>

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

