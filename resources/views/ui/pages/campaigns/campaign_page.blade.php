@extends('ui.layout.app')

@section('content')

<div class="singleCampaign">
    <section class="singleCampaignBreadcrumb">
      <h3>Fundraiser Details</h3>
      <div class="breadcrumb">
        <span><i class="fas fa-home"></i>Home</span><span>></span><span>Category Name</span><span>></span><span>Fundraiser Name</span>
      </div>
    </section>
    <!-- Category Section Started -->

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
 

<script type="text/javascript">
    
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  $('#fundraisers').append('<img style="position: fixed; left: 45%; top: 20%; z-index: 100000;" src="/images/load.gif" />'); 
  var page = $(this).attr('href').split('all=')[1];
  var recent = $(this).attr('href').split('recent=')[1];
  var project_support = $(this).attr('href').split('project_support=')[1];
  fetch_data(page);
  fetch_recent_data(recent);
  fetch_project_data(project_support);
 });

 function fetch_data(page){
  $.ajax({
   url:"/fundraisers?all="+page,
   success:function(data)
   {
    $('#fundraisers').fadeOut( 100 , function() {
        $('#fundraisers').html(data);
    }).fadeIn( 500 );
   }
  });
 }

 function fetch_recent_data(recent){
  $.ajax({
   url:"/recent?recent="+recent,
   success:function(data)
   {
    $('#recent_fundraisers').fadeOut( 100 , function() {
        $('#recent_fundraisers').html(data);
    }).fadeIn( 500 );
   }
  });
 }

 function fetch_project_data(project_support){
  $.ajax({
   url:"/project_support?project_support="+project_support,
   success:function(data)
   {
    $('#support_project').fadeOut( 100 , function() {
        $('#support_project').html(data);
    }).fadeIn( 500 );
   }
  });
 }
 
});
</script>

@endsection