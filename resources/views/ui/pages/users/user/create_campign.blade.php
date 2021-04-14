@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/create-campaign.css')}}" rel="stylesheet">
@endsection

@section('content')


    <section class="create-campaign" style="margin-top: 115px">
        <div class="create-campaign_img"></div>
        <div class="container-fluid">
            <div class="row create-campaign_contentwrapper">
                <div class="col-xl-4  col-md-4 col-xs-12  p-0">
                    <div class="create-campaign_left ">
                        <h3 class="mt-5 mb-3">Create A Campaign</h3>
                        <p class="h2">
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed quo
                            nesciunt quidem minima? Similique Lorem ipsum Lorem ipsum dolor sit amet consectetur
                            adipisicing elit. A, iusto!
                        </p>
                    </div>
                </div>
                <!-- line -->
                <div class="col-xl-1 col-md-1 d-flex align-items-center mb-5 p-0">
                    <div class="create-campaign_line"></div>
                </div>
                <!-- form -->
                <div class="col-xl-7 col-md-7 col-xs-12 p-0">
                    <div class="create-campaign_right">
                        <form class="create-campaign_form form-group" action="/insertFundraiser" id="insertFundraiser" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-icons">
                                <select class="form-control" name="category_id" id="category_id">
                                   <option value="">Select Category</option>
                                   @foreach($categories as $category)
                                   <option value="{{$category->id}}">{{$category->category_name}}</option>
                                   @endforeach
                                </select>
                            </div>
                            <div class="input-icons">
                                <i class="fas fa-text-height"></i>
                                <input class="input-field clear" name="title" id="title" type="text" placeholder="Enter title" />
                            </div>
                            <div class="input-icons">
                                <i class="fa fa-user"> </i>
                                <input class="input-field clear" name="benificiary_name" id="benificiary_name" type="text" placeholder="Enter benificiary name" />
                            </div>
                            <!-- updated -->
                            <div class="d-lg-flex">
                                <div class="input-icons mr-3">
                                    <i class="fas fa-dollar-sign"></i>
                                    <input class="input-field clear" name="needed_amount" id="needed_amount" type="number"
                                        placeholder="Enter the amount needed in USD" />
                                </div>
                                <div style="background-color: #fff; border-radius: 3px; color: #000; "
                                    class="input-icons d-flex align-items-center p-2 font-weight-bold ">
                                    <i class="far fa-calendar"></i>
                                    <label class="m-0" for="Date of Birth">
                                        Deadline
                                        <input style="outline: none; border: none; font-weight: bold;" type="date" class="clear" name="deadline" id="deadline">
                                    </label>
                                </div>
                            </div>
                            <div class="input-icons">
                                <textarea class="form-control clear" name="story" id="story"
                                    placeholder="Write the story behind the erasson to create this campaign"
                                    rows="5"></textarea>
                            </div>

                            <div class="input-icons">
                                <label for="file-upload" class="custom-file-upload">
                                    Thumbnail <span style="color: grey !important">( image size will be reduce to 350 *
                                        210
                                        px )</span> <i class="fas fa-image"></i>
                                </label>
                                <input class="thumbnail clear" name="thumbnail" id="file-upload" type="file" />
                            </div>
                            <div class="d-flex">
                                <div class="input-icons mr-3">
                                    <label for="photo-upload" class="custom-file-upload">
                                        Photo <i class="fas fa-image"></i>
                                    </label>
                                    <input class="photo clear" name="photo" id="photo-upload" type="file" />
                                </div>
                                <div class="input-icons">
                                    <label for="video-upload" class="custom-file-upload">
                                        Video <i class="fas fa-photo-video"></i>
                                    </label>
                                    <input  class="video clear" name="video" id="video-upload" type="file" />
                                </div>
                            </div>
                            <div class="input-icons">
                                <label for="prood-upload" class="custom-file-upload">
                                    Proof Document <i class="fas fa-paperclip"></i>
                                </label>
                                <input class="proof_document clear" name="proof_document" id="prood-upload" type="file" />
                            </div>
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn create-campaign-btn">Create Campaign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>







{{--   

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

--}}
 <script>
  $(document).ready(function() {
      $('#summernote').summernote();
  });
</script>


@endsection