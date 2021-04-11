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
                            <h3>Recent Fundraisers</h3>
                        </div>
                        <div class=" ml-auto d-flex rightSideElements">
                            <!-- SEARCH FORM -->
                            <div class="form-group has-search serchForm">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control mySearchForm" placeholder="Search">
                            </div>
                          
                            <div>
                                <button type="button" class=" searchButton whiteText  backgroundCerulean  font-weight-bold btn searchFormButton"> Search Fundraiser</button>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" small-box">
                            <button type="button" class=" orange_text font-weight-bold btn  btn-block addNewButton " data-toggle="modal" data-target=".fundRaiseModal" id=""><i class="fas fa-plus mr-1"></i> Add New Fundraiser</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" small-box RightContainerTable table-responsive">
                            <table class="table table-striped table-borderless  tableSmallText1">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Goal Amount</th>
                                        <th scope="col">Manages Amount</th>
                                        <th scope="col">Deadline</th>
                                        <th scope="col">Beneficiary Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="spaceForManage">Manage</th>
                                    </tr>
                                </thead>
                                <tbody class="FundRaiseTableBody">
                                    {{-- <tr>
                                        <th scope="row">1</th>
                                        <td> Save USA</td>
                                        <td>$2000.00</td>
                                        <td>$1000.00</td>
                                        <td>12/09/21</td>
                                        <td>charles McAvoy</td>
                                        <td><button type="button" class="btn btn-warning btn-sm categoriesStatus">Active</button></td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fas fa-trash"></i></span>
                                                <span><i class=" manageIcons fas fa-bell redText" data-toggle="tooltip"  title="Make Urgent"></i></span>

                                            </div>
                                        </td>
                                    </tr>
                                    --}}
                                </tbody>
                            </table>
                           
                        </div>

                    </div>
                    {{-- <br>admin session no :{{$admin_sessionData}} --}}
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
    <script src="{{ url('adminAssets/js/Fundraisers/adRecent.js') }}"></script>

</div>

@endsection
