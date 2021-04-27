//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/TeamData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                            <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>${allData.member_name}</td>
                                <td>${allData.member_designation}</td>
                                <td class="text-truncate">${allData.facebook_link}</td>
                                <td class="text-truncate">${allData.linkedin_link}</td>
                                <td class="text-truncate">${allData.twitter_link}</td>
                                <td class="text-truncate">${allData.instagram_link}</td>
                                <td>
                                    <a href="../uploads/${allData.photo}" data-fancybox>
                                        <img src="../uploads/${allData.photo}" class="smallRoundPic" />
                                    </a>
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
    $('.editContainer').html('');
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.adTeamModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/TeamEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            $('.formFileInput').removeAttr('required');
            $('.member_name').val(data.member_name);
            $('.member_designation').val(data.member_designation);
            $('.facebook_link').val(data.facebook_link);
            $('.twitter_link').val(data.twitter_link);
            $('.linkedin_link').val(data.linkedin_link);
            $('.instagram_link').val(data.instagram_link);

            $('.clickedId').html(data.id);
            var editModalFilesRow = ""
            var editModalFilesRow = `
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto"> Photo </div>
                                <div class="col-lg-8 col-8 mb-2 ">
                                    <a href="../uploads/${data.photo}" data-fancybox>
                                    <img src="../uploads/${data.photo}" class="  mediumFileSize" />
                                    </a>
                                </div>
                        </div>
                    `
            $('.editContainer').html(editModalFilesRow);

        }
    })
}
$('#adTeamForm').on('submit', function (event) {
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
            url: "/TeamAdd"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.adTeamModal').modal('hide');
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
            url: "/TeamEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.adTeamModal').modal('hide');
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
                , url: "/TeamDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}