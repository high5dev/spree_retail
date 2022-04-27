@extends('admin.layouts.dashboardAdmin')
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
                                        <li class="breadcrumb-item active" aria-current="page">{{$orders[0]->order_id}}</li>
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
                            @if($user_address != null)
                                <p class="m-0">{{$user_address->name}}</p>
                                <p class="m-0">{{$user_address->address}}, {{$user_address->city}}</p>
                                <p class="m-0">{{$user_address->region}}, {{$user_address->country}}, {{$user_address->zipcode}}</p>
                            @endif
                        </div>
                    </div>
                    <hr>
                    <h4>
                        Product Details:
                    </h4>
                    @foreach($orders as $order)
                        <h4>
                            Product {{$loop->iteration}}:
                        </h4>
                        <div class="form-group">
                            <label for="first_name" class="col-form-label">Product ID</label>
                            <input disabled id="inputText3" value="{{$order->product->id}}" name="first_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="col-form-label">Product name</label>
                            <input disabled id="inputText3" value="{{$order->product->name}}" name="first_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="col-form-label">Quantity</label>
                            <input disabled id="inputText3" value="{{$order->quantity}}" name="first_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="col-form-label">Price Paid</label>
                            <input disabled id="inputText3" value="${{$order->price}}" name="first_name" type="text" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="first_name" class="col-form-label">Status: </label>
                            <span>{{$order->status}}</span>
                        </div>
                        <div class="form-group">
                            <a class="btn btn-primary" target="_blank" href="{{route('product.show',$order->product->slug)}}">View Product</a>
                        </div>
                    @endforeach

                    <ul class="list-unstyled arrow">
                        <li>Send order to above given address.</li>
                        <li>Only click on below button if you have dispatched the order.</li>
                    </ul>
                    <div class="form-group">
                        @if($m_order->fedex_tracking_id != null)
                            <form method="POST" id="update" action="{{route('admin.dashboard.order.update.tracking',$m_order->id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="t_id" class="col-form-label">Tracking Id</label>
                                    <input id="t_id" value="{{$m_order->fedex_tracking_id}}" name="t_id" type="text" class="form-control">
                                </div>
                            </form>
                            <button form="update" class="btn btn-outline-primary">Update Tracking Id</button>
                        @else
                            <form method="POST" id="dispatched" action="{{route('admin.dashboard.order.dispatched',$order->order_id)}}">
                                @csrf
                                <div class="form-group">
                                    <label for="t_id" class="col-form-label">Tracking Id</label>
                                    <input id="t_id" value="{{$m_order->fedex_tracking_id}}" name="t_id" type="text" class="form-control">
                                </div>
                            </form>
                            <button form="dispatched" class="btn btn-outline-primary">Update Tracking Id</button>
                        @endif
                    </div>
                    <ul class="list-unstyled arrow">
                        <li>If you have some problem in dispatching then cancel the order.</li>
                        <li>Only click on below button if you want to cancel the order.</li>
                    </ul>
                    <div class="form-group">
                        <a class="btn btn-outline-danger" href="{{route('admin.dashboard.order.cancel',$order->order_id)}}">Order Cancel</a>
                    </div>
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
