//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/adSuccessCategoryData"
        , success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = ""
            $.each(data, function (key, fundRaiseCategories) {
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
            $('.tableBody').html(getHtml);

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
