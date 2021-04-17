@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-9 ">
            {{-- edaitable part  --}}
            <div class="row mb-5">
                <div class="col-lg-5 col-5 mx-4">
                    <div class="small-box d-flex coverImageContainer">
                        <img src="{{asset("uploads/mainLogoCover.svg")}}" alt="Responsive image" class=" img-fluid" />

                    </div>
                    <div class=" customFileInput justifyCenter">
                        <input type="file" class="fileName formInputValue fileInput " name="photo" accept="image/*" required>
                        <button type="button" class=" whiteText  backgroundCerulean  font-weight-bold btn copiedFilename copiedFilenameButton formInputValue photoButton iconName"><i class="fas fa-plus "></i> Choose Logo Photo </button>
                    </div>
                </div>
                <div class="col-lg-5 col-5 mx-4">
                    <div class="small-box d-flex coverImageContainer">
                        <img src="{{asset("uploads/MainLogo.svg")}}" alt="Responsive image" class="img-rounded roundLogo" />

                    </div>
                    <div class=" customFileInput justifyCenter">
                        <input type="file" class="fileName formInputValue fileInput " name="photo" accept="image/*" required>
                        <button type="button" class=" whiteText  backgroundCerulean  font-weight-bold btn copiedFilename copiedFilenameButton formInputValue photoButton iconName"><i class="fas fa-plus "></i> Choose Favicon </button>
                    </div>
                </div>
            </div><br>
            <div class="row tableSmallText1">
                <div class=" col-12 ">
                    <h5>Navigation Links</h5>
                    <div class="row mt-2">
                        <div class=" col-12 d-flex">
                            <i   class="bi bi-circle-fill boldIcon"></i>How it Works
                            <div class="col-lg-2 col-md-2 col-2 ml-auto">
                                <span data-toggle="modal" data-target=".adLogoNavModal"><i class=" manageIcons fas fa-edit "></i></span>
                                <button type="button" onclick="categoriesStatusUpdate()" class="btn tableSmallText1 btn-sm smallActiveButton">Active
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-2">
                        <div class=" col-12 d-flex">
                            <i class="bi bi-circle-fill boldIcon"></i>Explore
                            <div class="col-lg-2 col-md-2 col-2  ml-auto">
                                <span data-toggle="modal" data-target=".adLogoNavModal"><i class=" manageIcons fas fa-edit "></i></span>
                                <button type="button" onclick="categoriesStatusUpdate()" class="btn tableSmallText1 btn-sm smallActiveButton">Active
                                </button>
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
