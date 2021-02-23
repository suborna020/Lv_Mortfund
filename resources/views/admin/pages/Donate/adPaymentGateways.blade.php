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
                    <div class="col-lg-3 col-3 ">
                        <!-- small box -->
                        <div class="small-box paymentContainerBox">
                            <div class="inner  text-center">
                                <div>Paypal</div>
                                <div class=" mx-auto mb-0  paymentContainerBoxBorder"></div>
                                <div class=" ">
                                    <img src="{{asset("adminAssets/img/Paypal.svg")}}" alt="icon" class=" paymentContainerBoxImg" />
                                </div>
                                <div>Status</div>
                                <div class="form-group">
                                    <select class="form-control smallSelectbox"  name="sellist1">
                                        <option>Active</option>
                                        <option>Deactive</option>
                                    </select>
                                </div>
                                <div>Details</div>
                                <div class="myBadgey">Rate: <span class="amountTextColor">$ 1= 84 BDT</span> </div>
                                <div class="myBadgey">Min Limit: <span class="amountTextColor">$5.00</span> </div>
                                <div class="myBadgey">Max Limit: <span class="amountTextColor">$1000.00</span> </div>
                                <div class="myBadgey">Charge: <span class="amountTextColor"> 2.52 %</span> </div>
                                <div class=" mx-auto paymentContainerBoxBorder"></div>
                                <div> <button type="button" class="btn whiteText py-0 orangeBackground  ">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>

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
