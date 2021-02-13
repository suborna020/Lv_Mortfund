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
            <progress id="health" value="{{$fundraiser->raised}}" max="{{$fundraiser->needed_amount}}"></progress><span id="progress">&nbsp;&nbsp;80%</span>
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

{!! $fundraisers->links() !!}