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
                        <div class="">
                            <button type="button" data-toggle="modal" data-target="#AddNewCategory" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New Category</button>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" small-box RightContainerTable table-responsive">
                            <table class="table table-striped table-borderless  ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Status</th>
                                        <th scope="col">Manage</th>
                                    </tr>
                                </thead>
                                <tbody id="fundRaiseCategoriesBody<">
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td><button type="button" class="btn btn-warning btn-sm categoriesStatus">Active</button></td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                                <span><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th scope="row">2</th>
                                        <td>Mark</td>
                                        <td><button type="button" class="btn btn-warning btn-sm categoriesStatus">Active</button></td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                                <span><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{-- <br>admin session no :{{$admin_sessionData}} --}}
                    user name :{{$userInfoBox->admin_name}}

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
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }

    })

    function allData() {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/alldata"
            , success: function(allData) {
                var getHtml = ""
                $.each(allData, function(key, allDatavalue) {
                    // console.log(allDatavalue);
                    getHtml += `<tr>
                                <td>${allDatavalue.id}</td>
                                <td>${allDatavalue.name}</td>
                                <td>${allDatavalue.title}</td>
                                <td>${allDatavalue.institute}</td>
                                <td>
                                <button class="btn btn-sm btn-primary mr-2" onclick='editData(${allDatavalue.id})'>Edit</button>
                                <button class="btn btn-sm btn-danger mr-2" onclick='deleteData(${allDatavalue.id})'>Delete</button>
                                </td>
                                </tr>`
                })
                $('#fundRaiseCategoriesBody').html(getHtml);

            }
        })
    }
    allData();

</script>

@endsection
