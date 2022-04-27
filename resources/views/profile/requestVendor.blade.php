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
                    <h2>Become a vendor</h2>
                </div>
                @if($p_request != null)
                    <div class="row">
                        <div class="col-lg-12" style="padding: 0px;">
                            <div style="overflow-x: auto;">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>
                                            #
                                        </th>
                                        <th>
                                            Id
                                        </th>
                                        <th>
                                            Business Name
                                        </th>
                                        <th>
                                            Status
                                        </th>
                                        <th>
                                            Date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            {{$p_request->id}}
                                        </td>
                                        <td>
                                            {{$p_request->business_name}}
                                        </td>
                                        <td>
                                            @if($p_request->status == config('enums.vendor_request_status.in_progress'))
                                                <span class="badge badge-warning w-75 py-2">{{$p_request->status}}</span>
                                            @elseif($p_request->status == config('enums.vendor_request_status.accepted'))
                                                <span class="badge badge-success w-75 py-2">{{$p_request->status}}</span>
                                            @elseif($p_request->status == config('enums.vendor_request_status.rejected'))
                                                <span class="badge badge-danger w-75 py-2">{{$p_request->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::parse($p_request->created_at)->toDayDateTimeString()}}
                                        </td>
                                        <td>
                                            <a href="#" class="edit btn btn-danger">
                                                Cancel
                                            </a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                @else
                    <form id="new-address" method="POST"  action="{{route('profile.request.vendor.store')}}">
                        @csrf
                        <div class="form-group">
                            <label for="name">Business Name</label>
                            <input type="text" name="name" class="form-control" id="name" placeholder="Business Name">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Your role</label>
                            <input type="text" name="role" class="form-control" id="exampleFormControlInput1" placeholder="Role">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Business Address</label>
                            <input type="text" name="address" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">City</label>
                            <input type="text" name="city" class="form-control" id="exampleFormControlInput1" placeholder="City">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Business Structure</label>
                            <input type="text" name="structure" class="form-control" id="exampleFormControlInput1" placeholder="Structure">
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlInput1">Tell us about your business</label>
                            <textarea type="text" name="about" class="form-control" id="exampleFormControlInput1" placeholder="About your Business"></textarea>
                        </div><br>
                        <div class="">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>

                    </form>
                @endif
            </div>
        </section>
    </main>

@endsection
