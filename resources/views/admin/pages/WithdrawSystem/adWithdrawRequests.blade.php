@extends('admin.layout.app')
@section('content')

            <div class="container-fluid mt-5 rightContainer">
                <div class="row ">
                    <div class="col-lg-12 col-12 d-flex">
                        <div class=" mr-auto">
                            <h3>Fund Raise Categories</h3>
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
                        <div class=" small-box RightContainerTable table-responsive tableSmallText1">
                            <table class="table table-striped table-borderless  ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Method</th>
                                        <th scope="col">User</th>
                                        <th scope="col">Payment Detail </th>
                                        <th scope="col">Payable Amount</th>
                                        <th scope="col">Charge</th>
                                        <th scope="col">Requested At</th>
                                        <th scope="col">Processing Time</th>
                                        <th scope="col" class="spaceForManage">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Paypal</td>
                                        <td>Yameed Irteza</td>
                                        <td>123456789</td>
                                        <td>$20.00</td>
                                        <td>$2.10</td>
                                        <td>09 Sep,2021</td>
                                        <td>3 days</td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-lg fa-check"></i></span>
                                                <span><i class=" manageIcons fa-lg fas fa-times"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Paypal</td>
                                        <td>Yameed Irteza</td>
                                        <td>123456789</td>
                                        <td>$20.00</td>
                                        <td>$2.10</td>
                                        <td>09 Sep,2021</td>
                                        <td>3 days</td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-lg fa-check"></i></span>
                                                <span><i class=" manageIcons fa-lg fas fa-times"></i></span>
                                            </div>
                                        </td>
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
         

@endsection
