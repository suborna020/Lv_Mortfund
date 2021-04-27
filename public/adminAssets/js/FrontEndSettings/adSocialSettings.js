//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/SocialSettingsAllData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                           
                            <tr>
                            <th scope="row">${Number(key)+1}</th>
                            <td>${allData.social_name} </td>
                            <td class="text-truncate"> ${allData.link} </td>
                            <td>
                                <i class="${allData.social_photo} fa-2x manageIcons"></i>
                            </td>
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
    $(".formInputValue").html("").val("");
    $(".addButtonShow").show();
    $(".updateButtonShow").hide();
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $(".SocialSettingsModal").modal("show");
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/SocialSettingsEditableData/" + id,
        success: function (data) {
            // alert(data.category_id);
            $(".updateButtonShow").show();
            $(".addButtonShow").hide();

            // $('.formInputValue').removeAttr('required');
            $(".social_name").val(data.social_name);
            $(".link").val(data.link);
            $(".social_photo").val(data.social_photo);

            $(".clickedId").html(data.id);
        },
    });
}
$("#SocialSettingsForm").on("submit", function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true,
        position: "top-end",
        icon: "success",
        showConfirmButton: false,
        timer: 1500,
    });
    var id = $(".clickedId").html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/SocialSettingsAddData",
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                // console.log(data);
                $(".SocialSettingsModal").modal("hide");
                clearFormData();
                getAllData();
                Msg.fire({
                    type: "success",
                    icon: "success",
                    title: "Data added success",
                });
            },
            error: function (error) {
                // console.log('check the error path error->resposeJson.errors');
                Msg.fire({
                    type: "success",
                    icon: "error",
                    title: "Something went wrong!",
                });
            },
        });
    } else {
        // edit data  -----------------------------------------------------------------------------

        $.ajax({
            url: "/SocialSettingsEditSubmit/" + id,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $(".SocialSettingsModal").modal("hide");
                clearFormData();
                getAllData();
                Msg.fire({
                    type: "success",
                    icon: "success",
                    title: "Data Update success",
                });
            },
            error: function (error) {
                Msg.fire({
                    type: "success",
                    icon: "error",
                    title: "Something went wrong!",
                });
            },
        });
    }
});

// delete data  -----------------------------------------------------------------------------
function destroyData(id) {
    // id is passed by onclick function
    swal({
        title: "Are you sure you want to delete?",
        text: "You won't be able to revert this!",
        icon: "warning",
        buttons: true,
        dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST",
                DataType: "json",
                url: "/SocialSettingsDelete/" + id,
                success: function (data) {
                    getAllData();
                },
            });
        } else {
        }
    });
}
