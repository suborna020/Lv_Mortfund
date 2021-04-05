@extends('ui.layout.app')

@section('content')


 <div class="editFundraiser" style="margin-top:115px">
        <div class="container adjust-container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Create Fundraiser</h3>
                    <p style="color: red">{{session('msg')}}</p>
                    <hr>
                    <form action="/insertFundraiser" class="" id="insertFundraiser" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select class="form-control" name="category_id" id="category_id">
                           <option value="">Select Category</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->category_name}}</option>
                           @endforeach
                        </select>
                        <label>Enter Title</label>
                        <input type="text" class="form-control clear" name="title" id="title">
                        <label>Enter Benificiary Name</label>
                        <input type="text" class="form-control clear" name="benificiary_name" id="benificiary_name">
                        <label>Enter The Amount Needed in USD</label>
                        <input type="text" class="form-control clear" name="needed_amount" id="needed_amount">
                        <label>Deadline</label>
                        <input type="date" class="form-control clear" name="deadline" id="deadline">
                        <label>Write the story behind the reason of creating the campaign</label>
                        <textarea name="story" class="form-control clear" id="story"></textarea>
                        <label>Thumbnail ( Image  size will be reduced to 350 * 280 px) </label>
                        <input type="file" class="form-control clear" name="thumbnail" id="thumbnail">
                        <label>Photo</label>
                        <input type="file" class="form-control clear" name="photo" id="photo">
                        <label>Video</label>
                        <input type="file" class="form-control clear" name="video" id="video">
                        <label>Proof Document</label>
                        <input type="file" class="form-control clear" name="proof_document" id="proof_document">

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