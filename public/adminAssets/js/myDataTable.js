$(document).ready(function () {
    $('.myDataTable').DataTable({
        "dom": "rtp",
        "ordering": false,
        "pageLength": 5,
        // "scrollX": "auto",
        
        language: {
            "paginate": {
                "previous": '<i class="bi bi-chevron-left bigIcon"></i>',
                "next": '<i class="bi bi-chevron-right bigIcon"></i>'
            },
        }
    });
});