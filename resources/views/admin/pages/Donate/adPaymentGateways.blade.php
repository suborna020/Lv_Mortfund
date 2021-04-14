@extends('admin.layout.app')
@section('content')
<div class="wrapper">

    <!-- Navbar -->

    @include('admin.layout.components.aHeader')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    @include('admin.layout.components.leftAsideBar')
    @include('admin.layout.components.frontEndSettingsSideBar')

    <!-- Content Wrapper. Contains page content -->

    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">
            <div class="container-fluid mt-5 rightContainer">
                <div class="row  ">
                   
                    @foreach($paymentGatewaysBox as $key => $paymentGatewaysBox)
                    <div class="col-lg-3 col-3 ">
                        <div class="small-box paymentContainerBox">
                            <div class="inner  text-center">
                                <div>{{$paymentGatewaysBox->gateway_name}}</div>
                                <div class=" mx-auto mb-0  paymentContainerBoxBorder"></div>
                                <div class=" ">
                                    <a href="../uploads/{{$paymentGatewaysBox->gateway_photo}}" data-fancybox>
                                        <img src="/uploads/{{$paymentGatewaysBox->gateway_photo}}" class="paymentContainerBoxImg" />
                                    </a>
                                    {{-- <img src="{{asset("adminAssets/img/Paypal.svg")}}" alt="icon" class=" paymentContainerBoxImg" /> --}}
                                </div>
                                <div>Status</div>
                                <div class="form-group">
                                    <select class="form-control smallSelectbox" name="status">
                                        <option value="1" {{ $paymentGatewaysBox->status == 1 ? "selected" :""}}>Active</option>
                                        <option value="0" {{ $paymentGatewaysBox->status == 0 ? "selected" :""}}>Deactive</option>
                                    </select>
                                </div>
                                <div>Details</div>
                                <div class="myBadgey">Rate: <span class="amountTextColor">$ {{$paymentGatewaysBox->rate}} = 84 BDT</span> </div>
                                <div class="myBadgey">Min Limit: <span class="amountTextColor">${{$paymentGatewaysBox->min_limit}}</span> </div>
                                <div class="myBadgey">Max Limit: <span class="amountTextColor">${{$paymentGatewaysBox->max_limit}}</span> </div>
                                <div class="myBadgey">Charge: <span class="amountTextColor"> {{$paymentGatewaysBox->charge}} %</span> </div>
                                <div class=" mx-auto paymentContainerBoxBorder"></div>
                                <div> <button type="button" class="btn whiteText py-0 orangeBackground  ">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach




                </div>
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
</div>

@endsection
