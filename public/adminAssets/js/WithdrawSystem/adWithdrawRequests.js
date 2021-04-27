//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/adWithdrawRequestsData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                        <tr>
                            <th scope="row">${Number(key)+1}</th>
                            <td>${allData.gateway_name}</td>
                            <td>${allData.name}</td>
                            <td>${allData.id}</td>
                            <td>${allData.amount}</td>
                            <td>${allData.charge}</td>
                            <td>${allData.created_at}</td>
                            <td>${allData.processing_time}</td>
                            <td>
                                <div>
                                    <span onclick="statusUpdate(${allData.id})"><i class=" manageIcons fas fa-lg fa-check"></i></span>
                                    <span onclick='destroyData(${allData.id})'><i class=" manageIcons fa-lg fas fa-times"></i></span>
                                </div>
                            </td>
                    </tr>`;
            });
            $(".tableBody").html(getHtml);
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
        , url: "/WithdrawRequestStatusUpdate/" + id
        , success: function (data) {
            getAllData();
            Msg.fire({
                type: 'success'
                , icon: 'success'
                , title: 'Request Approved'
            })
        }
    })
}
// delete data  -----------------------------------------------------------------------------

function destroyData(id) {
    // id is passed by onclick function 
    swal({
        title: 'Are you sure you want to delete?'
        , text: "You won't be able to revert this!"
        , icon: 'warning'
        , buttons: true
        , dangerMode: true,
    }).then((willDelete) => {
        if (willDelete) {
            $.ajax({
                type: "POST"
                , DataType: 'json'
                , url: "/WithdrawDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}