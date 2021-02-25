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
          <div class="row" style="background: red;height: 500px;">
            <div class="col-12 col-md-8" style="background: blue">
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