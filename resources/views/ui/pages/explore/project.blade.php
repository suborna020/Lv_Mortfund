@extends('ui.layout.app')

@section('content')
   
    </section>

    <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Project Support Campaigns</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Explore</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Project Support Campaigns</li>
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
                    <h3>Project Support Campaigns</h3>
                    <hr>
                    <h6>Project Support Campaigns</h6>
                    <div class="getProjectCampaigns" id="getProjectCampaigns">
                        @include('ui.pages.explore.getProjectCampaigns')
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
                        @foreach($medical_projects as $medical_project)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('uploads/'.$medical_project->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="{{$medical_project->icon}}" aria-hidden="true"></i></i>{{$medical_project->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$medical_project->title}}</h5>
                                    <p class="card-text">{{ Str::limit($medical_project->story, 20) }}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($medical_project->transections->sum('amount')*100)/$medical_project->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="precentage-lebel">{{($medical_project->transections->sum('amount')*100)/$medical_project->needed_amount}}% </span>
                                        </div>
                                    </div>
                                    
                                    @if(session::has('currency_c'))
                                        @if($user_currency->session_currency == session('currency_c'))
                                            <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($medical_project->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($medical_project->needed_amount)*($user_currency->value)}}</p>
                                        @endif
                                    @else
                                       
                                    <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($medical_project->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($medical_project->needed_amount)*($currency_by_location->value)}}</p>
                                    
                                    @endif
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{ asset('uploads/'.$medical_project->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$medical_project->members->name?? ' Any Name' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$medical_project->deadline}}</li>
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
                        @foreach($emergency_projects as $emergency_project)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('uploads/'.$emergency_project->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="{{$emergency_project->icon}}" aria-hidden="true"></i></i>{{$emergency_project->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$emergency_project->title}}</h5>
                                    <p class="card-text">{{ Str::limit($emergency_project->story, 20) }}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($emergency_project->transections->sum('amount')*100)/$emergency_project->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="precentage-lebel">{{($emergency_project->transections->sum('amount')*100)/$emergency_project->needed_amount}}% </span>
                                        </div>
                                    </div>
                                    
                                    @if(session::has('currency_c'))
                                        @if($user_currency->session_currency == session('currency_c'))
                                            <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($emergency_project->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($emergency_project->needed_amount)*($user_currency->value)}}</p>
                                        @endif
                                    @else
                                       
                                    <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($emergency_project->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($emergency_project->needed_amount)*($currency_by_location->value)}}</p>
                                    
                                    @endif
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{ asset('uploads/'.$emergency_project->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$emergency_project->members->name?? ' Any Name' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$emergency_project->deadline}}</li>
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
                        @foreach($education_projects as $education_project)
                        <div class="item">
                            <div class="card">
                                <img src="{{asset('uploads/'.$education_project->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="{{$education_project->icon}}" aria-hidden="true"></i></i>{{$education_project->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$education_project->title}}</h5>
                                    <p class="card-text">{{ Str::limit($education_project->story, 20) }}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($education_project->transections->sum('amount')*100)/$education_project->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="precentage-lebel">{{($education_project->transections->sum('amount')*100)/$education_project->needed_amount}}% </span>
                                        </div>
                                    </div>
                                    
                                    @if(session::has('currency_c'))
                                        @if($user_currency->session_currency == session('currency_c'))
                                            <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($education_project->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($education_project->needed_amount)*($user_currency->value)}}</p>
                                        @endif
                                    @else
                                       
                                    <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($education_project->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($education_project->needed_amount)*($currency_by_location->value)}}</p>
                                    
                                    @endif
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{ asset('uploads/'.$education_project->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$education_project->members->name?? ' Any Name' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$education_project->deadline}}</li>
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
  $('#getProjectCampaigns').append('<img style="position: fixed; left: 45%; top: 20%; z-index: 100000;" src="/images/load.gif" />'); 
  var allProjectCampaigns = $(this).attr('href').split('allpc=')[1];
  
  fetch_new_campaigns(allProjectCampaigns);
  
 });

 function fetch_new_campaigns(allProjectCampaigns){
  $.ajax({
   url:"/getProjectCampaigns?allpc="+allProjectCampaigns,
   success:function(data)
   {
    $('#getProjectCampaigns').fadeOut( 100 , function() {
        $('#getProjectCampaigns').html(data);
    }).fadeIn( 500 );
   }
  });
 }
});
</script>
@endsection
