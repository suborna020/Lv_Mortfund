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
            <div class="container-fluid mt-5  rightContainer coloredInputsContainer">
                <div class="row mt-4 px-5">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="username" placeholder="Enter website title">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-align-top fa-lg blurText"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                            <span><i class=" manageIcons fas fa-edit "></i></span>
                            <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row mt-4 px-5">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="username" placeholder="Enter base currency text">
                          
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                            <span><i class=" manageIcons fas fa-edit "></i></span>
                            <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row mt-4 px-5">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="username" placeholder="Enter base currency symbol">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                            <span><i class=" manageIcons fas fa-edit "></i></span>
                            <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row mt-4 px-5">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="username" placeholder="Enter name for receiving emails, ex: mortfund@noreply.com">
                           
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                            <span><i class=" manageIcons fas fa-edit "></i></span>
                            <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row mt-4 px-5">
                    <div class="col-lg-3 col-md-3 col-3">
                        <div class="custom-control custom-switch">
                            <input type="checkbox" class="custom-control-input" id="switch1" name="example">
                            <label class="custom-control-label" for="switch1">Toggle me</label>
                          </div>
                    </div>
                    <div class="col-lg-3 col-md-3 col-3">
                          hi
                    </div>
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
