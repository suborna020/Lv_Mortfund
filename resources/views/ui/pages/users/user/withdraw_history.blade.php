@extends('ui.layout.app')

@section('content')

<div class="container" style="margin-top: 115px">
   <div class="row">
   	   <div class="col-12 col-md-12">
   	   	  <h3 style="text-align: center;">Withdraw History</h3>
   	   	  <p style="text-align: center;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
   	   	  tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
   	   	  quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
   	   	  consequat. Duis aute irure dolor .</p>
   	   </div>

   	   <div class="col-12 col-md-12">
   	   	  <div class="row">
              <table class="table">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Name</th>
                      <th>Withdraw Method</th>
                      <th>Withdrawn Amount</th>
                      <th>Time & Date</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($withdraw_history as $withdraw_history_list)
                    <tr>
                       <td>{{$withdraw_history_list->id}}</td>
                       <td>{{$withdraw_history_list->Members->name}}</td>
                       <td>{{$withdraw_history_list->payment_method}}</td>
                       <td>{{$withdraw_history_list->payment_details}}</td>
                       <td>{{$withdraw_history_list->created_at}}</td>
                    </tr>
                    @endforeach
                  </tbody>
              </table>

              <form action="{{url('deleteWithdrawHistory')}}" class="clear_history" method="GET">
                  <button type="submit" class="btn btn-warning pull-right">Clear Withdraw History</button>
              </form>
          </div>
   	   </div>
  </div>
</div>


  
@endsection