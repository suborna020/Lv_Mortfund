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
                                        <span id='editFundRecentButton' onclick='fundRaiseEditData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='fundRaiseDestroyData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
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

$('#categoriesCheck').change(function () {
    if ($(this).val() === '1') {
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
                        getHtml += `<tr>
                        <th scope="row">${key + 1}</th>
                        <td>${fundRaiseRecentData.title}</td>
                        <td> ${fundRaiseRecentData.needed_amount}</td>
                        <td>${fundRaiseRecentData.raised} </td>
                        <td>${fundRaiseRecentData.deadline}  </td>
                        <td>${fundRaiseRecentData.benificiary_name}</td>
                        <td >
                            <button type="button" onclick="categoriesStatusUpdat(${fundRaiseRecentData.id})" ${fundRaiseRecentData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseRecentData.status == '1' ? 'Active' : 'Inactive'}
                            </button>
                        </td>
                        <td>
                            <div>
                                <span onclick='fundRaiseEditData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                <span onclick='fundRaiseDestroyData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                            </div>
                        </td>
                                    </tr>`
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
                        getHtml += `<tr>
                                        <th scope="row">${key + 1}</th>
                                        <td>${fundRaiseRecentData.title}</td>
                                        <td> ${fundRaiseRecentData.needed_amount}</td>
                                        <td>${fundRaiseRecentData.raised} </td>
                                        <td>${fundRaiseRecentData.deadline}  </td>
                                        <td>${fundRaiseRecentData.benificiary_name}</td>
                                        <td >
                                            <button type="button" onclick="categoriesStatusUpdat(${fundRaiseRecentData.id})" ${fundRaiseRecentData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseRecentData.status == '1' ? 'Active' : 'Inactive'}
                                            </button>
                                        </td>
                                        <td>
                                            <div>
                                                <span onclick='fundRaiseEditData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                                <span onclick='fundRaiseDestroyData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                            </div>
                                        </td>
                                    </tr>`
                    }
                })
                $('#fundRaiseRecentDataBody').html(getHtml);
            }
        })
    }
});

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
            // $('#thumbnail').removeAttr('required').html(data.thumbnail);
            $('#thumbnail').removeAttr('required');
            // $('.thumbnailButton').html(data.thumbnail);
            $('#photo').removeAttr('required');
            // $('.photoButton').html(data.photo);
            $('#video').removeAttr('required');
            // $('.videoButton').html(data.video);
            $('#proof_document').removeAttr('required');
            // $('.proof_documentButton').val(data.proof_document);
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
            // $('#showFilesDiv').addClass("editModalFilesRow");
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
// }
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
$(document).ready(function () {
});

//End adCategories page -----------------------------------------
// });