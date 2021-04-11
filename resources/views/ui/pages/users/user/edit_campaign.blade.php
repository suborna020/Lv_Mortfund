@extends('ui.layout.app')

@section('content')


 <div class="editFundraiser" style="margin-top:115px">
        <div class="container adjust-container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Edit Fundraiser</h3>
                    <p style="color: red">{{session('msg')}}</p>
                    <hr>
                    <form action="/updateFundraiser/{{$get_fundraiser->id}}" class="" id="updateFundraiser" method="POST" enctype="multipart/form-data">
                      @csrf
                        <select class="form-control" name="category_id" id="category_id">
                           <option value="{{$get_fundraiser->category_id}}">{{$get_fundraiser->categories->category_name}}</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->category_name}}</option>
                           @endforeach
                        </select>
                        <label>Enter Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{$get_fundraiser->title}}">
                        <label>Enter Benificiary Name</label>
                        <input type="text" class="form-control" name="benificiary_name" id="benificiary_name" value="{{$get_fundraiser->benificiary_name}}">
                        <label>Enter The Amount Needed in USD</label>
                        <input type="text" class="form-control" name="needed_amount" id="needed_amount" value="{{$get_fundraiser->needed_amount}}">
                        <label>Deadline</label>
                        <input type="date" class="form-control" name="deadline" id="deadline" value="{{$get_fundraiser->deadline}}">
                        <label>Write the story behind the reason of creating the campaign</label>
                        <textarea name="story" id="story" class="form-control">{{$get_fundraiser->story}}</textarea>
                        <label>Thumbnail ( Image  size will be reduced to 350 * 280 px) </label>
                        <input type="hidden" name="default_thumbnail" value="{{$get_fundraiser->thumbnail}}" class="form-control">
                        <div class="im" style="width: 50px">
                          <img src="/uploads/{{$get_fundraiser->thumbnail}}" style="width: 100%;">
                        </div>
                        <input type="file" class="form-control" name="thumbnail" value="{{$get_fundraiser->thumbnail}}">
                        <label>Photo</label>
                        <input type="hidden" name="default_photo" value="{{$get_fundraiser->photo}}" class="form-control">
                        <div class="im" style="width: 50px">
                          <img src="/uploads/{{$get_fundraiser->photo}}" style="width: 100%;">
                        </div>
                        <input type="file" class="form-control" name="photo" value="{{$get_fundraiser->photo}}">
                        <label>Video</label>
                        <input type="hidden" name="default_video" value="{{$get_fundraiser->video}}" class="form-control">
                        <div class="im" style="width: 50px">
                          <video src="/uploads/{{$get_fundraiser->video}}" style="width: 100%;">
                        </div>
                        <input type="file" class="form-control" name="video" value="{{$get_fundraiser->video}}">
                        <label>Proof Document</label>
                        <input type="hidden" name="default_proof_document" value="{{$get_fundraiser->proof_document}}" class="form-control">
                        <div class="im" style="width: 50px">
                          <img src="/uploads/{{$get_fundraiser->proof_document}}" style="width: 100%;">
                        </div>
                        <input type="file" class="form-control" name="proof_document" value="{{$get_fundraiser->proof_document}}">
                        <input type="hidden" name="" id="campaign_id" value="{{$get_fundraiser->id}}">
                        <input type="submit" class="btn btn-primary" name="" value="Update">
                    </form>
                    
                    
                </div>
            </div>
        </div>
    </div>


 <script>
  $(document).ready(function() {
      $('#summernote').summernote();
  });
</script>


@endsection