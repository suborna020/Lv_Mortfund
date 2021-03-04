
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
                // console.log(fundRaiseCategories.status);
                getHtml += `<tr>
                                <th scope="row">${key + 1}</th>
                                <td>${fundRaiseCategories.category_name}</td>
                                <td>
                                <input type="hidden"  name="status" value="${fundRaiseCategories.status}" id="fundRaiseCategoriesStatus" >
                                ${fundRaiseCategories.status == '1' ? '<button type="button" class="btn btn-warning btn-sm categoriesStatus">Active</button>' : '<button type="button" class="btn btn-warning btn-sm backgroundCerulean categoriesStatus ">Inactive</button>'}
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
// add data 
function categoriesAddData() {
    $('#categoriesAddData').on('submit', function (event) {
        event.preventDefault();
        const Msg = Swal.mixin({
            toast: true
            , position: 'top-end'
            , showConfirmButton: false
            , timer: 1500
        })
        // console.log("submit prevent success");
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
    });
}
// clear input data 
function categoriesClearData() {
    $('#category_name').val('');
    $('#icon').html('Upload Photo');
    $('#status').val('');
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
}

function categoriesEditData(id) {
    // id is passed by onclick function
    // console.log('clicked id', id);
    $('#AddNewCategory').modal('show')
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/categoriesEditData/" + id
        , success: function (data) {
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();
            // console.log(data.category_name);
            // console.log(data.icon);
            // console.log(data.status);
            $('#id').html(data.id);
            $('#category_name').val(data.category_name);
            $('#icon').html(data.icon);
            $('#status').val(data.status);
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
                , success: function(data) {
                    fundRaiseCategoriesAllData();
                    // console.log('deleted');
                }
            })
        } else{
        
            // swal("Canceled");
          
        }
    });
    // console.log('clicked id', id);

}


//End adCategories page -----------------------------------------
