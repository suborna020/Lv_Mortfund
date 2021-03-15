@extends('ui.layout.app')

@section('content')

    <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>{{$categoryName->category_name}}</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Categories</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$categoryName->category_name}}</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>


    <!-- campaign section Started -->

    <div class="featured">
        <div class="container adjust-container">
            <div class="row no-gutters">
                <div class="col-md-12">
                    <h3>{{$categoryName->category_name}}</h3>
                    <hr>
                    <br>
                    <div class="category_campaigns" id="category_campaigns">
                        @include('ui.pages.categories.category_campaigns')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Campaign section End -->

    <section class="category">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Browse By Categories</h3>
                    <hr>
                    <h6>Find the course you are looking for by categories</h6>

                    <div class="row">
                    	@foreach($categories as $category)
                        <div class="col-md-6 col-lg-3">
                        	<a href="../{{$category->slug}}">
                            <div class="box mb-4">
                                <img src="{{asset($category->background_image)}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block adjust-caption">
                                    <i class="{{$category->icon}}" aria-hidden="true"></i>
    
                                    <h5>{{$category->category_name}}</h5>
                                </div>
                            </div>
                            </a>
                        </div>
                        @endforeach
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

<script type="text/javascript">
    
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  $('#category_campaigns').append('<img style="position: fixed; left: 45%; top: 20%; z-index: 100000;" src="/images/load.gif" />'); 
  var cat_cam = $(this).attr('href').split('cc=')[1];
  
  fetch_category_campaign(cat_cam);
  
 });

 function fetch_category_campaign(cat_cam){
  $.ajax({
   url:"/getCategoryCampaigns/{{$categoryName->id}}?cc="+cat_cam,
   
   success:function(data)
   {
    $('#category_campaigns').fadeOut( 100 , function() {
        $('#category_campaigns').html(data);
    }).fadeIn( 500 );
   }
  });
 }

});
</script>
@endsection