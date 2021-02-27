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
                            <h3>Success Stories List</h3>
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
                            <table class="table table-striped table-borderless tableSmallText1 ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Title</th>
                                        <th scope="col">Author</th>
                                        <th scope="col">Date</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit</td>
                                        <td>tempora in explicabo</td>
                                        <td>12/09/21</td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fa-lg fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fa-lg fas fa-trash"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Lorem ipsum, dolor sit amet consectetur adipisicing elit</td>
                                        <td>tempora in explicabo</td>
                                        <td>12/09/21</td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fa-lg fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fa-lg fas fa-trash"></i></span>
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