
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
                                    <button type="button" onclick="fundRaiseStatusUpdate(${fundRaiseRecentData.id})" ${fundRaiseRecentData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseRecentData.status == '1' ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        <span onclick='fundRaiseEditData(${fundRaiseRecentData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
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

// add data 
// function fundRecentAddData() {
    // $body.off('click', '#fundRecentAddDataButton').on('click', "#fundRecentAddDataButton", function (){
    $('body').on('click', '#fundRecentAddDataButton', function() {
    $('#fundRecentAddData').on('submit', function (event) {
        event.preventDefault();
        event.stopPropagation();
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
});
// }
// clear input data 
function fundRecentClearData() {
    $('.formInputValue').val('');
    $('.fileInputHtml').html('');

    $('.thumbnailButton').html('Thumbnail (Image size will be reduced to 350*210px)<i class="bi bi-image-fill fa-lg blurText ml-auto mr-1"></i>');
    $('.photoButton').html('Upload Photo');
    $('.videoButton').html('Video');
    $('.proof_documentButton').html('Proof Document');
    
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
}

function fundRaiseEditData(id) {
    $('#AddFundRaise').modal('show')
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
            $('#thumbnail').removeAttr('required').html(data.thumbnail);
            $('.thumbnailButton').html(data.thumbnail);
            $('#photo').removeAttr('required').html(data.photo);
            $('.photoButton').html(data.photo);
            $('#video').removeAttr('required').html(data.video);
            $('.videoButton').html(data.video);
            $('#proof_document').removeAttr('required').html(data.proof_document);
            $('.proof_documentButton').val(data.proof_document);
            $('#fundRecentId').html(data.id);
        }
    })
}

function fundRaiseEditedSubmit() {
    $('#fundRecentAddData').on('submit', function (event) {
        event.preventDefault();
        var id = $('#fundRecentId').html();
        const Msg = Swal.mixin({
            toast: true
            , position: 'top-end'
            , icon: 'success'
            , showConfirmButton: false
            , timer: 1500
        })
        console.log("submit prevent success");
        $.ajax({
            url: "/fundRaiseEditedSubmit/" + id
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
