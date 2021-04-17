<div class="row">
    @foreach($categoryCampaigns as $categoryCampaign)
                
    <div class="col-md-6 col-lg-4 col-padding">

         @if(count(array($categoryCampaign)) > 0)  
        <a href="/singleCampaign/{{$categoryCampaign->id}}" style="text-decoration: none;color: inherit">
        <div class="card">
            <img width="100%" height="200px" src="{{asset('uploads/'.$categoryCampaign->photo)}}" class="card-img-top" alt="...">
            <div class="card-body">
                <ul>
                    <li><i class="{{$categoryCampaign->icon}}" aria-hidden="true"></i></i> {{$categoryCampaign->categories->category_name}}</li>
                </ul>
                <h5 class="card-title">{{Str::upper($categoryCampaign->title)}}</h5>
                <p class="card-text">{{ Str::limit($categoryCampaign->story, 20) }}</p>
                <div class="progress" style="height:8px;">
                    <div class="progress-bar bg-success" role="progressbar" style="width: {{($categoryCampaign->transections->sum('amount')*100)/$categoryCampaign->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="precentage-lebel">{{($categoryCampaign->transections->sum('amount')*100)/$categoryCampaign->needed_amount}}% </span>
                    </div>
                </div>
                
                @if(session::has('currency_c'))
                    @if($user_currency->session_currency == session('currency_c'))
                        <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($categoryCampaign->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($categoryCampaign->needed_amount)*($user_currency->value)}}</p>
                    @endif
                @else
                   
                <p class="custom-card-text"><span class="text-muted"> {{$currency_by_location->symbol?? '$' }}{{($categoryCampaign->transections->sum('amount'))*($currency_by_location->value ?? '0')}}</span> rised of {{$currency_by_location->symbol?? '$' }}{{($categoryCampaign->needed_amount)*($currency_by_location->value ?? '0')}}</p>
                
                @endif
                <div class="row border-top">
                    <div class="col-8 col-md-8 col-gap">
                        <div class="media">
                            <img src="{{asset('uploads/'.$categoryCampaign->members->user_photo)}}" class="mr-2 user-img" alt="...">
                            <div class="media-body">
                                <p class="name-text">By {{$categoryCampaign->members->name?? ' Any Name' }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 col-md-4 col-gap">
                        <div class="calender">
                            <ul>
                                <li><i class="fa fa-calendar" aria-hidden="true"></i> {{date('d F, Y', strtotime($categoryCampaign->deadline))}}
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </a>

    @else

    <p>No Campaign Found</p>

    @endif
    </div> 

    
    @endforeach
   
</div>

<!-- Pagination Started -->

<nav aria-label="Page navigation example" class="page-div">
    <ul class="pagination justify-content-center">
       {!! $categoryCampaigns->links() !!} 
    </ul>
</nav>  

<!-- Pagination End -->