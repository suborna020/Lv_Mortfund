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
                        <h3 class="mt-5 mb-3">Update Campaign</h3>
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
                        <form class="create-campaign_form form-group" action="/updateFundraiser/{{$get_fundraiser->id}}" id="updateFundraiser" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="input-icons">
                              <select class="form-control" name="category_id" id="category_id">
                                 <option value="{{$get_fundraiser->category_id}}">{{$get_fundraiser->categories->category_name}}</option>
                                 @foreach($categories as $category)
                                 <option value="{{$category->id}}">{{$category->category_name}}</option>
                                 @endforeach
                              </select>
                            </div>
                            <div class="input-icons">
                                <i class="fas fa-text-height"></i>
                                
                                <input type="text" class="input-field" name="title" id="title" value="{{$get_fundraiser->title}}">
                            </div>
                            <div class="input-icons">
                                <i class="fa fa-user"> </i>
                                <input type="text" class="input-field" name="benificiary_name" id="benificiary_name" value="{{$get_fundraiser->benificiary_name}}">
                                
                            </div>
                            <!-- updated -->
                            <div class="d-lg-flex">
                                <div class="input-icons mr-3">
                                    <i class="fas fa-dollar-sign"></i>
                                    
                                    <input type="text" class="input-field" name="needed_amount" id="needed_amount" value="{{$get_fundraiser->needed_amount}}">
                                </div>
                                <div style="background-color: #fff; border-radius: 3px; color: #000; "
                                    class="input-icons d-flex align-items-center p-2 font-weight-bold ">
                                    <i class="far fa-calendar"></i>
                                    <label class="m-0" for="Date of Birth">
                                        Deadline
                                        <input style="outline: none; border: none; font-weight: bold;" type="date" class="" name="deadline" id="deadline" value="{{$get_fundraiser->deadline}}">
                                    </label>
                                </div>
                            </div>
                            <div class="input-icons">
                                <textarea class="form-control clear" name="story" id="story"
                                    placeholder="Write the story behind the erasson to create this campaign"
                                    rows="5">{{$get_fundraiser->story}}</textarea>
                            </div>

                            <div class="im" style="width: 50px">
                              <img src="/uploads/{{$get_fundraiser->thumbnail}}" style="width: 100%;">
                            </div>


                            <div class="input-icons">
                                <label for="file-upload" class="custom-file-upload">
                                    Thumbnail <span style="color: grey !important">( image size will be reduce to 350 *
                                        210
                                        px )</span> <i class="fas fa-image"></i>
                                </label>
                                <input type="hidden" name="default_thumbnail" value="{{$get_fundraiser->thumbnail}}" class="form-control">
                                                               
                                <input class="thumbnail" name="thumbnail" id="file-upload" type="file" />
                            </div>


                            <div class="im" style="width: 50px">
                                <img src="/uploads/{{$get_fundraiser->photo}}" style="width: 100%;">
                              </div>

                            <div class="d-flex">

                                <div class="input-icons mr-3">
                                    <label for="photo-upload" class="custom-file-upload">
                                        Photo <i class="fas fa-image"></i>
                                    </label>
                                    <input type="hidden" name="default_photo" value="{{$get_fundraiser->photo}}" class="form-control">
                                    <input class="photo" name="photo" value="{{$get_fundraiser->photo}}" id="photo-upload" type="file" />
                                </div>
                                <div class="input-icons">
                                  <input type="hidden" name="default_video" value="{{$get_fundraiser->video}}" class="form-control">
                                    <label for="video-upload" class="custom-file-upload">
                                        Video <i class="fas fa-photo-video"></i>
                                    </label>
                                    <input class="video" name="video" id="video-upload" type="file" value="{{$get_fundraiser->video}}" />
                                </div>
                            </div>
                            <div class="im" style="width: 50px">
                              <img src="/uploads/{{$get_fundraiser->proof_document}}" style="width: 100%;">
                            </div>
                            <div class="input-icons">
                                <input type="hidden" name="default_proof_document" value="{{$get_fundraiser->proof_document}}" class="form-control">
                                
                                <label for="proof-upload" class="custom-file-upload">
                                    Proof Document <i class="fas fa-paperclip"></i>
                                </label>
                                <input class="proof_document" name="proof_document" id="proof-upload" type="file" value="{{$get_fundraiser->proof_document}}" />
                            </div>
                            <input type="hidden" name="" id="campaign_id" value="{{$get_fundraiser->id}}">
                            <div class="d-flex justify-content-between">
                                <button type="submit" class="btn create-campaign-btn">Update Campaign</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

 <script>
  $(document).ready(function() {
      $('#summernote').summernote();
  });
</script>


@endsection



