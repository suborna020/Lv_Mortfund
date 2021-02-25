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
            // "lengthMenu": '_MENU_ bản ghi trên trang',
            "search": '<i class="fa fa-search"></i>',
            "searchPlaceholder": "search",


        }
        
    }
    
    );
    $('table.dataTable thead td ').css('borderBottom', '1px solid #dee2e6');

});