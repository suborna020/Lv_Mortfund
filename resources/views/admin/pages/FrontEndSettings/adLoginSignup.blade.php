@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5">
            {{-- edaitable part  --}}
            <div class="row   coloredInputsContainer">
                <div class="col-12">
                    <form id="LoginSignupForm" class="mysummernote" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <div class="input-group mt-1" style="width: 92%;">
                            <input type="text" class="form-control " name="login_title" placeholder="Enter Login title" value="{{($SignupLoginView->login_title)?? '' }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-align-top fa-lg blurText"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mt-3">
                            <textarea class="input-field summernote-bg MySmallSummernote resizeNone" rows="4" name="login_text" placeholder="Enter  Login text">{{($SignupLoginView->login_text)?? '' }}</textarea>

                        </div>
                        <div class="input-group mt-1" style="width: 92%;">
                            <input type="text" class="form-control " name="signup_title" placeholder="Enter Signup title" value="{{($SignupLoginView->signup_title)?? '' }}">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-align-top fa-lg blurText"></i>

                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mt-3">
                            <textarea class="input-field summernote-bg MySmallSummernote resizeNone" rows="4" name="signup_text" placeholder="Enter  Signup text">{{($SignupLoginView->signup_text)?? '' }}</textarea>

                        </div>

                        <br><br>
                        <div class="modalBorder"></div>
                        <div class=" my-4 mx-4 px-5 d-flex">
                            <input class=" displayNone PickedDataId " type="text " value="{{($SignupLoginView->id)?? '' }}">

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

<script src="{{ url('adminAssets/js/FrontEndSettings/adLoginSignup.js') }}"></script>

@endsection
