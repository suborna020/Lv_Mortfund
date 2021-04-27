//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        // only for recent route
        url: "/WithdrawAllMethod",
        success: function (data) {
            // console.log(fundRaiseRecentData);
            var getHtml = "";
            $.each(data, function (key, data) {
                getHtml += `
                <tr>
                        <th scope="row">${Number(key)+1}</th>
                        <td>${data.gateway_name}</td>
                        <td>${data.min_limit}</td>
                        <td>${data.max_limit}</td>
                        <td>${data.charge}</td>
                        <td>
                        <button type="button" onclick="statusUpdate(${data.id})" ${data.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${data.status == '1' ? 'Active' : 'Inactive'}
                        </button>
                        
                        </td>
                </tr>
                   
               `;
            });
            $(".FundRaiseTableBody").html(getHtml);
        },
    });
}
getAllData();

function statusUpdate(id) {
    // id is passed by onclick function 
    // console.log('clicked id', id);
    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , showConfirmButton: false
        , timer: 1500
    })
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/WithdrawStatusUpdate/" + id
        , success: function (data) {
            getAllData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Status Changed'
            })
        }
    })
}