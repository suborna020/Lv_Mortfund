@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row justify-content-end">
        <div class="col-10 pl-5">
            {{-- edaitable part  --}}
            <div class="mysummernote">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <form class="form-group" id="TermsForm" method="POST" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                <div class="input-icons" style="width: 92%;">
                                    <i class="fas fa-text-height"></i>
                                    <input type="text" class="input-field" name="title" placeholder="Enter title" value="{{($Terms->title)?? '' }}"  required/>
                                </div>
                                {{-- summernote  --}}
                                <textarea class="input-field summernote-bg MyEditorSummernote1" name="text" required>{{($Terms->text)?? '' }}</textarea>

                                <!-- footer-->

                                <div style="height: 5px;  background-color: #f8f8f8; margin: 2rem 0 1rem 0;"></div>
                                <div class="d-flex align-items-end justify-content-end">
                                    <input class=" displayNone PickedDataId " type="text " value="{{($Terms->id)?? '' }}">

                                    <button type="submit" class="btn summernote-btn">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <script src="{{ url('adminAssets/js/FrontEndSettings/adTermsOfUse.js') }}"></script>

            {{-- edaitable part  end --}}
        </div>
    </div>
</div>


@endsection
