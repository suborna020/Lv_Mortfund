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
                            <form class="form-group">
                                <!-- input feild -->
                                <div class="input-icons" style="width: 92%;">
                                    <i class="fas fa-text-height"></i>
                                    <input class="input-field" type="text" placeholder="Enter title" />
                                </div>
                                <!-- text editor -->
                                <div class="summernote-bg MyEditorSummernote1"></div>

                                <!-- footer-->
                                <div style="height: 5px;  background-color: #f8f8f8; margin: 2rem 0 1rem 0;"></div>
                                <div class="d-flex align-items-end justify-content-end">
                                    <button type="submit" class="btn summernote-btn">Save Changes</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            {{-- edaitable part  end --}}
        </div>
    </div>
</div>

{{-- <script src="{{ url('adminAssets/js/Advertisement/adAdvertisement.js') }}"></script> --}}

@endsection
