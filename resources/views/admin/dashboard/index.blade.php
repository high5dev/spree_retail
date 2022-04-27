@extends('admin.layouts.dashboardAdmin')

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
{{--                <div class="row">--}}
{{--                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">--}}
{{--                        <div class="page-header">--}}
{{--                            <h2 class="pageheader-title">Spree</h2>--}}
{{--                            <p class="pageheader-text"></p>--}}
{{--                            <div class="page-breadcrumb">--}}
{{--                                <nav aria-label="breadcrumb">--}}
{{--                                    <ol class="breadcrumb">--}}
{{--                                        <li class="breadcrumb-item"><a href="{{route('admin')}}" class="breadcrumb-link">Dashboard</a></li>--}}
{{--                                        <li class="breadcrumb-item active" aria-current="page">Statistics</li>--}}
{{--                                    </ol>--}}
{{--                                </nav>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">

                    <div class="row p-3">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-1 border-secondary">
                                <div class="card-body">
                                    <h5 class="text-secondary">Number of Revenue</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Profit: ${{$t_profit}}</h5>
                                        <h5 class="mb-1">Weekly Profit: ${{$w_profit}}</h5>
                                        <h5 class="mb-1">Monthly Profit: ${{$m_profit}}</h5>
                                        <h5 class="mb-1">Gross Revenue: ${{$g_profit}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body border-1 border-primary p-1">
                                    <h5 class="text-primary">Number of Orders</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Orders: {{count($t_orders)}}</h5>
                                        <h5 class="mb-1">Weekly Orders: {{count($w_orders)}}</h5>
                                        <h5 class="mb-1">Monthly Orders: {{count($m_orders)}}</h5>
                                        <h5 class="mb-1">&nbsp;</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-2 border-info">
                                <div class="card-body">
                                    <h5 class="text-info">New Customers</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Customers: {{$t_c_count}}</h5>
                                        <h5 class="mb-1">Weekly Customers: {{$w_c_count}}</h5>
                                        <h5 class="mb-1">Monthly Customers: {{$m_c_count}}</h5>
                                        <h5 class="mb-1">&nbsp;</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-2 border-success">
                                <div class="card-body">
                                    <h5 class="text-success">Products Sold</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Sold: {{$t_p_sold}}</h5>
                                        <h5 class="mb-1">Weekly Sold: {{$w_p_sold}}</h5>
                                        <h5 class="mb-1">Monthly Sold: {{$m_p_sold}}</h5>
                                        <h5 class="mb-1">&nbsp;</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end visitor  -->
                        <!-- ============================================================== -->
                    </div>
                    <div class="row">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Recent Orders <a href="{{route('admin.dashboard.order.index')}}" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body pt-1">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                            <tr class="">
                                                <th class="">#</th>
                                                <th class="">Image</th>
                                                <th class="">Product Name</th>
                                                <th class="">Product Id</th>
                                                <th class="">Quantity</th>
                                                <th class="">Price</th>
                                                <th class="">Order Time</th>
                                                <th class="">Customer</th>
                                                <th class="">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($t_orders as $order)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        <div class="m-r-10"><img src="{{asset('storage/product/'.$order->product->thumbnail)}}" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td>{{$order->product->name}}</td>
                                                    <td>{{$order->product->id}}</td>
                                                    <td>{{$order->quantity}}</td>
                                                    <td>${{$order->price}}.00</td>
                                                    <td>{{$order->created_at}}</td>
                                                    <td>{{$order->order->user->first_name}}</td>
                                                    <td>
                                                        @if($order->status == config('enums.order_status.processing'))
                                                            <span class="badge-dot badge-brand mr-1"></span>{{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.shipped'))
                                                            <span class="badge-dot badge-brand mr-1"></span>{{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.delivered'))
                                                            <span class="badge-dot badge-danger mr-1">{</span>{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.canceled'))
                                                            <span class="badge-dot badge-danger mr-1"></span>{{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.refunded'))
                                                            <span class="badge-dot badge-secondary mr-1"></span>{{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.payment_error'))
                                                            <span class="badge-dot badge-danger mr-1"></span>{{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.canceled_by_vendor'))
                                                            <span class="badge-dot badge-danger mr-1"></span>{{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.canceled_by_customer'))
                                                            <span class="badge-dot badge-danger mr-1"></span>{{$order->status}}
                                                        @elseif($order->status == config('enums.order_status.request_refunded'))
                                                            <span class="badge-dot badge-danger mr-1"></span>{{$order->status}}
                                                        @endif
                                                    </td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->

                    </div>

                    <div class="row">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 mt-5 mb-3">
                            <div class="card ">
                                <h5 class="card-header">Best Selling Products Weekly<a href="{{route('admin.dashboard.order.index')}}" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body pt-1">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                            <tr class="">
                                                <th class="">#</th>
                                                <th class="">Image</th>
                                                <th class="">Product Name</th>
                                                <th class="">Product Id</th>
                                                <th class="">Sold</th>
                                                <th class="">Category</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($w_b_sell_products as $product)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        <div class="m-r-10"><img src="{{asset('storage/product/'.$product->thumbnail)}}" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->total}}</td>
                                                    <td>{{$product->main}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->
                        <div class="col-xl-12 col-lg-12 col-md-6 col-sm-12 col-12 mt-5">
                            <div class="card">
                                <h5 class="card-header">Best Selling Products Monthly<a href="{{route('admin.dashboard.order.index')}}" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body pt-1">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="">
                                            <tr class="">
                                                <th class="">#</th>
                                                <th class="">Image</th>
                                                <th class="">Product Name</th>
                                                <th class="">Product Id</th>
                                                <th class="">Sold</th>
                                                <th class="">Category</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            @foreach($m_b_sell_products as $product)
                                                <tr>
                                                    <td>{{$loop->iteration}}</td>
                                                    <td>
                                                        <div class="m-r-10"><img src="{{asset('storage/product/'.$product->thumbnail)}}" alt="user" class="rounded" width="45"></div>
                                                    </td>
                                                    <td>{{$product->name}}</td>
                                                    <td>{{$product->id}}</td>
                                                    <td>{{$product->total}}</td>
                                                    <td>{{$product->main}}</td>
                                                </tr>
                                            @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- footer -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- end footer -->
        <!-- ============================================================== -->
    </div>
@endsection
