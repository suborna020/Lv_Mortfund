<div class="row">

@foreach($get_featured_campaigns as $get_featured_campaign)
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <img src="{{asset('uploads/'.$get_featured_campaign->photo)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <ul>
                    <li><i class="{{$get_featured_campaign->icon}}" aria-hidden="true"></i></i> {{$get_featured_campaign->categories->category_name}}</li>
                </ul>
                <h5 class="card-title">{{$get_featured_campaign->title}}</h5>
                <p class="card-text">{{ Str::limit($get_featured_campaign->story, 20) }}</p>
                <p id="raised" style="display: none">{{$get_featured_campaign->raised}}</p>
                <p id="needed" style="display: none">{{$get_featured_campaign->needed_amount}}</p>
                <div class="progress" style="height:8px;">
                    <div class="progress-bar bg-success role="progressbar" style="width: {{($get_featured_campaign->transections->sum('amount')*100)/$get_featured_campaign->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="precentage-lebel">{{($get_featured_campaign->transections->sum('amount')*100)/$get_featured_campaign->needed_amount}}% </span>
                    </div>
                </div>
                
                @if(session::has('currency_c'))
                    @if($user_currency->session_currency == session('currency_c'))
                        <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($get_featured_campaign->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($get_featured_campaign->needed_amount)*($user_currency->value)}}</p>
                    @endif
                @else
                   
                <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($get_featured_campaign->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($get_featured_campaign->needed_amount)*($currency_by_location->value)}}</p>
                
                @endif
                
                <div class="row border-top">
                    <div class="col-8 col-md-8 col-gap">
                        <div class="media">
                            <img src="{{ asset('uploads/'.$get_featured_campaign->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                            <div class="media-body">
                                <p class="name-text">By {{$get_featured_campaign->members->name?? ' Any Name' }} </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-gap">
                        <div class="calender">
                            <ul>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$get_featured_campaign->deadline}}</li>
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
      {!! $get_featured_campaigns->links() !!}
    </ul>
</nav>  

<!-- Pagination End -->