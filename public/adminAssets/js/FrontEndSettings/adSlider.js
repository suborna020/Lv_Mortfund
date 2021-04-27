//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/sliderData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                             <tr>
                                    <th scope="row">${Number(key)+1}</th>
                                    <td>${allData.slider_title} </td>
                                 
                                    <td>
                                        <div>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i>
                                        </span>
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
    $('.editContainer').html('');
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.adSliderModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/sliderEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            $('.formFileInput').removeAttr('required');
            $('.slider_title').val(data.slider_title);
            $('.slide_sub_title').val(data.slide_sub_title);
            $('.clickedId').html(data.id);
            var editModalFilesRow = ""
            var editModalFilesRow = `
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">slider Photo </div>
                                <div class="col-lg-8 col-8 mb-2 ">
                                    <a href="../${data.slider_photo} " data-fancybox>
                                    <img src="../${data.slider_photo}" class="  mediumFileSize" />
                                    </a>
                                </div>
                        </div>
                    `
            $('.editContainer').html(editModalFilesRow);

        }
    })
}
$('#adSliderForm').on('submit', function (event) {
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
            url: "/sliderAdd"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.adSliderModal').modal('hide');
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
            url: "/sliderEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.adSliderModal').modal('hide');
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
                , url: "/sliderDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}