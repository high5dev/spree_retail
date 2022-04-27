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
{{--                        <h2 class="pageheader-title">Products </h2>--}}
{{--                        <div class="page-breadcrumb">--}}
{{--                            <nav aria-label="breadcrumb">--}}
{{--                                <ol class="breadcrumb">--}}
{{--                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>--}}
{{--                                    <li class="breadcrumb-item" aria-current="page">Product</li>--}}
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
                            <h5>Products</h5>
                            <button form="create" class="btn btn-primary ml-auto" >Create</button>
                            <form id="create" action="{{route('admin.dashboard.product.create')}}" method="GET"></form>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Image</th>
                                    <th>ID</th>
                                    <th>Name</th>
                                    <th>Slug</th>
                                    <th>Quantity</th>
                                    <th>Available</th>
                                    <th>Price</th>
                                    <th>Status</th>
                                    <th>Date Added</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($products) > 0)
                                    @foreach($products as $product)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>
                                                <div class="m-r-10"><img src="{{asset('storage/storage/product/'.$product->thumbnail)}}" alt="Item image" class=" img-fluid rounded" width="200"></div>
                                            </td>
                                            <td>{{$product->id}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->slug}}</td>
                                            <td>{{$product->quantity}}</td>
                                            <td>{{$product->available}}</td>
                                            <td>${{$product->price}}</td>
                                            <td>{{$product->status}}</td>
                                            <td>{{$product->created_at}}</td>
                                            <td>
                                                <a href="{{route('admin.dashboard.product.edit',$product->slug)}}" style="color: blue" class="btn">
                                                    Edit
                                                </a>
                                                <a href="" onclick="event.preventDefault();document.getElementById('delete-{{$product->id}}').submit()" style="color: red" class="btn">
                                                    Delete
                                                </a>
                                                <form id="delete-{{$product->id}}" action="{{route('product.destroy',$product->slug)}}" method="POST">
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
