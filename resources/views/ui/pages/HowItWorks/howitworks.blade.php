@extends('ui.layout.app')

@section('content')
   
 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>How Mortfund Works</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">How It Works</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>


    <section class="category how-works">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>How Mortfund Works</h3>
                    <hr>
                    <h6>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quas, maiores? Sit atque molestias similique illum iusto libero neque voluptate suscipit incidunt ea, velit, alias impedit iusto libero neque voluptate aliquam officiis a nulla nam?</h6>

                    <div class="row">
                        @foreach($how_it_works as $how_it_work)
                        <div class="col-md-4 col-12">
                        
                        <div class="col-bg">
                            <div class="direction-icon">
                                <li><i class="fa fa-arrow-circle-up fa-3x" aria-hidden="true"></i></li>
                            </div>
                            <div class="box">
                                <li><i class="{{$how_it_work->icon}}" aria-hidden="true"></i></li>
                                <h4>{{$how_it_work->title}}</h4>
                                <p>{{$how_it_work->short_description}}</p>
                            </div>
                        </div>
                        
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

        <section class="category donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>What Our Donor Say</h3>
                    <hr>

                    <!-- Slider Section Started -->
                    
                    <div id="carouselExampleIndicators" class="carousel slide testimonial-slide" data-ride="carousel">
                        <ol class="carousel-indicators testimonial-indicators">
                            @foreach( $testimonials as $testimonial )
                                <li data-target="#carouselExampleIndicators" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }} adjust-indicator"></li>
                            @endforeach
                        </ol>
                        <div class="carousel-inner">
                            @foreach($testimonials as $key => $testimonial)
                            <div class="carousel-item {{$key == 0 ? 'active' : '' }}">
                                <div class="img-box">
                                    <img src="{{asset($testimonial->photo)}}" class="d-block m-auto testimonial-img" alt="...">
                                    <i class="fa fa-quote-left quote-icon" aria-hidden="true"></i>
                                </div>
                                <div class="testimonial">
                                    <p>{{$testimonial->authors_text}}</p>
                                    <h5>{{$testimonial->authors_name}}</h5>
                                    <h6>{{$testimonial->designation}}</h6>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                            
                        </a>
                        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                            
                        </a>
                    </div>
                    
                    <!-- Slider Section End -->
                    
                </div>
            </div>
        </div>
    </section>

        <!-- Success Stories Started -->

    <section class="category story">
        <div class="container-fluid">
            <div class="row no-gutters">
                <div class="col-12">
                    <h3>Success Stories</h3>
                    <hr>
                    <br>
                    <br>

                    <div class="owl-carousel owl-theme howitworks">
                        @foreach($success_stories1 as $success_story1)
                        <div class="item">
                            <div class="card mb-3 hw-card">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories1-bg" style="background-image: url('{{asset($success_story1->photo)}}');">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$success_story1->created_at}}</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">{{$success_story1->title}}</h5>
                                            <p class="card-text">{{$success_story1->story}}</p>
                                            <div class="media">
                                                <img src="{{asset($success_story1->author_photo)}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">{{$success_story1->author_name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="owl-carousel owl-theme howitworks">
                        @foreach($success_stories2 as $success_story2)
                        <div class="item">
                            <div class="card mb-3 hw-card">
                                <div class="row no-gutters">
                                    <div class="col-md-4 stories1-bg" style="background-image: url('{{asset($success_story2->photo)}}');">
                                    </div>
                                    <div class="col-md-8">
                                        <div class="card-body">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$success_story2->created_at}}</li>
                                                </ul>
                                            </div>
                                            <h5 class="card-title">{{$success_story2->title}}</h5>
                                            <p class="card-text">{{$success_story2->story}}</p>
                                            <div class="media">
                                                <img src="{{asset($success_story1->author_photo)}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">{{$success_story2->author_name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Success Stories End -->


@endsection