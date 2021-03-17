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
                            <h3>All Members</h3>
                        </div>
                        <div class=" ml-auto d-flex rightSideElements">
                            <!-- SEARCH FORM -->
                            <div class="form-group has-search serchForm">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control" placeholder="Search ">
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
                                <button type="button" class=" searchButton whiteText  backgroundCerulean  font-weight-bold btn   "> Search Members</button>
                            </div>
                            <div>
                            </div>
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
                                        <th scope="col">Name</th>
                                        <th scope="col">Adress</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Phone</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Yameen Irteza</td>
                                        <td>House #154,Road no 4,Mohammadia Society</td>
                                        <td>Yameen_iteza@gmail.com</td>
                                        <td>+88013122454</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Yameen Irteza</td>
                                        <td>House #154,Road no 4,Mohammadia Society</td>
                                        <td>Yameen_iteza@gmail.com</td>
                                        <td>+88013122454</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">3</th>
                                        <td>Yameen Irteza</td>
                                        <td>House #154,Road no 4,Mohammadia Society</td>
                                        <td>Yameen_iteza@gmail.com</td>
                                        <td>+88013122454</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">4</th>
                                        <td>Yameen Irteza</td>
                                        <td>House #154,Road no 4,Mohammadia Society</td>
                                        <td>Yameen_iteza@gmail.com</td>
                                        <td>+88013122454</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">5</th>
                                        <td>Yameen Irteza</td>
                                        <td>House #154,Road no 4,Mohammadia Society</td>
                                        <td>Yameen_iteza@gmail.com</td>
                                        <td>+88013122454</td>

                                    </tr>
                                    <tr>
                                        <th scope="row">6</th>
                                        <td>Yameen Irteza</td>
                                        <td>House #154,Road no 4,Mohammadia Society</td>
                                        <td>Yameen_iteza@gmail.com</td>
                                        <td>+88013122454</td>
                                    </tr>
                                    <tr>
                                        <th scope="row">7</th>
                                        <td>Yameen Irteza</td>
                                        <td>House #154,Road no 4,Mohammadia Society</td>
                                        <td>Yameen_iteza@gmail.com</td>
                                        <td>+88013122454</td>
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
