@extends('admin.layout.app')
@section('content')

<div class="container-fluid mt-5 rightContainer FrontSettingsContainer">
    <div class="row ">
        <div class="col-lg-12 col-12 d-flex">
            <div class=" mr-auto">
                <h3>Support </h3>
            </div>
            <div class=" ml-auto d-flex ">
                <div>
                    <button type="button" data-toggle="modal" data-target=".advertisementModal" class=" orange_text font-weight-bold btn  btn-block addNewButton"><i class="fas fa-plus mr-1"></i> Add New </button>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 col-12 ">
            <div class=" small-box RightContainerTable tableSmallText1 table-responsive">
                <table class="table table-striped table-borderless ">
                    <thead>
                        <tr>
                            <th scope="col" class="col_1">#</th>
                            <th scope="col">Questions</th>
                            <th scope="col">Answers</th>
                            <th scope="col">Manage</th>
                        </tr>
                    </thead>
                    <tbody class="tableBody">
                        <tr>
                            <th scope="row">1</th>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing.</td>
                            <td>
                                <div>
                                    <span><i class=" manageIcons  fa-lg fas fa-edit"></i></span>
                                    <span><i class=" manageIcons fa-lg  fas fa-trash"></i></span>
                                </div>
                            </td>
                        </tr>
                        
                        <tr>
                            <th scope="row">2</th>
                            <td>Lorem ipsum dolor sit amet.</td>
                            <td>Lorem ipsum dolor sit amet consectetur adipisicing.</td>
                            <td>
                                <div>
                                    <span><i class=" manageIcons  fa-lg fas fa-edit"></i></span>
                                    <span><i class=" manageIcons fa-lg  fas fa-trash"></i></span>
                                </div>
                            </td>
                        </tr>
                       
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- /.row -->
</div>

{{-- <script src="{{ url('adminAssets/js/Advertisement/adAdvertisement.js') }}"></script> --}}

@endsection
