@extends('vendor.layouts.dashboardVendor')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
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
                            <h2 class="pageheader-title">Order</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Order</li>
                                        <li class="breadcrumb-item" aria-current="page">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page">{{$product->id}}</li>
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
                <h5 class="card-header">Order Details</h5>
                <div class="card-body">
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Name</label>
                        <input disabled id="inputText3" value="Admin" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Email</label>
                        <input disabled id="inputText3" value="admin@gmail.com" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Customer Address: </label><br>
                        <div style="background-color: white">
                            <p class="m-0">House no. 95, Lahore</p>
                            <p>Punjab, Pakistan, 54000</p>
                        </div>
                    </div>
                    <hr>
                    <h4>
                        Product Details:
                    </h4>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Product ID</label>
                        <input disabled id="inputText3" value="{{$product->id}}" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Product name</label>
                        <input disabled id="inputText3" value="{{$product->name}}" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Quantity</label>
                        <input disabled id="inputText3" value="{{$product->quantity}}" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Remaining</label>
                        <input disabled id="inputText3" value="{{$product->remaining}}" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Required</label>
                        <input disabled id="inputText3" value="{{$product->required}}" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="first_name" class="col-form-label">Dispatched</label>
                        <input disabled id="inputText3" value="{{$dispatched}}" name="first_name" type="text" class="form-control">
                    </div>
                    <div class="form-group">
                        <a class="btn btn-primary" target="_blank" href="{{route('product.show',$product->slug)}}">View Details</a>
                    </div>
                    <ul class="list-unstyled arrow">
                        <li>Send Product to above given address.</li>
                        <li>Only click on below button if you have dispatched the product(s).</li>
                        <li>If you have already dispatched item. Then please wait for admin to confirm.</li>
                    </ul>
                    <form class="form-control" id="form-product" action="{{route('vendor.dashboard.order.store',$product->id)}}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="required" class="col-form-label">Enter the number of products you are sending</label>
                            <input id="required" name="required" type="number" class="form-control">
                        </div>
                        <div class="form-group">
                            <button class="btn btn-outline-primary">Submit Dispatch</button>
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
    @include('admin.inc.dashboardAdminFooter')
    <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
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
