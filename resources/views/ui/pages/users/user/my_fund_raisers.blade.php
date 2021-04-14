@extends('ui.layout.app')

@section('content')


 <div class="featured" style="margin-top:115px">
        <div class="container adjust-container">
          <div class="row">
             <div class="withdraw-methods_heading mx-auto text-center w-50">
                     <h4>My Fundraisers</h4>
                     <p style="color: #7a7a7a; font-weight: 600; font-size: 18px;">
                         Lorem ipsum dolor sit
                         amet, consectetur
                         adipisicing elit.
                         Officiis sint a
                         atque neque, deserunt error
                         at architecto</p>
                 </div>
          </div>
          <br>
          <br>
          @if(session()->has('msg'))
          <div class="alert alert-success" role="alert">
            {{session('msg')}}
          </div>
          @endif
            <div class="row">
                
                <div class="col-md-12">
                    
                    <div class="current_fundraisers" id="current_fundraisers">
                        @include('ui.pages.users.user.current_fundraisers')
                    </div>
                    
                </div>
            </div>
        </div>
    </div>


<!-- Delete Task Modal -->
<div class="modal fade deleteCampaign" id="deleteCampaign" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form id="deleteTaskForm">
           @csrf
           <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Delete Task</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
              <p>Are you sure You want to Delete <span id="delete_task_name"></span> ?</p>
              <span id="delete_task_id" style="display: none"></span>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="delete" class="btn btn-danger">Confirm Delete</button>
          </div>
       </form>
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