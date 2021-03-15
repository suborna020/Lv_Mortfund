@extends('ui.layout.app')

@section('content')
    @php
        $stripe_key = 'pk_test_51IQArsEXyED6aSlyRzlOPfGbvVXVxhOOUlgoq1ETJemIPA1Z6geLIXQZbIsOrrkP5BFAXLkE8CISrX7R7AXExfw700lLnBqU6U';
    @endphp
    <div class="container" style="margin-top:10%;margin-bottom:10%">
        <div class="row">   
    <p>Making Donation for <b>{{$selected_fundraiser->title}}</b></p>
  </div>
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="">
                    <p>You will be charged ${{session('amount')}}</p>
                    <p>{{session('msg')}}</p>
                </div>
                <div class="card">
                    <form action="{{route('checkout.credit-card')}}"  method="post" id="payment-form">
                        @csrf 
                        <div class="form-group">   
                            <label>Email</label>
                            <input type="text" name="email" class="form-control" value="">
                        </div>     
                        <div class="form-group">   
                            <label>Amount</label>
                            <input type="text" disabled="disabled" name="primary_amount" class="form-control amount_by_donor" id="gross" value="{{session('amount')}}">
                        </div>  
                        <div class="form-group">   
                            <label>Charge</label>
                            <input type="text" disabled="disabled" name="charge" id="charge" class="form-control" value="{{(session('amount')*($charge->charge))/100}}">
                        </div>  
                        <div class="form-group">   
                            <label>Net amount</label>
                            <input type="text" disabled="disabled" name="net_amount" id="net_amount" class="form-control" value="{{session('amount')+(session('amount')*($charge->charge))/100}}">
                        </div>        
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
                        <div class="card-footer">
                          <button
                          id="card-button"
                          class="btn btn-dark"
                          type="submit"
                          data-secret="{{ $intent }}"
                        > Pay </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://js.stripe.com/v3/"></script>
    <script>
        // Custom styling can be passed to options when creating an Element.
        // (Note that this demo uses a wider set of styles than the guide below.)

        var style = {
            base: {
                color: '#32325d',
                lineHeight: '18px',
                fontFamily: '"Helvetica Neue", Helvetica, sans-serif',
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
    
        const stripe = Stripe('{{ $stripe_key }}', { locale: 'en' }); // Create a Stripe client.
        const elements = stripe.elements(); // Create an instance of Elements.
        const cardElement = elements.create('card', { style: style }); // Create an instance of the card Element.
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