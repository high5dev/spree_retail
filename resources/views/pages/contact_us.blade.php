@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/contact.css')}}">
    <link rel="stylesheet" href="{{asset('css/job.css')}}">
    <style>
        .card img{
            height: 20rem;
        }
        .card{
            border: none;
        }
        .card-footer{
            border: none;
        }
        .search{
            box-shadow: 20px 20px 50px 0px gray inset;
        }
        .sticky {
            position: -webkit-sticky;
            position: sticky;
            align-self: flex-start;
            top: 0;
            padding: 50px;
            font-size: 20px;
        }
        .garage-title {
            clear: both;
            white-space: nowrap;
            font-size: 16px;
        }
        @media (min-width: 576px) {

        }

        @media (min-width: 768px) {
            .jobContent{
                margin-left: 50px;
            }
        }

        @media (min-width: 1050px) {
            .jobContent{
                margin-left: 80px;
            }
        }

        @media (min-width: 1200px) {
            .jobContent{
                margin-left: 100px;
            }
        }
        @media (min-width: 1500px) {
            .jobContent{
                margin-left: 170px;
            }
        }
    </style>
@endsection
@section('content')
    <main>
        <section class="contact">
            <div class="heading">
                <h2>
                    Contact Us
                </h2>
            </div>
            <div class="contactContent">
                <div class="row">
                    <div class="col-sm-8 contactImg">
                        <!-- <img src="./images/contact.svg" alt=""> -->
                    </div>
                    <div class="col-sm-4 contactDesc">
                        <h3>
                            Customer Feedback
                        </h3>
                        <p>
                            Contact us to provide a comment or ask a question about your local store or our corporate
                            headquarters.
                        </p>
                        <p>
                            If you have a question about item pricing, please contact customer service below.
                        </p>
                        <div class="iconText d-flex mt-4">
                            <div>
                                <i class="fas fa-phone-alt"></i>
                            </div>
                            <div>
                                Call 1-800-925-0000 (SPREE)
                            </div>
                        </div>
                        <div class="iconText d-flex mt-3">
                            <div>
                                <i class="fas fa-envelope-open-text"></i>
                            </div>
                            <div>
                                spree@gmail.com
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
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
