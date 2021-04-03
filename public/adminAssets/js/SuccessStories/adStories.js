//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET"
        , DataType: 'json'
        // only for recent route 
        , url: "/stories"
        , success: function (data) {
            // console.log(fundRaiseRecentData);
            var getHtml = ""
            $.each(data, function (key, data) {
                var timestamp = data.created_at
                var date = new Date(timestamp);
                var created_at = (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear());
                getHtml += `
                <tr>
                    <th scope="row">${key + 1}</th>
                    <td>${data.title}</td>
                    <td>
                        <a href="../${data.author_photo}" data-fancybox>
                            <img src="../${data.author_photo}" class="smallRoundPic" />
                        </a>
                        ${data.author_name}
                    </td>
                    <td>${created_at}</td>
                    <td>
                        <div>
                            <span data-toggle="tooltip"  title="Edit" id='editFundRecentButton' onclick='getEditableData(${data.id})'><i class=" manageIcons fa-lg fas fa-edit"></i></span>
                            <span data-toggle="tooltip"  title="Delete" onclick='destroyData(${data.id})'><i class=" manageIcons fa-lg fas fa-trash"></i></span>
                        </div>
                    </td>
                </tr>`
            })
            $('.FundRaiseTableBody').html(getHtml);
        }
    })
}
getAllData();
// common functions------------------------------------
// clear input data  -----------------------------------------------------------------------------
function clearFormData() {
    $('.formInputValue').html('').val('');
    $('.title').html('Enter Title');
    $('.author_photoButton').html('Author Photo <i class="bi bi-image-fill fa-lg blurText ml-auto  mr-1"></i>');
    $('.author_name').html('Author name');
    $('.story').html('Write the story within 50 words ');
    $('.photoButton').html('<i class="fas fa-plus "></i> Upload Photo &nbsp; &nbsp; &nbsp');
    $('.author_name').html('Author name');

    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
    $('.editContainer').html('');
    $('.clickedRowId').html("");

}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.successStoriesListModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/getEditableStory/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();
            $('.fileInput').removeAttr('required');
            
            $('.title').val(data.title);
            $('.author_name').val(data.author_name);
            $('.story').val(data.story); 

            $('.clickedRowId').html(data.id);
            var editModalFilesRow = ""
            var editModalFilesRow = `
                        <div class="row px-2">
                        <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Author Photo </div>
                        <div class="col-lg-8 col-8 mb-2 ">
                            <a href="../${data.author_photo} " data-fancybox>
                            <img src="../${data.author_photo}" class="  mediumFileSize" />
                            </a>
                        </div>
                        </div>
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto">Photo </div>
                            <div class="col-lg-8 col-8 mb-2 ">
                                <a href="../${data.author_photo}" data-fancybox>
                                <img src="../${data.photo}" alt="icon" class="  mediumFileSize" />
                                </a>
                            </div>
                        </div>
                    `
            $('.editContainer').html(editModalFilesRow);

        }
    })
}

$('#successStoriesListForm').on('submit', function (event) {
    // word edit 
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
            url: "/addSuccessStoriesData"
            // word edit 
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.successStoriesListModal').modal('hide');
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
            url: "/editSuccessStoriesData/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.successStoriesListModal').modal('hide');
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
                , url: "/successStoriesDestroyData/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}

//End adCategories page -----------------------------------------
