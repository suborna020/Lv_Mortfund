@extends('admin.layout.app')
@section('content')

            <div class="container-fluid mt-5 rightContainer">
                <div class="row ">
                    <div class="col-lg-12 col-12 d-flex">
                        <div class=" mr-auto">
                            <h3>Withdraw Methods</h3>
                        </div>
                        <div class=" ml-auto d-flex ">
                            <div>
                                <button type="button" data-toggle="modal" data-target="#AddNewCategory" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New Methods</button>
                            </div>
                            
                        </div>
                    </div>
                </div>
              
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" small-box RightContainerTable table-responsive">
                            <table class="table table-striped table-borderless tableSmallText1">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col"> Minimum Limit</th>
                                        <th scope="col">Maximum Limit </th>
                                        <th scope="col">Charge (%)</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="spaceForManage">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Paypal</td>
                                        <td>$10.00</td>
                                        <td>$500.00</td>
                                        <td>2.00</td>
                                        <td><button type="button" class="btn btn-warning btn-sm categoriesStatus">Active</button></td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fas fa-trash"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Paypal</td>
                                        <td>$10.00</td>
                                        <td>$500.00</td>
                                        <td>2.00</td>
                                        <td><button type="button" class="btn btn-warning btn-sm categoriesStatus">Active</button></td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fas fa-trash"></i></span>
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
