//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/adSuccessCategoryData"
        , success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = ""
            $.each(data, function (key, fundRaiseCategories) {
                getHtml += `<tr>
                                <th scope="row">${Number(key)+1}</th>
                                <td>${fundRaiseCategories.category_name}</td>
                                <td >
                                    <button type="button" onclick="categoriesStatusUpdate(${fundRaiseCategories.id})" ${fundRaiseCategories.status == '1' ? 'class="btn btn-warning btn-sm categoriesStatus"' : 'class="btn btn-warning btn-sm backgroundCerulean categoriesStatus"'} >${fundRaiseCategories.status == '1' ? 'Active' : 'Inactive'}
                                    </button>
                                </td>
                                <td>
                                    <div>
                                        
                                        <span onclick='destroyData(${fundRaiseCategories.id})'><i class=" manageIcons fas fa-trash fa-lg"></i></span>
                                    </div>
                                </td>
                            </tr>`
            })
            $('.tableBody').html(getHtml);

        }
    })
}
getAllData();
// common functions------------------------------------
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
                , url: "/categoriesDestroyData/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}

//End adCategories page -----------------------------------------
