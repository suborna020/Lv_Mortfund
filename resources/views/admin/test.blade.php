//adRecent  page ------------------------------------------
function fundRaiseRecentAllData() {
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseRecentData"
        , success: function (fundRaiseRecentData) {
            // console.log(fundRaiseRecentData);
            var getHtml = ""
            $.each(fundRaiseRecentData, function (key, fundRaiseRecentData) {
                // console.log(fundRaiseRecentData);
                var raised = fundRaiseRecentData.raised;
                getHtml += `<tr>
                                <th scope="row">${key + 1}</th>
                                <td>${fundRaiseRecentData.title}</td>
                                <td> ${fundRaiseRecentData.needed_amount}</td>
                                <td> ${fundRaiseRecentData.raised == null ? '0' : raised}</td>
                                <td>${fundRaiseRecentData.deadline}  </td>
                                <td>${fundRaiseRecentData.benificiary_name}</td>
                                <td >
                                    <button type="button" onclick="fundRaiseStatusUpdate(${fundRaiseRecentData.id})" ${fundRaiseRecentData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseRecentData.status == '1' ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        <span data-toggle="tooltip"  title="Edit" id='editFundRecentButton' onclick='fundRaiseEditData(${fundRaiseRecentData.id})' ><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span data-toggle="tooltip"  title="Delete" onclick='fundRaiseDestroyData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                            </tr>`

            })
            $('#fundRaiseRecentDataBody').html(getHtml);

        }
    })
}
fundRaiseRecentAllData();
// select box work ---------------------------------------------------------------------
// $(document).ready(function () {
$('#categoriesCheck').change(function () {
    if ($(this).val() === '1') {
        // when active 
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/fundRaiseRecentData"
            , success: function (fundRaiseRecentData) {
                var getHtml = ""
                $.each(fundRaiseRecentData, function (key, fundRaiseRecentData) {
                    // console.log(fundRaiseRecentData.status=='1');
                    if (fundRaiseRecentData.status == '1') {
                        // console.log(fundRaiseRecentData);
                        getHtml +=
                            `<tr>
                                <th scope="row">${key + 1}</th>
                                <td>${fundRaiseRecentData.title}</td>
                                <td> ${fundRaiseRecentData.needed_amount}</td>
                                <td> ${fundRaiseRecentData.raised == null ? '0' : raised}</td>
                                <td>${fundRaiseRecentData.deadline}  </td>
                                <td>${fundRaiseRecentData.benificiary_name}</td>
                                <td >
                                    <button type="button" onclick="fundRaiseStatusUpdate(${fundRaiseRecentData.id})" ${fundRaiseRecentData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseRecentData.status == '1' ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        <span id='editFundRecentButton' onclick='fundRaiseEditData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='fundRaiseDestroyData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                            </tr>
                            `
                    }
                })
                $('#fundRaiseRecentDataBody').html(getHtml);
            }
        })
    }
    else {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/fundRaiseRecentData"
            , success: function (fundRaiseRecentData) {
                var getHtml = ""
                $.each(fundRaiseRecentData, function (key, fundRaiseRecentData) {
                    // console.log(fundRaiseRecentData.status=='1');
                    // console.log(fundRaiseRecentData);
                    if (fundRaiseRecentData.status == '0') {
                        getHtml +=
                            `<tr>
                                <th scope="row">${key + 1}</th>
                                <td>${fundRaiseRecentData.title}</td>
                                <td> ${fundRaiseRecentData.needed_amount}</td>
                                <td> ${fundRaiseRecentData.raised == null ? '0' : raised}</td>
                                <td>${fundRaiseRecentData.deadline}  </td>
                                <td>${fundRaiseRecentData.benificiary_name}</td>
                                <td >
                                    <button type="button" onclick="fundRaiseStatusUpdate(${fundRaiseRecentData.id})" ${fundRaiseRecentData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseRecentData.status == '1' ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        <span id='editFundRecentButton' onclick='fundRaiseEditData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='fundRaiseDestroyData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                            </tr>
                            `
                    }
                })
                $('#fundRaiseRecentDataBody').html(getHtml);
            }
        })
    }
});
// });


// clear input data  -----------------------------------------------------------------------------
function fundRecentClearData() {
    $('.formInputValue').val('');
    $('.fileInputHtml').html('');
    $('.thumbnailButton').html('Thumbnail (Image size will be reduced to 350*210px)<i class="bi bi-image-fill fa-lg blurText ml-auto mr-1"></i>');
    $('.photoButton').html('Upload Photo');
    $('.videoButton').html('Video');
    $('.proof_documentButton').html('Proof Document');

    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
    $('#editModalFilesContainer').html('');
    $('#fundRecentId').html("");

}
//get edit data  -----------------------------------------------------------------------------
function fundRaiseEditData(id) {
    $('#AddFundRaise').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseEditData/" + id
        , success: function (data) {
            // console.log(data);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            $('#category_name').val(data.category_name);
            $('#category_id').val(data.category_id);
            $('#location').val(data.location);
            $('#title').val(data.title);
            $('#benificiary_name').val(data.benificiary_name);
            $('#needed_amount').val(data.needed_amount);
            $('#deadline').val(data.deadline);
            $('#story').val(data.story);
            $('#thumbnail').removeAttr('required');
            $('#photo').removeAttr('required');
            $('#video').removeAttr('required');
            $('#proof_document').removeAttr('required');
            
            $('#fundRecentId').html(data.id);
            var editModalFilesRow = `
                        <div class="row px-2">
                        <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Thumbnail </div>
                        <div class="col-lg-8 col-8 mb-2 ">
                            <a href="../${data.thumbnail_path}" data-fancybox>
                            <img src="../${data.thumbnail_path}" class="  mediumFileSize" />
                            </a>
                        </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Photo </div>
                            <div class="col-lg-8 col-8 mb-2 ">
                                <a href="../${data.photo_path}" data-fancybox>
                                <img src="../${data.photo_path}" alt="icon" class="  mediumFileSize" />
                                </a>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Video </div>
                            <div class="col-lg-8 col-8 mb-2 ">
                                <video class="mediumFileSize" controls>
                                    <source src="../${data.video_path}" type="video/mp4">
                                    <source src="../${data.video_path}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Proof Document </div>
                            <a href="../${data.proof_document_path}" data-type="iframe" data-fancybox download>
                                <img src="../adminAssets/img/commonDocPic.jpg" alt="icon" class="  mediumFileSize" style="width: unset" />
                            </a>
                        </div>
                    `
            $('#editModalFilesContainer').html(editModalFilesRow);
        }
    })
}

$('#recentFundCrudForm').on('submit', function (event) {
    event.preventDefault();
    console.log("submit prevent success");

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('#fundRecentId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/fundRecentAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.AddRecentFundraisers').modal('hide');
                fundRecentClearData();
                fundRaiseRecentAllData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data added success'
                })
            }
            , error: function (error) {
                // console.log('check the error path error->resposeJson.errors');
                Msg.fire({
                    type: 'success'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        })
    } else {
        // edit data  -----------------------------------------------------------------------------

        $.ajax({
            url: "/fundRaiseEditedSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('#fundRecentId').html("");
                $('.myAddNewModal').modal('hide');
                fundRecentClearData();
                fundRaiseRecentAllData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data Update success'
                })
            }
            , error: function (error) {
                Msg.fire({
                    type: 'success'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        })
    }
});
// status update  -----------------------------------------------------------------------------
function fundRaiseStatusUpdate(id) {
    // id is passed by onclick function 
    // console.log('clicked id', id);
    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 1500
    })
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseStatusUpdate/" + id
        , success: function (data) {
            fundRaiseRecentAllData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Status Changed'
            })
        }
    })
}
// delete data  -----------------------------------------------------------------------------
function fundRaiseDestroyData(id) {
    // id is passed by onclick function 
    swal({
        title: 'Are you sure you want to delete?'
        , text: "You won't be able to revert this!"
        , icon: 'warning'
        , buttons: true
        , dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST"
                , DataType: 'json'
                , url: "/fundRaiseDestroyData/" + id
                , success: function (data) {
                    fundRaiseRecentAllData();
                    // console.log('deleted');
                }
            })
        } else {


        }
    });

}


//End adCategories page -----------------------------------------
// });
{{--  urgent page   --}}
//adRecent  page ------------------------------------------
function AllFundRaiseData() {
    $.ajax({
        type: "GET"
        , DataType: 'json'
            // only for recent route 
        , url: "/fundRaiseRecentData"
        , success: function (AllFundRaiseData) {
            // console.log(fundRaiseRecentData);
            var getHtml = ""
            $.each(AllFundRaiseData, function (key, AllFundRaiseData) {
                // console.log(fundRaiseRecentData);
                var raised = AllFundRaiseData.raised;
                getHtml += `
                <tr>
                    <th scope="row">${key + 1}</th>
                    <td>${AllFundRaiseData.title}</td>
                    <td> ${AllFundRaiseData.needed_amount}</td>
                    <td> ${AllFundRaiseData.raised == null ? '0' : raised}</td>
                    <td>${AllFundRaiseData.deadline}  </td>
                    <td>${AllFundRaiseData.benificiary_name}</td>
                    <td>
                        <button type="button" onclick="fundRaiseStatusUpdate(${AllFundRaiseData.id})" ${AllFundRaiseData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${AllFundRaiseData.status == '1' ? 'Active' : 'Inactive'}
                        </button>
                    </td>
                    <td>
                        <div>
                            <span data-toggle="tooltip"  title="Edit" id='editFundRecentButton' onclick='AllFundRaiseEditData(${AllFundRaiseData.id})' ><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                            <span data-toggle="tooltip"  title="Delete" onclick='fundRaiseDestroyData(${AllFundRaiseData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                            <span><i onclick="fundRaiseRecentListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-bell fa-lg  ${AllFundRaiseData.urgent == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.urgent == '1' ? 'title=" Urgent"' : 'title="Make Urgent"'}></i></span>
                        </div>
                    </td>
                </tr>`
            })
            $('.FundRaiseTableBody').html(getHtml);

        }
    })
}
AllFundRaiseData();
// select box work ---------------------------------------------------------------------
$('.AllFundRaiseCheckBox').change(function () {
    if ($(this).val() === '1') {
        // when active 
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/AllFundRaiseData"
            , success: function (AllFundRaiseData) {
                var getHtml = ""
                $.each(AllFundRaiseData, function (key, AllFundRaiseData) {
                    if (AllFundRaiseData.status == '1') {
                        // console.log(fundRaiseRecentData);
                        getHtml += `
                        <tr>
                            <th scope="row">${key + 1}</th>
                            <td>${AllFundRaiseData.title}</td>
                            <td> ${AllFundRaiseData.needed_amount}</td>
                            <td> ${AllFundRaiseData.raised == null ? '0' : raised}</td>
                            <td>${AllFundRaiseData.deadline}  </td>
                            <td>${AllFundRaiseData.benificiary_name}</td>
                            <td>
                                <button type="button" onclick="fundRaiseStatusUpdate(${AllFundRaiseData.id})" ${AllFundRaiseData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${AllFundRaiseData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                            </td>
                            <td>
                                <div>
                                    <span data-toggle="tooltip"  title="Edit" id='editFundRecentButton' onclick='AllFundRaiseEditData(${AllFundRaiseData.id})' ><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                    <span data-toggle="tooltip"  title="Delete" onclick='fundRaiseDestroyData(${AllFundRaiseData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    <span><i onclick="fundRaiseRecentListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-bell fa-lg  ${AllFundRaiseData.urgent == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.urgent == '1' ? 'title=" Urgent"' : 'title="Make Urgent"'}></i></span>
                                </div>
                            </td>
                        </tr>`
                    }
                })
                $('.FundRaiseTableBody').html(getHtml);

            }
        })
    }
    else {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/AllFundRaiseData"
            , success: function (AllFundRaiseData) {
                var getHtml = ""
                $.each(AllFundRaiseData, function (key, AllFundRaiseData) {
                    if (AllFundRaiseData.status == '0') {
                        getHtml += `
                        <tr>
                            <th scope="row">${key + 1}</th>
                            <td>${AllFundRaiseData.title}</td>
                            <td> ${AllFundRaiseData.needed_amount}</td>
                            <td> ${AllFundRaiseData.raised == null ? '0' : raised}</td>
                            <td>${AllFundRaiseData.deadline}  </td>
                            <td>${AllFundRaiseData.benificiary_name}</td>
                            <td>
                                <button type="button" onclick="fundRaiseStatusUpdate(${AllFundRaiseData.id})" ${AllFundRaiseData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${AllFundRaiseData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                            </td>
                            <td>
                                <div>
                                    <span data-toggle="tooltip"  title="Edit" id='editFundRecentButton' onclick='AllFundRaiseEditData(${AllFundRaiseData.id})' ><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                    <span data-toggle="tooltip"  title="Delete" onclick='fundRaiseDestroyData(${AllFundRaiseData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    <span><i onclick="fundRaiseRecentListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-bell fa-lg  ${AllFundRaiseData.urgent == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.urgent == '1' ? 'title=" Urgent"' : 'title="Make Urgent"'}></i></span>
                                </div>
                            </td>
                        </tr>`
                    }
                })
                $('.FundRaiseTableBody').html(getHtml);

            }
        })
    }
});
// clear input data  -----------------------------------------------------------------------------
function fundRecentClearData() {
    $('.formInputValue').html('').val('');
    $('.thumbnailButton').html('Thumbnail (Image size will be reduced to 350*210px)<i class="bi bi-image-fill fa-lg blurText ml-auto mr-1"></i>');
    $('.photoButton').html('Upload Photo');
    $('.videoButton').html('Video');
    $('.proof_documentButton').html('Proof Document');

    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
    $('.editModalFilesContainer').html('');
    $('.AllFundClickedId').html("");

}
//get edit data  -----------------------------------------------------------------------------
function AllFundRaiseEditData(id) {
    // alert(id);
    $('.fundRaiseModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseEditData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();
            
            $('.category_id').val(data.category_id);
            $('.location').val(data.location);
            $('.title').val(data.title);
            $('.benificiary_name').val(data.benificiary_name);
            $('.needed_amount').val(data.needed_amount);
            $('.deadline').val(data.deadline);
            $('.story').val(data.story);
            $('.thumbnail').removeAttr('required');
            $('.photo').removeAttr('required');
            $('.video').removeAttr('required');
            $('.proof_document').removeAttr('required');
            $('.AllFundClickedId').html(data.id);
            var editModalFilesRow = ""
            var editModalFilesRow = `
                        <div class="row px-2">
                        <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Thumbnail </div>
                        <div class="col-lg-8 col-8 mb-2 ">
                            <a href="../${data.thumbnail_path}" data-fancybox>
                            <img src="../${data.thumbnail_path}" class="  mediumFileSize" />
                            </a>
                        </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Photo </div>
                            <div class="col-lg-8 col-8 mb-2 ">
                                <a href="../${data.photo_path}" data-fancybox>
                                <img src="../${data.photo_path}" alt="icon" class="  mediumFileSize" />
                                </a>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Video </div>
                            <div class="col-lg-8 col-8 mb-2 ">
                                <video class="mediumFileSize" controls>
                                    <source src="../${data.video_path}" type="video/mp4">
                                    <source src="../${data.video_path}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Proof Document </div>
                            <a href="../${data.proof_document_path}" data-type="iframe" data-fancybox download>
                                <img src="../adminAssets/img/commonDocPic.jpg" alt="icon" class="  mediumFileSize" style="width: unset" />
                            </a>
                        </div>
                    `
            $('.FundModalFilesContainer').html(editModalFilesRow);
         
        }
    })
}

$('#recentFundCrudForm').on('submit', function (event) {
    event.preventDefault();
    console.log("submit prevent success");

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('#fundRecentId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/fundRecentAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.AddRecentFundraisers').modal('hide');
                fundRecentClearData();
                fundRaiseRecentAllData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data added success'
                })
            }
            , error: function (error) {
                // console.log('check the error path error->resposeJson.errors');
                Msg.fire({
                    type: 'success'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        })
    } else {
        // edit data  -----------------------------------------------------------------------------

        $.ajax({
            url: "/fundRaiseEditedSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('#fundRecentId').html("");
                $('.myAddNewModal').modal('hide');
                fundRecentClearData();
                fundRaiseRecentAllData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data Update success'
                })
            }
            , error: function (error) {
                Msg.fire({
                    type: 'success'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        })
    }
});
// status update  -----------------------------------------------------------------------------
function fundRaiseStatusUpdate(id) {
    // id is passed by onclick function 
    // console.log('clicked id', id);
    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 1500
    })
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseStatusUpdate/" + id
        , success: function (data) {
            fundRaiseRecentAllData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Status Changed'
            })
        }
    })
}
// delete data  -----------------------------------------------------------------------------
function fundRaiseDestroyData(id) {
    // id is passed by onclick function 
    swal({
        title: 'Are you sure you want to delete?'
        , text: "You won't be able to revert this!"
        , icon: 'warning'
        , buttons: true
        , dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST"
                , DataType: 'json'
                , url: "/fundRaiseDestroyData/" + id
                , success: function (data) {
                    fundRaiseRecentAllData();
                    // console.log('deleted');
                }
            })
        } else {


        }
    });

}


//End recent page -----------------------------------------
// });