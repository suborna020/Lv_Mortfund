@extends('ui.layout.app')

@section('content')

<div class="singleCampaign">
    <section class="singleCampaignBreadcrumb">
       <div class="container">
        <div class="row">
          <div class="col-12 col-md-12">
            <h3>Fundraiser Details</h3>
          </div>
          <div class="breadcrumb">
            Home
            @foreach(Request::segments() as $segment)
                <a href="{{$segment}}"> >{{$segment}}</a>
            @endforeach
          </div>
        </div>
       </div>
    </section>
    <!-- Category Section Started -->
    <section>
       <div class="container">
          <div class="row pt-4">
            <div class="col-12 col-md-8">
                 <div class="row">
                      <div class="col-12 col-md-8">
                           @if($get_fundraiser->photo!=null)
                           <img src="../uploads/{{$get_fundraiser->photo}}">
                           @endif
                      </div>
                      <div class="col-12 col-md-4">
                           <div class="row">
                                <div class="col-12 col-md-12">
                                  @if($get_fundraiser->photo!=null)
                                  <img width="100%" src="../uploads/{{$get_fundraiser->photo}}">
                                  @endif
                                </div>
                                @if($get_fundraiser->video!=null)
                                <div class="col-12 col-md-12">
                                  <video width="100%" controls>
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
                      <div class="col-12 col-md-6">
                           <p><i class="{{$get_fundraiser->icon}}"></i> {{$get_fundraiser->categories->category_name}}</p>
                           <h4>{{$get_fundraiser->title}}</h4>
                           <p>By <img width="20px" src="../uploads/{{$get_fundraiser->members->user_photo}}"> {{$get_fundraiser->members->name}}</p>
                      </div>
                      <div class="col-12 col-md-6 pt-4">
                           <div class="row">
                               <div class="col-12 col-md-4 d-flex flex-row-reverse">
                                   <h4>Share On</h4>
                                   <a href="#" 
                                      onclick="
                                        window.open(
                                          'https://www.facebook.com/sharer/sharer.php?u='+encodeURIComponent(location.href), 
                                          'facebook-share-dialog', 
                                          'width=626,height=436'); 
                                        return false;">
                                      Share on Facebook
                                    </a>
                                    <a href="#" 
                                      onclick="
                                        window.open(
                                          'https://www.twitter.com/intent/tweet?url='+encodeURIComponent(location.href), 
                                          'facebook-share-dialog', 
                                          'width=626,height=436'); 
                                        return false;">
                                      Share on Twitter
                                    </a>
                                    <a href="#" 
                                      onclick="
                                        window.open(
                                          'https://www.linkedin.com/sharing/share-offsite/?url='+encodeURIComponent(location.href), 
                                          'facebook-share-dialog', 
                                          'width=626,height=436'); 
                                        return false;">
                                      Share on Linkedin
                                    </a>
                                     
                                    
                                  </a>

                               </div>
                               <div class="col-12 col-md-8 d-flex flex-row-reverse">
                                
                                    @foreach($socials as $social)
                                    <a href="{{$social->link}}"><i class="{{$social->social_photo}}"></i></a>
                                    @endforeach
                                
                               </div>
                           </div>
                      </div>
                 </div>
                 <div class="row">
                      <div class="col-12 col-md-3">
                           Location {{$get_fundraiser->location}}
                      </div>
                      <div class="col-12 col-md-3">
                           Goal 
                           @if(session::has('currency_c'))
                                @if($user_currency->session_currency == session('currency_c'))
                                    {{$user_currency->symbol}}{{($get_fundraiser->needed_amount)*($user_currency->value)}}
                                @endif
                            @else
                              {{$currency_by_location->symbol}}{{($get_fundraiser->needed_amount)*($currency_by_location->value)}}
                
                             @endif
                      </div>
                      <div class="col-12 col-md-3">
                           Raised 
                           @if(session::has('currency_c'))
                                @if($user_currency->session_currency == session('currency_c'))
                                    {{$user_currency->symbol}}{{($get_fundraiser->transections->sum('amount'))*($user_currency->value)}}
                                @endif
                            @else
                               
                            {{$currency_by_location->symbol}}{{($get_fundraiser->transections->sum('amount'))*($currency_by_location->value)}}
                            
                            @endif
                      </div>
                      <div class="col-12 col-md-3">
                           DeadLine {{$get_fundraiser->deadline}}
                      </div>
                 </div>
                 <div class="row CampaignToReport">
                      <div class="col-12 col-md-12">
                           {{$get_fundraiser->story}}
                      </div>
                      <span id="campaignToBeReported" style="display: none;">{{$get_fundraiser->id}}</span>
                      <div class="col-12 col-md-12">
                           <button type="button" class="btn btn-primary replyModal" data-toggle="modal" data-target="#donateModal">Donate</button>
                           <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#commentModal">Comment</button>
                           <button type="button" class="btn btn-primary reportCampaignModal" data-toggle="modal" data-target="#reportCampaignModal">Report</button>
                      </div>
                 </div>
            </div>
            <div class="col-12 col-md-4">
                <div class="row">
                    <div class="col-12 col-md-12">
                       <h3>Host</h3>
                       <div class="row p-4 br-4" style="background: #cbcfd4">
                          <div class="col-12 col-md-12">
                            <img width="20px" src="../uploads/{{$get_fundraiser->members->user_photo}}">{{$get_fundraiser->members->name}}
                          </div>
                          <div class="col-12 col-md-12">
                             {{$get_fundraiser->members->about}}
                          </div>
                          <div class="col-12 col-md-12">
                             <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#contactModal">
                             Contact Me
                             </button>
                          </div>
                       </div>

                       <div class="row CommentToReport" style="overflow-y: scroll;height: 200px">
                          <div class="col-12 col-md-12">
                              <h3>Comments On this Post</h3>
                          </div>
                          @foreach($get_fundraiser->comments as $comment)
                          <div class="col-12 col-md-12">
                              <div class="row replyUser">
                                 <div class="col-12 col-md-6">
                                    <img width="20px" src="../uploads/{{$comment->members->user_photo}}">
                                    <span id="getReplyTo">{{$comment->members->name}}</span>

                                    <span style="display: none" id="getReplyToId">{{$comment->members->id}}</span>
                                 </div>
                                 @if($comment->members->id!=session('user_session'))
                                 <div class="col-12 col-md-6">
                                    <button type="button" class="btn btn-primary replyModal" data-toggle="modal" data-target="#replyModal">
                                     Reply
                                     </button>
                                    <button type="button" class="btn btn-primary reportCommentModal" data-toggle="modal" data-target="#reportCommentModal">
                                     Report
                                     </button>
                                 </div>
                                 @endif
                              </div>
                              <div class="row">
                                <div class="col-12 col-md-12">
                                  @if($comment->parent!=null)
                                  <span style="color: blue">@ {{$comment->parent}}</span>
                                  @endif
                                  <span>{{$comment->comment}}</span>
                                  
                                  <span id="commentToBeReported" style="display: none;">{{$comment->id}}</span>
                                </div>
                              </div>
                              <div class="row">
                                <hr>
                                <span>{{$comment->created_at}}</span>
                              </div>
                          </div>
                          @endforeach
                         
                       </div>
                    </div>
                </div>
            </div>
       </div>
    </section>
    <section class="related-posts">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Related Posts</h3>
                    <div class="bottom-line"></div>
                    @foreach($related_fundraisers as $related_fundraiser)
                          <p>{{$related_fundraiser->id}},{{$related_fundraiser->title}},{{$related_fundraiser->category_id}}</p>
                        @endforeach
                   
                </div>
            </div>
        </div>
    </section>

    <!-- Category Section End -->
</div>


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
            <input type="text" name="comment_id" id="campaignReport">
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
            <input type="text" name="fundraiser_id" id="commentReport">
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
            <input type="text" name="amount" placeholder="amount" class="form-control">
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