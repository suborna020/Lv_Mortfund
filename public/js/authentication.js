$(document).on('submit', '.database_operation', function() {
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url, data, function(fb) {
        var resp = $.parseJSON(fb);
        if (resp.status == 'true') {
            // alert(resp.message);
            const Msg = Swal.mixin({
                toast: true
                , position: 'top-end'
                , icon: 'success'
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


/*User Payment Methods*/

$(document).on('submit', '.user_payment_method', function() {
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url, data, function(fb) {
        var resp = $.parseJSON(fb);
        if (resp.status == 'true') {
            // alert(resp.message);
            const Msg = Swal.mixin({
                toast: true
                , position: 'top-end'
                , icon: 'success'
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

/*Subscribe*/

$(document).on('submit', '.subscribe', function() {
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url, data, function(fb) {
        var resp = $.parseJSON(fb);
        if (resp.status == 'true') {
            // alert(resp.message);

            const Msg = Swal.mixin({
                toast: true
                , position: 'top-end'
                , icon: 'success'
                , showConfirmButton: false
                , timer: 1500
            })

            Msg.fire({
                type: 'success'
                , title: resp.message
            })
            setTimeout(function() {
                
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

/*Currency Picker*/

$(document).on('change', '.currency_code', function() {
    var url = $(this).attr('action');
    var data = $(this).serialize();
    $.post(url, data, function(fb) {
        var resp = $.parseJSON(fb);
        if (resp.status == 'true') {
            // alert(resp.message);
            const Msg = Swal.mixin({
                toast: true
                , position: 'top-end'
                , icon: 'success'
                , showConfirmButton: false
                , timer: 1500
            })
            Msg.fire({
                type: 'success'
                , title: resp.message
            })
            setTimeout(function() {
                
            }, 1000);
            // fetch_data(page);
            // fetch_recent_data(recent);
            // fetch_project_data(project_support);
            window.location.reload();
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