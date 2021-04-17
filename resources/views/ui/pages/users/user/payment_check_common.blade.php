<img height="100px" width="100%" class="mx-auto"
                                        src="{{asset('../../siteImages/paymentGateways/'.$selected_method->gateway_photo)}}" alt="">
                                    <div style="background-color: #f8f8f8;"
                                        class="name d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0">
                                            <i style="color: #adb5bd" class="fas fa-money-check-alt"></i>
                                            Payment Method
                                        </p>
                                        <p class="font-weight-bold m-0">{{$selected_method->gateway_name}}</p>
                                    </div>
                                    <div style="background-color: #f8f8f8;"
                                        class="name w-100 d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0"><i style="color: #adb5bd"
                                                class="fas fa-phone-alt mr-2"></i>Campaign
                                            Name
                                        </p>
                                        <p style="max-width: 250px;" class="font-weight-bold text-right m-0">{{$selected_fundraiser->title}}</p>
                                    </div>
                                    <div style="background-color: #f8f8f8;"
                                        class="name d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0">
                                            <i style="color: #adb5bd" class="fas fa-user mr-2"></i>
                                            Donator Name
                                        </p>
                                        <p style="max-width: 250px;" class="font-weight-bold text-right m-0">{{session('name')}}
                                        </p>
                                    </div>
                                    <div style="background-color: #f8f8f8;"
                                        class="name d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0"><i style="color: #adb5bd"
                                                class="fas fa-phone-alt mr-2"></i>Phone
                                            Number
                                        </p>
                                        <p class="font-weight-bold m-0">{{session('mobile')}}</p>
                                    </div>
                                    <div style="background-color: #f8f8f8;"
                                        class="name d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0"> <i style="color: #adb5bd"
                                                class="fas fa-envelope mr-2"></i>Email:
                                        </p>
                                        <p style="max-width: 250px;" class="font-weight-bold text-right m-0">
                                            {{session('email')}}</p>
                                    </div>
                                    <div style="background-color: #f8f8f8;"
                                        class="name d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0"> <i style="color: #adb5bd"
                                                class="fas fa-map-marker-alt mr-2"></i>Address:
                                        </p>
                                        <p style="max-width: 250px;" class="font-weight-bold text-right m-0">{{session('address')}}</p>
                                    </div>
                                    <div style="background-color: #f8f8f8;"
                                        class="name d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0"><i style="color: #adb5bd"
                                                class="fas fa-dollar-sign mr-2"></i>Amount
                                        </p>
                                        <p class="font-weight-bold m-0">{{session('amount')}}</p>
                                    </div>
                                    <div style="background-color: #f8f8f8;"
                                        class="name d-flex justify-content-between align-items-center p-2 mb-2 ">
                                        <p class="font-weight-bold m-0"><i style="color: #adb5bd"
                                                class="fas fa-dollar-sign mr-2"></i>Charge
                                        </p>
                                        <p class="font-weight-bold m-0">{{$selected_method->charge}}</p>
                                    </div>