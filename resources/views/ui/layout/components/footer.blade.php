    <!-- Footer Section Started -->

    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-lg-4 col-gap">
                    <div class="widget-1">
                        <img src="{{ asset('images/footer-logo.svg') }}" alt="footer logo">
                        <p>{{ $footer->footer_logo_content_primary?? 'Not Found' }}</p>
                        <p>{{ $footer->footer_logo_content_secondary?? 'Not Found' }}</p>
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-2">
                        <h3>About</h3>
                        @foreach($footer_about as $f_a)
                        <a href="{{url($f_a->link)}}" class="link">{{$f_a->footer_link_name}}</a>
                        @endforeach
                        
                    </div>
                </div>
                <div class="col-md-6 col-lg-3">
                    <div class="widget-2">
                        <h3>Categories</h3>
                        @foreach($footer_cat as $f_c)
                        <a href="{{url($f_c->link)}}" class="link">{{$f_c->footer_link_name}}</a>
                        @endforeach
                    </div>
                </div>
                <div class="col-md-6 col-lg-2">
                    <div class="widget-2">
                        <h3>Links</h3>
                        @foreach($footer_explore as $f_e)
                        <a href="{{url($f_e->link)}}" class="link">{{$f_e->footer_link_name}}</a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Section End -->


    <section class="bottom-footer">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-lg-8 col-xl-9">
                    <p><span>&copy;</span>{{ $general->copyright?? 'Not Found' }} | Developed By <a href="https://flytesolutions.com/">Flyte Solutions</a></p>
                </div>
                <div class="col-lg-4 col-xl-3 inline-icon">
                    <p class="margin-left">Follow Us On | </p>
                    <div class="social-icon">
                        <ul>
                        	@foreach($socials as $social)
                            <li><a href="{{$social->link}}"><i class="{{$social->social_photo}}"></i></a></li>
                            @endforeach
                            
                        </ul>

                </div>
            </div>
        </div>
    </section>