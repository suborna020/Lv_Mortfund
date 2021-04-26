@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5 coloredInputsContainer">
            {{-- edaitable part  --}}
            <form id="contactForm" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row ">
                    <div class="col-lg-12 col-12 d-flex">
                        <div class=" mr-auto">
                            <h3>Contact</h3>
                        </div>

                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="contact_title" placeholder="Enter contact title" value="{{($ContactView->contact_title)?? '' }}">
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
                <div class="row  mt-3">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="form-group input-group">
                            <textarea class="form-control formInputValue customizeInputField resizeNone" rows="5" id="textArea" name="contact_text" placeholder="Enter contact text">{{($ContactView->contact_text)?? '' }}</textarea>
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
                <div class="row  mt-3">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="contact_email" placeholder="Enter contact email" value="{{($ContactView->contact_email)?? '' }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope fa-lg blurText"></i>

                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <span><i class=" manageIcons fas fa-edit "></i></span>
                        <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="contact_number" placeholder="Enter contact number" value="{{($ContactView->contact_number)?? '' }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-phone-alt fa-lg blurText"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <span><i class=" manageIcons fas fa-edit "></i></span>
                        <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="contact_hours" placeholder="Enter contact hours -ex: - 09:00am - 05:00 pm (Local Time)" value="{{($ContactView->contact_hours)?? '' }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="fas fa-clock fa-lg blurText"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <span><i class=" manageIcons fas fa-edit "></i></span>
                        <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row  mt-3">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="form-group input-group">
                            <textarea class="form-control formInputValue customizeInputField resizeNone" rows="3" id="textArea" name="contact_location" placeholder="Enter contact location">{{($ContactView->contact_location)?? '' }}</textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-geo-alt-fill fa-lg blurText"></i>
                                </div>
                            </div>
                        </div>


                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <span><i class=" manageIcons fas fa-edit "></i></span>
                        <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <br><br>
                <div class="modalBorder"></div>
                <input class=" displayNone PickedDataId " type="text " value="{{($ContactView->id)?? '' }}">

                <div class=" my-4 mx-4 px-5 d-flex">
                    <button type="submit" class="btn ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
                </div>

                <br>
            </form>
            {{-- edaitable part  end --}}
        </div>

    </div>


</div>
<script src="{{ url('adminAssets/js/FrontEndSettings/adContact.js') }}"></script>


@endsection
