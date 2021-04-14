$("#mailSendingForm").on("submit", function (event) {
    event.preventDefault();
    console.log("submit prevent success");

    const Msg = Swal.mixin({
        icon: "success",
        showConfirmButton: false,
        timer: 1500,
    });

    // add data -----------------------------------------------------------------------------
    $.ajax({
        url: "/mail-to-subscribe",
        method: "POST",
        data: new FormData(this),
        dataType: "JSON",
        contentType: false,
        cache: false,
        processData: false,
        success: function (response) {
            $(".formInputValue").html("").val("");

            Msg.fire({
                type: "success",
                icon: "success",
                title: "Mail Sended",
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
