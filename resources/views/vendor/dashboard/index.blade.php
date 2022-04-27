@extends('vendor.layouts.dashboardVendor')

@section('content')
    <div class="dashboard-wrapper">
        <div class="dashboard-ecommerce">
            <div class="container-fluid dashboard-content ">
                <!-- ============================================================== -->
                <!-- pageheader  -->
                <!-- ============================================================== -->
                {{--<div class="row">
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="page-header">
                            <h2 class="pageheader-title">Spree</h2>
                            <p class="pageheader-text"></p>
                            <div class="page-breadcrumb">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="{{route('admin')}}" class="breadcrumb-link">Dashboard</a></li>
                                        <li class="breadcrumb-item active" aria-current="page">Statistics</li>
                                    </ol>
                                </nav>
                            </div>
                        </div>
                    </div>
                </div>--}}
                <!-- ============================================================== -->
                <!-- end pageheader  -->
                <!-- ============================================================== -->
                <div class="ecommerce-widget">

                    <div class="row">
                        <!-- ============================================================== -->
                        <!-- sales  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Number of Revenue & Profit</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Profit: ${{$t_profit}}</h5>
                                        <h5 class="mb-1">Weekly Profit: ${{$w_profit}}</h5>
                                        <h5 class="mb-1">Monthly Profit: ${{$m_profit}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Number of Orders</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Orders: {{count($t_orders)}}</h5>
                                        <h5 class="mb-1">Weekly Orders: {{count($w_orders)}}</h5>
                                        <h5 class="mb-1">Monthly Orders: {{count($m_orders)}}</h5>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12">
                            <div class="card border-3 border-primary">
                                <div class="card-body">
                                    <h5 class="text-muted">Products Sold</h5>
                                    <div class="metric-value d-inline-block">
                                        <h5 class="mb-1">Today Sold: {{$t_p_sold}}</h5>
                                        <h5 class="mb-1">Weekly Sold: {{$w_p_sold}}</h5>
                                        <h5 class="mb-1">Monthly Sold: {{$m_p_sold}}</h5>
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
                        <!-- ============================================================== -->
                        <!-- end recent orders  -->

                    </div>

                    <div class="row mt-3">
                        <!-- ============================================================== -->

                        <!-- ============================================================== -->

                        <!-- recent orders  -->
                        <!-- ============================================================== -->
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Best Selling Products Weekly<a href="{{route('admin.dashboard.order.index')}}" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Image</th>
                                                <th class="border-0">Product Name</th>
                                                <th class="border-0">Product Id</th>
                                                <th class="border-0">Sold</th>
                                                <th class="border-0">Category</th>
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
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                            <div class="card">
                                <h5 class="card-header">Best Selling Products Monthly<a href="{{route('admin.dashboard.order.index')}}" class="btn btn-outline-dark float-right">View Details</a></h5>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead class="bg-light">
                                            <tr class="border-0">
                                                <th class="border-0">#</th>
                                                <th class="border-0">Image</th>
                                                <th class="border-0">Product Name</th>
                                                <th class="border-0">Product Id</th>
                                                <th class="border-0">Sold</th>
                                                <th class="border-0">Category</th>
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
