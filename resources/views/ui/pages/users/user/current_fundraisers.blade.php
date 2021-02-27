<div class="row" id="fundraiser_main">

@foreach($current_user_fundraisers as $current_fundraiser)
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <img src="uploads/{{$current_fundraiser->photo}}" class="card-img-top" alt="...">
            <div class="card-body">
                <ul>
                    <li><i class="{{$current_fundraiser->icon}}" aria-hidden="true"></i></i> {{$current_fundraiser->categories->category_name}}</li>
                </ul>
                <h5 class="card-title">{{$current_fundraiser->title}}</h5>
                <p class="card-text">{{ Str::limit($current_fundraiser->story, 20) }}</p>
                <p id="raised" style="display: none">{{$current_fundraiser->raised}}</p>
                <p id="needed" style="display: none">{{$current_fundraiser->needed_amount}}</p>
                <div class="progress" style="height:8px;">
                    <div class="progress-bar bg-success role="progressbar" style="width: {{($current_fundraiser->transections->sum('amount')*100)/$current_fundraiser->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="precentage-lebel">{{($current_fundraiser->transections->sum('amount')*100)/$current_fundraiser->needed_amount}}% </span>
                    </div>
                </div>
                
                @if(session::has('currency_c'))
                    @if($user_currency->session_currency == session('currency_c'))
                        <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($current_fundraiser->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($current_fundraiser->needed_amount)*($user_currency->value)}}</p>
                    @endif
                @else
                   
                <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($current_fundraiser->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($current_fundraiser->needed_amount)*($currency_by_location->value)}}</p>
                
                @endif
                
                <div class="row border-top">
                    <div class="col-8 col-md-6 col-gap">
                        <div class="media">
                             <a class="edit" href="editFundraiser/{{$current_fundraiser->id}}">Edit</a>
                        </div>
                    </div>
                    <div class="col-4 col-md-6 col-gap">
                        <div class="calender">
                             <a class="delete" href="fundraisers/{{$current_fundraiser->id}}">Delete</a>
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
      {!! $current_user_fundraisers->links() !!}
    </ul>
</nav>  

<!-- Pagination End -->