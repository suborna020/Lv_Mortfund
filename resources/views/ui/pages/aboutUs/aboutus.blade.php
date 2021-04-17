@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/about-us.css')}}" rel="stylesheet">
@endsection

@section('content')

 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>About Us</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">About Us</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>
<p style="text-align: center;">{!! session('msg') !!}</p>
<div class="aboutus">
    
    <!-- video -->
    <section class="aboutus_video">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="aboutus_video-warapper" style="height: 60vh;">
              <iframe class="aboutus_iframe" width="60%" height="80%" src="{{$aboutus->image_video}}"
                title="YouTube video player" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                allowfullscreen></iframe>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- about us content -->
    <section class="aboutus_content" style="height: 100%;">
      <div class="container">

        <div class="row">
          <div class="col-12 col-md-12">
            <!-- HEADER -->
            <h3 class="text-capitalize">{{$aboutus->about_primary_title}}</h3>
            <hr />
            <h6>
               {{$aboutus->about_primary_text}}
            </h6>
          </div>
        </div>
        <br />
        <br />
      </div>
    </section>
    <!-- being the difference content -->
    <section class="aboutus_content2">
      <div class="container">
        <div class="row">
          <div class="col-12 col-md-12">
            <!-- HEADER -->
            <h3 class="text-capitalize" style="padding-top: 10rem;">{{$aboutus->about_secondary_title}}</h3>
            <hr />
            <p style="font-size: 20px; font-weight: 500; ">
               {{$aboutus->secondary_text}}
            </p>
          </div>
        </div>
        <br>
        <br>
        <div class="row">
          <div class="col-xs-12 col-md-6">
            <ul style="padding: 0; list-style-position: inside; font-size: 20px; font-weight: 500; list-style: none;">
               @foreach($secondary_points_left as $sl) 
              <li><i style="color: #f36a10; margin: 1rem;" class="fas fa-check-circle"></i>{{$sl->secondary_point}}</li>
            
              @endforeach
            </ul>
          </div>
          <div class="col-xs-12 col-md-6">
            <ul style="padding: 0; list-style-position: inside; font-size: 20px; font-weight: 500; list-style: none;">
               @foreach($secondary_points_right as $rl) 
              <li><i style="color: #f36a10; margin: 1rem;" class="fas fa-check-circle"></i>{{$rl->secondary_point}}</li>
              
              @endforeach

            </ul>
          </div>
        </div>
        <br />
        <br />
      </div>
    </section>
    <!-- our team -->
    <section class="aboutus_ourteam">
      <div class="container">
        <section class="aboutus_content" style="height: 100%;">
          <div class="container">

            <div class="row">
              <div class="col-12 col-md-12">
                <!-- HEADER -->
                <h3 class="text-capitalize">Our team</h3>
                <hr />
              </div>
            </div>
            <br />
            <br />
          </div>
        </section>
        <div class="row">
            @foreach($team as $teams)
          <div class="col-xs-12 col-md-6 col-lg-3">
            
            <div class="aboutus_ourteam_wrapper">
              <div class="img-wrapper">
                <img src="siteImages/{{$teams->photo}}" class="img-fluid" alt="team-member"> </div>
              <div class="ourteam_content_warapper">
                <h5 class="text-capitalize">{{$teams->member_name}}</h5>
                <p class="text-capitalize font-weight-bold">{{$teams->member_designation}}</p>
                <div class="icon_warapper">
                  <a href="{{$teams->facebook_link}}"><i style="color:#d9d9d9" class="fab fa-facebook-f"></i></a>
                  <a href="{{$teams->twitter_link}}"><i style="color:#d9d9d9" class="fab fa-twitter"></i></a>
                  <a href="{{$teams->linkedin_link}}"><i style="color:#d9d9d9" class="fab fa-linkedin-in"></i></a>
                  <a href="{{$teams->instagram_link}}"><i style="color:#d9d9d9" class="fab fa-instagram"></i></a>
                </div>
              </div>
            </div>
            
          </div>
          @endforeach
          
        </div>
      </div>
    </section>
    <!-- get in touch -->
    <section class="aboutus_contact">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 col-md-6 col-lg-6">
            <h4 class="text-capitalize">{{$contactBody->contact_title}}</h4>
            <p class="font-weight-bold">
              {{$contactBody->contact_text}}
            </p>
            <div class="d-flex justify-content-left align-items-left flex-column">
              <span><i style="color:#fff" class="fas fa-map-marker-alt"></i>
                {{$contactBody->contact_location}}</span>
              <span><i style="color:#fff" class="fas fa-phone-alt"></i> {{$contactBody->contact_number}}</span>
              <span><i style="color:#fff" class="fas fa-clock"></i>{{$contactBody->contact_hours}}</span>
            </div>

          </div>
          <div class="col-xs-12 col-md-6 col-lg-6">
            <div class="input_wrapper form-group">
              <form action="{{url('clientMessage')}}" method="post">
                  @csrf
                  <input type="text" name="name" placeholder="Enter Your Full Name">
                  <input type="text" name="email" placeholder="Enter Your Email">
                  <textarea class="form-control" name="message" placeholder="Enter Your Message Here" rows="5"></textarea>
              
             
              <div class="input_wrapper_btn">
                <button class="btn" type="submit">Submit</button>
              </div>
              </form>  
            </div>
          </div>
        </div>
      </div>
    </section>
</div>
@endsection