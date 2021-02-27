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
            <span><i class="fas fa-home"></i>Home</span><span>></span><span>Category Name</span><span>></span><span>Fundraiser Name</span>
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
                           <img src="../uploads/{{$get_fundraiser->photo}}">
                      </div>
                      <div class="col-12 col-md-4">
                           <div class="row">
                                <div class="col-12 col-md-12">
                                  <img width="100%" src="../uploads/{{$get_fundraiser->photo}}">
                                </div>
                                <div class="col-12 col-md-12">
                                  <video width="100%" controls>
                                      <source src="../uploads/{{$get_fundraiser->video}}" type="video/mp4">
                                      <source src="../uploads/{{$get_fundraiser->video}}" type="video/ogg">
                                      Your browser does not support the video tag.
                                    </video>
                                </div>
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
                           Goal {{$get_fundraiser->needed_amount}}
                      </div>
                      <div class="col-12 col-md-3">
                           Raised {{$get_fundraiser->raised}}
                      </div>
                      <div class="col-12 col-md-3">
                           DeadLine {{$get_fundraiser->deadline}}
                      </div>
                 </div>
                 <div class="row">
                      <div class="col-12 col-md-12">
                           {{$get_fundraiser->story}}
                      </div>
                      <div class="col-12 col-md-12">
                           <button class="btn btn-primary">Donate</button><button class="btn btn-primary">Comment</button><button class="btn btn-primary">Report</button>
                      </div>
                 </div>
            </div>
            <div class="col-12 col-md-4" style="background: pink">
            </div>
       </div>
    </section>
    <section class="related-posts">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-12">
                    <h3>Related Posts</h3>
                    <div class="bottom-line"></div>
                    <div class="owl-carousel owl-theme">
                        @foreach($categories as $category)
                        <a href="{{$category->slug}}">
                          <div class="item">
                            <div class="box">
                                <img src="{{$category->background_image}}" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-md-block adjust-caption">
                                    <i class="{{$category->icon}}" aria-hidden="true"></i>
                            
                                    <h5>{{$category->category_name}}</h5>
                                </div>
                            </div>
                         </div>
                        </a>
                        @endforeach
                        
                    </div>
                </div>
        </div>
    </section>

    <!-- Category Section End -->
</div>
 
@endsection