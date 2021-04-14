//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/adAdvertisementData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                    <tr>
                        <th scope="row">${Number(key)+1}</th>
                        <td>${allData.company_name} </td>
                        <td>${allData.image_size}</td>
                        <td>${allData.impression == null ? '0' : allData.impression}</td>
                        <td>${allData.no_of_clicks == null ? '0' : allData.no_of_clicks}</td>
                        

                        <td>
                            <div>
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
    $('.image_size').val('');
    $('.AdPhotoButton').html('<i class="fas fa-plus mr-1"></i> Upload Ad Photo');
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
    $('.editContainer').html('');
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.advertisementModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/getEditableAdvertiseData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            $('.formFileInput').removeAttr('required');

            $('.company_name').val(data.company_name);
            $('.image_size').val(data.image_size);
            $('.link').val(data.link);
            $('.clickedRowId').html(data.id);

            var editModalFilesRow = ""
            var editModalFilesRow = `
                        <div class="row px-2">
                        <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Add Photo </div>
                        <div class="col-lg-8 col-8 mb-2 ">
                            <a href="../uploads/${data.image} " data-fancybox>
                            <img src="../uploads/${data.image}" class="  mediumFileSize" />
                            </a>
                        </div>
                        </div>
                    `
            $('.editContainer').html(editModalFilesRow);

        }
    })
}
$('#advertisementForm').on('submit', function (event) {
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
            url: "/AdvertiseSubmit"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.advertisementModal').modal('hide');
                clearFormData();
                getAllData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data added success'
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
    } else {
        // edit data  -----------------------------------------------------------------------------

        $.ajax({
            url: "/AdvertiseEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.advertisementModal').modal('hide');
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
                , url: "/advertiseDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}