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
                            <h3>Language Manager</h3>
                        </div>
                        <div class=" ml-auto d-flex rightSideElements">
                            <!-- SEARCH FORM -->
                            <div class="form-group has-search serchForm">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control mySearchForm" placeholder="Search">
                            </div>
                            {{-- status check   --}}
                            <div class="form-group">
                                <select class="form-control AllFundRaiseCheckBox" id="">
                                    <option>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div>
                            <div>
                                <button type="button" class=" searchButton whiteText  backgroundCerulean  font-weight-bold btn searchFormButton"> Search Members</button>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class="">
                            <button type="button" data-toggle="modal" data-target="#AddNewLanguage" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New Language</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" RightContainerPaginationTable  table-responsive">
                            <table class="table table-striped table-borderless tableSmallText1 myDataTable">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Country</th>
                                        <th scope="col">Language</th>
                                        <th scope="col">Status</th>
                                        <th scope="col" class="spaceForManage">Manage</th>
                                    </tr>
                                </thead>
                                <tbody class="tableBody">

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
    <script src="{{ url('adminAssets/js/LanguageManager/AdLanguageManager.js') }}"></script>

</div>

@endsection
