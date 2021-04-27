//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/adLanguageManagerData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                <tr>
                        <th scope="row">${Number(key)+1}</th>
                        <td>
                        <img src="../uploads/${allData.flag_photo}" alt="icon" class="  languageFlag" />
                        </td>
                        <td>${allData.language_name} </td>
                        <td>
                        <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                        </button>
                        </td>
                        <td>
                            <div class="d-flex">
                                <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
                                <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                            </div>
                        </td>
                </tr>`;
            });
            $(".tableBody").html(getHtml);
        },
    });
}
getAllData();
function clearFormData() {
    $('.formInputValue').html('').val('');
    $('.status').val('');
    $('.flagPhotoButton').html('<i class="fas fa-plus mr-1"></i> Upload Flag Photo');
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
    $('.editContainer').html('');
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.AddNewLanguage').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/getEditableLngContent/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            $('.formInputValue').removeAttr('required');

            $('.language_name').val(data.language_name);
            $('.status').val(data.status);
            $('.clickedRowId').html(data.id);

            var editModalFilesRow = ""
            var editModalFilesRow = `
                        <div class="row px-2">
                        <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Flag Photo </div>
                        <div class="col-lg-8 col-8 mb-2 ">
                            <a href="../uploads/${data.flag_photo} " data-fancybox>
                            <img src="../uploads/${data.flag_photo}" class="  mediumFileSize" />
                            </a>
                        </div>
                        </div>
                    `
            $('.editContainer').html(editModalFilesRow);

        }
    })
}
$('#AddNewLanguageForm').on('submit', function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('.clickedRowId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/languageAddSubmit"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.AddNewLanguage').modal('hide');
                clearFormData();
                getAllData();
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
            url: "/languageEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.AddNewLanguage').modal('hide');
                clearFormData();
                getAllData();
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
$('.AllFundRaiseCheckBox').change(function () {
    if ($(this).val() === '1') {
        // when active 
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/adLanguageManagerData"
            , success: function (data) {
                var getHtml = ""
                $.each(data, function (key, allData) {
                    if (allData.status == '1') {
                        
                        getHtml += `
                        <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>
                                <img src="../uploads/${allData.flag_photo}" alt="icon" class="  languageFlag" />
                                </td>
                                <td>${allData.language_name} </td>
                                <td>
                                <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                        </tr>`;
                    }
                })
                $(".tableBody").html(getHtml);

            }
        })
    }
    else {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/adLanguageManagerData"
            , success: function (data) {
                var getHtml = ""
                $.each(data, function (key, allData) {
                    if (allData.status == '0') {
                        
                        getHtml += `
                        <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>
                                <img src="../uploads/${allData.flag_photo}" alt="icon" class="  languageFlag" />
                                </td>
                                <td>${allData.language_name} </td>
                                <td>
                                <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                        </tr>`;
                    }
                })
                $(".tableBody").html(getHtml);

            }
        })
    }
});
function statusUpdate(id) {
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
        , url: "/adLanguageStatusUpdate/" + id
        , success: function (data) {
            getAllData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Status Changed'
            })
        }
    })
}

// delete data  -----------------------------------------------------------------------------
function destroyData(id) {
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
                , url: "/adLanguageDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}