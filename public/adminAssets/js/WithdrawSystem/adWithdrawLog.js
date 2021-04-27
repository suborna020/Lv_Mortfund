//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/WithdrawLogData",
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
                                    <span ><i class=" manageIcons fas fa-lg fa-check orange_Icon"></i></span>
                                    <span class="ml-2">Approved</span>
                                </div>
                            </td>
                    </tr>`;
            });
            $(".tableBody").html(getHtml);
        },
    });
}
getAllData();

