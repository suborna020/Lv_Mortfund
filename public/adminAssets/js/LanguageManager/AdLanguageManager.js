//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/adLanguageManagerData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                <tr>
                        <th scope="row">${Number(key)+1}</th>
                        <td>
                        <img src="../${allData.flag_photo}" alt="icon" class="  languageFlag" />
                        </td>
                        <td>${allData.language_name} </td>
                        <td>
                        <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                        </button>
                        </td>
                        <td>
                            <div class="d-flex">
                                <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
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
$('.AllFundRaiseCheckBox').change(function () {
    if ($(this).val() === '1') {
        // when active 
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/adLanguageManagerData"
            , success: function (data) {
                var getHtml = ""
                $.each(data, function (key, allData) {
                    if (allData.status == '1') {
                        
                        getHtml += `
                        <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>
                                <img src="../${allData.flag_photo}" alt="icon" class="  languageFlag" />
                                </td>
                                <td>${allData.language_name} </td>
                                <td>
                                <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                        </tr>`;
                    }
                })
                $(".tableBody").html(getHtml);

            }
        })
    }
    else {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/adLanguageManagerData"
            , success: function (data) {
                var getHtml = ""
                $.each(data, function (key, allData) {
                    if (allData.status == '0') {
                        
                        getHtml += `
                        <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>
                                <img src="../${allData.flag_photo}" alt="icon" class="  languageFlag" />
                                </td>
                                <td>${allData.language_name} </td>
                                <td>
                                <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                        </tr>`;
                    }
                })
                $(".tableBody").html(getHtml);

            }
        })
    }
});
function statusUpdate(id) {
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
        , url: "/adLanguageStatusUpdate/" + id
        , success: function (data) {
            getAllData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Status Changed'
            })
        }
    })
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.successStoriesListModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/getEditableLngContent/" + id
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
                , url: "/adLanguageDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}