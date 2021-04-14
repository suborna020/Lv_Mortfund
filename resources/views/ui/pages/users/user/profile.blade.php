@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/profile.css')}}" rel="stylesheet">
@endsection

@section('content')

 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Profile</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Profile</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>


    <section class="profile py-5">
        <div class="container">
            <div class="row">
                {{ session('msg')}}
                <!-- left -->
                <div class="col-12 col-md-4">
                    <div class="card" style=" box-shadow: 0 2px 4px 0 #e6e6e6, 0 2px 4px 0 #e6e6e6">
                        <div class="card-body">
                            <div style="text-align: center;">
                                <div style="overflow:hidden;border: 3px solid #f8800b; height: 110px; width: 110px; border-radius: 50%;
                                    display: flex; align-items: center; justify-content: center; margin: 0 auto">
                                    <!-- updated img -->
                                    <img class="img-fluid" src="{{asset('uploads/'.$user_info->user_photo)}}" alt="user" />
                                </div>
                                <h5 class="mt-3">{{$user_info->name}}</h4>
                            </div>
                            <hr class="my-4" style="width: 100px;">
                            <div class="profile_infowrapper">
                                <div><i class="fas fa-envelope mr-3"></i>
                                    <p>{{$user_info->email}}</p>
                                </div>
                                <div> <i class="fa fa-user mr-3"> </i>
                                    <p> {{$user_info->username}}</p>
                                </div>
                                <div> <i class="fas fa-phone-alt mr-3"></i>
                                    <p> {{$user_info->mobile_no}} </p>
                                </div>
                                <div><i class="fas fa-map-marker-alt mr-3"></i>
                                    <p>{{$user_info->address}}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- right -->
                <div class="col-12 col-md-8">
                    <div class="card" style=" box-shadow: 0 2px 4px 0 #e6e6e6, 0 2px 4px 0 #e6e6e6">
                        <div class="card-body">
                            <form class="form-group" action="/updateProfile" id="updateProfile" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" id="user_id" value="{{$profile->id}}" name="">
                                <label>Profile Photo <span
                                        style="color: #fccfa2; font-weight: 500; font-size: 16px">(Image will be reduced
                                        to 150 *
                                        150)</span> </label>
                                @if($profile->user_photo!=null)
                                  <input type="hidden" name="default_user_photo" value="{{$profile->user_photo}}" class="form-control">
                                  <div class="im" style="width: 50px">
                                    <img src="/uploads/{{$profile->user_photo}}" style="width: 100%;">
                                  </div>
                                  <br>
                                  <div class="input-icons">
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fas fa-plus"></i>
                                        <div class="m-0"> Change Photo</div>
                                    </label>
                                    <input id="file-upload" name="user_photo" type="file" />
                                </div>
                                @else   
                                <div class="input-icons">
                                    <label for="file-upload" class="custom-file-upload">
                                        <i class="fas fa-plus"></i>
                                        <div class="m-0"> Choose Photo</div>
                                    </label>
                                    <input id="file-upload" name="user_photo" type="file" />
                                </div>
                                @endif
                                <label>Name</label>
                                <input class="form-control" type="text" name="name" value="{{$profile->name}}" placeholder="Your Full Name">
                                <label>Phone</label>
                                <input class="form-control" type="text" name="mobile_no" value="{{$profile->mobile_no}}" placeholder="Your Phone Number">
                                <label>Address</label>
                                <input class="form-control" type="text" name="address" value="{{$profile->address}}"placeholder="Your Phone Number">
                                <div class="d-flex justify-content-end align-items-end">
                                    <button type="submit" class="btn profile-btn ">Update</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>





{{--  



<div class="profile" style="margin-top: 115px">
   
   
   <div class="container mb-4">
   	  <div class="row">
   	  	   <div class="col-12 col-md-12"> 
              <p>Profile</p>
              {{ session('msg')}}
   	  	   </div>

   	  	   <div class="col-12 col-md-4">
   	  	   	  <div class="col-12 col-md-12 border p-4">
                  <div class="user_photo">
                  	<div class="im" style="width: 100px">
                      <img src="/uploads/{{$profile->user_photo}}" style="width: 100%;">
                    </div>
                  </div>
                  <div class="user_info">
                  	  <h4> {{$user_info->name}}</h4>

                  	  <p>Email {{$user_info->email}}</p>
                  	  <p>User Name {{$user_info->name}}</p>
                  	  <p>Phone {{$user_info->mobile_no}}</p>
                  	  <p>Address {{$user_info->address}}</p>
                  </div>
   	  	      </div>
   	  	   </div>

   	  	   <div class="col-12 col-md-8">
                <div class="row">
                    <form action="/updateProfile" method="POST" enctype="multipart/form-data">
                        @csrf
                        <label>Profile Photo (Image will be redueced to 150*150px)</label>
                        @if($profile->user_photo!=null)
                        <input type="hidden" name="default_user_photo" value="{{$profile->user_photo}}" class="form-control">
                        <div class="im" style="width: 50px">
                          <img src="/uploads/{{$profile->user_photo}}" style="width: 100%;">
                        </div>
                        <input type="file" class="form-control" name="user_photo">
                        @else
                        <input type="file" class="form-control" name="user_photo">
                        @endif
                        <label>Name</label>
                        <input type="text" class="form-control" name="name" value="{{$profile->name}}">

                        <label>Phone</label>
                        <input type="phone" class="form-control" name="mobile_no" value="{{$profile->mobile_no}}">

                        <label>Address</label>
                        <input type="text" class="form-control" name="address" value="{{$profile->address}}">

                        <input type="submit" class="btn btn-primary" name="" value="Update">
                    </form>
                </div>
   	  	   </div>
           
   	  </div>
   </div>
</div>


 
 --}}

@endsection