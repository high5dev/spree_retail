@extends('vendor.layouts.dashboardVendor')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/dataTables.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/buttons.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/select.bootstrap4.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('dashboard-vendor/datatables/css/fixedHeader.bootstrap4.css')}}">
@endsection
@section('content')
    <div class="dashboard-wrapper">
        <div class="container-fluid  dashboard-content">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Orders Info</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>Product ID</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Status</th>
                                    <th>Created At</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($orders) > 0)
                                    @foreach($orders as $order)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$order->order_id}}
                                            </td>
                                            <td>
                                                {{$order->product_id}}
                                            </td>
                                            <td>
                                                ${{\App\Helpers\Helper::presentPrice($order->price)}}
                                            </td>
                                            <td>
                                                1
                                            </td>
                                            <td>
                                                @if($order->status == config('enums.order_status.processing'))
                                                    <span class="badge badge-warning w-75 py-2">{{$order->status}}</span>
                                                @elseif($order->status == config('enums.order_status.shipped'))
                                                    <span class="badge badge-warning w-75 py-2">{{$order->status}}</span>
                                                @elseif($order->status == config('enums.order_status.delivered'))
                                                    <span class="badge badge-success w-75 py-2">{{$order->status}}</span>
                                                @elseif($order->status == config('enums.order_status.canceled'))
                                                    <span class="badge badge-warning w-75 py-2">{{$order->status}}</span>
                                                @elseif($order->status == config('enums.order_status.refunded'))
                                                    <span class="badge badge-success w-75 py-2">{{$order->status}}</span>
                                                @elseif($order->status == config('enums.order_status.payment_error'))
                                                    <span class="badge badge-danger w-75 py-2">{{$order->status}}</span>
                                                @elseif($order->status == config('enums.order_status.canceled_by_vendor'))
                                                    <span class="badge badge-danger w-75 py-2">{{$order->status}}</span>
                                                @endif
                                            </td>
                                            <td>
                                                {{\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString()}}
                                            </td>
                                            <td>
                                                <a href="{{route('vendor.dashboard.order.show',$order->order_id)}}" class="edit btn btn-primary">
                                                    View
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
