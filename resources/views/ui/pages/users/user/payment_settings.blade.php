@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/payement-integration.css')}}" rel="stylesheet">
@endsection

@section('content')
 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Payement Settings</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Payment Settings</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
<div class="paymentSettings">
   



    <section class="payment-integration py-5">
        <div class="container">
            <div class="row">
                <!-- left -->
                <div class="col-12 col-md-4">
                    <div class="card" style=" box-shadow: 0 2px 4px 0 #e6e6e6, 0 2px 4px 0 #e6e6e6">
                        <div class="card-body">
                            <div style="text-align: center;">
                                <div style="border: 3px solid #f8800b; height: 110px; width: 110px; border-radius: 50%;
                                    display: flex; align-items: center; justify-content: center; margin: 0 auto">
                                    <!-- updated img -->
                                    <img class="img-fluid" src="{{asset('uploads/'.$user_info->user_photo)}}" alt="user" />
                                </div>
                                <h5 class="mt-3">{{$user_info->name}}</h4>
                            </div>
                            <hr class="my-4" style="width: 100px;">
                            <div class="profile_infowrapper">
                                <div><i class="fas fa-envelope mr-3"></i>
                                    <p>{{$user_info->email}}</p>
                                </div>
                                <div> <i class="fa fa-user mr-3"> </i>
                                    <p> {{$user_info->username}}</p>
                                </div>
                                <div> <i class="fas fa-phone-alt mr-3"></i>
                                    <p> {{$user_info->mobile_no}} </p>
                                </div>
                                <div><i class="fas fa-map-marker-alt mr-3"></i>
                                    <p>{{$user_info->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div class="col-12 col-md-8">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="font-weight-bold">Payment Methods</h5>
                            <h6 class="mb-4 font-weight-bold">These are your payment gateway methods, feel free to add
                                more if you want</h6>
                            <div class="container">
                                <div class="row">
                                  @foreach($payment_methods as $payment_method)
                                    <div class="col-12 col-md-4 pl-0 mb-3 ">
                                        <div class="card  h-100 w-100 ">
                                            <div
                                                class="card-body d-flex align-items-center flex-column justify-content-center ">
                                                <img height="100px" src="{{asset('../../siteImages/paymentGateways/'.$payment_method->PaymentGateways->gateway_photo)}}" alt="card" />
                                                <!-- {{$payment_method->PaymentGateways->gateway_name}} -->
                                                <button
                                                    style="overflow:hidden;background-color: #f8800b; padding: 3px 18px; color: #fff; font-weight: 500;"
                                                    class="btn btn-sm">Remove</button>
                                            </div>
                                        </div>

                                    </div>
                                    @endforeach
                                  
                                    <!-- modal -->
                                    <div class="col-12 col-md-4 pl-0 mb-3 ">
                                        <div class="mb-3">
                                            <div class="card h-100 w-100">
                                                <div
                                                    class="card-body d-flex align-items-center flex-column justify-content-center ">
                                                    <!-- Button trigger modal -->
                                                    <button type="button" class="btn p-0" data-toggle="modal"
                                                        data-target=".bd-example-modal-lg">
                                                        <div class="d-flex align-items-center justify-content-center p-5  mb-2"
                                                            style="background-color: #f8f8f8; max-height: 4rem; max-width: 4rem;
                                                    border-radius: 50%; ">
                                                            <i class="fas fa-plus fa-3x" style="color: #35587a;"></i>
                                                        </div>
                                                    </button>
                                                    <p class="font-weight-bold text-center m-0">Add More Payment
                                                        Gateways
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- Modal -->

                                    <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
                                      <div class="modal-dialog modal-lg">
                                        <div class="modal-content">
                                          <form action="{{url('selectUserPayment')}}" method="post" class="user_payment_method">
                                            @csrf
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="exampleModalLabel">Add Payment Methods</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                              </button>
                                            </div>
                                          <div class="modal-body">
                                            
                                              <input type="hidden" name="" value="{{session('user_session')}}">
                                              <div class="pt-4"></div>
                                                  <div class="container">
                                                      <div class="row">
                                                          <div class="col-12">
                                                              <div class="container">
                                                                  <div class="row">
                                                                    @foreach($payment_gateways as $payment_gateway)

                                                                        <div class="col-6 col-md-4 col-lg-3  mb-4">
                                                                            <div class="d-flex h-100 w-100">
                                                                                <input type="checkbox"
                                                                                    style="margin-right: 5px"
                                                                                    aria-label="Checkbox for following text input" name="payment_method_id[]" value="{{$payment_gateway->id}}">
                                                                                <div class="card">
                                                                                    <div
                                                                                        class="card-body  d-flex align-items-center justify-content-center ">
                                                                                        <img height="60px"
                                                                                            src="{{asset('../../siteImages/paymentGateways/'.$payment_gateway->gateway_photo)}}"
                                                                                            alt="card" />
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        @endforeach
                                                                  </div>
                                                              </div>
                                                          </div>  
                                                      </div>
                                                  </div>                
                                         </div>
                                         <div class="modal-footer">
                                            
                                            <button
                                                        style="background-color: #f8800b; padding: 3px 18px; color: #fff; font-weight: 500;"
                                                        class="btn btn-sm" type="submit">Add Payment Gateways</button>
                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                   
                                    <!-- Modal End -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection