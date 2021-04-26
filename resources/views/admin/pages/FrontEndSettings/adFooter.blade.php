@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5 coloredInputsContainer">
            {{-- edaitable part  --}}
                <form id="FooterForm" class="mysummernote" method="post" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row  mt-3">
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="footer_logo_content_primary" placeholder="Enter Footer Logo Content" value="{{($Footer->footer_logo_content_primary)?? '' }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-6">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="footer_logo_content_secondary" placeholder="Enter Footer Logo Secondary Content" value="{{($Footer->footer_logo_content_secondary)?? '' }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class=" col-12">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="copyright_text" placeholder="Enter copyright Text" value="{{($Footer->copyright_text)?? '' }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-copyright fa-lg blurText"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-12">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="follow_text" placeholder="Enter follow Text" value="{{($Footer->follow_text)?? '' }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row tableSmallText1 mt-4">
                    <div class=" col-4 ">
                        <h6>About</h6>
                        <div class="row my-2">
                            <div class=" col-12 px-2 d-flex">
                                <div>
                                    <i class="bi bi-circle-fill boldIcon"></i>
                                    How it Works
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 ml-1 d-flex">
                                    <span><i class=" manageIcons fas fa-edit "></i></span>
                                    <span><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class=" col-12 px-2 px-2 d-flex">
                                <i class="bi bi-circle-fill boldIcon"></i>Explore
                                <div class="col-lg-2 col-md-2 col-2  ml-1 d-flex">
                                    <span><i class=" manageIcons fas fa-edit "></i></span>
                                    <span><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" data-toggle="modal" data-target=".FooterAboutModal" class=" orange_text font-weight-bold btn  btn-block addNewButton smallText" style="width: fit-content;"><i class="fas fa-plus mr-1"></i> Add New </button>
                        </div>
                    </div>
                    <div class=" col-4 ">
                        <h6>Categories</h6>
                        <div class="row my-2">
                            <div class=" col-12 px-2 d-flex">
                                <div>
                                    <i class="bi bi-circle-fill boldIcon"></i>
                                    How it Works
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 ml-1 d-flex">
                                    <span><i class=" manageIcons fas fa-edit "></i></span>
                                    <span><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class=" col-12 px-2 d-flex">
                                <i class="bi bi-circle-fill boldIcon"></i>Explore
                                <div class="col-lg-2 col-md-2 col-2  ml-1 d-flex">
                                    <span><i class=" manageIcons fas fa-edit "></i></span>
                                    <span><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" data-toggle="modal" data-target=".adFooterCategories" class=" orange_text font-weight-bold btn  btn-block addNewButton smallText" style="width: fit-content;"><i class="fas fa-plus mr-1"></i> Add New </button>
                        </div>
                    </div>
                    <div class=" col-4 ">
                        <h6>Explore</h6>
                        <div class="row my-2">
                            <div class=" col-12 px-2 d-flex">
                                <div>
                                    <i class="bi bi-circle-fill boldIcon"></i>
                                    How it Works
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 ml-1 d-flex">
                                    <span><i class=" manageIcons fas fa-edit "></i></span>
                                    <span><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                        <div class="row my-2">
                            <div class=" col-12 px-2 d-flex">
                                <i class="bi bi-circle-fill boldIcon"></i>Explore
                                <div class="col-lg-2 col-md-2 col-2  ml-1 d-flex">
                                    <span><i class=" manageIcons fas fa-edit "></i></span>
                                    <span><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                        <div>
                            <button type="button" data-toggle="modal" data-target=".adFooterExplore" class=" orange_text font-weight-bold btn  btn-block addNewButton smallText" style="width: fit-content;"><i class="fas fa-plus mr-1"></i> Add New </button>
                        </div>
                    </div>
                </div>
                <br><br>
                <div class="modalBorder"></div>
                <div class=" my-4 mx-4 px-5 d-flex">
                    <input class=" displayNone PickedDataId " type="text " value="{{($Footer->id)?? '' }}">

                    <button type="submit" class="btn ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
                </div>

                <br>
            </form>
        </div>
    </div>
    {{-- edaitable part  end --}}
</div>

</div>


</div>
<script src="{{ url('adminAssets/js/FrontEndSettings/adFooter.js') }}"></script>

@endsection
