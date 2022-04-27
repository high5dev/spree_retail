@extends('layouts.dashboard')
@section('title','Verification Request')
@section('profile','current')
@section('headerName', 'Verification')
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
                                    <strong>Verification</strong>
                                </div>
                                <div class="card-body card-block">
                                    <form  id="update" method="post" action="{{route('admin.update.profile')}}" enctype="multipart/form-data" class="form-horizontal">
                                        {{ csrf_field() }}
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="name" class=" form-control-label">Cnic Number</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="text" id="cnic" name="cnic" value="" class="form-control @error('cnic') is-invalid @enderror">
                                                @error('cnic')
                                                <span class="invalid-feedback" role="alert">
                                                         <strong>Invalid CNIC</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        @csrf

                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">Front of CNIC</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="file-input" name="image" class="form-control-file" required>
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col col-md-3">
                                                <label for="file-input" class=" form-control-label">Back of CNIC</label>
                                            </div>
                                            <div class="col-12 col-md-9">
                                                <input type="file" id="file-input" name="image" class="form-control-file" required>
                                            </div>
                                        </div>

                                    </form>

                                <div class="card-footer">
                                    <button type="submit" class="btn btn-primary btn-sm" value="submit" form="update">
                                        Update
                                    </button>
                                </div>




            </div>
        </div>

    <!-- end of cards -->

@endsection
