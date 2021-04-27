@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer">
    <div class="row ">
        <div class="col-lg-12 col-12 d-flex">
            <div class=" mr-auto">
                <h3> Withdraw Requests</h3>
            </div>
            <div class=" ml-auto d-flex rightSideElements">
                <!-- SEARCH FORM -->
                <div class="form-group has-search serchForm">
                    <span class="fa fa-search form-control-feedback"></span>
                    <input type="text" class="form-control mySearchForm" placeholder="Search">
                </div>

                <div>
                    <button type="button" class=" searchButton whiteText  backgroundCerulean  font-weight-bold btn searchFormButton"> Search Method</button>
                </div>
                <div>
                </div>
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
                            <th scope="col">Method</th>
                            <th scope="col">User</th>
                            <th scope="col">Transection ID </th>
                            <th scope="col">Payable Amount</th>
                            <th scope="col">Charge</th>
                            <th scope="col">Requested At</th>
                            <th scope="col">Processing Time</th>
                            <th scope="col" class="spaceForManage">Manage</th>
                        </tr>
                    </thead>
                    <tbody class="tableBody">
                        {{--  <tr>
                            <th scope="row">1</th>
                            <td>Paypal</td>
                            <td>Yameed Irteza</td>
                            <td>123456789</td>
                            <td>$9.00</td>
                            <td>$2.10</td>
                            <td>09 Sep,2021</td>
                            <td>3 days</td>
                            <td>
                                <div>
                                    <span><i class=" manageIcons fas fa-lg fa-check"></i></span>
                                    <span><i class=" manageIcons fa-lg fas fa-times"></i></span>
                                </div>
                            </td>
                        </tr>  --}}
                      
                    </tbody>
                </table>

            </div>

        </div>
    </div>
    <!-- /.row -->
</div>

<script src="{{ url('adminAssets/js/WithdrawSystem/adWithdrawRequests.js') }}"></script>



@endsection
