@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5">
            {{-- edaitable part  --}}
            <div class="row ">
                <div class="col-lg-12 col-12 d-flex">
                    <div class=" mr-auto">
                        <h3>How It Works</h3>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 col-12 ">
                    <div class=" small-box RightContainerTable ">
                        <table class="table table-striped table-borderless tableSmallText1 ">
                            <thead>
                                <tr>
                                    <th scope="col" class="col_1">#</th>
                                    <th scope="col">Title</th>
                                    <th scope="col" style="width: 46%;">Icon</th>

                                    <th scope="col" class="spaceForManage">Manage</th>
                                </tr>
                            </thead>
                            <tbody class="FundRaiseTableBody">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Lorem ipsum, dolor sit amet</td>
                                    <td>
                                        <i class="fas fa-plus fa-2x"></i>
                                       {{--  <div class="d-flex">
                                            <div class=" customFileInput howItWFileUpDiv">
                                                 <input type="text" name="icon" class="btn blackText text-truncate icon icon-class-input singleItem" value="fa fa-music" required />
                                                <button type="button" class="btn btn-primary whiteText  backgroundCerulean  font-weight-bold btn picker-button"><i class="fas fa-plus mr-2"></i>Choose Icon</button> 
                                            </div>
                                        </div> --}}
                                    </td>


                                    <td>
                                        <div>
                                            <span data-toggle="modal" data-target=".adHowItWorksModal"><i class=" manageIcons fa-lg fas fa-edit"></i></span>
                                            <span><i class=" manageIcons fa-lg fas fa-trash"></i></span>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                </div>
            </div>


            <br>
            {{-- edaitable part  end --}}
        </div>

    </div>


</div>

{{-- <script src="{{ url('adminAssets/js/Advertisement/adAdvertisement.js') }}"></script> --}}

@endsection
