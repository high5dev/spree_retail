@extends('layouts.app')
@section('css-files')
<link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
<style>
    /* * The Typekit service used to deliver this font or fonts for use on websites is provided by Adobe and is subject to these Terms of Use http://www.adobe.com/products/eulas/tou_typekit. For font license information, see the list below. * acumin-pro: http://typekit.com/eulas/00000000000000003b9acafc, http://typekit.com/eulas/00000000000000003b9acaf6, http://typekit.com/eulas/00000000000000003b9acafa * minion-pro-caption: http://typekit.com/eulas/0000000000000000000151eb, http://typekit.com/eulas/0000000000000000000151ec, http://typekit.com/eulas/0000000000000000000151ed, http://typekit.com/eulas/0000000000000000000151ee, http://typekit.com/eulas/0000000000000000000151f1, http://typekit.com/eulas/0000000000000000000151f2 * © 2009-2020 Adobe Systems Incorporated. All Rights Reserved.*/
    /*{"last_published":"2020-03-20 20:18:25 UTC"}*/
    @import url("https://p.typekit.net/p.css?s=1&k=niq5plm&ht=tk&f=6764.6765.6766.6767.14598.14599.26053.26062.26063&a=24496548&app=typekit&e=css");

    @font-face {
        font-family: "minion-pro-caption";
        src: url("https://use.typekit.net/af/a7f482/0000000000000000000151eb/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("woff2"), url("https://use.typekit.net/af/a7f482/0000000000000000000151eb/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("woff"), url("https://use.typekit.net/af/a7f482/0000000000000000000151eb/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 400;
    }

    @font-face {
        font-family: "minion-pro-caption";
        src: url("https://use.typekit.net/af/4b2075/0000000000000000000151ec/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3") format("woff2"), url("https://use.typekit.net/af/4b2075/0000000000000000000151ec/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3") format("woff"), url("https://use.typekit.net/af/4b2075/0000000000000000000151ec/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i4&v=3") format("opentype");
        font-display: swap;
        font-style: italic;
        font-weight: 400;
    }

    @font-face {
        font-family: "minion-pro-caption";
        src: url("https://use.typekit.net/af/632440/0000000000000000000151ed/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3") format("woff2"), url("https://use.typekit.net/af/632440/0000000000000000000151ed/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3") format("woff"), url("https://use.typekit.net/af/632440/0000000000000000000151ed/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3") format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 600;
    }

    @font-face {
        font-family: "minion-pro-caption";
        src: url("https://use.typekit.net/af/331196/0000000000000000000151ee/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i6&v=3") format("woff2"), url("https://use.typekit.net/af/331196/0000000000000000000151ee/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i6&v=3") format("woff"), url("https://use.typekit.net/af/331196/0000000000000000000151ee/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i6&v=3") format("opentype");
        font-display: swap;
        font-style: italic;
        font-weight: 600;
    }

    @font-face {
        font-family: "minion-pro-caption";
        src: url("https://use.typekit.net/af/5775f1/0000000000000000000151f1/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3") format("woff2"), url("https://use.typekit.net/af/5775f1/0000000000000000000151f1/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3") format("woff"), url("https://use.typekit.net/af/5775f1/0000000000000000000151f1/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3") format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 700;
    }

    @font-face {
        font-family: "minion-pro-caption";
        src: url("https://use.typekit.net/af/5ca9e0/0000000000000000000151f2/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3") format("woff2"), url("https://use.typekit.net/af/5ca9e0/0000000000000000000151f2/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3") format("woff"), url("https://use.typekit.net/af/5ca9e0/0000000000000000000151f2/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=i7&v=3") format("opentype");
        font-display: swap;
        font-style: italic;
        font-weight: 700;
    }

    @font-face {
        font-family: "acumin-pro";
        src: url("https://use.typekit.net/af/6d4bb2/00000000000000003b9acafc/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3") format("woff2"), url("https://use.typekit.net/af/6d4bb2/00000000000000003b9acafc/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3") format("woff"), url("https://use.typekit.net/af/6d4bb2/00000000000000003b9acafc/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n7&v=3") format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 700;
    }

    @font-face {
        font-family: "acumin-pro";
        src: url("https://use.typekit.net/af/46da36/00000000000000003b9acaf6/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("woff2"), url("https://use.typekit.net/af/46da36/00000000000000003b9acaf6/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("woff"), url("https://use.typekit.net/af/46da36/00000000000000003b9acaf6/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n4&v=3") format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 400;
    }

    @font-face {
        font-family: "acumin-pro";
        src: url("https://use.typekit.net/af/027dd4/00000000000000003b9acafa/27/l?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3") format("woff2"), url("https://use.typekit.net/af/027dd4/00000000000000003b9acafa/27/d?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3") format("woff"), url("https://use.typekit.net/af/027dd4/00000000000000003b9acafa/27/a?primer=7cdcb44be4a7db8877ffa5c0007b8dd865b3bbc383831fe2ea177f62257a9191&fvd=n6&v=3") format("opentype");
        font-display: swap;
        font-style: normal;
        font-weight: 600;
    }

    .card {
        border: none;
    }

    body {
        font-family: acumin-pro, Helvetica, Avenir, sans-serif;
    }

    .card-img-top {
        height: 100%;
        width: 115% !important;
    }

    .splide__arrow {
        background-color: white;
        border: 1px solid #aaa;
    }

    .splide__arrow:hover {
        background-color: blue;
    }

    .splide__arrow:hover svg {
        fill: white
    }

    .splide__track {
        width: 90%;
        margin: auto
    }

    .splide__arrow svg {
        width: 0.8em;
        height: 0.8em;
    }

    .splide__arrow {
        transition: opacity .3s ease;
    }

    .splide__arrow:disabled {
        opacity: 0;
        pointer-events: none;
    }

    .img-fluid {
        object-fit: contain;
        height: 200px;
    }
</style>
@endsection
@section('content')
<div>

    @if(count($h_banners) > 0)
    <div id="demo" class="carousel slide" data-ride="carousel">
        <ul class="carousel-indicators">
            <li data-target="#demo" data-slide-to="0" class="active"></li>
            <li data-target="#demo" data-slide-to="{{count($h_banners)}}"></li>
        </ul>
        <div class="carousel-inner">
            @foreach($h_banners as $h_banner)
            <div class="carousel-item @if($loop->iteration == 1)active @endif">
                <a href="">
                    <img src="{{asset('storage/banner/'.$h_banner->image)}}" width="100%">
                </a>
            </div>
            @endforeach
        </div>
        <a class="carousel-control-prev carousel-control" href="#demo" data-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </a>
        <a class="carousel-control-next carousel-control" href="#demo" data-slide="next">
            <span class="carousel-control-next-icon"></span>
        </a>
    </div>

    @endif

    <!-- <div class="col-sm-12 p-0">
     <img src="https://img.lovepik.com//back_pic/05/70/26/915b9dfcd2e30f6.jpg_wh860.jpg" style="width: 100%; height: 300px;">
 </div> -->
</div>
<article>
    @if(count($new_products) > 0)
    <div class="mt-2 mb-2">
        <div class="container-fluid">
            <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                <div>
                    <h4 class="fs-15" style="margin-left: 28px;margin-bottom: 20px"> <b>New Arrivals</b> </h4>
                </div>
                <div class="shopAll">
                    <a href="{{URL::to('product')}}" style="font-weight: 600;margin-right: 120px">Shop All <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="splide">
                <div class="splide__track">
                    <div class="splide__list">

                        @foreach($new_products as $product)
                        <div class="splide__slide m-1">
                            <div class="p-4">
                                <div class="card" style="margin-bottom: 1rem">
                                    <a href="{{route('product.show',$product->slug)}}"><img class="img-fluid" src="{{asset('storage/storage/product/'.$product->thumbnail)}}"></a>
                                </div>
                                <div class="mt-2">
                                    <p class="text-bold mb-1">{{$product->user->vendor_profile->brand_name ?? ''}}</p>
                                    <p title="Source Title" style="font-size: 13px" class="mb-1">{{$product->name}}</p>
                                    <p class="text-bold">${{$product->price}}.00</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @else
        <div class="container-fluid">
            <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                <div>
                    <h4 class="fs-15" style="margin-left: 28px;margin-bottom: 20px"> <b>New Arrivals</b> </h4>
                </div>
                <div class="shopAll">
                    <a href="{{URL::to('product')}}" style="font-weight: 600;margin-right: 120px">Shop All <i class="fa fa-chevron-right"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="splide">
                <div class="splide__track">
                    <div class="splide__list">

                        @foreach($new_products as $product)
                        <div class="splide__slide m-1">
                            <div class="p-4">
                                <div class="card" style="margin-bottom: 1rem">
                                    <a href="{{route('product.show',$product->slug)}}"><img class="img-fluid" src="{{asset('storage/storage/product/'.$product->thumbnail)}}"></a>
                                </div>
                                <div class="mt-2">
                                    <p class="text-bold mb-1">{{$product->user->name}}</p>
                                    <p title="Source Title" style="font-size: 13px" class="mb-1">{{$product->name}}</p>
                                    <p class="text-bold">${{$product->price}}.00</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endif

        @if(count($f_cats) > 0)
        @foreach($f_cats as $f_cat)
        @php
        $products = \App\Models\Product::where('featured',$f_cat->name)
        ->where('status','Active')->take(15)->get();
        @endphp
        @if(count($products) > 0)
        <div class="mt-2 mb-2">
            <div class="container-fluid">
                <div class="d-flex space-between fs-15 mt-3" style="    margin-top: 44px !important;">
                    <div>
                        <h4 class="fs-15" style="margin-left: 28px;margin-bottom: 20px"> <b>{{$f_cat->name}}</b> </h4>
                    </div>
                    <div class="shopAll">
                        <a href="{{ URL::to('/product/featured/'.$f_cat->name) }}" style="font-weight: 600;margin-right: 120px">Shop All <i class="fa fa-chevron-right"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="splide">
                    <div class="splide__track">
                        <div class="splide__list">
                            @foreach($products as $product)
                            <div class="splide__slide m-1">
                                <div class="">
                                    <div class="p-4">
                                        <div class="card" style="margin-bottom: 1rem">
                                            <a href="{{route('product.show',$product->slug)}}"><img class="img-fluid" src="{{asset('storage/storage/product/'.$product->thumbnail)}}"></a>
                                        </div>
                                        <div class="mt-2">
                                            <p class="text-bold mb-1">{{$product->user->vendor_profile->brand_name ?? ''}}</p>
                                            <p title="Source Title" style="font-size: 13px" class="mb-1">{{$product->name}}</p>
                                            <p class="text-bold">${{$product->price}}.00</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            @endif
            @endforeach
            @endif
            @if(!is_null($f_banner))
            <div class="container-fluid">
                <div class="col-sm-12 footer_banner" style="background-image: url({{asset('storage/banner/'.$f_banner->image)}});width: 90%;margin-left: 2rem;margin-top: 6rem">
                </div>
            </div>
            @endif

</article>

@endsection

@section('js-files')
<script>
    $('.splide').each(function() {
        new Splide(this, {
            perPage: 5,
            autoplay: false,
            pagination: false
        }).mount();
    })
</script>
@stop