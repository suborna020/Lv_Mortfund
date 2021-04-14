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
                            <h3>Advertisement </h3>
                        </div>
                        <div class=" ml-auto d-flex ">
                            <div>
                                <button type="button" data-toggle="modal" data-target=".advertisementModal" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New Ad</button>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" small-box RightContainerTable table-responsive">
                            <table class="table table-striped table-borderless ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Ad For</th>
                                        <th scope="col">Ad Size </th>
                                        <th scope="col">Impression </th>
                                        <th scope="col">No. of Clicks</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody class="tableBody">
                                    {{-- <tr>
                                        <th scope="row">1</th>
                                        <td>Netflix</td>
                                        <td>300*600</td>
                                        <td>1245</td>
                                        <td>2</td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons  fa-lg fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fa-lg  fas fa-trash"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Netflix</td>
                                        <td>300*600</td>
                                        <td>1245</td>
                                        <td>2</td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons  fa-lg fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fa-lg  fas fa-trash"></i></span>
                                            </div>
                                        </td>
                                    </tr> --}}
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
    <script src="{{ url('adminAssets/js/Advertisement/adAdvertisement.js') }}"></script>
</div>

@endsection
