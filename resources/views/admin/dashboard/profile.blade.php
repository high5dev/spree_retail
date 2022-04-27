@extends('admin.layouts.dashboardAdmin')
@section('title','My Profile')
@section('profile','current')
@section('headerName', 'Profile')
@section('content')
    <!-- cards -->
    <section>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-10 col-lg-9 col-md-8 ml-auto">
                    <div class="row pt-md-5 mt-md-3 mb-5">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header">
                                    <strong>My Profile</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form  id="update" method="post" action="{{route('admin.update.profile')}}" enctype="multipart/form-data" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="name" class=" form-control-label">Name</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="name" name="name" value="{{$user->name}}" class="form-control @error('name') is-invalid @enderror">
                                                @error('name')
                                                    <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="username" class=" form-control-label">Username</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="username" name="username" value="{{$user->username}}" class="form-control @error('username') is-invalid @enderror">
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="email" class=" form-control-label">Email</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="email" id="email" value="{{$user->email}}" name="email" class="form-control @error('email') is-invalid @enderror" disabled>
                                                @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="phone" class=" form-control-label">Phone</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="number" id="phone" value="{{$profile->phone}}" name="phone" class="form-control @error('phone') is-invalid @enderror">
                                                @error('username')
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">City</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="gender_id" id="select" class="form-control @error('gender_id') is-invalid @enderror">
                                                    <option value="0">Please select</option>
                                                    <option @if($profile->gender == 'M')selected @endif value="1">Male</option>
                                                    <option @if($profile->gender == 'F')selected @endif value="2">Female</option>
                                                </select>
                                                @error('gender_id')
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="address" class=" form-control-label">Address</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="address" name="address" value="{{$profile->address}}"class="form-control @error('address') is-invalid @enderror">
                                                @error('address')
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="select" class=" form-control-label">City</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <select name="city_id" id="select" class="form-control @error('city_id') is-invalid @enderror">
                                                    <option value="0">Please select</option>
                                                    @if(count($cities)>0)
                                                        @foreach($cities as $city)
                                                            @if($profile->city_id == $city->id)
                                                                <option selected value="{{$city->id}}">{{$city->name}}</option>
                                                            @else
                                                                <option value="{{$city->id}}">{{$city->name}}</option>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </select>
                                                @error('city_id')
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" value="submit" form="update">
                                        Update
                                    </button>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">

                                    <a type="button" class="btn btn-primary"  href="{{route('admin.verification')}}" >Request Verified status
                                    </a>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6">
                            <div class="card">
                                        <div class="card-header">
                                            <strong>Update Password</strong>
                                        </div>
                                        <div class="card-body card-block">
                                            <form  id="update-password" method="post" action="{{route('admin.update.password')}}" enctype="multipart/form-data" class="form-horizontal">
                                                @csrf
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="current_password" class=" form-control-label">Current Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" id="current_password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" required>
                                                        @error('current_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="new_password" class=" form-control-label">New Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" id="new_password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" required>
                                                        @error('new_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                                <div class="row form-group">
                                                    <div class="col col-md-3">
                                                        <label for="confirm_password" class=" form-control-label">Confirm Password</label>
                                                    </div>
                                                    <div class="col-12 col-md-9">
                                                        <input type="password" id="confirm_password" name="confirm_password" class="form-control @error('confirm_password') is-invalid @enderror" required>
                                                        @error('confirm_password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                        @enderror
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="card-footer">
                                            <button type="submit" form="update-password" class="btn btn-primary btn-sm">
                                             Reset
                                            </button>
                                        </div>
                                    </div>

                            <br>
                            <div class="card">
                                <div class="card-header">
                                    <strong>Update Profile Picture</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form  id="update-image" method="post" action="{{route('admin.update.image')}}" enctype="multipart/form-data" class="form-horizontal">
                                        @csrf
                                        <div class="text-center">
                                            <img class="profpic" src="/storage/{{$user->username}}/profile_image/{{$profile->image}}" alt="Profile Picture">
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">File input</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="file-input" name="image" class="form-control-file" required>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" form="update-image" class="btn btn-primary btn-sm">
                                        Update
                                    </button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end of cards -->

@endsection
