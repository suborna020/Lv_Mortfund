<div class="modal fade myAddNewModal" id="AddNewCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"> Category Name</h5>
            </div>
            <div class="modal-body">
                <div class="container-fluid rightContainer px-2 pb-4">
                    <div class="row">
                        <div class="col-lg-12 col-12 ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control " name="username">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <span class="bi bi-grid-3x3" style="color: black"></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-lg-5 col-5 col-sm-12">
                            <h5>Category Icon </h5>
                            <button type="button" class=" whiteText  backgroundCerulean  font-weight-bold btn"><i class="fas fa-plus mr-1"></i> Upload Photo</button>
                        </div>
                        <div class="col-lg-7 col-7 col-sm-12">
                            <h5>Status </h5>
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="sellist1">
                                    <option>Active</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modalBorder"></div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="button" class=" whiteText btn-lg orangeBackground  font-weight-bold btn"><i class="fas fa-plus mr-1"></i>Add Category</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade myAddNewModal " id="AddNewLanguage" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel"> Language Name</h5>  --}}
            </div>
            <div class="modal-body">
                <div class="container-fluid rightContainer px-2 pb-4">
                    <div class="row ">
                        <div class="col-lg-5 col-5 col-sm-12">
                            <button type="button" class=" whiteText  backgroundCerulean  font-weight-bold btn"><i class="fas fa-plus mr-1"></i> Upload Flag Photo</button>
                        </div>
                    </div>
                    <div class="row mt-4">
                        <div class="col-lg-12 col-md-12 col-12 ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control " name="username" placeholder="Enter Language Name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        {{-- <span class="bi bi-grid-3x3" style="color: black"></span>  --}}
                                        <i class="bi bi-globe blurText"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 col-12 col-sm-12">
                            <h5>Status </h5>
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="sellist1">
                                    <option>Active</option>
                                    <option>2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modalBorder"></div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="button" class=" whiteText btn-lg orangeBackground  font-weight-bold btn"><i class="fas fa-plus mr-1"></i>Add Language</button>
            </div>
        </div>
    </div>
</div>
<div class="modal fade myAddNewModal " id="AddNewAd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                {{-- <h5 class="modal-title" id="exampleModalLabel"> Language Name</h5>  --}}
            </div>
            <div class="modal-body">
                <div class="container-fluid rightContainer px-2 pb-4 pr-0">
                    <div class="row ">
                        <div class="col-lg-5 col-5 col-sm-5">
                            <button type="button" class=" whiteText  backgroundCerulean  font-weight-bold btn"><i class="fas fa-plus mr-1"></i> Upload Ad Photo</button>
                        </div>
                        <div class="col-lg-7 col-7 col-sm-7 px-0 d-flex orange_text">
                            
                            <div class="pr-2"><i class="bi bi-info-circle fa-lg"></i></div>
                            <div class="">Image will be resized according to size select below</div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 col-12 ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control " name="username" placeholder="Enter Company Name">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="bi bi-link-45deg fa-lg blurText"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row ">
                        <div class="col-md-12 col-12 col-sm-12">
                            <div class="form-group">
                                <select class="form-control" id="sel1" name="sellist1">
                                    <option>Select Size</option>
                                    <option>2*2</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-lg-12 col-md-12 col-12 ">
                            <div class="input-group mb-3">
                                <input type="text" class="form-control " name="username" placeholder="Enter Link">
                                <div class="input-group-append">
                                    <div class="input-group-text">
                                        <i class="bi bi-link-45deg fa-lg blurText"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="modalBorder"></div>
            <div class="modal-footer">
                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                <button type="button" class=" whiteText btn-lg orangeBackground  font-weight-bold btn"><i class="fas fa-plus mr-1"></i>Add Language</button>
            </div>
        </div>
    </div>
</div>
