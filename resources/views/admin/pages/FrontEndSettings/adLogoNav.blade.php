@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-9 ">
            {{-- edaitable part  --}}
            <form action="{{url('/update-logo-fabicon/'.($general->id))}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mb-5">
                    <div class="col-lg-5 col-5 mx-4">
                        <div class="small-box d-flex coverImageContainer">
                            <img src="../{{($general->website_logo)?? '0' }}" alt=" image" class=" img-fluid" />
                        </div>
                        <div class=" customFileInput justifyCenter">
                            <input type="file" class="fileName formInputValue fileInput " name="website_logo" accept="image/*">
                            <button type="button" class="text-truncate whiteText  backgroundCerulean  font-weight-bold btn copiedFilename copiedFilenameButton formInputValue photoButton iconName"><i class="fas fa-plus "></i> Choose Logo Photo </button>
                        </div>
                    </div>
                    <div class="col-lg-5 col-5 mx-4">
                        <div class="small-box d-flex coverImageContainer">
                            <img src="../{{($general->website_favicon)?? '0' }}" alt=" image" class="img-rounded roundLogo" />

                        </div>
                        <div class=" customFileInput justifyCenter">
                            <input type="file" class="fileName formInputValue fileInput " name="website_favicon" accept="image/*">
                            <button type="button" class="text-truncate whiteText  backgroundCerulean  font-weight-bold btn copiedFilename copiedFilenameButton formInputValue photoButton iconName"><i class="fas fa-plus "></i> Choose Favicon </button>
                        </div>
                    </div>
                </div><br>
                <div class="row tableSmallText1">

                    <div class=" col-12 ">
                        <h5>Navigation Links</h5>
                        <div class="tableBody">
                            {{-- <div class="row mt-2">
                                <div class=" col-12 d-flex">
                                    <i class="bi bi-circle-fill boldIcon"></i>How it Works
                                    <div class="col-lg-2 col-md-2 col-2 ml-auto">
                                        <span data-toggle="modal" data-target=".adLogoNavModal"><i class=" manageIcons fas fa-edit "></i></span>
                                        <span><i class=" manageIcons fas fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-2">
                                <div class=" col-12 d-flex">
                                    <i class="bi bi-circle-fill boldIcon"></i>Explore
                                    <div class="col-lg-2 col-md-2 col-2  ml-auto">
                                        <span data-toggle="modal" data-target=".adLogoNavModal"><i class=" manageIcons fas fa-edit "></i></span>
                                        <span><i class=" manageIcons fas fa-trash"></i></span>
                                    </div>
                                </div>
                            </div> --}}
                        </div>
                            <button type="button" data-toggle="modal" data-target=".adLogoNavModal" class=" mt-2 orange_text font-weight-bold btn btn-sm  addNewButton smallText"><i class="fas fa-plus "></i> Add New </button>
                      

                    </div>
                </div>

                <br><br>
                <div class="modalBorder"></div>
                <div class=" my-4 mx-4 px-5 d-flex">
                    <button type="submit" class=" btn ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
                </div>

                <br>
            </form>
            {{-- edaitable part  end --}}
        </div>

    </div>


</div>

<script src="{{ url('adminAssets/js/FrontEndSettings/adLogoNav.js') }}"></script>

@endsection
