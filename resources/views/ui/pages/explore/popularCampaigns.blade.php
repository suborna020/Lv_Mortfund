@extends('ui.layout.app')

@section('content')
   
    </section>

    <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Popular Campaigns</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Explore</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Popular Campaigns</li>
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
                    <h3>Popular Campaigns</h3>
                    <hr>
                    <h6>Popular Campaigns</h6>
                    <div class="getPopularCampaigns" id="getPopularCampaigns">
                        @include('ui.pages.explore.getPopularCampaigns')
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Campaign section End -->


    <!-- Medical Fundraisers Started -->
    
    <section class="featured donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Medical Fundraisers</h3>
                    <hr>
                    <br>
                    <div class="owl-carousel owl-theme newCampaign">
                        @foreach($popular_medicals as $popular_medical)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('uploads/'.$popular_medical->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="{{$popular_medical->icon}}" aria-hidden="true"></i></i>{{$popular_medical->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$popular_medical->title}}</h5>
                                    <p class="card-text">{{ Str::limit($popular_medical->story, 20) }}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($popular_medical->transections->sum('amount')*100)/$popular_medical->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="precentage-lebel">{{($popular_medical->transections->sum('amount')*100)/$popular_medical->needed_amount}}% </span>
                                        </div>
                                    </div>
                                    
                                    @if(session::has('currency_c'))
                                        @if($user_currency->session_currency == session('currency_c'))
                                            <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($popular_medical->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($popular_medical->needed_amount)*($user_currency->value)}}</p>
                                        @endif
                                    @else
                                       
                                    <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($popular_medical->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($popular_medical->needed_amount)*($currency_by_location->value)}}</p>
                                    
                                    @endif
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{ asset('uploads/'.$popular_medical->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$popular_medical->members->name?? ' Any Name' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$popular_medical->deadline}}</li>
                                                </ul>
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
    </section>
    
    <!-- Medical Fundraisers Section End -->


    <!-- Emergency Fundraisers Started -->
    
    <section class="featured donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Emergency Fundraisers</h3>
                    <hr>
                    <br>
                    <div class="owl-carousel owl-theme newCampaign">
                        @foreach($popular_emergencies as $popular_emergency)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('uploads/'.$popular_emergency->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="{{$popular_emergency->icon}}" aria-hidden="true"></i></i>{{$popular_emergency->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$popular_emergency->title}}</h5>
                                    <p class="card-text">{{ Str::limit($popular_emergency->story, 20) }}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($popular_emergency->transections->sum('amount')*100)/$popular_emergency->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="precentage-lebel">{{($popular_emergency->transections->sum('amount')*100)/$popular_emergency->needed_amount}}% </span>
                                        </div>
                                    </div>
                                    
                                    @if(session::has('currency_c'))
                                        @if($user_currency->session_currency == session('currency_c'))
                                            <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($popular_emergency->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($popular_emergency->needed_amount)*($user_currency->value)}}</p>
                                        @endif
                                    @else
                                       
                                    <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($popular_emergency->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($popular_emergency->needed_amount)*($currency_by_location->value)}}</p>
                                    
                                    @endif
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{ asset('uploads/'.$popular_emergency->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$popular_emergency->members->name?? ' Any Name' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$popular_emergency->deadline}}</li>
                                                </ul>
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
    </section>
    
    <!-- Emergency Fundraisers Section End -->


    <!-- Education Fundraisers Started -->
    
    <section class="featured donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Education Fundraisers</h3>
                    <hr>
                    <br>
                    <div class="owl-carousel owl-theme newCampaign">
                        @foreach($popular_educations as $popular_education)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('uploads/'.$popular_education->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="{{$popular_education->icon}}" aria-hidden="true"></i></i>{{$popular_education->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$popular_education->title}}</h5>
                                    <p class="card-text">{{ Str::limit($popular_education->story, 20) }}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($popular_education->transections->sum('amount')*100)/$popular_education->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="precentage-lebel">{{($popular_education->transections->sum('amount')*100)/$popular_education->needed_amount}}% </span>
                                        </div>
                                    </div>
                                    
                                    @if(session::has('currency_c'))
                                        @if($user_currency->session_currency == session('currency_c'))
                                            <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($popular_education->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($popular_education->needed_amount)*($user_currency->value)}}</p>
                                        @endif
                                    @else
                                       
                                    <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($popular_education->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($popular_education->needed_amount)*($currency_by_location->value)}}</p>
                                    
                                    @endif
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{ asset('uploads/'.$popular_education->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$popular_education->members->name?? ' Any Name' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$popular_education->deadline}}</li>
                                                </ul>
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
    </section>
    
    <!-- Education Fundraisers Section End -->



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
                            <a href="{{$category->slug}}">
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

    
<script type="text/javascript">
    
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  $('#getPopularCampaigns').append('<img style="position: fixed; left: 45%; top: 20%; z-index: 100000;" src="/images/load.gif" />'); 
  var allPopularCampaigns = $(this).attr('href').split('allppc=')[1];
  
  fetch_new_campaigns(allPopularCampaigns);
  
 });

 function fetch_new_campaigns(allPopularCampaigns){
  $.ajax({
   url:"/getPopularCampaigns?allppc="+allPopularCampaigns,
   success:function(data)
   {
    $('#getPopularCampaigns').fadeOut( 100 , function() {
        $('#getPopularCampaigns').html(data);
    }).fadeIn( 500 );
   }
  });
 }
});
</script>
@endsection
