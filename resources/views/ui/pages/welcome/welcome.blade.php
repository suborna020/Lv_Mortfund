@extends('ui.layout.app')

@section('content')
   <!-- Slider Section Started -->

    <div id="carouselExampleCaptions" class="carousel slide carousel-fade" data-ride="carousel">
        <ol class="carousel-indicators adjust-carousel">
           
            @foreach( $slider as $sliders )
                <li data-target="#carouselExampleCaptions" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }} adjust-indicator"></li>
            @endforeach
        </ol>
        
        <div class="carousel-inner inner-size">
           @foreach($slider as $key => $sliders)
            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                <img src="{{$sliders->slider_photo}}" class="d-block w-100 img-fluid" alt="slider img">
                <div class="carousel-caption d-md-block caption-adjust">
                    <h2>{{$sliders->slider_title}}</h2>
                    <p>{{$sliders->slide_sub_title}}</p>
                    <button type="button" class="btn btn-primary btn-lg custom-btn">{{$sliders->button_name}}</button>
                </div>
            </div>
            @endforeach
        </div>
       
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <!-- <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only"></span> -->
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <!-- <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only"></span> -->
        </a>
    </div>

    <!-- Slider Section End -->

    <!-- Category Section Started -->

    <section class="category">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Browse By Categories</h3>
                    <hr>
                    <h6>Find the course you are looking for by categories</h6>
                    <div class="owl-carousel owl-theme">
                        @foreach($categories as $category)
                        <a href="{{$category->slug}}">
                          <div class="item">
                            <div class="box">
                                <img src="{{$category->background_image}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block adjust-caption">
                                    <i class="{{$category->icon}}" aria-hidden="true"></i>
                            
                                    <h5>{{$category->category_name}}</h5>
                                </div>
                            </div>
                         </div>
                        </a>
                        @endforeach
                        
                    </div>
                </div>
        </div>
    </section>

    <!-- Category Section End -->

    <!-- Featured section Started -->

    <div class="featured">
        <div class="container adjust-container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Browse By Categories</h3>
                    <hr>
                    <h6>Find the course you are looking for by categories</h6>
                    <div class="fundraisers" id="fundraisers">
                        @include('ui.pages.welcome.fundraisers')
                    </div>
                    
                </div>
            </div>
        </div>
    </div>

    <!-- Featured section End -->

    <!-- Counter Section Started -->

    <section class="counter">
        <div class="container">
            <div class="row">
              @foreach($counters as $counter)
                <div class="col-md-4">
                    <div class="img-box">
                        <img src="{{$counter->icon}}" alt="">
                        <h3 class="c">{{$counter->quantity}}</h3>
                        <p>{{$counter->title}}</p>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Counter Section End -->

    <!-- campaign section Started -->
    
    <div class="featured">
        <div class="container adjust-container">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <h3>New Campaigns</h3>
                    <hr>
                    <h6>Recent Campaigns</h6>
                    <div class="recent_fundraisers" id="recent_fundraisers">
                        @include('ui.pages.welcome.recent_fundraisers')
                    </div>
                    
                    <!-- Pagination End -->
    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Campaign section End -->

    <!-- Featured section Started -->
    
    <div class="featured">
        <div class="container adjust-container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Project Support Fundings</h3>
                    <hr>
                    <!-- <h6>Find the course you are looking for by categories</h6> -->

                    <div class="support_project" id="support_project">
                        @include('ui.pages.welcome.project_support')
                    </div>
                   

                    <!-- Pagination End -->
    
    
                </div>
            </div>
        </div>
    </div>
    
    <!-- Featured section End -->

    <!-- Newsletter Section Started -->
    <section class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="text-area">
                        {{-- <h2>{{$subscibe->title}}</h2> --}}
                        <h2> {{ $subscibe->title?? 'title not found' }}</h2>
                       
                        

                        <p> {{ $subscibe->sub_title?? 'sub_title not found' }}</p>
                        {{-- <p>{{$subscibe->sub_title}}</p> --}}
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="email">
                       <input type="email" class="input-field" placeholder="{{ $subscibe->input_placeholder?? 'null' }}"/>
                       <a href="#" class="btn subscribe-btn">{{ $subscibe->submit_button_text?? 'null' }}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->

 

@endsection