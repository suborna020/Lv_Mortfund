$("#PrivacyPolicyForm").on("submit", function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true,
        position: "top-end",
        icon: "success",
        showConfirmButton: false,
        timer: 1500,
    });
    // add data -----------------------------------------------------------------------------
    $.ajax({
        url: "/PrivacyPolicyAddData",
        method: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function (data) {
            // alert('SUCESS');
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
});
