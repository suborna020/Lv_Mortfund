@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer">
    <div class="row ">
        <div class="col-lg-12 col-12 d-flex">
            <div class=" mr-auto">
                <h3>All Fundraise</h3>
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
            <div class=" RightContainerPaginationTable  table-responsive">
                <table class="table table-striped table-borderless tableSmallText1 myDataTable">
                    <thead>
                        <tr>
                            <th scope="col" class="col_1">#</th>
                            <th scope="col" class="spaceForTitle">Title</th>
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
        {{-- user name :{{$userInfoBox->admin_name}} --}}

    </div>
</div>

<script src="{{ url('adminAssets/js/Fundraisers/adAllFundRaise.js') }}"></script>



@endsection
