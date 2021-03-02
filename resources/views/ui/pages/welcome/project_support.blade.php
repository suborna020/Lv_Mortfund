 <div class="row" id="project_support">
    @foreach($project_supports as $project_support)
    <div class="col-md-6 col-xl-3">
        <div class="card">
            <img src="uploads/{{$project_support->photo}}" class="card-img-top" alt="...">
            <div class="card-body">
                <ul>
                    <li><i class="{{$project_support->icon}}" aria-hidden="true"></i></i> {{$project_support->categories->category_name}}</li>
                </ul>
                <h5 class="card-title">{{$project_support->title}}</h5>
                <p class="card-text">{{ Str::limit($project_support->story, 20) }}</p>
                <p id="raised" style="display: none">{{$project_support->raised}}</p>
                <p id="needed" style="display: none">{{$project_support->needed_amount}}</p>
                <div class="progress" style="height:8px;">
                    <div class="progress-bar bg-success role="progressbar" style="width: {{($project_support->transections->sum('amount')*100)/$project_support->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                        aria-valuemax="100">
                        <span class="precentage-lebel">{{($project_support->transections->sum('amount')*100)/$project_support->needed_amount}}% </span>
                    </div>
                </div>
                
                @if(session::has('currency_c'))
                    @if($user_currency->session_currency == session('currency_c'))
                        <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($project_support->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($project_support->needed_amount)*($user_currency->value)}}</p>
                    @endif
                @else
                   
                <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($project_support->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($project_support->needed_amount)*($currency_by_location->value)}}</p>
                
                @endif
                <div class="row border-top">
                    <div class="col-8 col-md-8 col-gap">
                        <div class="media">
                            <img src="uploads/{{ $project_support->members->user_photo?? '#' }}" class="mr-2 user-img" alt="...">
                            <div class="media-body">
                                <p class="name-text">By{{ $project_support->members->name?? 'Any Name' }}  </p>
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