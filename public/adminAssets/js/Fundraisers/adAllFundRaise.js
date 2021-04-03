//adRecent  page ------------------------------------------
function AllFundRaiseData() {
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/AllFundRaiseData"
        , success: function (AllFundRaiseData) {
            // console.log(fundRaiseRecentData);
            var getHtml = ""
            $.each(AllFundRaiseData, function (key, AllFundRaiseData) {
                // console.log(fundRaiseRecentData);
                var raised = AllFundRaiseData.raised;
                getHtml += `
                <tr>
                    <th scope="row">${key+1}</th>
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
                            <span><i onclick="fundRaiseRecentListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-bell fa-lg  ${AllFundRaiseData.urgent == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.urgent == '1' ? 'title=" Remove From Urgent"' : 'title="Make Urgent"'}></i></span>
                            <span><i onclick="fundRaisePrivateListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-lock fa-lg  ${AllFundRaiseData.private == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.private == '1' ? 'title=" Remove From Private"' : 'title="Make Private"'}></i></span>
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
                                    <span><i onclick="fundRaiseRecentListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-bell fa-lg  ${AllFundRaiseData.urgent == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.urgent == '1' ? 'title=" Remove From Urgent"' : 'title="Make Urgent"'}></i></span>
                                    <span><i onclick="fundRaisePrivateListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-lock fa-lg  ${AllFundRaiseData.private == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.private == '1' ? 'title=" Remove From Private"' : 'title="Make Private"'}></i></span>
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
                                    <span><i onclick="fundRaiseRecentListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-bell fa-lg  ${AllFundRaiseData.urgent == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.urgent == '1' ? 'title=" Remove From Urgent"' : 'title="Make Urgent"'}></i></span>
                                    <span><i onclick="fundRaisePrivateListUpdate(${AllFundRaiseData.id})" class=" manageIcons fas fa-lock fa-lg  ${AllFundRaiseData.private == '1' ? 'redText' : ''} " data-toggle="tooltip"   ${AllFundRaiseData.private == '1' ? 'title=" Remove From Private"' : 'title="Make Private"'}></i></span>
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

// common functions------------------------------------

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
                            <a href="../uploads/${data.thumbnail}" data-fancybox>
                            <img src="../uploads/${data.thumbnail}" class="  mediumFileSize" />
                            </a>
                        </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Photo </div>
                            <div class="col-lg-8 col-8 mb-2 ">
                                <a href="../uploads/${data.photo}" data-fancybox>
                                <img src="../uploads/${data.photo}" alt="icon" class="  mediumFileSize" />
                                </a>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Video </div>
                            <div class="col-lg-8 col-8 mb-2 ">
                                <video class="mediumFileSize" controls>
                                    <source src="../uploads/${data.video}" type="video/mp4">
                                    <source src="../uploads/${data.video}" type="video/ogg">
                                    Your browser does not support the video tag.
                                </video>
                            </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Proof Document </div>
                            <a href="../uploads/${data.proof_document}" data-type="iframe" data-fancybox download>
                                <img src="../adminAssets/img/commonDocPic.jpg" alt="icon" class="  mediumFileSize" style="width: unset" />
                            </a>
                        </div>
                    `
            $('.FundModalFilesContainer').html(editModalFilesRow);
         
        }
    })
}

$('#allFundraiseCrudForm').on('submit', function (event) {
    event.preventDefault();
    console.log("submit prevent success");

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('.AllFundClickedId').html();

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
                $('.fundRaiseModal').modal('hide');
                fundRecentClearData();
                AllFundRaiseData();
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
                $('.fundRaiseModal').modal('hide');
                fundRecentClearData();
                AllFundRaiseData();
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
            AllFundRaiseData();
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
                    AllFundRaiseData();
                }
            })
        } else {


        }
    });

}
// make urgent  -----------------------------------------------------------------------------
function fundRaiseRecentListUpdate(id) {
    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 1500
    })
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseRecentListUpdate/" + id
        , success: function (data) {
            AllFundRaiseData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Urgent List Changed'
            })
        }
    })
}
// make Private  -----------------------------------------------------------------------------
function fundRaisePrivateListUpdate(id) {
    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 1500
    })
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaisePrivateListUpdate/" + id
        , success: function (data) {
            AllFundRaiseData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Private List Changed'
            })
        }
    })
}
//End adCategories page -----------------------------------------
