@extends('ui.layout.app')

@section('content')


 <div class="editFundraiser" style="margin-top:115px">
        <div class="container adjust-container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Create Fundraiser</h3>
                    <p style="color: red">{{session('msg')}}</p>
                    <hr>
                    <form action="/insertFundraiser" class="" method="POST" enctype="multipart/form-data">
                        @csrf
                        <select class="form-control" name="category_id">
                           <option value="">Select Category</option>
                           @foreach($categories as $category)
                           <option value="{{$category->id}}">{{$category->category_name}}</option>
                           @endforeach
                        </select>
                        <label>Enter Title</label>
                        <input type="text" class="form-control" name="title">
                        <label>Enter Benificiary Name</label>
                        <input type="text" class="form-control" name="benificiary_name">
                        <label>Enter The Amount Needed in USD</label>
                        <input type="text" class="form-control" name="needed_amount">
                        <label>Deadline</label>
                        <input type="date" class="form-control" name="deadline">
                        <label>Write the story behind the reason of creating the campaign</label>
                        <textarea id="" name="story" class="form-control"></textarea>
                        <label>Thumbnail ( Image  size will be reduced to 350 * 280 px) </label>
                        <input type="file" class="form-control" name="thumbnail">
                        <label>Photo</label>
                        <input type="file" class="form-control" name="photo">
                        <label>Video</label>
                        <input type="file" class="form-control" name="video">
                        <label>Proof Document</label>
                        <input type="file" class="form-control" name="proof_document">

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