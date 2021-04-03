
// adCategories page ------------------------------------------
function fundRaiseCategoriesAllData() {
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseCategoriesData"
        , success: function (fundRaiseCategories) {
            // console.log(fundRaiseCategories);
            var getHtml = ""
            $.each(fundRaiseCategories, function (key, fundRaiseCategories) {
                getHtml += `<tr>
                                <th scope="row">${key + 1}</th>
                                <td>${fundRaiseCategories.category_name}</td>
                                <td >
                                    <button type="button" onclick="categoriesStatusUpdate(${fundRaiseCategories.id})" ${fundRaiseCategories.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseCategories.status == '1' ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        <span onclick='categoriesEditData(${fundRaiseCategories.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='categoriesDestroyData(${fundRaiseCategories.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                            </tr>`
            })
            $('#fundRaiseCategoriesBody').html(getHtml);

        }
    })
}
fundRaiseCategoriesAllData();
// select box work ---------------------------------------------------------------------
$('#categoriesCheck').change(function () {
    if ($(this).val() === '1') {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/fundRaiseCategoriesData"
            , success: function (fundRaiseCategories) {
                // console.log(fundRaiseCategories);
                var getHtml = ""
                $.each(fundRaiseCategories, function (key, fundRaiseCategories) {
                    // console.log(fundRaiseCategories.status=='1');
                    if (fundRaiseCategories.status == '1') {
                        // console.log(fundRaiseCategories);

                        getHtml += `<tr>
                                    <th scope="row">${key + 1}</th>
                                    <td>${fundRaiseCategories.category_name}</td>
                                    <td >
                                        <button type="button" onclick="categoriesStatusUpdate(${fundRaiseCategories.id})" ${fundRaiseCategories.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseCategories.status == '1' ? 'Active' : 'Inactive'}
                                        </button>
                                    </td>
                                    <td>
                                        <div>
                                            <span onclick='categoriesEditData(${fundRaiseCategories.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                            <span onclick='categoriesDestroyData(${fundRaiseCategories.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                        </div>
                                    </td>
                                </tr>`
                    }
                })
                $('#fundRaiseCategoriesBody').html(getHtml);
            }
        })
    }
    else {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/fundRaiseCategoriesData"
            , success: function (fundRaiseCategories) {
                // console.log(fundRaiseCategories);
                var getHtml = ""
                $.each(fundRaiseCategories, function (key, fundRaiseCategories) {
                    // console.log(fundRaiseCategories.status=='1');
                    if (fundRaiseCategories.status == '0') {
                        // console.log(fundRaiseCategories);

                        getHtml += `<tr>
                                    <th scope="row">${key + 1}</th>
                                    <td>${fundRaiseCategories.category_name}</td>
                                    <td >
                                        <button type="button" onclick="categoriesStatusUpdate(${fundRaiseCategories.id})" ${fundRaiseCategories.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseCategories.status == '1' ? 'Active' : 'Inactive'}
                                        </button>
                                    </td>
                                    <td>
                                        <div>
                                            <span onclick='categoriesEditData(${fundRaiseCategories.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                            <span onclick='categoriesDestroyData(${fundRaiseCategories.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                        </div>
                                    </td>
                                </tr>`
                    }
                })
                $('#fundRaiseCategoriesBody').html(getHtml);
            }
        })
    }
});
// clear input data 
function categoriesClearData() {
    $('.formInputValue').val('');
    $('.fileInputHtml').html('');
    $('#iconName').html('Upload Photo');
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
    $('#id').html("");
    $('#catergoryModalFilesContainer').html("");


}

function categoriesEditData(id) {
    $('#AddNewCategory').modal('show')
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/categoriesEditData/" + id
        , success: function (data) {
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();
            $('.iconInput').removeAttr('required');

            $('#id').html(data.id);
            $('#category_name').val(data.category_name);
            $('#status').val(data.status);
            var editModalFilesRow = 
            `   <div class="row px-2">
                <div class="col-lg-8 col-8 mb-2 ">
                    <a href="../uploads/${data.icon}" data-fancybox>
                    <img src="../uploads/${data.icon}" class="  mediumFileSize" />
                    </a>
                </div>
                </div>
            `
            $('#catergoryModalFilesContainer').html(editModalFilesRow);

        }
         // "../uploads/${data.icon}"
    })
}
$('#categoriesAddData').on('submit', function (event) {
    event.preventDefault();
    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('#id').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/categoriesAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('#AddNewCategory').modal('hide');
                fundRaiseCategoriesAllData();
                categoriesClearData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data added success'
                })
            }
            , error: function (error) {
                // console.log('check the error path error->resposeJson.errors');
                // console.log(error);
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
            url: "/categoriesEditedSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('#AddNewCategory').modal('hide');
                fundRaiseCategoriesAllData();
                categoriesClearData();

                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data Update success'
                })
            }
            , error: function (error) {
                // console.log('check the error path error->resposeJson.errors');
                // console.log(error);
                Msg.fire({
                    type: 'success'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        })
    }
});

// function categoriesEditedSubmit() {
//     $('#categoriesAddData').on('submit', function (event) {
//         event.preventDefault();
//         var id = $('#id').html();
//         const Msg = Swal.mixin({
//             toast: true
//             , position: 'top-end'
//             , icon: 'success'
//             , showConfirmButton: false
//             , timer: 1500
//         })
//         console.log("submit prevent success");
//         $.ajax({
//             url: "/categoriesEditedSubmit/" + id
//             , method: "POST"
//             , data: new FormData(this)
//             , dataType: 'JSON'
//             , contentType: false
//             , cache: false
//             , processData: false
//             , success: function (data) {
//                 $('#AddNewCategory').modal('hide');
//                 fundRaiseCategoriesAllData();
//                 categoriesClearData();

//                 Msg.fire({
//                     type: 'success'
//                     , icon: 'success'
//                     , title: 'Data Update success'
//                 })
//             }
//             , error: function (error) {
//                 // console.log('check the error path error->resposeJson.errors');
//                 // console.log(error);
//                 Msg.fire({
//                     type: 'success'
//                     , icon: 'error'
//                     , title: 'Something went wrong!'
//                 })
//             }
//         })
//     });
// }
function categoriesStatusUpdate(id) {
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
        , url: "/categoriesStatusUpdate/" + id
        , success: function (data) {
            fundRaiseCategoriesAllData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Status Changed'
            })
        }
    })
}
function categoriesDestroyData(id) {
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
                , url: "/categoriesDestroyData/" + id
                , success: function (data) {
                    fundRaiseCategoriesAllData();
                    // console.log('deleted');
                }
            })
        } else {

            // swal("Canceled");

        }
    });
    // console.log('clicked id', id);

}


//End adCategories page -----------------------------------------
