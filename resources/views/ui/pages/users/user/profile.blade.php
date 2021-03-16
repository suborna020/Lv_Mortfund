@extends('ui.layout.app')

@section('content')

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


 
 

@endsection