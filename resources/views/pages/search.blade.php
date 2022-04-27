@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/job.css')}}">
    <style>
        .filterContainer{
            position: sticky;
            top: 0;
            display: block;
            margin-top:50px;
            margin-bottom: 50px;
            margin-right: 10px;
            width:15%;

        }

        .firstInFilter h1{

            font-size: 28px;
            font-weight: 700;
        }

        .plus{
            float: right;
            font-size: 20px;
            color:  rgba(128, 128, 128, 0.747);

        }


        .filters{
            width: 200px;
            padding-bottom: 10px;
            padding-top: 10px;
            color: rgb(51, 51, 51);
        }
        .filters h3 {
            padding-bottom: 1px;
            font-size: 18px;
	    font-weight: bold;

        }
        .separateFooter{
            margin-left: 23px;
            width: 97%;
            height: 1px;
            background-color: rgba(128, 128, 128, 0.267);
        }

        .underline{
            height: 1px;
            width: 200px;
            background-color: rgba(128, 128, 128, 0.274);
        }
        .boldUnderline{

            height: 2px;
            width: 285%;
            background-color: black;

        }
        .firstInFilter{
            padding-bottom: 45px;
        }

        .firstInFilter h1{
            padding-bottom: 7px;
        }

        .main{
            display: flex;
        }
        .imageSection{
            margin-top: 60px;
            width: 60%;
            display:flex;
        }

        .customImage{
            padding-left: 20px;
            height: 80%;
            width: 90%;
        }
        .leftSide{
            display: block;
        }

        .cardCustom{

            display: block;
        }
        .textUnderImg{
            padding-left: 20px;
        }
        .textUnderImg h4{
            padding-top: 20px;
        }

        .textUnderImg h4{
            font-size: 20px;
        }

        .textUnderImg p{

            padding: 0;
            margin-bottom: 4px;

        }
        .filters a:hover{
            text-decoration: none;
        }

    </style>
@endsection
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-2">

            </div>
            <div class="col-2">
                <div class="filterContainer">
                    <div class="firstInFilter">
                        <h1 style="white-space: nowrap;">Search</h1>
                        <div class="boldUnderline"></div>
                    </div>
                </div>
            </div>
            <div class="col-8">
                <div class="leftSide">
                    <div class="row" style="margin-top: 0.6rem;max-width: 97%">
                        @if(count($products) > 0)
                            @foreach($products as $product)
                                <div class="col-3 mt-5 pl-0 pr-0">
                                    <a href="{{route('product.show',[$product->slug])}}"><img class= "customImage" src="{{asset('storage/product/'.$product->thumbnail)}}" alt=""></a>
                                    <div class="textUnderImg">
                                        <h4>{{$product->user->vendor_profile->brand_name}}</h4>
                                        <p>{{$product->name}}</p>
                                        <h5>${{$product->price}}.00</h5>
                                    </div>
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>


        </div>
    </div>
    <script>
        var accordion = (function () {

            var $accordion = $('.js-accordion');
            var $accordion_header = $accordion.find('.js-accordion-header');
            var $accordion_item = $('.js-accordion-item');

            // default settings
            var settings = {
                // animation speed
                speed: 3000,

                // close all other accordion items if true
                oneOpen: true
            };

            return {
                // pass configurable object literal
                init: function ($settings) {
                    $accordion_header.on('click', function () {
                        accordion.toggle($(this));

                        setTimeout(() => {
                            $('body, html').animate({

                            }, 0)
                        }, 0)
                    });

                    $.extend(settings, $settings);

                    // ensure only one accordion is active if oneOpen is true
                    if (settings.oneOpen && $('.js-accordion-item.active').length > 1) {
                        $('.js-accordion-item.active:not(:first)').removeClass('active');
                    }

                    // reveal the active accordion bodies
                    $('.js-accordion-item.active').find('> .js-accordion-body').show();
                },
                toggle: function ($this) {

                    if (settings.oneOpen && $this[0] != $this.closest('.js-accordion').find('> .js-accordion-item.active > .js-accordion-header')[0]) {
                        $this.closest('.js-accordion')
                            .find('> .js-accordion-item')
                            .removeClass('active')
                            .find('.js-accordion-body')
                            .slideUp()
                    }

                    // show/hide the clicked accordion item
                    $this.closest('.js-accordion-item').toggleClass('active');
                    $this.next().stop().slideToggle(settings.speed);
                }
            }
        })();

        $(document).ready(function () {
            accordion.init({ speed: 1000, oneOpen: true });
        });
    </script>
@endsection
