$(document).on('submit', '.database_operation', function() {
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url, data, function(fb) {
        var resp = $.parseJSON(fb);
        if (resp.status == 'true') {
            // alert(resp.message);
            const Msg = Swal.mixin({
                icon: 'success'
                , showConfirmButton: false
                , timer: 1500
            })
            Msg.fire({
                type: 'success'
                , title: resp.message
            })
            setTimeout(function() {
                window.location.href = resp.reload;
            }, 1000);
        } else {
            const Msg = Swal.mixin({
                toast: true
                , position: 'top-end'
                , icon: 'warning'
                , showConfirmButton: false
                , timer: 1500
            })
            Msg.fire({
                type: 'warning'
                , title: resp.message
            })
             
        }
    })
    return false;
});