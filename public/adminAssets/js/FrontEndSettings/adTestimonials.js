//  ------------------------------------------
function getAllData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/TestimonialsAllData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                            <tr>
                            <th scope="row">${Number(key)+1}</th>
                            <td> ${allData.author_name}</td>
                            <td>${allData.designation}</td>
                            <td > ${allData.company_name}</td>
                            <td class="text-truncate">${allData.authors_text}</td>
                            <td>
                                <a href="../${allData.photo}"  data-fancybox>
                                    <img src="../${allData.photo}"  class="smallRoundPic" />
                                </a>
                            </td>
                            <td>
                                <div>
                                <span onclick='getEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                <span onclick='destroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i>
                                </div>
                            </td>
                        </tr>
                              
                           
                        `;
            });
            $(".tableBody").html(getHtml);
        },
    });
}
getAllData();
function clearFormData() {
    $('.formInputValue').html('').val('');
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
    $('.editContainer').html('');
}
//get edit data  -----------------------------------------------------------------------------
function getEditableData(id) {
    // alert(id);
    $('.adTestimonials').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/TestimonialsEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            $('.formFileInput').removeAttr('required');

            $('.author_name').val(data.author_name);
            $('.designation').val(data.designation);
            $('.company_name').val(data.company_name);
            $('.authors_text').val(data.authors_text);

            $('.clickedId').html(data.id);
            var editModalFilesRow = ""
            var editModalFilesRow = `
                        <div class="row px-2">
                            <div class="col-lg-4 col-4 mb-2 smallHeadline my-auto"> Photo </div>
                                <div class="col-lg-8 col-8 mb-2 ">
                                    <a href="../${data.photo}"  data-fancybox>
                                    <img src="../${data.photo}"  class="  mediumFileSize" />
                                    </a>
                                </div>
                        </div>
                    `
            $('.editContainer').html(editModalFilesRow);

        }
    })
}
$('#TestimonialsForm').on('submit', function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('.clickedId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        alert('add');
        $.ajax({
            url: "/TestimonialsAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.adTestimonials').modal('hide');
                clearFormData();
                getAllData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data added success'
                })
            }
            , error: function (error) {
                // console.log('check the error path error->resposeJson.errors');
                Msg.fire({
                    type: 'success'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        })
    } else {
        // edit data  -----------------------------------------------------------------------------

        $.ajax({
            url: "/TestimonialsEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.adTestimonials').modal('hide');
                clearFormData();
                getAllData();
                Msg.fire({
                    type: 'success'
                    , icon: 'success'
                    , title: 'Data Update success'
                })
            }
            , error: function (error) {
                Msg.fire({
                    type: 'success'
                    , icon: 'error'
                    , title: 'Something went wrong!'
                })
            }
        })
    }
});

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
                , url: "/TestimonialsDelete/" + id
                , success: function (data) {
                    getAllData();
                }
            })
        } else {


        }
    });

}