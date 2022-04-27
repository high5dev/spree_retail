@extends('layouts.job')
@section('bootstrap')
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/job/style.css">

    <script src="https://kit.fontawesome.com/93e0313e1a.js" crossorigin="anonymous"></script>
@endsection
@section('css-files')
    <style>
        body{
            background-color: black ;
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
    <!--opportunity-->
    <div class="    ">
        <div class="row ">
            <div class="col-lg-12">
                <p class="text-start explorepara mt-2 mb-5"> Why Spree</p>
                <div class="row mb-5 ">

                    <div class="col-lg-3      ">

                        <div class="">
                            <div class=" ">
                                <h5 class="card-title text-dark">Smarter connections for a better life</h4>
                                    <hr>
                                    <p class="card-text  my-4 text-muted">Tencent has always dedicated itself to two
                                        core business ideas: the social platform and digital content. Through its
                                        embrace of the industrial internet, Tencent has become a digital assistant
                                        across all walks of life. rive t ne’s quality of life..</p>

                            </div>
                        </div>



                    </div>

                    <div class="col-lg-3      ">

                        <div class="">
                            <div class=" ">
                                <h5 class="card-title text-dark">Smarter connections for a better life</h4>
                                    <hr>
                                    <p class="card-text  my-4 text-muted">Tencent has always dedicated itself to two
                                        core business ideas: the social platform and digital content. Through its
                                        embrace of the industrial internet, Tencent has become a digital assistant
                                        across all walks of life. rive t ne’s quality of life..</p>

                            </div>
                        </div>



                    </div>

                    <div class="col-lg-3      ">

                        <div class=" ">
                            <div class=" ">
                                <h5 class="card-title text-dark">We welcome every unique individual</h4>
                                    <hr>
                                    <p class="card-text text-muted">Tencent’s free and inclusive culture enables you
                                        to grow and allows your voice to be heard. Here, you meet colleagues with
                                        whom you work, who are also partners with whom you grow.</p>

                            </div>
                        </div>



                    </div>

                    <div class="col-lg-3      ">

                        <div class=" ">
                            <div class=" ">
                                <h5 class="card-title text-dark">Your welfare and care are essential</h4>
                                    <hr>
                                    <p class="card-text text-muted">Your efforts will be remembered and rewarded.
                                        Tencent has a comfortable and high-tech workplace environment, competitive
                                        reward plans and personalized benefits.</p>

                            </div>
                        </div>




                    </div>



                </div>
            </div>
        </div>
    </div>
    <!--Explore All job Categories-->
    <div class="  ">
        <div class="row  ">
            <div class="col-lg-12">
                <p class="text-start explorepara">All job Categories</p>
                <div class="row ">

                    @foreach(config('enums.job_category') as $cat)
                        <div class="col-lg-6   my-4  ">
                            <div class="card bg-white border  jobdiv">
                                <div class="tech p-3">
                                    <div class="iconJob d-flex  justify-content-between ">
                                        <h5 >{{$cat}}</h5>
                                    </div>

                                    <a href="{{route('career.category',$cat)}}"> View jobs ></a>
                                </div>

                            </div>
                        </div>
                    @endforeach


                </div>
            </div>
        </div>
    </div>



    <!-- last div-->
    <div class="    my-5">
        <div class="row  ">
            <div class="col-lg-12  ">
                <div class="     ">
                    <div class="row ">

                        <div class="col-lg-8 my-5">
                            <h1>
                                Come build the future with us</h1>
                            <p class="py-3">Our mission is to be Earth's most customer-centric company. This is what
                                unites Amazonians across teams and geographies as we are all striving to delight our
                                customers and make their lives easier, one innovative product, service, and idea at a
                                time.</p>

                            <button class="btn border text-dark">Learn about working at Amazon</button>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
        @section('js-files')
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>
@endsection

