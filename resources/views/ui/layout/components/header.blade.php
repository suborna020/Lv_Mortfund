 <!-- Top Bar Started -->

    <section class="topbar fixed-top">
        <div class="container-fluid fluid-adjust">
            <div class="row no-gutters">
                <div class="col-8 col-md-8 col-lg-2 col-xl-5 col-align">
                   <div class="date" id="date">
                    <h6><span class="day">{{ date('d') }}</span> 
                    @if(date('m')=='01')
                    January
                    @elseif(date('m')=='02')
                    February
                    @elseif(date('m')=='03')
                    March
                    @elseif(date('m')=='04')
                    April
                    @elseif(date('m')=='05')
                    May
                    @elseif(date('m')=='06')
                    June
                    @elseif(date('m')=='07')
                    July
                    @elseif(date('m')=='08')
                    August
                    @elseif(date('m')=='09')
                    September
                    @elseif(date('m')=='10')
                    October
                    @elseif(date('m')=='11')
                    November
                    @elseif(date('m')=='12')
                    December
                    @endif
                    
                    , {{ date('Y') }}</h6>
                    <p>{{ $general->short_note_1?? 'Not Found' }}</p>
                  </div>
                </div>

                <div class="col-md-6 col-lg-8 col-xl-6 col-align2">
                    <div class="address">
                        <ul>
                            <li class="responsive"><i class="fa fa-map-marker mr-5"></i>{{ $general->address?? 'Not Found' }}</li>
                            <li class="bar responsive"><i class="fa fa-phone mr-5"></i>{{ $general->website_phone?? 'Not Found' }}</li>
                            @foreach($socials as $social)
                            <li><a href="{{$social->link}}"><i class="{{$social->social_photo}}"></i></a></li>
                            @endforeach
                            
                        </ul>
                    </div>
                </div>
                <div class="col-4 col-md-4 col-lg-2 col-xl-1">

                    <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle flag" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <img src="images/finish.svg">
                        </button>
                        <div class="dropdown-menu dw-container" aria-labelledby="dropdownMenuButton">
                            @foreach($languages as $language)
                            <li><img src="{{$language->flag_photo}}" class="flag-size">{{$language->language_name}}</li>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Started -->

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
                    {{-- <li class="nav-item dropdown">

                        <a class="nav-link dropdown-toggle" id="navbarDropdown" role="button" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                            
                            {{session()->get('currency_c')}}{{$user_currency->symbol}}<span class="doller">({{$user_currency->country_code}})</span>
                        </a>

                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            @foreach($currencies as $currency)
                            <a href="javascript:document.currency_code.submit()" name="currency_code"class="dropdown-item">{{$currency->symbol}}({{$currency->country_code}})</a>
                            <form name="currency_code" action="{{route('set-currency-code')}}" method=POST>
                               <input type="text" name="currency_code" value="{{$currency->symbol}}"/>
                          </form>
                             @endforeach
                        </div>
                        
                    </li> --}}
                    <li>
                        <form action="{{route('set-currency-code')}}" method="post">
                          @csrf
                            <select class="form-control" id="currency_code" name="currency_code" onchange="this.form.submit()">
                                @if(session::has('currency_c'))
                                <option value="">{{session()->get('currency_c')}}</option>
                                @else
                                <option value="">$(US)</option>
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

        <!-- Navbar End -->

    </section>

    <!-- Top Bar End -->