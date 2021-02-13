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
                    <div class="row" id="table_data">
                        @foreach($fundraisers as $fundraiser)
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="{{$fundraiser->photo}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="{{$fundraiser->icon}}" aria-hidden="true"></i></i> {{$fundraiser->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$fundraiser->title}}</h5>
                                    <p class="card-text">{{$fundraiser->story}}</p>
                                    <p id="raised" style="display: none">{{$fundraiser->raised}}</p>
                                    <p id="needed" style="display: none">{{$fundraiser->needed_amount}}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($fundraiser->raised*100)/$fundraiser->needed_amount}}%;" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100"><span class="precentage-lebel">{{($fundraiser->raised*100)/$fundraiser->needed_amount}}%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">${{$fundraiser->raised}}</span> rised of ${{$fundraiser->needed_amount}}</p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{$fundraiser->members->photo}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$fundraiser->members->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$fundraiser->deadline}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach

                        
                    </div>

                    <!-- Pagination Started -->
                    
                    <nav aria-label="Page navigation example" class="page-div">
                        <ul class="pagination justify-content-center">
                          {!! $fundraisers->links() !!}
                        </ul>
                    </nav>

                    <!-- Pagination End -->

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
                        <h3>{{$counter->quantity}}</h3>
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
                    <div class="row">
                        @foreach($recents as $recent)
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="{{$recent->photo}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="{{$recent->icon}}" aria-hidden="true"></i></i> {{$recent->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$recent->title}}</h5>
                                    <p class="card-text">{{$recent->story}}</p>
                                    <p id="raised" style="display: none">{{$recent->raised}}</p>
                                    <p id="needed" style="display: none">{{$recent->needed_amount}}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($recent->raised*100)/$recent->needed_amount}}%;" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100"><span class="precentage-lebel">{{($recent->raised*100)/$recent->needed_amount}}%</span></div>
                                    </div>
                                    
                                    <p class="custom-card-text"><span class="text-muted">${{$recent->raised}}</span> rised of ${{$recent->needed_amount}}</p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{$recent->members->photo}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$recent->members->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$recent->deadline}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>

                    <!-- Pagination Started -->
                    
                    <nav aria-label="Page navigation example" class="page-div">
                        <ul class="pagination justify-content-center">
                          {!! $recents->links() !!}
                        </ul>
                    </nav>

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
                    <div class="row">
                        @foreach($project_supports as $project_support)
                        <div class="col-md-6 col-xl-3">
                            <div class="card">
                                <img src="{{$project_support->photo}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                        <li><i class="{{$project_support->icon}}" aria-hidden="true"></i></i> {{$project_support->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$project_support->title}}</h5>
                                    <p class="card-text">{{$project_support->story}}</p>
                                    <p id="raised" style="display: none">{{$project_support->raised}}</p>
                                    <p id="needed" style="display: none">{{$project_support->needed_amount}}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($project_support->raised*100)/$project_support->needed_amount}}%;" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100"><span class="precentage-lebel">{{($project_support->raised*100)/$project_support->needed_amount}}%</span></div>
                                    </div>
                                    <p class="custom-card-text"><span class="text-muted">${{$project_support->raised}}</span> rised of ${{$project_support->needed_amount}}</p>
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{$project_support->members->photo}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$project_support->members->name}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i> {{$project_support->deadline}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>

                    <!-- Pagination Started -->
                    
                    <nav aria-label="Page navigation example" class="page-div">
                        <ul class="pagination justify-content-center">
                          {!! $project_supports->links() !!}
                        </ul>
                    </nav>

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
                        <h2>{{$subscibe->title}}</h2>
                        <p>{{$subscibe->sub_title}}</p>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="email">
                       <input type="email" class="input-field" placeholder="{{$subscibe->input_placeholder}}">
                       <a href="#" class="btn subscribe-btn">{{$subscibe->submit_button_text}}</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Newsletter Section End -->

    <script type="text/javascript">
      

      $( document ).ready(function() {
          $('input.count_due').keyup(function(){   
            var raised = $("#raised").val();
            var needed = $("#needed").val();
            var progress = $("#progress").val();
            progress = ((parseFloat(raised)*100)/ parseFloat(paying);
            $("#progress").val(parseFloat(progress));
         });
      });
    </script>


 