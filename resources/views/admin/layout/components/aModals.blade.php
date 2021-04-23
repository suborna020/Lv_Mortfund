{{-- adCategory Modal------------------------------------------------------------------------  --}}
<div class="modal fade myAddNewModal AddNewCategory categoriesEditedSubmit" id="AddNewCategory" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" id="categoriesAddData" enctype="multipart/form-data">
            @csrf
            <div class="alert alert-danger print-error-msg" style="display:none">
                <ul></ul>
            </div>
            <input type="hidden" name="_token" value="{{ csrf_token() }}">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel"> Category Name</h5>
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="categoriesClearData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid rightContainer px-2 pb-4">
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control formInputValue" id="category_name" name="category_name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <span class="bi bi-grid-3x3" style="color: black"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-5 col-5 col-sm-12">
                                <h5>Category Icon </h5>
                                <div>
                                    <input type="text" name="icon" class="icon icon-class-input singleItem" value="fa fa-music" required />
                                    <button type="button" class="btn btn-primary whiteText  backgroundCerulean  font-weight-bold btn picker-button">Upload Icon</button>

                                </div>

                            </div>
                            <div class="col-lg-7 col-7 col-sm-12">
                                <h5>Status </h5>
                                <div class="form-group">
                                    <select class="form-control formInputValue" id="status" name="status" required>
                                        <option selected="true" value="" disabled>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn addButtonShow"><i class="fas fa-plus mr-1"></i>Add Category</button>
                    <span id="id" style="display: none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
<div id="iconPicker" class="modal fade" style="z-index: 20000;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>

            </div>

            <div class="modal-body">
                <div>

                    <ul class="iconPickerPlace">

                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
{{-- adAllFundraise  ---------------------------------------------------------}}
<div class="modal fade myAddNewModal bigModal fundRaiseModal " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 589px !important;">
        <form id="allFundraiseCrudForm" class=" RecentFundraisersForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="margin-top:unset !important">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="fundRecentClearData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body pt-1 pb-0">
                    <div class="container-fluid rightContainer px-4 pb-1 ">
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="form-group">
                                    <select class="form-control  category_id" name="category_id" required>
                                        <option selected="true" value="" disabled>Select category</option>
                                        @if(isset($CategoriesBox)) {
                                        @foreach($CategoriesBox as $CategoriesBoxs)
                                        <option class="category_name" value="{{$CategoriesBoxs->id}}">{{$CategoriesBoxs->category_name}}</option>
                                        @endforeach
                                        }
                                        @endif


                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control formInputValue location" name="location" placeholder="Enter Location" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-geo-alt-fill fa-lg blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control formInputValue title" name="title" placeholder="Enter Title" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-align-top blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control formInputValue benificiary_name" name="benificiary_name" placeholder="Enter benficiary name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-person-fill  fa-lg blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-7 col-7 col-sm-12">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control formInputValue needed_amount" name="needed_amount" placeholder="Enter the amount needed in USD" required>
                                </div>
                            </div>
                            <div class="col-lg-5 col-5 col-sm-12">
                                <div class="input-group mb-2">
                                    <input data-date-format="dd/mm/yyyy" class="form-control datepicker formInputValue deadline" placeholder="Enter Deadline" name="deadline" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-calendar4 fa-lg blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="input-group mb-2 myTextArea">
                                    <textarea class="form-control formInputValue story" placeholder="Write the story behind the reason of creating the campaign" name="story" required>Lorem ipsum dolor sit amet</textarea>
                                </div>
                            </div>
                        </div>
                        {{-- files part  --}}
                        <div class="row">
                            <div class="col-lg-12 col-12 mb-2 myCustomFileInput" style="position: relative">
                                <input type="file" class="fileName custom-file-input formInputValue thumbnail" name="thumbnail" accept="image/*" style="width:100%" required>
                                <button type="button" class="blurText d-flex form-control customFileLabel btn copiedFilename copiedFilenameButton2 fileInputSize thumbnailButton"> Thumbnail (Image size will be reduced to 350*210px)<i class="bi bi-image-fill fa-lg blurText ml-auto mr-1"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-6 col-6 col-sm-12 mb-2 myCustomFileInput " style="position: relative">
                                <input type="file" class="fileName custom-file-input formInputValue photo" name="photo" accept="image/*" style="width:100%" required>
                                <button type="button" class="blurText d-flex form-control  btn copiedFilename copiedFilenameButton2 fileInputSize customFileLabel photoButton" style="width: 89% !important"> Photo <i class="bi bi-image-fill fa-lg blurText ml-auto  mr-1"></i>
                                </button>
                            </div>
                            <div class="col-lg-6 col-6 col-sm-12 mb-2 myCustomFileInput" style="position: relative">
                                <input type="file" class="fileName fileInput custom-file-input formInputValue video" accept="video/mp4,video/x-m4v,video/*" name="video" style="width:100%">
                                <button type="button" class="blurText d-flex form-control  btn copiedFilename copiedFilenameButton2 fileInputSize customFileLabel videoButton" style="width: 89% !important"> Video <i class="bi bi-file-earmark-play-fill fa-lg blurText ml-auto mr-1"></i>
                                </button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 mb-2 myCustomFileInput" style="position: relative">
                                <input type="file" class="fileName custom-file-input formInputValue proof_document" name="proof_document" style="width:100%" required>
                                <button type="button" class="blurText d-flex form-control customFileLabel btn copiedFilename copiedFilenameButton2 fileInputSize proof_documentButton"> Proof Document <i class="bi bi-link-45deg blurText fa-lg ml-auto  mr-1"></i>
                                </button>
                            </div>
                        </div>
                        <div class="container FundModalFilesContainer">

                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold btn addButtonShow"><i class="fas fa-plus mr-1"></i>Add Fundraiser</button>
                    {{-- for edit    --}}
                    <span class="AllFundClickedId" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update Fundraiser</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- adStories page  --}}
<div class="modal fade myAddNewModal bigModal successStoriesListModal " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 589px !important;">
        <form id="successStoriesListForm" class=" RecentFundraisersForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="margin-top:unset !important">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body pt-1 pb-0">
                    <div class="container-fluid rightContainer px-4 pb-1 ">

                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="input-group mb-2">
                                    <input type="text" class="form-control formInputValue title" name="title" placeholder="Enter Title" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-align-top blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        {{-- files part  --}}
                        <div class="row ">
                            <div class="col-lg-6 col-6 col-sm-12 mb-2 myCustomFileInput " style="position: relative">
                                <input type="file" class="fileName custom-file-input formInputValue fileInput" name="author_photo" accept="image/*" style="width:100%" required>
                                <button type="button" class="blurText d-flex form-control  btn copiedFilename copiedFilenameButton2 fileInputSize customFileLabel author_photoButton" style="width: 89% !important">Author Photo <i class="bi bi-image-fill fa-lg blurText ml-auto  mr-1"></i>
                                </button>
                            </div>
                            <div class="col-lg-6 col-6 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control formInputValue author_name" name="author_name" placeholder="Author name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-person-fill  fa-lg blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 ">
                                <div class="input-group mb-2 myTextArea">
                                    <textarea class="form-control formInputValue story" placeholder="Write the story within 50 words" name="story" style="line-height: unset" required></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-6 col-6 col-sm-12 mb-4">
                                <div class=" customFileInput">
                                    <input type="file" class="fileName formInputValue fileInput " name="photo" accept="image/*" required>
                                    <button type="button" class=" whiteText  backgroundCerulean  font-weight-bold btn copiedFilename copiedFilenameButton formInputValue photoButton iconName"><i class="fas fa-plus "></i> Upload Photo &nbsp; &nbsp; &nbsp;</button>
                                </div>
                            </div>
                        </div>
                        <div class="container editContainer">
                            {{-- new html here  --}}

                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold btn addButtonShow"><i class="fas fa-plus mr-1"></i>Add Success Story</button>
                    {{-- for edit    --}}
                    <span class="clickedRowId" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update Fundraiser</button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- adLanguage page  --}}
<div class="modal fade myAddNewModal AddNewLanguage"  tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="AddNewLanguageForm" class=" RecentFundraisersForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">
                        <div class="row ">
                            <div class="col-lg-5 col-5 col-sm-12 mb-4">
                                <div class=" customFileInput">
                                    <input type="file" class="fileName formInputValue " name="flag_photo" accept="image/*" required>
                                    <button type="button" class=" whiteText  backgroundCerulean  font-weight-bold btn copiedFilename copiedFilenameButton flagPhotoButton "><i class="fas fa-plus mr-1"></i> Upload Flag Photo</button>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-4">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="language_name" placeholder="Enter Language Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
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
                                    <select class="form-control  status" name="status" required>
                                        <option selected="true" value="" disabled>Select</option>
                                        <option value="1">Active</option>
                                        <option value="0">Inactive</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container editContainer">
                        {{-- new html here  --}}

                    </div>

                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add Language</button>
                    {{-- for edit    --}}
                    <span class="clickedRowId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update Language</button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adadvertisement -----------------------  --}}
<div class="modal fade myAddNewModal advertisementModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="advertisementForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body">
                    <div class="container-fluid rightContainer px-2 pb-4 pr-0">
                        <div class="row ">
                            <div class="col-lg-5 col-5 col-sm-5">
                                <div class=" customFileInput">
                                    <input type="file" class="fileName formInputValue formFileInput" name="image" accept="image/*" required>
                                    <button type="button" class="btn whiteText  backgroundCerulean  font-weight-bold  copiedFilename copiedFilenameButton  AdPhotoButton"><i class="fas fa-plus mr-1"></i> Upload Ad Photo</button>
                                </div>
                            </div>
                            <div class="col-lg-7 col-7 col-sm-7 px-0 d-flex orange_text">
                                <div class="pr-2"><i class="bi bi-info-circle fa-lg"></i></div>
                                <div class="">Image will be resized according to size select below</div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control company_name formInputValue" name="company_name" placeholder="Enter Company Name" required>
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
                                    <select class="form-control image_size " name="image_size" required>
                                        <option selected="true" value="" disabled>Select</option>

                                        <option value="728*90">728*90</option>
                                        <option value="300*250">300*250</option>
                                        <option value="300*600">300*600</option>

                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control link formInputValue" name="link" placeholder="Enter Link" required>

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-link-45deg fa-lg blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container editContainer formInputValue">
                            {{-- new html here  --}}

                        </div>
                    </div>

                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add Advertisement</button>
                    {{-- for edit    --}}
                    <span class="clickedAdvertisementId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update Advertisement</button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adLogoNav modal   --}}
<div class="modal fade myAddNewModal adLogoNavModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="adLogoNavForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">

                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control menu_item formInputValue" name="menu_item" placeholder="Enter Text" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control link formInputValue" name="link" placeholder="Enter Link" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adSlider modal   --}}
<div class="modal fade myAddNewModal adSliderModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="adSliderForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">
                        <div class="container editContainer formInputValue">
                            {{-- new html here  --}}
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control slider_title formInputValue" name="slider_title" placeholder="Enter Title" required>
                                    

                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <textarea class="form-control formInputValue customizeInputField slide_sub_title" rows="3" name="slide_sub_title" placeholder="Enter Subtitle"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row tableSmallText1 ">
                            <div class="col-lg-5 col-5 col-sm-5">
                                <div class=" customFileInput">
                                    <input type="file" class="fileName formInputValue formFileInput " name="slider_photo" accept="image/*" required>
                                    <button type="button" class="btn whiteText  backgroundCerulean  font-weight-bold  copiedFilename copiedFilenameButton  AdPhotoButton"><i class="fas fa-plus mr-1"></i> Upload Slider Photo</button>
                                </div>
                            </div>
                            <div class="col-lg-7 col-7 col-sm-7 px-0 d-flex orange_text">
                                <div class="pr-2"><i class="bi bi-info-circle fa-lg"></i></div>
                                <div>Image will be resized into 1920*1080</div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adhowitworks-----------------------  --}}
<div class="modal fade myAddNewModal adHowItWorksModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="adHowItWorksForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">

                        <div class="row mt-3">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control title formInputValue" name="title" placeholder="Enter Title" required>
                                   
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <textarea class="form-control formInputValue customizeInputField short_description" rows="3" name="short_description" placeholder="Sort Description"></textarea>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-text-center fa-lg bigIcon blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 col-12 col-sm-12">
                                <button type="button" class="btn btn-primary whiteText  backgroundCerulean  font-weight-bold btn picker-button"><i class="fas fa-plus "></i>Choose Icon</button>
                                <input type="text" name="icon" class="btn blackText text-truncate icon icon-class-input singleItem " value="fa fa-music" required />


                            </div>
                        </div>

                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adabout   --}}
<div class="modal fade myAddNewModal secondaryPointsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="secondaryPointsForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">
                        <div class="row mt-2">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control secondary_point formInputValue" name="secondary_point" placeholder="Enter Text" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-md-12 col-12 col-sm-12">
                                <div class="form-group">
                                    <select class="form-control  column" name="column" required>
                                        <option selected="true" value="" disabled>Select</option>
                                        <option value="0">Left Column</option>
                                        <option value="1">Right Column</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adTeam   --}}
<div class="modal fade myAddNewModal bigModal adTeamModal " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 589px !important;">
        <form id="adTeamForm" method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="margin-top:unset !important">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body pt-1 pb-0">
                    <div class="container-fluid tableSmallText1  px-1 pb-3">
                        <div class="row tableSmallText1 mb-5 ">
                            <div class="col-lg-5 col-5 col-sm-5">
                                <div class=" customFileInput">
                                    <input type="file" class="fileName formInputValue formFileInput " name="photo" accept="image/*" required>
                                    <button type="button" class="btn whiteText  backgroundCerulean  font-weight-bold  copiedFilename copiedFilenameButton  AdPhotoButton"><i class="fas fa-plus mr-1"></i> Upload Display Photo</button>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control member_name formInputValue" name="member_name" placeholder="Enter Member Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control formInputValue member_designation" name="member_designation" placeholder="Enter Designation" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control facebook_link formInputValue" name="facebook_link" placeholder="Enter Facebook URL" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control twitter_link formInputValue" name="twitter_link" placeholder="Enter Twitter URL" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control linkedin_link formInputValue" name="linkedin_link" placeholder="Enter Linkedin URL" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control instagram_link formInputValue" name="instagram_link" placeholder="Enter Instagram URL" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="container editContainer">
                            {{-- new html here  --}}

                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold btn addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="AllFundClickedId" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>
                </div>
            </div>
        </form>
    </div>
</div>
{{--  adTestimonials  --}}
<div class="modal fade myAddNewModal bigModal adTestimonials " tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document" style="max-width: 589px !important;">
        <form class=" " method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="margin-top:unset !important">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body pt-1 pb-0">
                    <div class="container-fluid tableSmallText1  px-1 pb-3">
                        <div class="row tableSmallText1 mb-5 ">
                            <div class="col-lg-5 col-5 col-sm-5">
                                <div class=" customFileInput">
                                    <input type="file" class="fileName formInputValue formFileInput" name="image" accept="image/*" required>
                                    <button type="button" class="btn whiteText  backgroundCerulean  font-weight-bold  copiedFilename copiedFilenameButton  AdPhotoButton"><i class="fas fa-plus mr-1"></i> Upload Display Photo</button>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Author Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Designation" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Company name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control formInputValue customizeInputField" rows="5" id="textArea" name="message"  placeholder="Type Authors Text"></textarea>
                        </div>
                       
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold btn addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="AllFundClickedId" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- adSocialSettingsModal-----------------------  --}}
<div class="modal fade myAddNewModal SocialSettingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">
                        
                        <div class="row mt-1 mb-4">
                            <div class="col-lg-12 col-12 col-sm-12">
                                <button type="button" class="btn btn-primary whiteText  backgroundCerulean  font-weight-bold btn picker-button"><i class="fas fa-plus "></i>Choose Icon</button>
                                <input type="text" name="icon" class="btn blackText text-truncate icon icon-class-input singleItem" value="fa fa-music" required />
                            </div>
                        </div>

                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Social Media Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Social Media Link" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{--  adSupportModal  --}}
<div class="modal fade myAddNewModal adSupportModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class=" " method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content" style="margin-top:unset !important">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                </div>
                <div class="modal-body pt-1 pb-0">
                    <div class="container-fluid tableSmallText1  px-1 pb-3">
                       
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Question" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control formInputValue customizeInputField" rows="6"  name="message"  placeholder="Type Answer"></textarea>
                        </div>
                       
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer py-2">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold btn addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="AllFundClickedId" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>
                </div>
            </div>
        </form>
    </div>
</div>
{{-- adFooterAbout   --}}
<div class="modal fade myAddNewModal FooterAboutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class=" " method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">

                        <div class="row mt-1">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Footer Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control  formInputValue" name="languag_name" placeholder="Enter Footer Link" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adFooterCategories   --}}
<div class="modal fade myAddNewModal adFooterCategories" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class=" " method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">

                        <div class="row mt-1">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Footer Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control  formInputValue" name="languag_name" placeholder="Enter Footer Link" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- adFooterExplore   --}}
<div class="modal fade myAddNewModal adFooterExplore" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form class=" " method="post" enctype="multipart/form-data">
            @csrf
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close py-0" data-dismiss="modal" aria-label="Close" onclick="clearFormData()">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                    <div class="container-fluid rightContainer px-2 pb-4">

                        <div class="row mt-1">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control language_name formInputValue" name="languag_name" placeholder="Enter Footer Name" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row ">
                            <div class="col-lg-12 col-md-12 col-12 ">
                                <div class="input-group mb-3">
                                    <input type="text" class="form-control  formInputValue" name="languag_name" placeholder="Enter Footer Link" required>
                                    <div class="input-group-append">
                                        <div class="input-group-text">
                                            <i class="bi bi-globe blurText"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modalBorder"></div>
                <div class="modal-footer">
                    <button type="submit" class="btn whiteText btn-lg orangeBackground  font-weight-bold  addButtonShow"><i class="fas fa-plus mr-1"></i>Add </button>
                    {{-- for edit    --}}
                    <span class="clickedId formInputValue" style="display:none"></span>
                    <button type="submit" class=" btn whiteText btn-lg orangeBackground  font-weight-bold btn updateButtonShow" style="display: none"><i class="fas fa-plus mr-1 "></i>Update </button>

                </div>
            </div>
        </form>
    </div>
</div>
{{-- end ------------------------------------------------------------------------------------------------ --}}
