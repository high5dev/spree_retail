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
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <h5 class="card-header">Basic Table</h5>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Id
                                    </th>
                                    <th>
                                        Contact Name
                                    </th>
                                    <th>
                                        Contact Email
                                    </th>
                                    <th>
                                        Brand Name
                                    </th>
                                    <th>
                                        Website
                                    </th>
                                    <th>
                                        Structure
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Application Date
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($v_requests) > 0)
                                    @foreach($v_requests as $v_request)
                                        <tr>
                                        <td>
                                            1
                                        </td>
                                        <td>
                                            {{$v_request->id}}
                                        </td>
                                        <td>
                                            {{$v_request->contact_name}}
                                        </td>
                                        <td>
                                            {{$v_request->contact_email}}
                                        </td>
                                        <td>
                                            {{$v_request->brand_name}}
                                        </td>
                                        <td>
                                            {{$v_request->website_link ?? 'Null'}}
                                        </td>
                                        <td>
                                            {{$v_request->structure}}
                                        </td>
                                        <td>
                                            @if($v_request->status == config('enums.vendor_request_status.in_progress'))
                                                <span class="badge badge-warning w-75 py-2">{{$v_request->status}}</span>
                                            @elseif($v_request->status == config('enums.vendor_request_status.accepted'))
                                                <span class="badge badge-success w-75 py-2">{{$v_request->status}}</span>
                                            @elseif($v_request->status == config('enums.vendor_request_status.rejected'))
                                                <span class="badge badge-danger w-75 py-2">{{$v_request->status}}</span>
                                            @endif
                                        </td>
                                        <td>
                                            {{\Carbon\Carbon::parse($v_request->created_at)->toDayDateTimeString()}}
                                        </td>
                                        <td>
                                            @if(!($v_request->status == config('enums.vendor_request_status.accepted')))
                                                <a href="{{route('admin.dashboard.vendor.request.accept',$v_request->id)}}" class="edit btn btn-success">
                                                    Accept
                                                </a>
                                            @endif
                                                @if(!($v_request->status == config('enums.vendor_request_status.rejected')))
                                                    <a href="{{route('admin.dashboard.vendor.request.reject',$v_request->id)}}" class="edit btn btn-danger">
                                                        Reject
                                                    </a>
                                                @endif
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
