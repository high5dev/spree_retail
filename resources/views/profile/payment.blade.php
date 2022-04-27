@extends('layouts.app')
@section('css-files')
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/profile.css')}}">
    <style>
        /**
* The CSS shown here will not be introduced in the Quickstart guide, but shows
* how you can use CSS to style your Element's container.
*/
        .StripeElement {
            background-color: white;
            padding: 16px 16px;
            border: 1px solid #ccc;

        }

        .StripeElement--focus {
        // box-shadow: 0 1px 3px 0 #cfd7df;
        }

        .StripeElement--invalid {
            border-color: #fa755a;
        }

        .StripeElement--webkit-autofill {
            background-color: #fefde5 !important;
        }

        #card-errors {
            color: #fa755a;
        }
    </style>
    <script src="https://js.stripe.com/v3/"></script>
@endsection
@section('content')
    <main>
        <section class="profile">
            @include('inc.profileSidebar')
            @if($u_card == null)
                <div class="pCol2">
                    <div class="heading">
                        <h2>Payment method</h2>
                    </div>
                    <hr/>
                    <div class="row">
                        <div class="col-lg-12 ml-3">
                            <div class="row">
                                <div class="col-lg-4" style="padding: 0px;">
                                    <h5 class="mt-2">
                                        Credit or debit card
                                    </h5>
                                    <div class="creditBox">
                                        <button class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                                            + Add a credit or debit card
                                        </button>
                                    </div>
                                    <!-- Modal -->
                                    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                        <div class="modal-dialog modal-dialog-centered" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLongTitle">Add New Address</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    <form action="{{ route('profile.card.store') }}" method="POST" id="new-card">
                                                        {{ csrf_field() }}
                                                        <div class="form-group">
                                                            <label for="name_on_card">Name on Card</label>
                                                            <input type="text" class="form-control" id="name_on_card" name="name_on_card" value="">
                                                        </div>

                                                        <div class="form-group">
                                                            <label for="card-element">
                                                                Credit or debit card
                                                            </label>
                                                            <div id="card-element">
                                                                <!-- a Stripe Element will be inserted here. -->
                                                            </div>

                                                            <!-- Used to display form errors -->
                                                            <div id="card-errors" role="alert"></div>
                                                        </div>
                                                        <span id="error"></span>
                                                        <div class="spacer"></div>
                                                    </form>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button id="card-btn" type="submit" form="new-card" class="btn btn-primary">Add</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @else
                <div class="pCol2">
                    <div class="heading">
                        <h2>Card Info</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-12" style="padding: 0px;">
                            <div style="overflow-x: auto;">
                                <table>
                                    <thead>
                                    <tr>
                                        <th>
                                            Name On Card
                                        </th>
                                        <th>
                                            Last 4 digits
                                        </th>
                                        <th>
                                            Exp date
                                        </th>
                                        <th>
                                            Action
                                        </th>
                                    </tr>
                                    </thead>
                                    <tbody>

                                    <tr>
                                        <td>
                                            {{$u_card->name}}
                                        </td>
                                        <td>
                                            {{$u_card->card_number}}
                                        </td>
                                        <td>
                                            {{$u_card->exp_month}}, {{$u_card->exp_year}}
                                        </td>
                                        <td>
                                            <a href="{{route('profile.card.destroy')}}" class="delete">
                                                Delete
                                            </a>
                                        </td>
                                    </tr>

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            @endif

        </section>
    </main>

@endsection
@section('js-files')
    <script>
        (function(){
            // Create a Stripe client
            var stripe = Stripe('{{config('stripe.public_key')}}');
            // Create an instance of Elements
            var elements = stripe.elements();
            // Custom styling can be passed to options when creating an Element.
            // (Note that this demo uses a wider set of styles than the guide below.)
            var style = {
                base: {
                    color: '#32325d',
                    lineHeight: '18px',
                    fontFamily: '"Roboto", Helvetica Neue", Helvetica, sans-serif',
                    fontSmoothing: 'antialiased',
                    fontSize: '16px',
                    '::placeholder': {
                        color: '#aab7c4'
                    }
                },
                invalid: {
                    color: '#fa755a',
                    iconColor: '#fa755a'
                }
            };
            // Create an instance of the card Element
            var card = elements.create('card', {
                style: style,
                hidePostalCode: true
            });
            // Add an instance of the card Element into the `card-element` <div>
            card.mount('#card-element');
            // Handle real-time validation errors from the card Element.
            card.addEventListener('change', function(event) {
                var displayError = document.getElementById('card-errors');
                if (event.error) {
                    displayError.textContent = event.error.message;
                } else {
                    displayError.textContent = '';
                }
            });
            // Handle form submission
            var form = document.getElementById('new-card');
            form.addEventListener('submit', function(event) {
                event.preventDefault();
                //check if address field is not empty
                // Disable the submit button to prevent repeated clicks
                document.getElementById('card-btn').disabled = true;
                var options = {
                    name: document.getElementById('name_on_card').value,
                }
                stripe.createToken(card, options).then(function(result) {
                    if (result.error) {
                        // Inform the user if there was an error
                        var errorElement = document.getElementById('card-errors');
                        errorElement.textContent = result.error.message;
                        // Enable the submit button
                        document.getElementById('card-btn').disabled = false;
                    } else {
                        // Send the token to your server
                        stripeTokenHandler(result.token);
                    }
                });
            });
            function stripeTokenHandler(token) {
                // Insert the token ID into the form so it gets submitted to the server
                var form = document.getElementById('new-card');
                var hiddenInput = document.createElement('input');
                hiddenInput.setAttribute('type', 'hidden');
                hiddenInput.setAttribute('name', 'stripeToken');
                hiddenInput.setAttribute('value', token.id);
                form.appendChild(hiddenInput);
                // Submit the form
                form.submit();
            }
            // PayPal Stuff
        })();
    </script>
@endsection
