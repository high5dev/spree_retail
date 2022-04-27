@extends('admin.layouts.dashboardAdmin')
@section('css-files')
    <link rel="stylesheet" href="{{asset('dashboard-vendor/multi-select/css/multi-select.css')}}">
@endsection
@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Banner </h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Banner</li>
                                        <li class="breadcrumb-item active" aria-current="page">Create</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end pageheader  -->
        <!-- ============================================================== -->

        <!-- ============================================================== -->
        <!-- Start Form  -->
        <!-- ============================================================== -->

        <div class="container">
            <div class="card">
                <h5 class="card-header">Create Banner</h5>
                <div class="card-body">
                    <form action="{{route('admin.dashboard.banner.store')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="description">Url</label>
                            <textarea class="form-control @error('url') is-invalid @enderror" id="url" name="url" rows="2"></textarea>
                            @error('url')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-select">Type</label>
                            <select name="type" class="form-control" id="main">
                                <option value="">Select</option>
                                <option value="1">Header</option>
                                <option value="2">Footer</option>
                            </select>
                            @error('main_category')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="input-select">Add Image</label>
                            <input type="file" name="image" class="form-control @error('image') is-invalid @enderror" id="customFile">
                            @error('image')
                            <div class="invalid-feedback">
                                <strong>{{ $message }}</strong>
                            </div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">Create</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>

        <!-- ============================================================== -->
        <!-- end From  -->
        <!-- ============================================================== -->


        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
@endsection
@section('js-files')
@endsection
