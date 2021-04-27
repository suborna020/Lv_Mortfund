//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/HowItWorksData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                            <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>${allData.title} </td>
                                <td>
                                    <i class="${allData.icon} manageIcons"></i>
                                </td>
                                <td>
                                    <div>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i>
                                    </div>
                                </td>
                            </tr>
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
    // $('.editContainer').html('');
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.adHowItWorksModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/HowItWorksEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            // $('.formFileInput').removeAttr('required');
            $('.title').val(data.title);
            $('.icon').val(data.icon);
            $('.short_description').val(data.short_description);
            $('.clickedId').html(data.id);

        }
    })
}
$('#adHowItWorksForm').on('submit', function (event) {
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
            url: "/HowItWorksAdd"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.adHowItWorksModal').modal('hide');
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
            url: "/HowItWorksEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.adHowItWorksModal').modal('hide');
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
                , url: "/HowItWorksDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}