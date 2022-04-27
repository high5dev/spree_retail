@extends('admin.layouts.dashboardAdmin')
@section('css-files')
    <link rel="stylesheet" href="{{asset('dashboard-vendor/multi-select/css/multi-select.css')}}">
    <link rel="stylesheet" href="{{asset('dashboard-vendor/select2/css/select2.css')}}">
    <style>
        .card{
            border: none;
        }
        .card-img-top{
            height: 100%;
            width: 115% !important;
        }
    </style>
    <style>
        .b-right{
            border-right: 1px solid rgba(0,0,0,.1);
            height: 300px;
        }
        .breadcrumb{
            background: none;
            font-weight: 300;
            font-size: 11px;
            letter-spacing: 0.04rem;
        }
        .breadcrumb a{
            color: #737373;
        }
        .breadcrumb-item.active a{
            color: #333333;
            font-weight: 500;
        }
        .shipping-head{
            font-weight: 200;
            font-size: 25px;
            letter-spacing: 0.06rem;
        }
        .input-name{
            width: 47% !important;
        }
        .input-address{
            width: 100% !important;
        }
        .form-control{
            border-radius: 0;
            height: 45px !important;
            font-size: 13px;
        }
        .select{
            width: 30% !important;
        }
        .img-thumbnail{
            padding: .25rem;
            background-color: #fff;
            border: none;
            border-radius: 0;
            max-width: 90%;
            height: auto;
        }
        .p-name{
            font-weight: bold;
            font-size: 14px;
            white-space: nowrap;
            padding: 0;
        }
        .b-name{
            font-weight: 100;
            font-size: 10px;
            color: #737373;
        }
        .price{
            font-weight: bold;
            font-size: 13px;
        }
        .sub-total{
            font-weight: 400;
            font-size: 15px;
        }
        .price-total{
            font-weight: 700;
            font-size: 17px;
        }
        .cart-head{
            font-weight: 500;
            font-size: 25px;
        }
        .cart-info{
            font-weight: 400;
            font-size: 12px;
            color: #737373;
        }
        .cat-name{
            font-weight: 300;
            font-size: 14px;
            white-space: nowrap;
            padding: 0;
        }
        .save-for-later{
            font-weight: 300;
            font-size: 14px;
        }
        .options a{
            color: #333333;
        }
        .price-summary{
            font-weight: 400;
            font-size: 13px;

        }
    </style>
@endsection
@section('content')

    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content" style="padding-bottom: 20px !important">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                <div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Order Detail</h2>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item" aria-current="page">Order</li>
                                        <li class="breadcrumb-item" aria-current="page">Product</li>
                                        <li class="breadcrumb-item active" aria-current="page"></li>
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

        <div class="container mt-0">
            <div class="row">
                <div class="col-12">
                    <div class="text-center">
                        <h5 class="bold">Status: 
                            @if ($order_product->status == 0)
                                <span class="text-warning">Pending</span>
                            @elseif ($order_product->status == 1)
                                <span class="text-primary">Acknowledged</span>
                            @elseif ($order_product->status == 2)
                                <span class="text-success">Shipped</span>
                            @else
                                <span class="text-danger">Canceled</span>
                            @endif
                        </h5>
                    </div>
                    <hr>
                </div>
            </div>
            <div class="row">
                <div class="col-md-4 b-right m-0">
                    <div class="text-center">
                        <h5 class="pl-0 bold">Product Summery</h5>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-0">
                        <div class="col-6">
                            <h5 class="sub-total">Product Id/SUK</h5>
                        </div>
                        
                        <div class="col-6">
                            <h5 class="price-summary ml-auto">{{$order_product->product()->first()->id}}</h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-0">
                        <div class="col-6">
                            <h5 class="sub-total">Product name</h5>
                        </div>
                        
                        <div class="col-6">
                            <h5 class="price-summary ml-auto">{{$order_product->product()->first()->name}}</h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-0">
                        <div class="col-6">
                            <h5 class="sub-total">Order Quantity</h5>
                        </div>                        
                        <div class="col-6">
                            <h5 class="price-summary ml-auto">{{$order_product->quantity}}</h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-0">
                        <div class="col-6">
                            <h5 class="sub-total">Total Price</h5>
                        </div>                        
                        <div class="col-6">
                            <h5 class="price-summary ml-auto">${{$order_product->price}}</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 b-right">
                    <div class="text-center">
                        <h5 class="bold">Customer Detail</h5>
                    </div>
                    <hr>
                    <div class="row ml-2 mt-3">
                        <div class="col-4">
                            <h5 class="sub-total">Name</h5>
                        </div>
                        <div class="col-8">
                            <h5 class="price-summary ml-auto">{{$order_product->order()->first()->user()->first()->first_name}} {{$order_product->order()->first()->user()->first()->last_name}}</h5>
                        </div>
                    </div>
                    <div class="row ml-2 mt-1">
                        <div class="col-4">
                            <h5 class="sub-total">Email</h5>
                        </div>
                        <div class="col-8">
                            <h5 class="price-summary ml-auto">{{ $order_product->order()->first()->user()->first()->email}}</h5>
                        </div>
                    </div>
                    <hr>
                    <div class="row ml-2">
                        <h5 class="pl-0 text-primary">Customer Address:</h5>
                    </div>
                    <div class="row ml-2">
                        <div style="background-color: white">
                            <p class="m-0">House no. 95, Lahore</p>
                            <p>Punjab, Pakistan, 54000</p>
                        </div>
                    </div>
                </div>                
                <div class="col-md-4">
                        <div class="text-center">
                            <h5 class="bold">Vendor Detail</h5>
                        </div>
                        <hr>
                        <div class="row ml-2">
                            <div class="col-6">
                                <h5 class="sub-total">Vendor Name</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="price-summary ml-auto">{{$order_product->product()->first()->user()->first()->first_name}} {{$order_product->product()->first()->user()->first()->last_name}}</h5>
                            </div>
                        </div>
                        <div class="row ml-2">
                            <div class="col-6">
                                <h5 class="sub-total">Vendor Email</h5>
                            </div>
                            <div class="col-6">
                                <h5 class="price-summary ml-auto">{{$order_product->product()->first()->user()->first()->email}}</h5>
                            </div>
                        </div>
                        @if ($order_product->status == 0)
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Ordered at</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="price-summary ml-auto">{{$order_product->created_at->diffForHumans()}}</h5>
                                </div>
                            </div>
                        @elseif ($order_product->status == 1)
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Acknowledged at</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="price-summary ml-auto">{{$order_product->updated_at->diffForHumans()}}</h5>
                                </div>
                            </div>
                            @elseif ($order_product->status == 2)
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Shipping Time</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="price-summary ml-auto">{{$order_product->updated_at->diffForHumans()}}</h5>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Tracking #</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="price-summary ml-auto">{{$order_product->tracking_number}}</h5>
                                </div>
                            </div>
                        @elseif ($order_product->status == 3)
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Canceled at</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="price-summary ml-auto">{{$order_product->updated_at->diffForHumans()}}</h5>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Reason</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-danger ml-auto">Product out of stock</h5>
                                </div>
                            </div>
                        @elseif ($order_product->status == 4)
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Canceled at</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="price-summary ml-auto">{{$order_product->updated_at->diffForHumans()}}</h5>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Reason</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-danger ml-auto">Pricing Error</h5>
                                </div>
                            </div>
                            @elseif ($order_product->status == 5)
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Canceled at</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="price-summary ml-auto">{{$order_product->updated_at->diffForHumans()}}</h5>
                                </div>
                            </div>
                            <div class="row ml-2">
                                <div class="col-6">
                                    <h5 class="sub-total">Reason</h5>
                                </div>
                                <div class="col-6">
                                    <h5 class="text-danger ml-auto">Customer cancel order</h5>
                                </div>
                            </div>
                        @endif                            
                </div>
            </div>
            <hr>
            @if ($order_product->status == 2)
                <button form="frmDelivered" class="btn btn-outline-primary mb-3">Approve Delivery</button>
                <form id="frmDelivered" action="{{ route('admin.dashboard.ordermanagement.delivered', $order_product->id)}}" method="POST" hidden>
                    @csrf
                </form>
            @endif
            @if ($order_product->status == 0 || $order_product->status == 1 || $order_product->status == 2 )
            <button class="btn btn-outline-danger mb-3" data-toggle="modal" data-target="#modalCancelOrder">Cancel Order</button>
            @endif            

        </div>

        <!-- ============================================================== -->
        <!-- end From  -->
        <!-- ============================================================== -->
<div class="modal fade" id="modalCancelOrder">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Reason</h5>
                <button class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <form id="formCancel" action="{{ route('admin.dashboard.ordermanagement.canceltransaction', $order_product->id)}}" method="POST">
                        @csrf
                        <label for="reason" class="col-form-label">Reason</label>
                        <textarea name="reason" id="reason" cols="30" rows="10" class="form-control"></textarea>
                    </form>                  
                </div>
            </div>
            <div class="modal-footer">
                <button form="formCancel" class="btn btn-primary">Save</button>
                <button data-dismiss="modal" class="btn btn-outline-danger">Cancel</button>
            </div>
        </div>
    </div>
</div>

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
    <script src="{{asset('dashboard-vendor/select2/js/select2.min.js')}}"></script>
    <script>
    </script>
@endsection
