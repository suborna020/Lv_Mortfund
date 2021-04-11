//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/adReportedMembersData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                            <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>${allData.name}</td>
                                <td>${allData.address}</td>
                                <td>${allData.email}</td>
                                <td>${allData.mobile_no}</td>

                            </tr>`;
            });
            $(".tableBody").html(getHtml);
        },
    });
}
getAllData();
