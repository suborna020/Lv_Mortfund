@extends('admin.layout.app')
@section('content')

            <div class="container-fluid mt-4 px-5 rightContainer coloredInputsContainer">

                <div class="row  ">
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class=" small-box RightContainerTable table-responsive" style="padding: 12px !important;">
                            <table class="table table-striped table-borderless mb-0 ">
                                <thead>
                                    <tr>
                                        <th scope="col" class="col_1">#</th>
                                        <th scope="col">Subject</th>
                                        <th scope="col">Description</th>

                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach($newsletterMail as $key => $newsletterMailBox)
                                    <tr>
                                        <th scope="row">{{$key+1}}</th>
                                        <td class="text-truncate">{{$newsletterMailBox->subject}}</td>
                                        <td class="text-truncate">{{$newsletterMailBox->message}}</td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {{-- <div class="row  ">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="username" placeholder="Email Sent From: ex:mortfund@noreply.com">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <span><i class=" manageIcons fas fa-edit "></i></span>
                        <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                <div class="row my-4 ">
                    <div class="col-lg-10 col-md-10 col-10">
                        <div class="input-group ">
                            <input type="text" class="form-control " name="username" placeholder="Email Template">
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-2 col-2 my-auto">
                        <span><i class=" manageIcons fas fa-edit "></i></span>
                        <span><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div> --}}
                <div class="row  my-4">
                    <div class="col-lg-10 col-md-10 col-10">
                        <form method="post" id="mailSendingForm" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <input type="text" class="form-control formInputValue" placeholder="Subject" id="subject" name="subject">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control formInputValue customizeInputField" rows="5" id="textArea" name="message"></textarea>
                            </div>

                            <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold "><i class="fas fa-plus mr-1"></i>Send</button>
                        </form>
                    </div>
                </div>

                <br>
                {{-- <div class="modalBorder"></div>
                <div class=" my-4 mx-4 px-5 d-flex">
                    <button type="button" class="ml-auto whiteText btn-lg orangeBackground  font-weight-bold btn">Save Changes</button>
                </div> --}}

                <br>
            </div>
       
    <script src="{{ url('adminAssets/js/GeneralSettings/adEmailSettings.js') }}"></script>


@endsection
