<div class="row" id="fundraiser_recent">

@foreach($recents as $recent)
<div class="col-md-6 col-xl-3">
    <a href="/singleCampaign/{{$recent->id}}" style="text-decoration: none;color: inherit">
    <div class="card">
        <img width="100%" height="200px" src="uploads/{{$recent->photo}}" class="card-img-top" alt="..." lazy="loading">
        <div class="card-body">
            <ul>
                <li><i class="{{$recent->icon}}" aria-hidden="true"></i></i> {{$recent->categories->category_name}}</li>
            </ul>
            <h5 class="card-title">{{Str::upper($recent->title)}}</h5>
            <p class="card-text">{{ Str::limit($recent->story, 20) }}</p>
            <p id="raised" style="display: none">{{$recent->raised}}</p>
            <p id="needed" style="display: none">{{$recent->needed_amount}}</p>
            <div class="progress" style="height:8px;">
                    <div class="progress-bar bg-success role="progressbar" style="width: {{($recent->transections->sum('amount')*100)/$recent->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="precentage-lebel">{{($recent->transections->sum('amount')*100)/$recent->needed_amount}}% </span>
                    </div>
                </div>
                
                @if(session::has('currency_c'))
                    @if($user_currency->session_currency == session('currency_c'))
                        <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($recent->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($recent->needed_amount)*($user_currency->value)}}</p>
                    @endif
                @else
                   
                <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($recent->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($recent->needed_amount)*($currency_by_location->value)}}</p>
                
                @endif
            <div class="row border-top">
                <div class="col-8 col-md-8 col-gap">
                    <div class="media">
                        <img src="uploads/{{ $recent->members->user_photo?? '#' }}" class="mr-2 user-img" alt="..." lazy="loading">
                        <div class="media-body">
                            <p class="name-text">By {{ $recent->members->name?? 'Any Name' }}</p>
                        </div>
                    </div>
                </div>
                <div class="col-4 col-md-4 col-gap">
                    <div class="calender">
                        <ul>
                            <li><i class="fa fa-calendar" aria-hidden="true"></i> {{date('d F, Y', strtotime($recent->deadline))}}</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div></a>
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