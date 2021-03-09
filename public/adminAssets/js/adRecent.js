
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
                                <td> ${fundRaiseRecentData.raised == null ? '0': raised }</td>
                                <td>${fundRaiseRecentData.deadline}  </td>
                                <td>${fundRaiseRecentData.benificiary_name}</td>
                                <td >
                                    <button type="button" onclick="categoriesStatusUpdat(${fundRaiseRecentData.id})" ${fundRaiseRecentData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseRecentData.status == '1' ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        <span onclick='fundRaiseEditData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='categoriesDestroyDat(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                            </tr>`

            })
            $('#fundRaiseRecentDataBody').html(getHtml);

        }
    })
}

fundRaiseRecentAllData();
$('#categoriesCheck').change(function () {
    if ($(this).val() === '1') {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/fundRaiseRecentData"
            , success: function (fundRaiseRecentData) {
                // console.log(fundRaiseRecentData);
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
                                <span onclick='categoriesDestroyDat(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
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
                // console.log(fundRaiseRecentData);
                var getHtml = ""
                $.each(fundRaiseRecentData, function (key, fundRaiseRecentData) {
                    // console.log(fundRaiseRecentData.status=='1');
                    if (fundRaiseRecentData.status == '0') {
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
                                                <span onclick='fundRaiseDestroyDat(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
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

// add data 
function fundRecentAddData() {
    $('#fundRecentAddData').on('submit', function (event) {
        event.preventDefault();
        const Msg = Swal.mixin({
            toast: true
            , position: 'top-end'
            , showConfirmButton: false
            , timer: 1500
        })
        console.log("submit prevent success");
        $.ajax({
            url: "/fundRecentAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.myAddNewModal').modal('hide');
                fundRaiseRecentAllData();
                fundRecentClearData()
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
    });
}
// clear input data 
function fundRecentClearData() {
    $('#category_id').val('');
    $('#location').val('');
    $('#title').val('');
    $('#benificiary_name').val('');
    $('#needed_amount').val('');
    $('#deadline').val('');
    $('#story').val('');
    $('#thumbnail').html('');
    $('.thumbnailButton').html('Thumbnail (Image size will be reduced to 350*210px)<i class="bi bi-image-fill fa-lg blurText ml-auto mr-1"></i>');
    $('#photo').html('');
    $('.photoButton').html('Upload Photo');
    $('#video').html('');
    $('.videoButton').html('Video');
    $('#proof_document').html('');
    $('proof_documentButton').html('Upload Photo');
    
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
}

function fundRaiseEditData(id) {
    // id is passed by onclick function
    // console.log('clicked id', id);
    $('#AddFundRaise').modal('show')
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/fundRaiseEditData/" + id
        , success: function (data) {
            console.log(data);
            
            // $('.updateButtonShow').show();
            // $('.addButtonShow').hide();
          
            // console.log(data.icon);
            // console.log(data.status);
            // $('#id').html(data.id);
            // $('#category_name').val(data.category_name);
            // $('#icon').html(data.icon);
            // $('#status').val(data.status);

            // $('#category_name').val(data.category_name);
            // $('#category_id').val('');
            // $('#location').val('');
            // $('#title').val('');
            // $('#benificiary_name').val('');
            // $('#needed_amount').val('');
            // $('#deadline').val('');
            // $('#story').val('');
            // $('#thumbnail').html('');
            // $('.thumbnailButton').html('Thumbnail (Image size will be reduced to 350*210px)<i class="bi bi-image-fill fa-lg blurText ml-auto mr-1"></i>');
            // $('#photo').html('');
            // $('.photoButton').html('Upload Photo');
            // $('#video').html('');
            // $('.videoButton').html('Video');
            // $('#proof_document').html('');
            // $('proof_documentButton').html('Upload Photo');
        }
    })
}

function categoriesEditedSubmit() {
    $('#categoriesAddData').on('submit', function (event) {
        event.preventDefault();
        var id = $('#id').html();
        const Msg = Swal.mixin({
            toast: true
            , position: 'top-end'
            , icon: 'success'
            , showConfirmButton: false
            , timer: 1500
        })
        console.log("submit prevent success");
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
    });
}
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
