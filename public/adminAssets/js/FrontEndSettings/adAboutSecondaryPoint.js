//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/AboutSecondaryData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml1 = "";
            $.each(data, function (key, allData) {
                if (allData.column == "0") {
                    getHtml1 += `
                        <div class=" col-12 d-flex  ">
                            <i class="bi bi-circle-fill boldIcon"></i>
                            <div class="text-truncate">${allData.secondary_point} </div>
                            <div class="col-lg-4 col-md-4 col-4 ml-auto">
                                <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i></span>
                            </div>
                        </div>
                           
                        `;
                }
            });
            $(".tableBody1").html(getHtml1);
            var getHtml2 = "";
            $.each(data, function (key, allData) {
                if (allData.column == "1") {
                    getHtml2 += `
                    <div class=" col-12 d-flex ">
                    <i class="bi bi-circle-fill boldIcon"></i>
                    <div class="text-truncate">${allData.secondary_point} </div>
                    <div class="col-lg-4 col-md-4 col-4 ml-auto">
                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i></span>
                    </div>
                </div>
                           
                        `;
                }
            });
            $(".tableBody2").html(getHtml2);
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
    $(".secondaryPointsModal").modal("show");
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/AboutSecondaryEditableData/" + id,
        success: function (data) {
            // alert(data.category_id);
            $(".updateButtonShow").show();
            $(".addButtonShow").hide();

            // $('.formInputValue').removeAttr('required');
            $(".secondary_point").val(data.secondary_point);
            $(".column").val(data.column);
            $(".clickedId").html(data.id);
        },
    });
}
$("#secondaryPointsForm").on("submit", function (event) {
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
            url: "/AboutSecondaryAdd",
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                // console.log(data);
                $(".secondaryPointsModal").modal("hide");
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
            url: "/AboutSecondaryEditSubmit/" + id,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                $(".secondaryPointsModal").modal("hide");
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
                url: "/AboutSecondaryDelete/" + id,
                success: function (data) {
                    getAllData();
                },
            });
        } else {
        }
    });
}
