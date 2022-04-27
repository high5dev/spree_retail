@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
    <style>
        .fedex-heading{
            font-size: 13px;
            font-weight: 400;
        }
    </style>
@endsection
@section('content')
    <main>
        <section class="profile">
            @include('inc.profileSidebar')
            <div class="pCol2">
                <div class="heading">
                    <h2>Order History</h2>
                </div>
                <div class="row">
                    <div class="col-lg-12" style="padding: 0px;">
                        <div style="overflow-x: auto;">
                            <table>
                                <thead>
                                <tr>
                                    <th>
                                        #
                                    </th>
                                    <th>
                                        Product Name
                                    </th>
                                    <th>
                                        Price
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        Status
                                    </th>
                                    <th>
                                        Date
                                    </th>
                                    <th>
                                        Action
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count($orders) > 0)
                                    @foreach($orders as $order)
                                        @if(count($order->products) > 0)
                                            @foreach($order->products as $product)
                                                <tr>
                                                    <td>
                                                        {{$loop->iteration}}
                                                    </td>
                                                    <td>
                                                        {{$product->name}}
                                                    </td>
                                                    <td>
                                                        ${{\App\Helpers\Helper::presentPrice($product->pivot->price)}}
                                                    </td>
                                                    <td>
                                                        1
                                                    </td>
                                                    <td>
                                                        @if($product->pivot->status == config('enums.order_status.processing'))
                                                            {{$product->pivot->status}}
                                                        @elseif($product->pivot->status == config('enums.order_status.shipped'))
                                                            {{$product->pivot->status}}
                                                        @elseif($product->pivot->status == config('enums.order_status.delivered'))
                                                            {{$product->pivot->status}}
                                                        @elseif($product->pivot->status == config('enums.order_status.canceled'))
                                                            {{$product->pivot->status}}
                                                        @elseif($product->pivot->status == config('enums.order_status.refunded'))
                                                            {{$product->pivot->status}}
                                                        @elseif($product->pivot->status == config('enums.order_status.request_refunded'))
                                                            {{$product->pivot->status}}
                                                        @elseif($product->pivot->status == config('enums.order_status.payment_error'))
                                                            {{$product->pivot->status}}
                                                        @elseif($product->pivot->status == config('enums.order_status.canceled_by_vendor'))
                                                            Canceled
                                                        @elseif($product->pivot->status == config('enums.order_status.canceled_by_customer'))
                                                            Canceled
                                                        @endif
                                                    </td>
                                                    <td>
                                                        {{\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString()}}
                                                    </td>
                                                    <td>
                                                        @if($product->pivot->status == config('enums.order_status.processing'))
                                                            <a href="{{route('profile.order.cancel',[$order->id,$product->id])}}" class="edit btn btn-danger">
                                                                Cancel
                                                            </a>
                                                        @endif
                                                        @if($product->pivot->status == config('enums.order_status.shipped'))
                                                            <a data-toggle="collapse" href="#collapseOrderDeatil-{{$loop->iteration}}" role="button" aria-expanded="false" aria-controls="collapseExample" class="edit">
                                                                View Details
                                                            </a>
                                                        @endif
                                                            @if($product->pivot->status == config('enums.order_status.canceled') or $product->pivot->status == config('enums.order_status.canceled_by_customer'))
                                                                <a href="{{route('profile.order.refund',[$order->id,$product->id])}}" class="edit btn btn-warning">
                                                                    Refund
                                                                </a>
                                                            @endif

{{--                                                        <a href="#" class="edit btn btn-warning">--}}
{{--                                                            Open Dispute--}}
{{--                                                        </a>--}}
                                                    </td>
                                                </tr>
                                                <tr >
                                                    <td colspan="10">
                                                        <div class="collapse" id="collapseOrderDeatil-{{$loop->iteration}}">
                                                            <div class="card card-body">
                                                                <h5 class="fedex-heading">Fedex Ground</h5>
                                                                <h5 class="fedex-heading">Delivered by {{\Carbon\Carbon::parse($order->fedex_time)->toDayDateTimeString()}}</h5>
                                                                <h5 class="fedex-heading">{{$order->tracking_info() != null ? $order->tracking_info() : 'Tracking Not Available'}}</h5>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endforeach
                                @endif

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </section>
{{--        <section class="profile">--}}
{{--            @include('inc.profileSidebar')--}}
{{--            <div class="pCol2">--}}
{{--                <div class="heading">--}}
{{--                    <h2>Order History</h2>--}}
{{--                </div>--}}
{{--                <hr/>--}}
{{--                <div class="row">--}}
{{--                    @if(count($orders) > 0)--}}
{{--                        @foreach($orders as $order)--}}
{{--                            @if(count($order->products) > 0)--}}
{{--                                @foreach($order->products as $product)--}}
{{--                                    <div class="col-lg-12" style="padding: 0px;">--}}
{{--                                        <div class="row favRow">--}}
{{--                                            <div class="col-sm-2">--}}
{{--                                                <div class="favImg">--}}
{{--                                                    <img src="{{asset('storage/product/'.$product->thumbnail)}}" alt="">--}}
{{--                                                </div>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-3">--}}
{{--                                                <p>--}}
{{--                                                    {{$product->name}}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-2">--}}
{{--                                                <p class="price">--}}
{{--                                                    ${{\App\Helpers\Helper::presentPrice($product->price)}}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-3">--}}
{{--                                                <p class="date">--}}
{{--                                                    {{\Carbon\Carbon::parse($order->created_at)->toDayDateTimeString()}}--}}
{{--                                                </p>--}}
{{--                                            </div>--}}
{{--                                            <div class="col-sm-1 delete">--}}
{{--                                                <a href="#" class="delete">--}}
{{--                                                    <i class="far fa-trash-alt"></i>--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                @endforeach--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                    @endif--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
    </main>

@endsection
