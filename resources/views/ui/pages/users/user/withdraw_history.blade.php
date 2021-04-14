@extends('ui.layout.app')

@section('head-script')
    <link href="{{asset('css/new/withdraw-history.css')}}" rel="stylesheet">
@endsection

@section('content')

 <section class="breadcrumb-bg">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <h4>Withdraw History</h4>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <i class="fa fa-home fa-2x home-icon" aria-hidden="true"></i>
                        <li class="breadcrumb-item"><a href="{{url('/')}}">Home</a></li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Dashboard</li>
                        <li><i class="fa fa-angle-right fa-1x angle" aria-hidden="true"></i></li>
                        <li class="breadcrumb-item active" aria-current="page">Withdraw History</li>
                    </ol>
                </nav>

            </div>
        </div>
    </section>



    <section class="withdraw-history py-5">
        <div class="container">
            <!-- heading -->
            <div class="withdraw-methods_heading mx-auto text-center w-50">
                <h4>Withdraw History</h4>
                <p style="color: #7a7a7a; font-weight: 700;">
                    Lorem ipsum dolor sit
                    amet, consectetur
                    adipisicing elit.
                    Officiis sint a
                    atque neque, deserunt error
                    at architecto</p>
            </div>
            <div class="pt-4"></div>
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-hover table-borderless font-weight-bold ">
                                    <thead>
                                        <tr style="color: #696969; ">
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th class="text-center" scope="col">Withdraw Method</th>
                                            <th class="text-center" scope="col">Withdraw Amount</th>
                                            <th class="text-center" scope="col">Time & Date</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($withdraw_history as $withdraw_history_list)
                                        <tr>
                                            <th scope="row">{{$withdraw_history_list->id}}</th>
                                            <td>
                                                <div class="d-flex">
                                                    <div
                                                        style="border: 3px solid #f8800b; height: 20px; width: 20px; border-radius: 50%; display: flex; align-items: center; justify-content: center; margin-right: 10px; ">
                                                        <div class="profile_icon">
                                                            <i class="fa fa-user"> </i>
                                                        </div>
                                                    </div>
                                                    <p class="m-0">{{$withdraw_history_list->Members->name}}</p>
                                                </div>
                                            </td>
                                            <td class="text-center">{{$withdraw_history_list->paymentmthods->gateway_name}}</td>

                                            <td class="text-center"><i class="fas fa-dollar-sign"></i>{{$withdraw_history_list->amount}}</td>
                                            <td class="text-center">{{$withdraw_history_list->created_at}}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div style="background-color: #fff; " class=" card-footer d-flex justify-content-end
                            align-items-end m-2">
                            <form action="{{url('deleteWithdrawHistory')}}" class="clear_history" method="GET">
                               <button style="background-color: #f8800b; padding: 5px 20px; color: #fff; font-weight: 500;"
                                class="btn" type="submit" data-toggle="modal" data-target="#exampleModal">Clear Withdraw
                                History</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection