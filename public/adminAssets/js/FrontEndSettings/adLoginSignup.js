$("#LoginSignupForm").on("submit", function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true,
        position: "top-end",
        icon: "success",
        showConfirmButton: false,
        timer: 1500,
    });
    var id = $(".PickedDataId").val();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/LoginSignupAddData",
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
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
            url: "/LoginSignupEditSubmit/" + id,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
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
