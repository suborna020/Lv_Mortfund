@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5 ">
            {{-- edaitable part  --}}
            <div class="container-fluid mt-5 rightContainer">
                <div class="row ">
                    <div class="col-lg-12 col-12 d-flex">
                        <div class=" mr-auto">
                            <h3>Team</h3>
                        </div>
                        <div class=" ml-auto d-flex rightSideElements">
                            <!-- SEARCH FORM -->
                            <div class="form-group has-search serchForm">
                                <span class="fa fa-search form-control-feedback"></span>
                                <input type="text" class="form-control mySearchForm" placeholder="Search">
                            </div>

                            <div>
                                <button type="button" class=" searchButton whiteText  backgroundCerulean  font-weight-bold btn searchFormButton"> Search Team</button>
                            </div>
                            <div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class="">
                            <button type="button" data-toggle="modal" data-target=".adTeamModal" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New Member</button>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 col-12 ">
                        <div class=" small-box RightContainerTable tableSmallText1 table-responsive overFlowTable">
                            <table class="table table-striped table-borderless ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Name</th>
                                        <th scope="col">Designation</th>
                                        <th scope="col">Facebook</th>
                                        <th scope="col">Linkedin</th>
                                        <th scope="col">Twitter</th>
                                        <th scope="col">Instagram</th>
                                        <th scope="col">Display Photo</th>
                                        <th scope="col" class="spaceForManage">Manage</th>
                                    </tr>
                                </thead>
                                <tbody class="tableBody">
                                    {{--  <tr>
                                        <th scope="row">1</th>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td>Lorem ipsum dolor sit amet.</td>
                                        <td class="text-truncate">Lorem ipsum dolor sit amet consec.</td>
                                        <td class="text-truncate">Lorem ipsum dolor sit amet.</td>
                                        <td class="text-truncate">Lorem ipsum dolor sit amet consec.</td>
                                        <td class="text-truncate">Lorem ipsum dolor sit amet.</td>
                                        <td>
                                            <a href={{asset("adminAssets/img/addFundraisersProofDocument/1.jpg")}} data-fancybox>
                                                <img src={{asset("uploads/1.jpg")}} class="smallRoundPic" />
                                            </a>
                                        </td>
                                        <td>
                                            <div>
                                                <span><i class=" manageIcons  fa-lg fas fa-edit"></i></span>
                                                <span><i class=" manageIcons fa-lg  fas fa-trash"></i></span>
                                            </div>
                                        </td>
                                    </tr>  --}}


                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
            <br>
            {{-- edaitable part  end --}}
        </div>

    </div>


</div>

<script src="{{ url('adminAssets/js/FrontEndSettings/adTeam.js') }}"></script>


@endsection
