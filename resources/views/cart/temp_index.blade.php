@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/cart.css')}}">

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection
@section('content')
    <main>
        <!-- cart section -->
        <section class="container d-flex">
            <div class="cartCol1">
                <!-- notification section -->
                <!-- <div class="master d-flex">
                <div class="d-flex aCenter">
                    <div class="Mimg">
                        <img src="./images/master.jpg" alt="master card">
                    </div>
                    <div class="Mcap ml-4">
                        <p class="text-bold">
                            Earn <span>5% back</span> with the Capital One Walmart Rewards Card.
                        </p>
                    </div>
                </div>
                <div class="Mbtn">
                    <button class="hBtn">
                        Learn How
                    </button>
                </div>
            </div> -->
                <!-- products in cart section -->
                @if(Cart::count() > 0)
                    <div class="heading">
                        <h2>Your Cart : {{Cart::count()}} <span>items</span></h2>
                    </div>
                    @foreach(Cart::content() as $item)
                        <div class="productRow d-flex">
                            <div class="d-flex">
                                <div class="proImg">
                                    <img src="{{asset('storage/storage/product/'.$item->model->thumbnail)}}" alt="product">
                                </div>
                                <div class="proDesc ml-4">
                                    <div class="d-flex">
                                        <div class="mt-3">
                                            <p class="text-bold" style="font-size: 16px;">
                                                {{$item->model->name}}
                                            </p>
                                        </div>
                                        <div class="qty ml-5 mt-3">
                                            <label for="qty" class="text-bold">Qty:</label>
                                            <select class="sQty">
                                                <option value="1">1</option>
                                                <option value="1">2</option>
                                                <option value="1">3</option>
                                                <option value="1">4</option>
                                                <option value="1">5</option>
                                            </select>
                                        </div>
                                    </div>
                                    <!-- protection card -->
{{--                                    <div class="proCard">--}}
{{--                                        <div class="proTop d-flex">--}}
{{--                                            <div>--}}
{{--                                                <p class="text-bold">--}}
{{--                                                    Add-on-service--}}
{{--                                                    <span>--}}
{{--                                                (0 selected)--}}
{{--                                            </span>--}}
{{--                                                </p>--}}

{{--                                            </div>--}}
{{--                                            <div>--}}
{{--                                                <a href="" class="text-bold">--}}
{{--                                                    View--}}
{{--                                                </a>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                        <div class="proBottom d-flex">--}}
{{--                                            <i class="fas fa-shield-virus"></i>--}}
{{--                                            <p class="text-sm ml-2">--}}
{{--                                                Protection Plans--}}
{{--                                            </p>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}

                                </div>
                            </div>
                            <div class="proRight mt-3">
                                <div class="priceArea">
                            <span class="price">
                                ${{\App\Helpers\Helper::presentPrice($item->model->price)}}
                            </span>
                                </div>
                                <div class="sLater d-flex">
                                    <a href="{{route('cart.destroy',$item->rowId)}}" class="text-bold">
                                        Remove
                                    </a>
                                    <div class="vLine">

                                    </div>
                                    <a href="{{route('cart.saveForLater', $item->rowId)}}" class="text-bold ml-3">
                                        Save For Later
                                    </a>
                                </div>
                            </div>
                        </div>
                        <hr class="mt-4">
                    @endforeach
                @else
                    <div class="heading">
                        <h2>No items in your cart</h2>
                    </div>
                    <div class="spacer"></div>
                    <a href="{{route('home')}}" class="button btn-outline-secondary">Continue Shopping</a>
                @endif

                @if(Cart::instance('saveForLater')->count() > 0)
                <div class="saved_for_later">
                    <div class="heading">
                        <h2>Saved For Later</h2>

                            @foreach(Cart::instance('saveForLater')->content() as $item)
                                <div class="productRow d-flex">
                                    <div class="d-flex">
                                        <div class="proImg">
                                            <img src="{{asset('storage/product/'.$item->model->thumbnail)}}" alt="product">
                                        </div>
                                        <div class="proDesc ml-4">
                                            <div class="d-flex">
                                                <div class="mt-3">
                                                    <p class="text-bold" style="font-size: 16px;">
                                                        {{$item->model->name}}
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="proRight">
                                        <div class="priceArea">
                            <span class="price">
                                ${{\App\Helpers\Helper::presentPrice($item->model->price)}}
                            </span>
                                            <p>Delivery</p>
                                        </div>
                                        <div class="sLater d-flex">
                                            <a href="{{route('cart.saveForLater.destroy',$item->rowId)}}" class="text-bold">
                                                Remove
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <hr class="mt-4">
                            @endforeach
                    </div>
                </div>
                @endif

            </div>
            <div class="cartCol2">
                <div class="heading d-flex justify-content-center">
                    <h2>
                        Order Summary
                    </h2>
                </div>
                <div class="orderDetail">
                    <hr />
                    <div class="d-flex justify-content-between">
                        <p class="text-bold">
                            Sub Total
                        </p>
                        <p class="text-bold">
                            ${{Cart::instance('default')->subtotal()}}
                        </p>
                    </div>
                    <div class="d-flex justify-content-between mt-2">
                        <p class="text-bold">
                            Sales Tax(13%)
                        </p>
                        <p class="text-bold">
                            ${{Cart::instance('default')->tax()}}
                        </p>
                    </div>
                    <hr />
                    <div class="d-flex justify-content-between mt-2 Total">
                        <p class="text-bold">
                            Total
                        </p>
                        <p class="text-bold">
                            ${{Cart::instance('default')->total()}}
                        </p>
                    </div>
                    <div class="cartBtn">
                        <button type="submit" form="checkout" class="cart mt-3">
                            Checkout
                        </button>
                        <form id="checkout" hidden action="{{route('checkout.index')}}" method="GET">

                        </form>
                    </div>
                    <div class="today">
                        <!-- <h4 class="sub-head mt-3 mb-1">
                        Apply Today, Shop Today.
                    </h4>
                    <div class="Adesc d-flex">
                        <div>
                            <div class="Aimg">
                                <img src="./images/master.jpg" alt="visa">
                            </div>
                            <a href="" class="text-bold">Show me how > </a>
                        </div>
                        <div>
                            <p class="text-bold">
                                <span class="text-bold">10% back in rewards</span>
                                on first day of purchases for new  My Best Buy* Credit Card members
                            </p>
                            <p class="text-bold mt-2">
                                or <span class="text-bold">$34.92/mo</span>
                                suggested monthly payments with <span class="text-bold">12 months financing</span>
                                on this purchase of $418.99

                            </p>
                        </div>
                    </div> -->

                        <!-- <h4 class="sub-head mt-3">
                        Looking for a lease to own option?
                    </h4>
                    <a href="" class="text-bold mb-5">Learn More</a>
 -->
                        <!-- <hr/>
                    <div class="d-flex" style="align-items: center;">
                        <div class="mr-1">
                            <i class="fas fa-gift mr-1"></i>
                        </div>
                        <div>
                            <h4 class="sub-head mt-3">
                                Buying a gift for someone special
                            </h4>
                            <p class="text-bold">
                                <a href="">Gift option</a>
                                can be added in checkout
                            </p>
                        </div>
                    </div> -->


                    </div>
                </div>
            </div>
        </section>

        <!-- also bought section -->
        @if(count($customerAlsoBought) > 0)
            <div class="mt-2 mb-2">
                <div class="container">
                    <div class="d-flex space-between fs-15 mt-3 mb-3" style="    margin-top: 44px !important;">
                        <div>
                            <h4 class="fs-15" style="margin-left: 28px;margin-bottom: 20px"> <b>Customer Also Bought</b> </h4>
                        </div>
                        <div class="shopAll">
                            <a href="" style="font-weight: 600;margin-right: 100px">View More<i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row" style="margin-left: -2px;">
                        @foreach($customerAlsoBought as $product)
                            <div class="col-sm-12 col-md-10 col-lg-6 col-xl-2 ml-3">
                                <div class="card" style="margin-bottom: 1rem">
                                    <a href="{{route('product.show',[$product->slug,'Health & Beauty'])}}"><img class="card-img-top" style="height: 20rem;width: 11rem" src="{{asset('storage/product/'.$product->thumbnail)}}"></a>
                                </div>
                                <div class="mt-2">
                                    <p class="text-bold mb-1">{{$product->user->vendor_profile->brand_name}}</p>
                                    <p title="Source Title" style="font-size: 13px" class="mb-1">{{$product->name}}</p>
                                    <p class="text-bold">${{$product->price}}.00</p>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        @endif
    </main>

@endsection
@section('js-files')
    <script type="text/javascript">
        (function ($) { // Begin jQuery
            $(function () { // DOM ready
                // If a link has a dropdown, add sub menu toggle.
                $('nav ul li a:not(:only-child)').click(function (e) {
                    $(this).siblings('.nav-dropdown').toggle();
                    // Close one dropdown when selecting another
                    $('.nav-dropdown').not($(this).siblings()).hide();
                    e.stopPropagation();
                });
                // Clicking away from dropdown will remove the dropdown class
                $('html').click(function () {
                    $('.nav-dropdown').hide();
                });
                // Toggle open and close nav styles on click
                $('#nav-toggle').click(function () {
                    $('nav ul').slideToggle();
                });
                // Hamburger to X toggle
                $('#nav-toggle').on('click', function () {
                    this.classList.toggle('active');
                });
            }); // end DOM ready
        })(jQuery); // end jQuery
    </script>
@endsection
