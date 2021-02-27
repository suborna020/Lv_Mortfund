<nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{url('/')}}"><img src="{{ $general->website_logo?? 'Not Found' }}" class="img-fluid" alt="logo"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
        
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <div class="input-group search-form">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn-search" id="basic-addon1" type="submit"><i class="fa fa-search" aria-hidden="true"></i></span>
                            </div>
                            <input type="text" class="form-control search-field" placeholder="Search Findraisers" aria-describedby="basic-addon1">
                        </div>
                    </li>
                    @foreach($navmenu as $navmenus)
                    @if(count($navmenus->submenus)>0)
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            {{$navmenus->icon}}{{$navmenus->menu_item}}
                        </a>
                        <div class="dropdown-menu dw-container" aria-labelledby="navbarDropdown">
                            @foreach($navmenus->submenus as $submenu)
                            <a class="dropdown-item" href="#">{{$submenu->submenu_name}}</a>
                            @endforeach
                             
                        </div>
                    </li>
                    @else
                    <li class="nav-item active">
                        <a class="nav-link" href="#">{{$navmenus->menu_item}}</a>
                    </li>
                    @endif
                    @endforeach
                    <!-- WORKING ON IT -->
                    {{-- <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            
                            
                            @if(session::has('currency_c'))
                                <span class="doller">{{session()->get('currency_c')}}</span>
                                @else
                                <span class="doller">{{$currency_by_location->symbol}}({{$currency_by_location->country_code}})</span>
                                @endif
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            

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
                    <li>
                        <form action="{{route('set-currency-code')}}" method="post" class="currency_code">
                          @csrf
                            <select class="form-control" id="currency_code" name="currency_code">
                                @if(session::has('currency_c'))
                                <option value="">{{session()->get('currency_c')}}</option>
                                @else
                                <option value="">{{$currency_by_location->symbol}}({{$currency_by_location->country_code}})</option>
                                @endif
                                @foreach($currencies as $currency)
                                <option value="{{$currency->symbol}}({{$currency->country_code}})">{{$currency->symbol}}({{$currency->country_code}})</option>
                                 @endforeach
                            </select>
                            <!-- <input type="submit" name=""> -->
                         </form>
                    </li> 
                    <li class="nav-item">
                        <a class="nav-link" href="#">Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-create" href="#">Create Campaign</a>
                    </li>
                </ul>
            </div>
        </nav>
