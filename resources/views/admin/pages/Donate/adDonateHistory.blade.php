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
                <div class="row ">
                    <div class="col-lg-12 col-12 d-flex">
                        <div class=" mr-auto">
                            <h3>Donate History</h3>
                        </div>
                        <div class=" ml-auto d-flex rightSideElements">
                            <!-- SEARCH FORM -->
                            <div class="form-group has-search serchForm">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search">
                            </div>
                            <div>
                                <form action="/action_page.php">
                                    <div class="form-group">
                                        <select class="form-control" id="sel1" name="sellist1">
                                            <option>Active</option>
                                            <option>2</option>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div>
                                <button type="button" class=" searchButton whiteText  backgroundCerulean  font-weight-bold btn   "> Search Category</button>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" small-box RightContainerTable table-responsive">
                            <table class="table table-striped table-borderless tableSmallText1 ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Trans. ID</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">Charge</th>
                                        <th scope="col">Payment Method</th>
                                        <th scope="col">Requested At</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>1123CD5513</td>
                                        <td>Yameen Irteza Hossain</td>
                                        <td>$20</td>
                                        <td>6.89%</td>
                                        <td><button type="button" class="btn whiteText py-0 orangeBackground btn-sm ">Paystack</button></td>
                                        <td>03:15 PM on Wednessday 30/11/2020</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>1123CD5513</td>
                                        <td>Yameen Irteza Hossain</td>
                                        <td>$20</td>
                                        <td>6.89%</td>
                                        <td><button type="button" class="btn whiteText orangeBackground py-0 btn-sm ">Stripe</button></td>
                                        <td>03:15 PM on Wednessday 30/11/2020</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{-- <br>admin session no :{{$admin_sessionData}} --}}
                    {{-- user name :{{$userInfoBox->admin_name}} --}}

                </div>
                <!-- /.row -->
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
