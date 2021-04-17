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
                                <input type="text" class="form-control mySearchForm" placeholder="Search">
                            </div>
                            {{-- status check   --}}
                             {{-- <div class="form-group">
                                <select class="form-control AllFundRaiseCheckBox" id="">
                                    <option>Select</option>
                                    <option value="1">Active</option>
                                    <option value="0">Inactive</option>
                                </select>
                            </div> --}}
                            <div>
                                <button type="button" class=" searchButton whiteText  backgroundCerulean  font-weight-bold btn searchFormButton"> Search Category</button>
                            </div>
                            <div>
                            </div>
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
                                        <th scope="col" class="spaceForManage">Manage</th>
                                    </tr>
                                </thead>
                                <tbody class="tableBody">
                                    {{-- <tr>
                                        <th scope="row">1</th>
                                        <td>Mark</td>
                                        <td>
                                            <input type="hidden"  name="status" value="" id="fundRaiseCategoriesStatus" >
                                            <button type="button" class="btn btn-warning btn-sm categoriesStatus">Active</button>
                                        </td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                                <span><i class=" manageIcons fas fa-trash fa-lg"></i></span>
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
        
    <script src="{{ url('adminAssets/js/SuccessStories/adSuccessCategory.js') }}"></script>

@endsection
