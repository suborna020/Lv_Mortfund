<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset($general->website_logo??'Not Found') }}" class="img-fluid" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                <ul class="navbar-nav ml-auto">
                    
                    <li class="nav-item">
                        <div class="input-group search-form">
                            
                            <a class="nav-link" href="{{url('search')}}"><i style="color: #F36A10;" class="fa fa-search" aria-hidden="true"></i>&nbsp;&nbsp; Search Fundraisers</a>
                        </div>
                    </li>
                    @foreach($navmenu as $menu)
                    @if(count($menu->submenus)>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{$menu->icon}}{{$menu->menu_item}}
                        </a>
                        <div class="dropdown-menu dw-container" aria-labelledby="navbarDropdown">
                            @foreach($menu->submenus as $submenu)
                            <a class="dropdown-item" href="{{url($submenu->link)}}">{{$submenu->submenu_name}}</a>
                            @endforeach
                             
                        </div>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="{{url($menu->link)}}">{{$menu->menu_item}}</a>
                    </li>
                    @endif
                    @endforeach
                    <!-- WORKING ON IT -->
                    {{-- <li class="nav-item dropdown">
​
                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            
                            
                            @if(session::has('currency_c'))
                                <span class="doller">{{session()->get('currency_c')}}</span>
                                @else
                                <span class="doller">{{$currency_by_location->symbol}}({{$currency_by_location->country_code}})</span>
                                @endif
                        </a>
​
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            
​
                            <form action="{{route('set-currency-code')}}" method="post" class="currency_code">
                            @csrf
                           <!--  <select class="form-control" id="currency_code" name="currency_code"> -->
                                
                                @foreach($currencies as $currency)
                                <a class="dropdown-item" value="{{$currency->symbol}}({{$currency->country_code}})">{{$currency->symbol}}({{$currency->country_code}})</a>
                                 @endforeach
                            <!-- </select> -->
                            <!-- <input type="submit" name=""> -->
 
                          </form>
                             
                        </div>
                        
                    </li> --}}
 
                    <li class="styled-select">
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

                    <li class="nav-item">
                        <a class="nav-link" href="{{url('login')}}">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-create" href="{{url('createCampaign')}}">Create Campaign</a>
                    </li>
                </ul>
            </div>
        </nav>


