@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
@endsection
@section('content')
    <main>
        <section class="profile">
            @include('inc.profileSidebar')
            <div class="pCol2">
                <div class="heading">
                    <h2>Hi {{$user->first_name}}</h2>
                </div>
                <div class="">
                    <div class="left">
                        <h3 class="information">Account Information</h3>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Account No:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto">{{$user->id}}</p>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Full Name:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto">{{$user->first_name}} {{$user->last_name}}</p>
                            </div>
                            <div class="col-3 pl-0">
                                <a href="" style=" text-decoration: underline;" class="btn btn-primary-link p-0 pb-2">Edit</a>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Password:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto">********</p>
                            </div>
                            <div class="col-3 pl-0">
                                <a href="" style=" text-decoration: underline;" class="btn btn-primary-link p-0 pb-2">Edit</a>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-2 pr-0">
                                <p>Email Address:</p>
                            </div>
                            <div class="col-3 pl-0 pr-0">
                                <p class="ml-auto">{{$user->email}}</p>
                            </div>
                            <div class="col-3 pl-0">
                                <a href="" style=" text-decoration: underline;" class="btn btn-primary-link p-0 pb-2">Edit</a>
                            </div>
                        </div>
{{--                        <div class="info mt-3">--}}
{{--                            <p>Full Name:</p>--}}
{{--                            <p>{{$user->first_name}} {{$user->last_name}}</p>--}}
{{--                            <a class="btn btn-link">Edit</a>--}}
{{--                        </div>--}}
{{--                        <div class="info">--}}
{{--                            <p>Account No:</p>--}}
{{--                            <p>{{$user->id}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="info">--}}
{{--                            <p>Email Address:</p>--}}
{{--                            <p>{{$user->email}}</p>--}}
{{--                        </div>--}}
{{--                        <div class="info">--}}
{{--                            <p>Password:</p>--}}
{{--                            <p>********</p>--}}
{{--                        </div>--}}
                    </div>
                </div>
            </div>
        </section>
    </main>

@endsection
