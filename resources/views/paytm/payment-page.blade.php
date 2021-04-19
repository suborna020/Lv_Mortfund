<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Paytm Payment Gateway Integration</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</head>
<body>
    <div id="app">
        <style>
            .mt2{
                margin-top: 2%;
            }
        </style>
        <main class="py-4">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 offset-3 col-md-offset-6">
                        <div class="card card-default">
                            <div class="card-body ">
                                <div class="card-header">
                                    <h2>Payment by PayTM gateway</h2>
                                </div>
                                
                                <form method="post" action="{{route('paytm.payment')}}">
                                    <br>
                                    @csrf
                                    Enter email:
                                    <input type="email" name="email" placeholder="Enter email" class="form-control" required="" />
                                    <br>
                                    Enter Amount:
                                    <input type="text" name="amount" placeholder="Enter amount" class="form-control" required=""/>
                                    <button type="submit" class="btn btn-primary mt2">Pay Now</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</body>
</html>