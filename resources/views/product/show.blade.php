@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/product_detail.css')}}">
    <style>


        .card{
            border: none;
        }
        .card-img-top{
            height: 100%;
            width: 115% !important;
        }

        .radio-toolbar input[type="radio"] {
            opacity: 0;
            position: fixed;
            width: 0;
        }

        .radio-toolbar label {
            display: inline-block;
            background-color: #fff;
            font-family: sans-serif, Arial;
            font-size: 14px;
            border: 1px solid #aaa;
            border-radius: 4px;
            width: 55px;
            height: 40px;
            text-align: center;
            vertical-align: middle;
            margin-right: 5px;
            line-height: 40px;
            cursor: pointer;
        }

        .radio-toolbar input[type="radio"]:focus + label {
            border: 2px dashed #444;
        }

        .radio-toolbar input[type="radio"]:checked + label, .radio-toolbar label:hover {
            background-color: #222;
            border-color: #222;
            color:white;
        }

        .custom-radios div {
            display: inline-block;
        }
        .custom-radios input[type="radio"] {
            display: none;
        }
        .custom-radios input[type="radio"] + label {
            color: #333;
            font-family: Arial, sans-serif;
            font-size: 14px;
        }
        .custom-radios input[type="radio"] + label span  {
            display: inline-block;
            width: 24px;
            height: 24px;
   
            cursor: pointer;
            border-radius: 50%;
            /* border: 2px solid #fff; */
            box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.33);
            background-repeat: no-repeat;
            background-position: center;
            text-align: center;
            line-height: 30px;
            margin-right: 6px 
        }
        .custom-radios input[type="radio"]:checked + label .inner {
           border: 2px solid white;
           width: 22px;
            height: 22px;
        }

        .custom-radios input[type="radio"]:checked + label .outer {
           border: 1px solid #1d1e1f;
        }

        .save-for-later{
            font-weight: 300;
            font-size: 18px;
        }
        .options a{
            color: #333333;
        }

        .not-size{
            background-color: #eee!important;
        }
        .not-size {
            background-color: transparent;
            pointer-events: none;
            opacity: 0.6;
        }

        .font-thin{
            font-size: 14px;
            line-height: 24px;
            color: #272727;
            font-weight: 400;
        }

        .top_links a{
            font-size: 14px;
            color:#1d1e1f;
            font-weight: 300;
        }
        .top_links .active{
            font-weight: 900;
            border: none;
        }

        .top_links .active a{
            font-weight: 500;
        }

    </style>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.min.js"></script>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.css" />
    <script src="https://cdn.jsdelivr.net/gh/fancyapps/fancybox@3.5.7/dist/jquery.fancybox.min.js"></script>
@endsection
@section('content')
        <div class="top d-flex space-between mt-3">
            <div class="d-flex top_links">
                <span> <a href='/}}'>{{ $product->main }} </a> &nbsp; </span> / <span class="active"> &nbsp; <a href=""> {{$product->name}} </a> &nbsp; </span>
            </div>
            <!-- <div class="d-flex top_icons">
            <i class="fab fa-facebook-f"></i>
            <i class="fab fa-pinterest-p"></i>
            <i class="fab fa-twitter"></i>
        </div> -->
        </div>
        <article>
        <div class="detailRow">
            <div class="pro_col1 d-flex">
                <div>
                    @if(count($product->images) > 0)
                        @foreach($product->images as $image)
                            <div class="sImg" onClick="changeImage('{{asset('storage/product/'.$image->path)}}')">
                                <img src="{{asset('storage/product/'.$image->path)}}" alt="">
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="p-1">
                    <img class="img-fluid" src="{{asset('storage/product/'.$product->thumbnail)}}" alt="">
                </div>
            </div>
            <div class="pro_col2">
                <p class="underline font-thin">{{$product->user->vendor_profile->brand_name ?? ''}}
                    <h2 class="heading m-0 p-0 mb-3">
                        {{$product->name}}
                    </h2>
                </p>
                <div>
                    <!-- <div class="d-flex stars">
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star"></i>
                    <i class="fas fa-star-half"></i>
                    <p>(4.6)</p>
                    <p class="underline ml-2">
                        2267 rating
                    </p>
                    <p class="underline ml-3">
                        390 comments
                    </p>
                </div> -->
                    <div class="colorPick">
                        <p class="font-thin">
                            Color:
                        </p>
                    </div>
                    <div class="custom-radios">
                        @if(count($product->colors) > 0)
                            @foreach($product->colors as $color)
                                <div>
                                    <input type="radio" id="color-{{$color->name}}" name="color" value="{{$color->name}}" onChange="setColor(this);">
                                    <label for="color-{{$color->name}}">
                                      <span class="outer">
                                      <span class='inner' style="background-color: {{$color->color_code}}"> </span>
                                      </span>
                                    </label>
                                </div>
                            @endforeach
                        @endif
                    </div>

                    <div class="colorPick ">
                        <p class="font-thin">
                            Size:
                        </p>
                    </div>
                    <div class="radio-toolbar">
                        @foreach($product->sizes as $size)
                            <input type="radio" id="radio-{{$size->name}}" name="size" value="{{$size->name}}" onChange="setSize();" style="display: none">
                            <label for="radio-{{$size->name}}" >{{$size->name}}</label>
                        @endforeach 
                    </div>


                    <div class="qtySection d-flex mt-4">
                        <div class="qty">
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
                    <div>
                        <h4 class="price mt-3 mb-3">
                            ${{\App\Helpers\Helper::presentPrice($product->price)}}
                        </h4>
                    </div>
                    <div class="col-12 mt-4 options">
                        <div class="row">
                            <a href="{{route('cart.saveForLaterDetail', $product->id)}}" class="btn btn-outline-default">
                                <div class="d-inline-flex ml-1 ">
                                    <i class="far fa-bookmark"></i>
                                    <h5 class="save-for-later ml-1">Save For Later</h5>
                                </div>
                            </a>
                        </div>
                    </div>

                    <div class="flex">
                        <div>
                            <form id="buy" action="{{route('cart.store')}}" method="POST">
                                @csrf
                                <input type="hidden" name="slug" value="{{$product->slug}}">
                                <input type="hidden" name="color" id="color">
                                <input type="hidden" name="size" id="size">
                            </form>
                            <button type="submit" form="buy" class="px-5  btn btn-primary">
                                Add to Cart
                            </button>
                        </div>
                    </div>


                    <div class="heading mt-5 aboutItem">

                        <button id="descriptionSlider" class="descriptionBtn">Description</button>
                        <p class="mt-3">
                            {{ $product->description }}
                        </p>
                    </div>

                    <div class="specification mt-5">

                    </div>
                </div>
            </div>
        </div>




        @if(count($recommendations) > 0)
            <div class="mt-2 mb-2">
                <div class="container-fluid">
                    <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                        <div>
                            <h4 class="fs-15 mb-3" style="margin-left: 28px;margin-bottom: 20px"> <b>Products similar to this item</b> </h4>
                        </div>
                        <div class="shopAll">
                            <a href="" style="font-weight: 600;margin-right: 120px">Shop All <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="container-fluid">
                    <div class="row" style="margin-left: -2px;">
                        @foreach($recommendations as $product)
                            <div class="col-sm-12 col-md-10 col-lg-6 col-xl-2 ml-3">
                                <div class="card" style="margin-bottom: 1rem">
                                    <a href="{{route('product.show',$product->slug)}}"><img class="card-img-top" src="{{asset('storage/product/'.$product->thumbnail)}}"></a>
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
    </article>


    <!-- product details section -->
{{--    <section class="pro_detail">--}}
{{--        <div class=" mt-5 ml-5">--}}
{{--            <div class="top d-flex space-between">--}}
{{--                <div class="d-flex top_links">--}}
{{--                    <a href="">--}}
{{--                        <p >--}}
{{--                            {{$product->main}} /--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                    <a href="">--}}
{{--                        <p>--}}
{{--                            {{$product->name}}--}}
{{--                        </p>--}}
{{--                    </a>--}}
{{--                </div>--}}
{{--                <!-- <div class="d-flex top_icons">--}}
{{--                <i class="fab fa-facebook-f"></i>--}}
{{--                <i class="fab fa-pinterest-p"></i>--}}
{{--                <i class="fab fa-twitter"></i>--}}
{{--            </div> -->--}}
{{--            </div>--}}
{{--        </div>--}}
{{--        <div class="detailRow">--}}
{{--            <div class="pro_col1 d-flex">--}}
{{--                <div>--}}
{{--                    <div class="sImg active">--}}
{{--                        <img src="./images/nintendo.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="sImg">--}}
{{--                        <img src="./images/n2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="sImg">--}}
{{--                        <img src="./images/n3.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="sImg">--}}
{{--                        <img src="./images/n4.jpg" alt="">--}}
{{--                    </div>--}}
{{--                    <div class="sImg">--}}
{{--                        <img src="./images/n2.jpg" alt="">--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="mainImg">--}}
{{--                    <img src="{{asset('storage/product/'.$product->thumbnail)}}" alt="">--}}

{{--                </div>--}}

{{--            </div>--}}
{{--            <div class="pro_col2">--}}
{{--                <p class="underline">{{$product->main}}</p>--}}
{{--                <h2 class="heading">--}}
{{--                    {{$product->name}}--}}
{{--                </h2>--}}
{{--                <div>--}}
{{--                    <div class="d-flex stars">--}}
{{--                    <i class="fas fa-star"></i>--}}
{{--                    <i class="fas fa-star"></i>--}}
{{--                    <i class="fas fa-star"></i>--}}
{{--                    <i class="fas fa-star"></i>--}}
{{--                    <i class="fas fa-star-half"></i>--}}
{{--                    <p>(4.6)</p>--}}
{{--                    <p class="underline ml-2">--}}
{{--                        {{$product->sold ?? 0}} sold--}}
{{--                    </p>--}}
{{--                    <p class="underline ml-3">--}}
{{--                        390 comments--}}
{{--                    </p>--}}
{{--                </div>--}}
{{--                    <div>--}}
{{--                        <h4 class="price mt-3 mb-3">--}}
{{--                            ${{\App\Helpers\Helper::presentPrice($product->price)}}--}}
{{--                        </h4>--}}
{{--                    </div>--}}
{{--                    <p>--}}
{{--                        <b>Actual Color:</b> Gray--}}
{{--                    </p>--}}
{{--                    <a href="" class="under_btn">--}}
{{--                        Gray--}}
{{--                    </a>--}}
{{--                    <div class="qtySection d-flex mt-4">--}}
{{--                        <div class="qty">--}}
{{--                            <label for="qty" class="text-bold">Qty:</label>--}}
{{--                            <select class="sQty">--}}
{{--                                <option value="1">1</option>--}}
{{--                                <option value="1">2</option>--}}
{{--                                <option value="1">3</option>--}}
{{--                                <option value="1">4</option>--}}
{{--                                <option value="1">5</option>--}}
{{--                            </select>--}}
{{--                        </div>--}}
{{--                        <div>--}}
{{--                            <form id="buy" action="{{route('cart.store')}}" method="POST">--}}
{{--                                @csrf--}}
{{--                                <input type="hidden" name="slug" value="{{$product->slug}}">--}}
{{--                            </form>--}}
{{--                            <button type="submit" form="buy" class="cart_btn">Add to cart</button>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="add d-flex mt-4">--}}
{{--                        <p class="underline">--}}
{{--                            <i class="fas fa-list-ul mr-2"></i>--}}
{{--                            Add to list--}}
{{--                        </p>--}}
{{--                    </div>--}}
{{--                    <p class="mt-3">--}}
{{--                        <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">--}}
{{--                            Description :--}}
{{--                        </button>--}}
{{--                    </p>--}}
{{--                    <div class="collapse" id="collapseExample">--}}
{{--                        <div class="card card-body border-0">--}}
{{--                            {{$product->description}}--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}


{{--            @if(count($recommendations) > 0)--}}
{{--                <div class="mt-2 mb-2">--}}
{{--                    <div class="container">--}}
{{--                        <div class="d-flex space-between fs-15 mt-3 mb-3" style="    margin-top: 44px !important;">--}}
{{--                            <div>--}}
{{--                                <h4 class="fs-15" style="margin-left: 28px;margin-bottom: 20px"> <b>Customer Also Considered This</b> </h4>--}}
{{--                            </div>--}}
{{--                            <div class="shopAll">--}}
{{--                                <a href="" style="font-weight: 600;margin-right: 100px">View More<i class="fa fa-chevron-right"></i>--}}
{{--                                </a>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="container">--}}
{{--                        <div class="row" style="margin-left: -2px;">--}}
{{--                            @foreach($recommendations as $product)--}}
{{--                                <div class="col-sm-12 col-md-10 col-lg-6 col-xl-2 ml-3">--}}
{{--                                    <div class="card" style="margin-bottom: 1rem">--}}
{{--                                        <a href="{{route('product.show',[$product->slug,'Health & Beauty'])}}"><img class="card-img-top" style="height: 20rem;width: 11rem" src="{{asset('storage/product/'.$product->thumbnail)}}"></a>--}}
{{--                                    </div>--}}
{{--                                    <div class="mt-2">--}}
{{--                                        <p class="text-bold mb-1">{{$product->user->vendor_profile->brand_name}}</p>--}}
{{--                                        <p title="Source Title" style="font-size: 13px" class="mb-1">{{$product->name}}</p>--}}
{{--                                        <p class="text-bold">${{$product->price}}.00</p>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            @endforeach--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            @endif--}}


{{--    </section>--}}

    <!-- also bought section -->

@endsection
@section('js-files')
    <script type="text/javascript">
        function changeImage(image) {
            var mainImg = document.getElementById('mainImg');
            if (image) {
                mainImg.src = image
            }
        }
        function setColor() {
            var input = document.getElementsByName("color");
            var colorValue = null;
            for (var i=0; i< input.length; i++) {
                if(input[i].checked) {
                    colorValue = input[i].value
                }
            }
            document.getElementById('color').value = colorValue
        }
        function setSize() {
            var input = document.getElementsByName("size");
            var sizeValue = null;
            for (var i=0; i< input.length; i++) {
                if(input[i].checked) {
                    sizeValue = input[i].value
                }
            }
            document.getElementById('size').value = sizeValue
        }
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

    <script>
        $("input[name=color]").first().click();
    </script>
@endsection
