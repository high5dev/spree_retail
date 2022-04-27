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
{{--                        <h2 class="pageheader-title">Dispatch </h2>--}}
{{--                        <div class="page-breadcrumb">--}}
{{--                            <nav aria-label="breadcrumb">--}}
{{--                                <ol class="breadcrumb">--}}
{{--                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>--}}
{{--                                    <li class="breadcrumb-item" aria-current="page">Dispatch Index</li>--}}
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
                    <h5 class="card-header">Dispatch Info</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Product ID</th>
                                    <th>Dispatched</th>
                                    <th>Date</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($dispatchs) > 0)
                                    @foreach($dispatchs as $dispatch)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$dispatch->product_id}}
                                            </td>
                                            <td>
                                                {{$dispatch->quantity}}
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($dispatch->created_at)->toDayDateTimeString()}}
                                            </td>
                                            <td>
                                                @if($dispatch->status == config('enums.product_dispatch.shipped'))
                                                    <span class="badge badge-warning w-75 py-2">{{$dispatch->status}}</span>
                                                @elseif($dispatch->status == config('enums.product_dispatch.delivered'))
                                                    <span class="badge badge-success w-75 py-2">{{$dispatch->status}}</span>
                                                @elseif($dispatch->status == config('enums.product_dispatch.canceled'))
                                                    <span class="badge badge-success w-75 py-2">{{$dispatch->status}}</span>
                                                @elseif($dispatch->status == config('enums.product_dispatch.returned'))
                                                    <span class="badge badge-warning w-75 py-2">{{$dispatch->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{route('admin.dashboard.dispatch.confirm',$dispatch->id)}}" class="btn btn-rounded btn-primary">
                                                    Confirm Dispatch
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                                </tbody>
                                <tfoot>
                                </tfoot>
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
