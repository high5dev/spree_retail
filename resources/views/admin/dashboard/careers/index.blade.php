@extends('admin.layouts.dashboardAdmin')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <!-- ============================================================== -->
            <!-- pageheader  -->
            <!-- ============================================================== -->
{{--            <div class="row">--}}
{{--                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                    <div class="page-header">--}}
{{--                        <h2 class="pageheader-title">Careers </h2>--}}
{{--                        <div class="page-breadcrumb">--}}
{{--                            <nav aria-label="breadcrumb">--}}
{{--                                <ol class="breadcrumb">--}}
{{--                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>--}}
{{--                                    <li class="breadcrumb-item" aria-current="page">Careers</li>--}}
{{--                                </ol>--}}
{{--                            </nav>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
            <!-- ============================================================== -->
            <!-- end pageheader  -->
            <!-- ============================================================== -->
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <div class="d-flex">
                            <h5>Careers</h5>
                            <button form="applications" class="btn btn-primary ml-auto" >Applications</button>
                            <form id="applications" action="{{route('admin.dashboard.career.application')}}" method="GET"></form>
                            <button form="create" class="btn btn-primary ml-2" >Create</button>
                            <form id="create" action="{{route('admin.dashboard.career.create')}}" method="GET"></form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>ID</th>
                                    <th>Category</th>
                                    <th>Type</th>
                                    <th>Name</th>
                                    <th>City</th>
                                    <th>Country</th>
                                    <th>Date Added</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($careers) > 0)
                                    @foreach($careers as $career)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{$career->id}}</td>
                                            <td>{{$career->category}}</td>
                                            <td>{{$career->type}}</td>
                                            <td>{{$career->name}}</td>
                                            <td>{{$career->city}}</td>
                                            <td>{{$career->country}}</td>
                                            <td>{{$career->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.dashboard.career.edit',$career->id)}}" style="color: blue" class="btn">
                                                    Edit
                                                </a>
                                                <a href="" onclick="event.preventDefault();document.getElementById('delete-{{$career->id}}').submit()" style="color: red" class="btn">
                                                    Delete
                                                </a>
                                                <form id="delete-{{$career->id}}" action="{{route('admin.dashboard.career.destroy',$career->id)}}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('js-files')
    <script src="{{asset('dashboard-vendor/multi-select/js/jquery.multi-select.js')}}"></script>

    <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
    <script src="{{asset('dashboard-vendor/datatables/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
    <script src="{{asset('dashboard-vendor/datatables/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('dashboard-vendor/datatables/js/data-table.js')}}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.colVis.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.0.4/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/select/1.2.7/js/dataTables.select.min.js"></script>
    <script src="https://cdn.datatables.net/fixedheader/3.1.5/js/dataTables.fixedHeader.min.js"></script>
@endsection
