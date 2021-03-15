@extends('ui.layout.app')

@section('content')

 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Fundraiser Details</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$get_fundraiser->categories->category_name}}</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">{{$get_fundraiser->title}}</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>




      <!-- Details Section Started -->
    
  <div class="details">
      <div class="container cont-bg">
          <div class="row">
              <div class="col-md-8 left-side">
                  <div class="details-box CampaignToReport">
                      @if(session::has('message'))
                      <div class="alert alert-success" role="alert">
                         {{session('message')}}
                      </div>
                      @endif
                      <div class="row">
                          <div class="col-md-8">
                              <div class="large-img">
                                  @if($get_fundraiser->photo!=null)
                                   <img src="../uploads/{{$get_fundraiser->photo}}" class="img-fluid">
                                   @endif
                              </div>
                          </div>
                        <div class="col-md-4">
                            <div class="thumbnail">
                                @if($get_fundraiser->photo!=null)
                                  <img src="../uploads/{{$get_fundraiser->photo}}" class="img-fluid">
                                @endif
                                @if($get_fundraiser->video!=null)
                                <div class="col-12 col-md-12">
                                  <video width="100%" controls class="img-fluid">
                                      <source src="../uploads/{{$get_fundraiser->video}}" type="video/mp4">
                                      <source src="../uploads/{{$get_fundraiser->video}}" type="video/ogg">
                                      Your browser does not support the video tag.
                                  </video>
                                </div>
                                @endif                         
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-md-7 col-lg-6 col-xl-7">
                            <div class="title">
                                <ul>
                                    <li><i class="{{$get_fundraiser->icon}}" aria-hidden="true"></i><span>{{$get_fundraiser->categories->category_name}}</span></li>
                                </ul>

                                <h3>{{$get_fundraiser->title}}</h3>

                                <div class="media">
                                    <img src="../uploads/{{$get_fundraiser->members->user_photo}}" class="mr-2 user-img" alt="..." class="img-fluid">
                                    <div class="media-body">
                                        <p class="name-text">By {{$get_fundraiser->members->name}}</p>
                                    </div>
                                </div>
                            </div>
                          </div>
                        <div class="col-md-5 col-lg-6 col-xl-5">
                            <div class="inline-icon">
                                <p class="">Share On | </p>
                                <div class="social-icon">
                                    <ul>
                                        <li>
                                          <a href="#" onclick="window.open('https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;">
                                            <i class="fa fa-facebook facebook"></i>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#" onclick="window.open('https://www.twitter.com/intent/tweet?url='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;">
                                            <i class="fa fa-twitter twitter"></i>
                                          </a>
                                        </li>
                                        <li>
                                          <a href="#" onclick="window.open('https://www.linkedin.com/sharing/share-offsite/?url='+encodeURIComponent(location.href), 'facebook-share-dialog', 'width=626,height=436'); return false;">
                                            <i class="fa fa-linkedin linkedin"></i>
                                          </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                      </div>
                      <hr>
                      <div class="row">
                          <div class="col-6 col-md-6 col-lg-3">
                              <div class="icon-box">
                                <ul>
                                    <li><i class="fa fa-map-marker"></i></li>
                                </ul>
                                <div class="text-area">
                                    <h6 class="text-muted">Location</h6>
                                    <h5>{{$get_fundraiser->location}}</h5>
                                </div>
                              </div>
                          </div>
                        <div class="col-6 col-md-6 col-lg-3">
                            <div class="icon-box">
                                <ul>
                                    <li><i class="fa fa-bullseye"></i></li>
                                </ul>
                                <div class="text-area">
                                    <h6 class="text-muted">Goal</h6>
                                    <h5>
                                        @if(session::has('currency_c'))
                                              @if($user_currency->session_currency == session('currency_c'))
                                                  {{$user_currency->symbol}}{{($get_fundraiser->needed_amount)*($user_currency->value)}}
                                              @endif
                                        @else
                                            {{$currency_by_location->symbol}}{{($get_fundraiser->needed_amount)*($currency_by_location->value)}}
                              
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-3">
                            <div class="icon-box">
                                <ul>
                                    <li><i class="fa fa-usd"></i></li>
                                </ul>
                                <div class="text-area">
                                    <h6 class="text-muted">Raised</h6>
                                    <h5>
                                        @if(session::has('currency_c'))
                                            @if($user_currency->session_currency == session('currency_c'))
                                                {{$user_currency->symbol}}{{($get_fundraiser->transections->sum('amount'))*($user_currency->value)}}
                                            @endif
                                        @else
                                           
                                        {{$currency_by_location->symbol}}{{($get_fundraiser->transections->sum('amount'))*($currency_by_location->value)}}
                                        
                                        @endif
                                    </h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-6 col-md-6 col-lg-3">
                            <div class="icon-box">
                                <ul>
                                    <li><i class="fa fa-calendar-o"></i></li>
                                </ul>
                                <div class="text-area">
                                    <h6 class="text-muted">Deadline</h6>
                                    <h5>{{date('d F, Y', strtotime($get_fundraiser->deadline))}}</h5>
                                </div>
                            </div>
                        </div>
                      </div>
                      <div class="row">
                          <div class="col-12">
                               <p>{{$get_fundraiser->story}}</p>
                          </div>
                      </div>
                      <hr>
                      <span id="campaignToBeReported" style="display: none;">{{$get_fundraiser->id}}</span>
                      <div class="row">
                          <div class="col-8 col-md-8 col-lg-10">
                              <a href="#" class="btn btn-primary donate-btn replyModal" data-toggle="modal" data-target="#donateModal">Donate</a>
                          </div>
                        <div class="col-4 col-md-4 col-lg-2">
                           <div class="row">
                               <div class="col-6 col-md-6">
                                <ul>
                                    <li><i class="fa fa-comments-o fa-2x" data-toggle="modal" data-target="#commentModal"></i></li>
                                </ul>
                               </div>
                               <div class="col-6 col-md-6">
                                <ul>
                                    <li><i class="fa fa-exclamation-circle fa-2x reportCampaignModal" data-toggle="modal" data-target="#reportCampaignModal"></i></li>
                                </ul>
                               </div>
                           </div>
                        </div>
                      </div>
                  </div>
              </div>
            <div class="col-md-4 right-side">
                <div class="host">
                    <h3>Host</h3>
                    <div class="post">
                        <div class="media">
                            <img src="../uploads/{{$get_fundraiser->members->user_photo}}" class="mr-2 user-img" alt="..." class="img-fluid">
                            <div class="media-body">
                                <p class="name-text">By {{$get_fundraiser->members->name}}</p>
                            </div>
                        </div>
                        <p>{{$get_fundraiser->members->about}}</p>
                            <div class="post-btn">
                                <a href="#" class="btn contact-btn" data-toggle="modal" data-target="#contactModal">Contact Me</a>
                            </div>
                    </div>

                    <h4>Comments On This Post</h4>
                    <div style="overflow-y: scroll;height: 600px">
                    @foreach($get_fundraiser->comments as $comment)
                    <div class="post comments CommentToReport">
                        <div class="row">
                           <div class="col-8 col-md-9">
                              <div class="media">
                                  <img src="../uploads/{{$comment->members->user_photo}}" class="mr-2 user-img" alt="..." class="img-fluid">
                                  <div class="media-body">
                                      <p class="name-text">{{$comment->members->name}}</p>
                                  </div>
                              </div>
                          </div>
                          @if($comment->members->id!=session('user_session'))
                          <div class="col-4 col-md-3">
                              <div class="row replyUser">
                                  <div class="col-6 col-md-6 icon-adjust">
                                      <ul>
                                          <li><i class="fa fa-reply replyModal" data-toggle="modal" data-target="#replyModal"></i></li>
                                          <span id="getReplyTo" style="display: none">{{$comment->members->name}}</span>

                                          <span style="display: none" id="getReplyToId">{{$comment->members->id}}</span>
                                      </ul>
                                  </div>
                                  <div class="col-6 col-md-6 icon-adjust">
                                      <ul>
                                          <li><i class="fa fa-exclamation-circle reportCommentModal" data-toggle="modal" data-target="#reportCommentModal"></i></li>
                                      </ul>
                                  </div>
                              </div>
                          </div>
                          @endif
                        </div>
                        <p>
                            @if($comment->parent!=null)
                            <span style="color: blue">@ {{$comment->repliedMembers->name}}</span>
                            @endif
                            <span>{{$comment->comment}}</span>
                            <span id="commentToBeReported" style="display: none;">{{$comment->id}}</span>
                        </p>
                        <p>{{ Carbon\Carbon::parse($comment->created_at)->diffForHumans()}} </p>
                    </div>
                    @endforeach
                  </div>
                </div>
            </div>
          </div>
      </div>
  </div>

<!-- Details Section End -->

   


    <!-- Medical Fundraisers Started -->

        <section class="featured donor">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Related Post</h3>
                    <hr>
                    <br>
                    <div class="owl-carousel owl-theme newCampaign">
                        @foreach($related_fundraisers as $related_fundraiser)
                        <div class="item">
                          <a href="/singleCampaign/{{$related_fundraiser->id}}" style="text-decoration: none;color: inherit">
                            <div class="card">
                                <img src="{{asset('uploads/'.$related_fundraiser->photo)}}" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <ul>
                                    <li><i class="{{$related_fundraiser->icon}}" aria-hidden="true"></i></i>{{$related_fundraiser->categories->category_name}}</li>
                                    </ul>
                                    <h5 class="card-title">{{$related_fundraiser->title}}</h5>
                                    <p class="card-text">{{ Str::limit($related_fundraiser->story, 20) }}</p>
                                    <div class="progress" style="height:8px;">
                                        <div class="progress-bar bg-success role="progressbar" style="width: {{($related_fundraiser->transections->sum('amount')*100)/$related_fundraiser->needed_amount}}%" aria-valuenow="25" aria-valuemin="0"
                                            aria-valuemax="100">
                                            <span class="precentage-lebel">{{($related_fundraiser->transections->sum('amount')*100)/$related_fundraiser->needed_amount}}% </span>
                                        </div>
                                    </div>
                                    
                                    @if(session::has('currency_c'))
                                        @if($user_currency->session_currency == session('currency_c'))
                                            <p class="custom-card-text"><span class="text-muted">{{$user_currency->symbol}}{{($related_fundraiser->transections->sum('amount'))*($user_currency->value)}}</span> rised of {{$user_currency->symbol}}{{($related_fundraiser->needed_amount)*($user_currency->value)}}</p>
                                        @endif
                                    @else
                                       
                                    <p class="custom-card-text"><span class="text-muted">{{$currency_by_location->symbol}}{{($related_fundraiser->transections->sum('amount'))*($currency_by_location->value)}}</span> rised of {{$currency_by_location->symbol}}{{($related_fundraiser->needed_amount)*($currency_by_location->value)}}</p>
                                    
                                    @endif
                                    <div class="row border-top">
                                        <div class="col-8 col-md-8 col-gap">
                                            <div class="media">
                                                <img src="{{ asset('uploads/'.$related_fundraiser->members->user_photo?? '#')}}" class="mr-2 user-img" alt="...">
                                                <div class="media-body">
                                                    <p class="name-text">By {{$related_fundraiser->members->name?? ' Any Name' }} </p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-4 col-md-4 col-gap">
                                            <div class="calender">
                                                <ul>
                                                    <li><i class="fa fa-calendar" aria-hidden="true"></i>{{$related_fundraiser->deadline}}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                          </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
    </section>


<!-- CONTACT MODAL -->

<div class="modal fade" id="contactModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">{{$get_fundraiser->members->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>{{$get_fundraiser->members->mobile_no}}</p>
        <p>{{$get_fundraiser->members->email}}</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        
      </div>
    </div>
  </div>
</div>


<!-- COMMENT MODAL -->

<div class="modal fade" id="commentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Write your Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/comment" method="POST">
        @csrf
      <div class="modal-body">
            <input type="hidden" name="campaing_id" value="{{$get_fundraiser->id}}">
            @if(session::has('user_session'))
            <input type="hidden" name="member_id" value="{{session('user_session')}}">
            @endif
            <textarea class="form-control" name="comment"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Comment</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- REPLY MODAL -->

<div class="modal fade" id="replyModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">@<span id="replyTo"></span></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/reply" method="POST">
        @csrf
      <div class="modal-body">
            <input type="text" name="campaing_id" value="{{$get_fundraiser->id}}">
            @if(session::has('user_session'))
            <input type="text" name="member_id" value="{{session('user_session')}}">
            @endif
            <input type="text" id="replyToId" name="parent" class="form-control">
            comments count<input type="text" id="comments_count" name="comments_count" class="form-control" value="{{$get_fundraiser->comments_count}}">
            <textarea class="form-control" name="comment"></textarea>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Reply</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- REPORT CAMPAIGN MODAL -->

<div class="modal fade" id="reportCampaignModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report This Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('reportCampaign')}}" method="POST">
        @csrf
      <div class="modal-body">
            <input type="text" name="fundraiser_id" id="campaignReport">
            @if(session::has('user_session'))
            <input type="text" name="member_id" value="{{session('user_session')}}">
            @endif
 
            <label>Describe the Issue</label>
            <input type="text" name="report_details" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Report</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- REPORT COMMENT MODAL -->

<div class="modal fade" id="reportCommentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Report This Comment</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="{{url('reportComment')}}" method="POST">
        @csrf
      <div class="modal-body">
            <input type="text" name="comment_id" id="commentReport">
            @if(session::has('user_session'))
            <input type="text" name="member_id" value="{{session('user_session')}}">
            @endif
 
            <label>Describe the Issue</label>
            <input type="text" name="report_details" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Report</button>
      </div>
      </form>
    </div>
  </div>
</div>

<!-- DONATE MODAL -->

<div class="modal fade" id="donateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Donate</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="/setDonationDetails" method="POST">
        @csrf
      <div class="modal-body">
            <label>Campaign Id</label>
            <input type="text" name="campaing_id" value="{{$get_fundraiser->id}}" class="form-control">
            <label>Campaign Initiator Id</label>
            <input type="text" name="fundraiser_id" value="{{$get_fundraiser->member_id}}" class="form-control">
            @if(session::has('user_session'))
            <label>Donator Id</label>
            <input type="text" name="donor_id" value="{{session('user_session')}}" class="form-control">
            @endif
            <label>Amount you want to Donate</label>
            <input type="text" name="donation_amount" placeholder="amount" class="form-control">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        <button type="submit" class="btn btn-primary">Donate Now</button>

        
      </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
   $(document).ready(function(){
             $(".replyModal").on("click", function () {
                var v =  $(this).closest("div.replyUser").find("#getReplyTo").html(); 
                var rid =  $(this).closest("div.replyUser").find("#getReplyToId").html(); 
                console.log(rid);
                $("#replyTo").html(v);
                $("#replyToId").val(rid);
             });

             $(".reportCommentModal").on("click", function () {
                var rcid =  $(this).closest("div.CommentToReport").find("#commentToBeReported").html(); 
                console.log(rcid);
                $("#commentReport").val(rcid);
             });

             $(".reportCampaignModal").on("click", function () {
                var campaign_id =  $(this).closest("div.CampaignToReport").find("#campaignToBeReported").html(); 
                console.log(campaign_id);
                $("#campaignReport").val(campaign_id);
             });
         });
</script>
 
@endsection