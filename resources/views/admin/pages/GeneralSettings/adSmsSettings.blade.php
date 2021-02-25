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
            <div class="container-fluid mt-4 px-5 rightContainer coloredInputsContainer" >
                <div class="row  ">
                    <div class="col-lg-9 col-md-9 col-9">
                        <div class=" small-box RightContainerTable table-responsive" style="padding: 12px !important;">
                            <table class="table table-striped table-borderless mb-0 ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Code</th>
                                        <th scope="col">Description</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>message</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>message</td>
                                        <td>Lorem, ipsum dolor sit amet consectetur</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
                <div class="row  ">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="username" placeholder="https://api.infoBip.com/api/v3/sendsms.plain?user=">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <span><i class=" manageIcons fas fa-edit "></i></span>
                        <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
               
                <br>
                <div class="modalBorder"></div>
                <div class=" my-4 mx-4 px-5 d-flex">
                    <button type="button" class="ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
                </div>

                <br> 
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
