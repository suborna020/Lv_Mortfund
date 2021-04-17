@extends('admin.layout.app')
@section('content')

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
                                <input type="text" class="form-control mySearchForm" placeholder="Search">
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
                                <tbody class="tableBody">

                                </tbody>
                            </table>
                        </div>

                    </div>

                </div>
            </div>
           
    <script src="{{ url('adminAssets/js/MemberSettings/adAllMembers.js') }}"></script>


@endsection
