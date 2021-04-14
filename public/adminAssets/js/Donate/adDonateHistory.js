//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/donateAllData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                var timestamp = allData.created_at
                var date = new Date(timestamp);
                var created_at = (date.getDate() + "/" + (date.getMonth() + 1) + "/" + date.getFullYear());
                getHtml += `
                        <tr>
                            <th scope="row">${Number(key)+1}</th>
                            <td> &nbsp; &nbsp; ${allData.id}</td>
                            <td>${allData.name}</td>
                            <td>$ ${allData.amount}</td>
                            <td>${allData.charge} %</td>
                            <td><button type="button" class="btn whiteText py-0 orangeBackground btn-sm ">${allData.gateway_name} </button></td>
                            <td> ${created_at}</td>
                        </tr>
                                
                        `;
            });
            $(".tableBody").html(getHtml);
        },
    });
}
getAllData();

$('.AllFundRaiseCheckBox').change(function () {
    if ($(this).val() === '1') {
        // when active 
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/adLanguageManagerData"
            , success: function (data) {
                var getHtml = ""
                $.each(data, function (key, allData) {
                    if (allData.status == '1') {
                        
                        getHtml += `
                        <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>
                                <img src="../uploads/${allData.flag_photo}" alt="icon" class="  languageFlag" />
                                </td>
                                <td>${allData.language_name} </td>
                                <td>
                                <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>

                                    </div>
                                </td>
                        </tr>`;
                    }
                })
                $(".tableBody").html(getHtml);

            }
        })
    }
    else {
        $.ajax({
            type: "GET"
            , DataType: 'json'
            , url: "/adLanguageManagerData"
            , success: function (data) {
                var getHtml = ""
                $.each(data, function (key, allData) {
                    if (allData.status == '0') {
                        
                        getHtml += `
                        <tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>
                                <img src="../uploads/${allData.flag_photo}" alt="icon" class="  languageFlag" />
                                </td>
                                <td>${allData.language_name} </td>
                                <td>
                                <button type="button" onclick="statusUpdate(${allData.id})" ${allData.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${allData.status == '1' ? 'Active' : 'Inactive'}
                                </button>
                                </td>
                                <td>
                                    <div class="d-flex">
                                        <span class="d-flex"><i class="bi bigIcon fa-lg bi-chevron-expand manageIcons rotate"></i></span>
                                        <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit fa-lg"></i></span>
                                        <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>

                                    </div>
                                </td>
                        </tr>`;
                    }
                })
                $(".tableBody").html(getHtml);

            }
        })
    }
});
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
        , url: "/adLanguageStatusUpdate/" + id
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
                , url: "/adLanguageDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}