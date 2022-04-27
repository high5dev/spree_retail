@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
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
                                        Actions
                                    </th>
                                </tr>
                                </thead>
                                <tbody>

                                @if(count(Cart::instance('saveForLater')->content()) > 0)
                                    @foreach(Cart::instance('saveForLater')->content() as $item)
                                        <tr>
                                            <td>
                                                {{$loop->iteration}}
                                            </td>
                                            <td>
                                                {{$item->model->name}}
                                            </td>
                                            <td>
                                                ${{\App\Helpers\Helper::presentPrice($item->model->price)}}
                                            </td>
                                            <td>
                                                <form id="buy-now-{{$loop->iteration}}" action="{{route('cart.store')}}" method="POST">
                                                    @csrf
                                                    <input type="hidden" name="slug" value="{{$item->model->slug}}">
                                                </form>
                                                <a href="" onclick="event.preventDefault();document.getElementById('buy-now-{{$loop->iteration}}').submit()" class="edit btn btn-primary">
                                                    Buy Now
                                                </a>
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
