@extends('ui.layout.app')

@section('content')


 <div class="featured" style="margin-top:115px">
        <div class="container adjust-container">
            <div class="row">
                <div class="col-md-12">
                    <h3>My Fundraisers</h3>
                    <p style="color: red">{{session('msg')}}</p>
                    <hr>
                    <h6>Find the course you are looking for by categories</h6>
                    <div class="current_fundraisers" id="current_fundraisers">
                        @include('ui.pages.users.user.current_fundraisers')
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


<script type="text/javascript">
    
$(document).ready(function(){

 $(document).on('click', '.pagination a', function(event){
  event.preventDefault();
  $('#current_fundraisers').append('<img style="position: fixed; left: 45%; top: 20%; z-index: 100000;" src="/images/load.gif" />'); 
  var current_fundraisers = $(this).attr('href').split('current=')[1];
  
  fetch_data(current_fundraisers);

 });

 function fetch_data(current_fundraisers){
  $.ajax({
   url:"/currentFundraisers?current="+current_fundraisers,
   success:function(data)
   {
    $('#current_fundraisers').fadeOut( 100 , function() {
        $('#current_fundraisers').html(data);
    }).fadeIn( 500 );
   }
  });
 }

});
</script>


@endsection