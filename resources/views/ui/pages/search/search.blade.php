@extends('ui.layout.app')

@section('head-script')
    <style type="text/css">
    	.search-select {
		    display: block;
		    height: calc(1.5em + .75rem + 2px);
		    padding: .375rem .75rem;
		    font-size: 1rem;
		    font-weight: 400;
		    line-height: 1.5;
		    color: #495057;
		    background-color: #fff;
		    background-clip: padding-box;
		    border: 1px solid #ced4da;
		    border-radius: .25rem;
		    appearance: none;
		    outline: none;
		}
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
@endsection

@section('content')
 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Search Campaign</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Search Campaign</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
      <div class="featured">
        <div class="container adjust-container">
            <div class="row">
                <div class="col-md-12">
                    <div class="col-12 mb-5">
                    <div style="max-width: 500px;" class="d-flex mx-auto justify-content-center align-items-center">
                        <!-- <div class="search-category">
                            <select class="search-select">
                                <option selected>Select</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div> -->
                        <div class="input-group">
                            <input type="text" class="form-control searchBox" placeholder="Search Campaign">
                            <div class="input-group-append">
                                <button style="background-color: #f8800b; color: #fff; " class="btn" type="button">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>	
                    <br>
                    <br>
                    <div class="fundraisers searchcardall" id="fundraisers">
                        <div class="row" id="fundraiser_main">

						    @foreach($all_campaigns as $all_campaign)
						    <div class="col-md-6 col-xl-3">
						        <a href="/singleCampaign/{{$all_campaign->id}}" style="text-decoration: none;color: inherit">
						            <div class="card searchcard">
						            <img width="100%" height="200px" src="uploads/{{$all_campaign->photo}}" class="card-img-top" alt="..." lazy="loading">
						            <div class="card-body">
						                <ul>
						                    <li><i class="{{$all_campaign->icon}}" aria-hidden="true"></i></i> {{$all_campaign->categories->category_name}}</li>
						                </ul>
						                <h5 class="card-title">{{Str::upper($all_campaign->title)}}</h5>
						                <p class="card-text">{{ Str::limit($all_campaign->story, 20) }}</p>
						                <p id="raised" style="display: none">{{$all_campaign->raised}}</p>
						                <p id="needed" style="display: none">{{$all_campaign->needed_amount}}</p>
						                <div class="progress" style="height:8px;">
						                    <div class="progress-bar bg-success role="progressbar" style="width: {{($all_campaign->transections->sum('amount')*100)/$all_campaign->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
						                        aria-valuemax="100">
						                        <span class="precentage-lebel">{{($all_campaign->transections->sum('amount')*100)/$all_campaign->needed_amount}}% </span>
						                    </div>
						                </div>

						                @if(session::has('currency_c'))
						                @if($user_currency->session_currency == session('currency_c'))
						                <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($all_campaign->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($all_campaign->needed_amount)*($user_currency->value)}}</p>
						                @endif
						                @else

						                <p class="custom-card-text"><span class="text-muted"> {{$currency_by_location->symbol?? '$' }}{{($all_campaign->transections->sum('amount'))*($currency_by_location->value ?? '0')}}</span> rised of {{$currency_by_location->symbol?? '$' }}{{($all_campaign->needed_amount)*($currency_by_location->value ?? '0')}}</p>

						                @endif

						                <div class="row border-top">
						                    <div class="col-8 col-md-8 col-gap">
						                        <div class="media">
						                            <img src="uploads/{{ $all_campaign->members->user_photo?? '#' }}" class="mr-2 user-img" alt="..." lazy="loading">
						                            <div class="media-body">
						                                <p class="name-text">By {{$all_campaign->members->name?? ' Any Name' }} </p>
						                            </div>
						                        </div>
						                    </div>
						                    <div class="col-4 col-md-4 col-gap">
						                        <div class="calender">
						                            <ul>
						                                <li><i class="fa fa-calendar" aria-hidden="true"></i>{{date('d F, Y', strtotime($all_campaign->deadline))}}</li>
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
						        {!! $all_campaigns->links() !!}
						    </ul>
						</nav>

<!-- Pagination End -->
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


   <script>
    $(document).ready(function(){
        $(".searchBox").on("keyup", function() {
            var value = $(this).val().toLowerCase();
            $(".searchcardall .searchcard").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
            });
        });
    });
</script>
   


@endsection