@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/dashboard.css')}}" rel="stylesheet">
@endsection
​
@section('content')

​ <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Dashboard</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>

    <section class="dashboard py-5 ">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-2"></div>
                <div class="col-12 col-md-8">
                    <div class="row">
                        <!-- card1 -->
                        <div class="col-12 col-md-6">
                            <div class="card m-3 fund-card1 " style="border-radius: 20px">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="d-flex align-items-center justify-content-center py-2"
                                            style="width: 60px; height: auto;  border-radius: 10px">
                                            <img class="img-fluid" src="../../siteImages/paymentGateways/currentbalanceicon.svg" alt="">
                                        </div>
                                        <div>
                                            <div class="btn-group">
                                                <button class="btn btn-sm" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-2x"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="button"><a
                                                            style="text-decoration: none; color: #000; "
                                                            href="{{url('profile')}}">Profile</a></button>

                                                    <button class="dropdown-item" type="button"><a
                                                            style="text-decoration: none; color: #000; " href="#">Change
                                                            Password</a></button>

                                                    <button class="dropdown-item" type="button"><a
                                                            style="text-decoration: none; color: #000; "
                                                            href="{{url('paymentSettings')}}">Payment Settings</a></button>

                                                    <button class="dropdown-item" type="button"><a
                                                            style="text-decoration: none; color: #000; "
                                                            href="{{url('logout')}}">Logout</a></button>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="color: #5e5e5e; font-size: 18px" class="mb-1 font-weight-bold">Current
                                        Balance
                                    </p>
                                    <h1>
                                    	@if(session::has('currency_c'))
						                    @if($user_currency->session_currency == session('currency_c'))
						                        <b>{{$user_currency->symbol}}</b>{{($user_balance->sum('amount'))*($user_currency->value)}}
						                    @endif
						                @else
						                   
						                {{($currency_by_location->symbol)?? '0' }}{{($user_balance->sum('amount'))*(($currency_by_location->value)?? '0')}}
						                @endif
                                    </h1>
                                </div>
                            </div>
                        </div>
                        <!-- card2 -->
                        <div class="col-12 col-md-6">
                            <div class="card fund-card2 m-3" style="border-radius: 20px">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="d-flex align-items-center justify-content-center py-2"
                                            style="width: 60px; height: auto;  border-radius: 10px">
                                            <img class="img-fluid" src="../../siteImages/paymentGateways/dashboardfundraisers.svg" alt="">
                                        </div>
                                        <div>
                                            <div class="btn-group">
                                                <button class="btn btn-sm" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-2x"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="button"><a
                                                            style="text-decoration: none; color: #000; "
                                                            href="{{url('withdrawMethod')}}">Withdraw Method</a></button>
                                                    <button class="dropdown-item" type="button"><a
                                                            style="text-decoration: none; color: #000; "
                                                            href="{{url('withdrawHistory')}}">Withdraw History</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="color: #5e5e5e; font-size: 18px" class="mb-1 font-weight-bold">Current
                                        Fundraisers
                                    </p>
                                    <h1>{{$number_of_current_fundraisers}}</h1>
                                </div>
                            </div>
                        </div>
                        <!-- card3 -->
                        <div class="col-12 col-md-6">
                            <div class="card fund-card3 m-3" style="border-radius: 20px">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="d-flex align-items-center justify-content-center py-2"
                                            style="width: 60px; height: auto;  border-radius: 10px">
                                            <img class="img-fluid" src="../../siteImages/paymentGateways/dashbaordPendingIcon.svg" alt="">
                                        </div>
                                        <div>
                                            <div class=" btn-group">
                                                <button class="btn btn-sm" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-2x"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="button"><a
                                                            style="text-decoration: none; color: #000; " href="{{url('userFundraisers')}}">Go To
                                                            My
                                                            Fundraiser</a></button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="color: #5e5e5e; font-size: 18px" class="mb-1 font-weight-bold">
                                        Pending Fundraisers
                                    </p>
                                    <h1>{{$number_of_pending_fundraisers}}</h1>
                                </div>
                            </div>
                        </div>
                        <!-- card4 -->
                        <div class="col-12 col-md-6">
                            <div class="card fund-card4 m-3" style="border-radius: 20px">
                                <div class="card-body">
                                    <div class="d-flex justify-content-between mb-2">
                                        <div class="d-flex align-items-center justify-content-center py-2"
                                            style="width: 60px; height: auto;  border-radius: 10px">
                                            <img class="img-fluid" src="../../siteImages/paymentGateways/dashbaordPendingIcon.svg" alt="">
                                        </div>
                                        <div>
                                            <div class="btn-group">
                                                <button class="btn btn-sm" type="button" data-toggle="dropdown"
                                                    aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-ellipsis-v fa-2x"></i>
                                                </button>
                                                <div class="dropdown-menu dropdown-menu-right">
                                                    <button class="dropdown-item" type="button">Action</button>
                                                    <button class="dropdown-item" type="button">Another
                                                        action</button>
                                                    <button class="dropdown-item" type="button">Something else
                                                        here</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p style="color: #5e5e5e; font-size: 18px" class="mb-1 font-weight-bold">Completed
                                        Fundraisers
                                    </p>
                                    <h1>{{$number_of_completed_fundraisers}}</h1>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-12 col-md-2"></div>
        </div>
        </div>
    </section>



















 {{--   
  
<div class="container">
	
   <div class="row">
   	  <div class="col-12 col-md-12">
	       
	       <div class="row d-flex justify-content-center">
	       	<div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Current Balance</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">
                    
                    @if(session::has('currency_c'))
                    @if($user_currency->session_currency == session('currency_c'))
                        {{$user_currency->symbol}}{{($user_balance->sum('amount'))*($user_currency->value)}}
                    @endif
                @else
                   
                {{($currency_by_location->symbol)?? '0' }}{{($user_balance->sum('amount'))*(($currency_by_location->value)?? '0')}}
                @endif
	       	   	  </p>
	       	   </div>	
	       </div>
	       <div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Current Fundraisers</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">{{$number_of_current_fundraisers}}</p>
	       	   </div>
	       </div>
	       <div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Pending Fundraisers</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">{{$number_of_pending_fundraisers}}</p>
	       	   </div>
	       </div>
	       <div class="col-12 col-md-4 m-4 border">
	       	   <div class="col-12 col-md-12 p-4">
	       	   	  <h3>Icon Goes here</h3>
	       	   	  <h4>Completed Fundraisers</h4>
	       	   	  <p style="font-size: 40px;font-weight: 20px;">{{$number_of_completed_fundraisers}}</p>
	       	   </div>
	       </div>
      </div>
    </div>
  </div>
</div>
</div> --}}
@endsection