<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset($general->website_logo??'Not Found') }}" class="img-fluid" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('myAccount')}}">Dashboard</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('verification')}}">ID Verification</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('createCampaign')}}">Create Campaigns</a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url('userFundraisers')}}">My Fundraisers</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            Withdraw
                        </a>
                        <div class="dropdown-menu dw-container" aria-labelledby="navbarDropdown">
                            
                            <a class="dropdown-item" href="{{url('withdrawMethod')}}">Withdraw Method</a>
                            <a class="dropdown-item" href="{{url('withdrawHistory')}}">Withdraw History</a>
                             
                        </div>
                    </li>
                    
                   
                    <li>
                        <form action="{{route('set-currency-code')}}" method="post" class="currency_code">
                          @csrf
                            <select class="form-control" id="currency_code" name="currency_code">
                                @if(session::has('currency_c'))
                                <option value="">{{session()->get('currency_c')}}</option>
                                @else
                                <option value="">{{($currency_by_location->symbol)?? '0' }}({{($currency_by_location->country_code)?? '0' }})</option>
                                @endif
                                @foreach($currencies as $currency)
                                <option value="{{$currency->symbol}}({{$currency->country_code}})">{{$currency->symbol}}({{$currency->country_code}})</option>
                                 @endforeach
                            </select>
                            <!-- <input type="submit" name=""> -->
                         </form>
                    </li> 
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            <span class="rounded-circle">
                                @if($user_info->user_photo!=null)
                                    <img src="{{asset('uploads/'.$user_info->user_photo)}}"  style="width: 30px">
                                @else    
                                    <img src="{{asset('uploads/profile.png')}}"  style="width: 30px">
                                @endif
                            </span>
                            {{$user_info->name}}
                        </a>
                        <div class="dropdown-menu dw-container" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{url('profile')}}">Profile</a>
                            <a class="dropdown-item" href="#">Change Password</a>
                            <a class="dropdown-item" href="{{url('paymentSettings')}}">Payment Settings</a>
                            <a class="dropdown-item" href="{{route('logout')}}">Logout</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>