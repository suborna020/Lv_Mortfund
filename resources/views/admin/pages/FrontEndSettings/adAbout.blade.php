@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5 coloredInputsContainer adAboutContainer">
            {{-- edaitable part  --}}
            <div class="row ">
                <div class="col-lg-5 col-5 col-sm-5">
                    <div class=" customFileInput">
                        <input type="file" class="fileName formInputValue formFileInput" name="image" accept="image/*" required>
                        <button type="button" class="btn whiteText  backgroundCerulean  font-weight-bold  copiedFilename copiedFilenameButton  AdPhotoButton"><i class="fas fa-plus mr-1"></i> Upload About Image/Photo</button>
                    </div>
                </div>
                <div class="col-lg-7 col-7 col-sm-7 px-0 d-flex orange_text">
                    <div class="pr-2"><i class="bi bi-info-circle fa-lg"></i></div>
                    <div class=""> An Image or a video can be uploaded</div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-10">
                    <div class="input-group ">
                        <input type="text" class="form-control " name="username" placeholder="Enter about title">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-align-top fa-lg blurText"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <span><i class=" manageIcons fas fa-edit "></i></span>
                    <span><i class=" manageIcons fas fa-trash"></i></span>
                </div>
            </div>
            <div class="row mt-4 ">
                <div class="col-lg-10 col-md-10 col-10">
                    <div class="form-group input-group">
                        <textarea class="form-control formInputValue customizeInputField" rows="4" id="textArea" name="message" placeholder="Enter about text"></textarea>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <span><i class=" manageIcons fas fa-edit "></i></span>
                    <span><i class=" manageIcons fas fa-trash"></i></span>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-10 col-md-10 col-10">
                    <div class="input-group ">
                        <input type="text" class="form-control " name="username" placeholder="Enter about secondary title">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <i class="bi bi-align-top fa-lg blurText"></i>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2 col-md-2 col-2 my-auto">
                    <span><i class=" manageIcons fas fa-edit "></i></span>
                    <span><i class=" manageIcons fas fa-trash"></i></span>
                </div>
            </div>
            <br> <br>
            <div class="row ">
                <div class="col-lg-12 col-12 d-flex">
                    <div class=" mr-auto">
                        <h4>Enter about secondary points</h4>
                    </div>
                    <div class=" ml-auto d-flex ">
                        <div>
                            <button type="button" data-toggle="modal" data-target=".successStoriesListModal" class=" orange_text font-weight-bold btn  btn-sm addNewButton smallText"><i class="fas fa-plus mr-1"></i> Add New </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row tableSmallText1">
                <div class=" col-12 ">
                    <div class="row" style="justify-content: space-between;">
                        <div class=" col-6 d-flex">
                            <i class="bi bi-circle-fill boldIcon"></i>
                            <div class="text-truncate">1Lorem ipsum dolor sit amet.</div>
                            <div class="col-lg-4 col-md-4 col-4 ml-auto">
                                <span><i class=" manageIcons fas fa-edit "></i></span>
                                <span><i class=" manageIcons fas fa-trash"></i></span>
                            </div>
                        </div>
                        <div class=" col-6 d-flex">
                            <i class="bi bi-circle-fill boldIcon"></i>
                            <div class="text-truncate">2Lorem ipsum dolor sit amet.</div>
                            <div class="col-lg-4 col-md-4 col-4 ml-auto">
                                <span><i class=" manageIcons fas fa-edit "></i></span>
                                <span><i class=" manageIcons fas fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                    <div class="row" style="justify-content: space-between;">
                        <div class=" col-6 d-flex">
                            <i class="bi bi-circle-fill boldIcon"></i>
                            <div class="text-truncate">3Lorem ipsum dolor sit amet.</div>
                            <div class="col-lg-4 col-md-4 col-4 ml-auto">
                                <span><i class=" manageIcons fas fa-edit "></i></span>
                                <span><i class=" manageIcons fas fa-trash"></i></span>
                            </div>
                        </div>
                        <div class=" col-6 d-flex">
                            <i class="bi bi-circle-fill boldIcon"></i>
                            <div class="text-truncate">4Lorem ipsum dolor sit amet.</div>
                            <div class="col-lg-4 col-md-4 col-4 ml-auto">
                                <span><i class=" manageIcons fas fa-edit "></i></span>
                                <span><i class=" manageIcons fas fa-trash"></i></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <br><br>
            <div class="modalBorder"></div>
            <div class=" my-4 mx-4 px-5 d-flex">
                <button type="button" class="ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
            </div>

            <br>
            {{-- edaitable part  end --}}
        </div>

    </div>


</div>

{{-- <script src="{{ url('adminAssets/js/Advertisement/adAdvertisement.js') }}"></script> --}}

@endsection
