@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5">
            {{-- edaitable part  --}}
            <div class="row ">
                <div class="col-lg-12 col-12 d-flex">
                    <div class=" mr-auto">
                        <h3>Support</h3>
                    </div>
                    <div class=" ml-auto d-flex ">
                        <div>
                            <button type="button" data-toggle="modal" data-target=".successStoriesListModal" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New </button>
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
                                    <th scope="col">Questions</th>
                                    <th scope="col">Answers</th>
                                    <th scope="col" class="spaceForManage">Manage</th>
                                </tr>
                            </thead>
                            <tbody class="FundRaiseTableBody">
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Lorem ipsum, dolor sit amet</td>
                                    <td>Lorem ipsum, dolor sit amet</td>

                                 
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


            <div class="row ">
                <div class="col-lg-12 col-12 d-flex">
                    <div class=" mr-auto">
                        <h3>Subscription</h3>
                    </div>
                   
                </div>
            </div>
            <div class="row  my-4 coloredInputsContainer">
                <div class="col-lg-12 col-md-12 col-12">
                    <form method="post"  enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mt-3">
                            <input type="text" class="form-control " name="username" placeholder="Enter Subscription title">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-align-top fa-lg blurText"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mt-3">
                            <textarea class="form-control formInputValue customizeInputField" rows="3" id="textArea" name="message" placeholder="Enter Subscription text"></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                </div>
                            </div>
                        </div>

                        <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold ml-auto d-flex"><i class="fas fa-plus mr-1"></i>Save</button>
                    </form>
                </div>
            </div>
            {{-- edaitable part  end --}}
        </div>

    </div>


</div>

{{-- <script src="{{ url('adminAssets/js/Advertisement/adAdvertisement.js') }}"></script> --}}

@endsection
