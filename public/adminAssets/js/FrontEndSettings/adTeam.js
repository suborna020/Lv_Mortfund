//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/navManusData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                            <div class="row mt-2">
                            <div class=" col-12 d-flex">
                                <i class="bi bi-circle-fill boldIcon"></i>${allData.menu_item} 
                                <div class="col-lg-2 col-md-2 col-2 ml-auto">
                                    <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                           
                        `;
            });
            $(".tableBody").html(getHtml);
        },
    });
}
getAllData();
function clearFormData() {
    $('.formInputValue').html('').val('');
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.adLogoNavModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/navManusEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            // $('.formInputValue').removeAttr('required');
            $('.menu_item').val(data.menu_item);
            $('.link').val(data.link);
            $('.clickedId').html(data.id);

        }
    })
}
$('#adLogoNavForm').on('submit', function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('.clickedId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/navManusAdd"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.adLogoNavModal').modal('hide');
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
            url: "/navManusEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.adLogoNavModal').modal('hide');
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
                , url: "/navManusDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}