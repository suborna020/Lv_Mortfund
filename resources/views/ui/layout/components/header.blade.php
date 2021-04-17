 <!-- Top Bar Started -->

    <section class="topbar fixed-top">
        <div class="container-fluid fluid-adjust">
            <div class="row no-gutters">
                <div class="col-8 col-md-8 col-lg-2 col-xl-5 col-align">
                   <div class="date" id="date">
                    <h6><span class="day">{{ date('d') }}</span> 

                        {{ date('F') }}
                   {{-- 

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

                    --}}
                    
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

                    <!-- <div class="dropdown">
                        <button class="btn btn-secondary dropdown-toggle flag" type="button" id="dropdownMenuButton" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false">
                        <img src="{{asset('images/finish.svg')}}">
                        </button>
                        <div class="dropdown-menu dw-container" aria-labelledby="dropdownMenuButton">
                            @foreach($languages as $language)
                            <li><img src="{{ asset($language->flag_photo??'Not Found') }}" class="flag-size">{{$language->language_name}}</li>
                            @endforeach
                        </div>
                    </div> -->
                    <div style="margin-top:  10px; margin-right: 20px">
                        <button class="btn" id="google_translate_element" type="submit" >
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Navbar Started -->
        @if(session::has('user_session'))
        @include('ui.layout.components.header_content_user')
        @else
        @include('ui.layout.components.header_content_general')
        @endif
        <!-- Navbar End -->

    </section>

    <!-- Top Bar End -->
    <!-- {{--  onchange="this.form.submit()" --}} -->
    