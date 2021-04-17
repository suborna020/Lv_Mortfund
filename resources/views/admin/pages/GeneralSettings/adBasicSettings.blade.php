@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-4 px-5 rightContainer coloredInputsContainer">
    <div class="row  ">
        <div class="col-lg-10 col-md-10 col-10">
            <div class="input-group ">
                <input type="text" class="form-control " name="username" placeholder="Enter website title">
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
            <div class="input-group ">
                <input type="text" class="form-control " name="username" placeholder="Enter base currency text">

            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-2 my-auto">
            <span><i class=" manageIcons fas fa-edit "></i></span>
            <span><i class=" manageIcons fas fa-trash"></i></span>
        </div>
    </div>
    <div class="row mt-4 ">
        <div class="col-lg-10 col-md-10 col-10">
            <div class="input-group ">
                <input type="text" class="form-control " name="username" placeholder="Enter base currency symbol">
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
    <div class="row mt-4 ">
        <div class="col-lg-10 col-md-10 col-10">
            <div class="input-group ">
                <input type="text" class="form-control " name="username" placeholder="Enter name for receiving emails, ex: mortfund@noreply.com">

            </div>
        </div>
        <div class="col-lg-2 col-md-2 col-2 my-auto">
            <span><i class=" manageIcons fas fa-edit "></i></span>
            <span><i class=" manageIcons fas fa-trash"></i></span>
        </div>
    </div>
    {{-- checkbox work   --}}
    <div class="row mt-4 px-2">
        <div class="col-lg-3 col-md-3 col-3 px-1 d-flex">
            <div class="centerBoxForCheckBox my-auto mx-1">
                <input type="checkbox" id="cbx" style="display:none" />
                <label for="cbx" class="toggle"><span></span></label>
            </div>
            <div class="my-auto ml-4">Email Verification</div>
        </div>
        <div class="col-lg-3 col-md-3 col-3 px-1  d-flex">
            <div class="centerBoxForCheckBox my-auto mx-1">
                <input type="checkbox" id="cbx" style="display:none" checked />
                <label for="cbx" class="toggle"><span></span></label>
            </div>
            <div class="my-auto ml-4">Email Notification </div>
        </div>
    </div><br>
    <div class="row  px-2">
        <div class="col-lg-3 col-md-3 col-3 px-1  d-flex">
            <div class="centerBoxForCheckBox my-auto mx-1">
                <input type="checkbox" id="cbx" style="display:none" />
                <label for="cbx" class="toggle"><span></span></label>
            </div>
            <div class="my-auto ml-4">SMS Verification</div>
        </div>
        <div class="col-lg-3 col-md-3 col-3 px-1  d-flex">
            <div class="centerBoxForCheckBox my-auto mx-1">
                <input type="checkbox" id="cbx" style="display:none" />
                <label for="cbx" class="toggle"><span></span></label>
            </div>
            <div class="my-auto ml-4">SMS Notification</div>
        </div>
    </div>
    <br>
    <div class="modalBorder"></div>
    <div class=" my-4 mx-4 px-5 d-flex">
        <button type="button" class="ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
    </div>

    <br>
</div>


@endsection
