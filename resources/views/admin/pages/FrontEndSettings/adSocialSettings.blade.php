@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5">
            {{-- edaitable part  --}}
            <div class="row ">
                <div class="col-lg-12 col-12 d-flex">
                    <div class=" mr-auto">
                        <h3>Social Settings</h3>
                    </div>
                    <div class=" ml-auto d-flex ">
                        <div>
                            <button type="button" data-toggle="modal" data-target=".SocialSettingsModal" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New </button>
                        </div>
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
                                    <th scope="col" >name</th>
                                    <th scope="col" >Link</th>
                                    <th scope="col" >Display Photo</th>
                                    <th scope="col" class="spaceForManage">Manage</th>
                                </tr>
                            </thead>
                            <tbody class="FundRaiseTableBody">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Facebook</td>
                                    <td class="text-truncate">http/Lorem ipsum, dolor sit amet</td>
                                    <td>
                                        <a href={{asset("uploads/1.jpg")}} data-fancybox>
                                            <img src={{asset("uploads/1.jpg")}} class="smallRoundPic" />
                                        </a>
                                    </td>
                                    <td>
                                        <div>
                                            <span><i class=" manageIcons fa-lg fas fa-edit"></i></span>
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
