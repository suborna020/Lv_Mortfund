@extends('ui.layout.app')

@section('content')

@php
$stripe_key = 'pk_test_51IQArsEXyED6aSlyRzlOPfGbvVXVxhOOUlgoq1ETJemIPA1Z6geLIXQZbIsOrrkP5BFAXLkE8CISrX7R7AXExfw700lLnBqU6U';
@endphp

<section class="confirmation-page py-5" style="margin-top: 115px">
    <div class="container">
        <div class="row">
            <div class="col-12 col-md-3 "></div>
            <div class="col-12 col-md-6">
                <div class="card border-0 " style=" box-shadow: 0 2px 4px 0 #e6e6e6, 0 2px 4px 0 #e6e6e6">
                    <h5 style="background-color: #adb5bd !important; color: #fff;" class="card-header font-weight-bold text-center ">
                        Confirmation Details</h5>
                    @if($selected_method->id == 5)
                    <form method="POST" action="{{ route($selected_method->link) }}" accept-charset="UTF-8" class="form-horizontal" role="form">


                        <div class="card-body px-0 py-3">
                            <div class="container-fluid">
                                <div class="d-flex flex-column">
                                    @include('ui.pages.users.user.payment_check_common')
                                    <input type="hidden" name="amount" value="{{session('amount')}}">
                                    <input type="hidden" name="email" value="{{session('email')}}">
                                    <input type="hidden" name="currency" value="NGN">
                                    <input type="hidden" name="current_balance" value="{{$user_info->current_balance}}">
                                    <input type="hidden" name="metadata" value="{{ json_encode($array = ['key_name' => 'value',]) }}"> {{-- For other necessary things you want to add to your payload. it is optional though --}}
                                    <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}"> {{-- required --}}
                                    {{ csrf_field() }} {{-- works only when using laravel 5.1, 5.2 --}}
                                    ​
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}"> {{-- employ this in place of csrf_field only in laravel 5.0 --}}
                                    ​
                                    ​
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">

                                    <button type="submit" style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; " class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-check mr-2"></i>Confirm
                                    </button>
                                </div>
                            </div>
                            ​
                        </div>
                    </form>
                    @elseif($selected_method->id == 1)
                    <form method="POST" action="{!! URL::to('paypal') !!}" accept-charset="UTF-8" class="form-horizontal" role="form">

                        @csrf
                        <div class="card-body px-0 py-3">
                            <div class="container-fluid">
                                <div class="d-flex flex-column">
                                    @include('ui.pages.users.user.payment_check_common')
                                    <input type="hidden" name="amount" value="{{session('amount')}}">
                                    <input type="hidden" name="email" value="{{session('email')}}">
                                    <input type="hidden" name="current_balance" value="{{$user_info->current_balance}}">
                                    <input type="hidden" name="method_id" value="1" class="form-control">
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">

                                    <button type="submit" style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; " class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-check mr-2"></i>Confirm
                                    </button>
                                </div>
                            </div>
                            ​
                        </div>
                    </form>

                    @elseif($selected_method->id == 7)
                    <form method="POST" action="{{route('InterswitchPay')}}" accept-charset="UTF-8" class="form-horizontal" role="form">

                        @csrf
                        <div class="card-body px-0 py-3">
                            <div class="container-fluid">
                                <div class="d-flex flex-column">
                                    @include('ui.pages.users.user.payment_check_common')
                                    <input type="hidden" name="customer_name" value="{{session('name')}}" required />
                                    <input type="hidden" name="current_balance" value="{{$user_info->current_balance}}">
                                    <input type="hidden" name="customer_id" value="{{session('user_session')}}" required />
                                    <input type="hidden" name="customer_email" required value="{{session('email')}}" placeholder="a valid email" />
                                    <input type="hidden" min="0" name="amount" required value="{{session('amount')}}" />
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">

                                    <button type="submit" style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; " class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-check mr-2"></i>Confirm
                                    </button>
                                </div>
                            </div>
                            ​
                        </div>
                    </form>


                    @elseif($selected_method->id == 6)
                    <form>

                        <script src="https://checkout.flutterwave.com/v3.js"></script>
                        <div class="card-body px-0 py-3">
                            <div class="container-fluid">
                                <div class="d-flex flex-column">
                                    @include('ui.pages.users.user.payment_check_common')
                                    <input type="text" name="currency" value="USD">
                                    <input type="hidden" name="current_balance" value="{{$user_info->current_balance}}">
                                    <input type="hidden" name="customer_name" value="{{session('name')}}" required />
                                    <input type="hidden" name="customer_id" value="{{session('user_session')}}" required />
                                    <input type="hidden" id="flutter_email" name="customer_email" required value="{{session('email')}}" placeholder="a valid email" />
                                    <input type="hidden" min="0" id="flutter_amount" name="amount" required value="{{session('amount')}}" />
                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">

                                    <button type="button" onClick="makePayment()" style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; " class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-check mr-2"></i>Confirm
                                    </button>
                                </div>
                            </div>
                            ​
                        </div>
                    </form>

                    @elseif($selected_method->id == 8)
                    <form action="https://perfectmoney.is/api/step1.asp" method="POST">
                        @csrf

                        <div class="card-body px-0 py-3">
                            <div class="container-fluid">
                                <div class="d-flex flex-column">
                                    @include('ui.pages.users.user.payment_check_common')

                                    <input type="hidden" name="PAYEE_ACCOUNT" value="U27873181">
                                    <input type="hidden" name="PAYEE_NAME" value="Mortfund">
                                    <input type="hidden" name="current_balance" value="{{$user_info->current_balance}}">
                                    <input type="hidden" name="PAYMENT_AMOUNT" class="form-control" value="{{session('amount')}}" placeholder="Amount" required="">
                                    <input type="hidden" name="PAYMENT_UNITS" value="USD">
                                    <input type="hidden" name="PAYMENT_URL" value="http://localhost:8001/perfectmoney/success">
                                    <input type="hidden" name="NOPAYMENT_URL" value="http://localhost:8001/perfectmoney/fail">

                                    <input type="hidden" name="PAYMENT_ID" value="1212">

                                    <input type="hidden" name="STATUS_URL" value="mahamudun.hassan@gmail.com">

                                    <input type="hidden" name="PAYMENT_URL_METHOD" value="POST">

                                    <input type="hidden" name="NOPAYMENT_URL_METHOD" value="GET">

                                    <input type="hidden" name="SUGGESTED_MEMO" value="NULL">

                                    <br>

                                </div>
                                <hr>
                                <div class="d-flex justify-content-end">

                                    <button type="submit" onClick="makePayment()" style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; " class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-check mr-2"></i>Confirm
                                    </button>
                                </div>
                            </div>
                            ​
                        </div>
                    </form>

                    @elseif($selected_method->id == 4)
                    <form action="{{route('checkout.credit-card')}}" method="post" id="payment-form">
                        @csrf

                        <div class="card-body px-0 py-3">
                            <div class="container-fluid">
                                <div class="d-flex flex-column">
                                    @include('ui.pages.users.user.payment_check_common')

                                    <input type="hidden" name="primary_amount" value="{{session('amount')}}" required />
                                    <input type="hidden" name="current_balance" value="{{$user_info->current_balance}}">
                                    <!-- <input type="text" disabled="disabled" name="charge" id="charge" class="form-control" value="{{(session('amount')*($selected_method->charge))/100}}"> -->
                                    <!-- <input type="text" disabled="disabled" name="net_amount" id="net_amount" class="form-control" value="{{session('amount')+(session('amount')*($selected_method->charge))/100}}"> -->
                                    <input type="hidden" name="email" required value="{{session('email')}}" placeholder="a valid email" />
                                </div>
                                <hr>
                                <div class="form-group">
                                    <div class="card-header">
                                        <label for="card-element">
                                            Enter your credit card information
                                        </label>
                                    </div>

                                    <div class="card-body">
                                        <div id="card-element">
                                            <!-- A Stripe Element will be inserted here. -->
                                        </div>
                                        <!-- Used to display form errors. -->
                                        <div id="card-errors" role="alert"></div>
                                        <input type="hidden" name="plan" value="" />
                                        <input type="hidden" name="method_id" value="4">

                                    </div>
                                </div>
                                <div class="d-flex justify-content-end">

                                    <button type="submit" id="card-button" type="submit" data-secret="{{ $intent }}" style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; " class="btn" type="button" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-check mr-2"></i>Confirm
                                    </button>
                                </div>
                            </div>
                            ​
                        </div>
                    </form>

                    @elseif($selected_method->id == 9)
                    <form action="{{route('paytm.payment')}}" method="post" id="payment-form">
                        @csrf

                        <div class="card-body px-0 py-3">
                            <div class="container-fluid">
                                <div class="d-flex flex-column">
                                    @include('ui.pages.users.user.payment_check_common')

                                    <input type="hidden" name="amount" value="{{session('amount')}}" required />
                                    <input type="hidden" name="current_balance" value="{{$user_info->current_balance}}">
                                    <input type="hidden" name="email" required value="{{session('email')}}" placeholder="a valid email" />
                                </div>
                                <hr>

                                <div class="d-flex justify-content-end">

                                    <button type="submit" id="card-button" style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500; " class="btn" data-toggle="modal" data-target="#exampleModal"><i class="fas fa-check mr-2"></i>Confirm
                                    </button>
                                </div>
                            </div>
                            ​
                        </div>
                    </form>

                    @endif


                </div>
            </div>
            <div class="col-12 col-md-3 "></div>
        </div>
    </div>
</section>

<script>
    function makePayment() {
        var amount = document.getElementById('flutter_amount').value;
        var email = document.getElementById('flutter_email').value;
        FlutterwaveCheckout({
            public_key: "FLWPUBK_TEST-ebdb23f5787fe40819241a13f867070f-X"
            , tx_ref: "hooli-tx-1920bbtyt"
            , amount: amount
            , currency: "USD"
            , country: "NG"
            , payment_options: "card, mobilemoneyghana, ussd"
            , redirect_url: // specified redirect URL
                "http://127.0.0.1:8000/flutterSuccess"
            , meta: {
                consumer_id: 23
                , consumer_mac: "92a3-912ba-1192a"
            , }
            , customer: {
                email: email
                , phone_number: "08102909304"
                , name: "yemi desola"
            , }
            , callback: function(data) {
                console.log(data);
            }
            , onclose: function() {
                // close modal
            }
            , customizations: {
                title: "Mortfund"
                , description: "Payment for items in cart"
                , logo: "https://assets.piedpiper.com/logo.png"
            , }
        , });
    }

</script>


<script src="https://js.stripe.com/v3/"></script>
<script>
    // Custom styling can be passed to options when creating an Element.
    // (Note that this demo uses a wider set of styles than the guide below.)

    var style = {
        base: {
            color: '#32325d'
            , lineHeight: '18px'
            , fontFamily: '"Helvetica Neue", Helvetica, sans-serif'
            , fontSmoothing: 'antialiased'
            , fontSize: '16px'
            , '::placeholder': {
                color: '#aab7c4'
            }
        }
        , invalid: {
            color: '#fa755a'
            , iconColor: '#fa755a'
        }
    };

    const stripe = Stripe('{{ $stripe_key }}', {
        locale: 'en'
    }); // Create a Stripe client.
    const elements = stripe.elements(); // Create an instance of Elements.
    const cardElement = elements.create('card', {
        style: style
    }); // Create an instance of the card Element.
    const cardButton = document.getElementById('card-button');
    const clientSecret = cardButton.dataset.secret;

    cardElement.mount('#card-element'); // Add an instance of the card Element into the `card-element` <div>.

    // Handle real-time validation errors from the card Element.
    cardElement.addEventListener('change', function(event) {
        var displayError = document.getElementById('card-errors');
        if (event.error) {
            displayError.textContent = event.error.message;
        } else {
            displayError.textContent = '';
        }
    });

    // Handle form submission.
    var form = document.getElementById('payment-form');

    form.addEventListener('submit', function(event) {
        event.preventDefault();

        stripe.handleCardPayment(clientSecret, cardElement, {
                payment_method_data: {
                    //billing_details: { name: cardHolderName.value }
                }
            })
            .then(function(result) {
                console.log(result);
                if (result.error) {
                    // Inform the user if there was an error.
                    var errorElement = document.getElementById('card-errors');
                    errorElement.textContent = result.error.message;
                } else {
                    console.log(result);
                    form.submit();
                }
            });
    });

</script>
@endsection
