@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5">
            {{-- edaitable part  --}}
            <div class="row   coloredInputsContainer">
                <div class="col-12">
                    <form method="post" id="" enctype="multipart/form-data">
                        @csrf
                        <div class="input-group mt-1" style="width: 92%;">
                            <input type="text" class="form-control " name="username" placeholder="Enter  title">
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-align-top fa-lg blurText"></i>
                                </div>
                            </div>
                        </div>
                        <div class="form-group input-group mt-3">
                            <textarea class="form-control formInputValue resizeNone customizeInputField" rows="12" id="textArea" name="message" placeholder="Enter  text" ></textarea>
                            <div class="input-group-append">
                                <div class="input-group-text">
                                    <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                </div>
                            </div>
                        </div>

                        <br><br>
                        <div class="modalBorder"></div>
                        <div class=" my-4 mx-4 px-5 d-flex">
                            <button type="button" class="ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
                        </div>
            
                        <br>
                    </form>
                </div>
            </div>
            {{-- edaitable part  end --}}
        </div>

    </div>


</div>

{{-- <script src="{{ url('adminAssets/js/Advertisement/adAdvertisement.js') }}"></script> --}}

@endsection
