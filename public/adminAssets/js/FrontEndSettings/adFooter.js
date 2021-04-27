
$("#FooterForm").on("submit", function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true,
        position: "top-end",
        icon: "success",
        showConfirmButton: false,
        timer: 1500,
    });
    var id = $(".PickedDataId").val();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/FooterAddData",
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Msg.fire({
                    type: "success",
                    icon: "success",
                    title: "Data added success",
                });
            },
            error: function (error) {
                // console.log('check the error path error->resposeJson.errors');
                Msg.fire({
                    type: "success",
                    icon: "error",
                    title: "Something went wrong!",
                });
            },
        });
    } else {
        // edit data  -----------------------------------------------------------------------------

        $.ajax({
            url: "/FooterEditSubmit/" + id,
            method: "POST",
            data: new FormData(this),
            dataType: "JSON",
            contentType: false,
            cache: false,
            processData: false,
            success: function (data) {
                Msg.fire({
                    type: "success",
                    icon: "success",
                    title: "Data Update success",
                });
            },
            error: function (error) {
                Msg.fire({
                    type: "success",
                    icon: "error",
                    title: "Something went wrong!",
                });
            },
        });
    }
});
// about --------------------------------------------------------------
function getAboutData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/FooterAboutAllData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                            <div class="row my-2">
                            <div class=" col-12 px-2 d-flex">
                                <div>
                                    <i class="bi bi-circle-fill boldIcon"></i>
                                    ${allData.footer_link_name} 
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 ml-1 d-flex">
                                    <span onclick='AboutEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                    <span onclick='AboutDestroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                                </div>
                            </div>
                           
                        `;
            });
            $(".AboutTableBody").html(getHtml);
        },
    });
}
getAboutData();
function clearFormData() {
    $('.formInputValue').html('').val('');
    $('.addButtonShow').show();
    $('.updateButtonShow').hide();
}

function AboutEditableData(id) {
    // alert(id);
    $('.FooterAboutModal').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/FooterAboutEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            // $('.formInputValue').removeAttr('required');
            $('.about_footer_link_name').val(data.footer_link_name);
            $('.about_link').val(data.link);
            $('.aboutClickedId').html(data.id);

        }
    })
}
$('#FooterAboutForm').on('submit', function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('.aboutClickedId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/FooterAboutAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.FooterAboutModal').modal('hide');
                clearFormData();
                getAboutData();
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
            url: "/FooterAboutEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.FooterAboutModal').modal('hide');
                clearFormData();
                getAboutData();
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
function AboutDestroyData(id) {
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
                , url: "/FooterAboutDelete/" + id
                , success: function (data) {
                    getAboutData();
                }
            })
        } else {


        }
    });

}
// about end -------------------------------------------------------
function getCategoriesData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/FooterCategoriesAllData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `

                            <div class="row my-2">
                                <div class=" col-12 px-2 d-flex">
                                    <div>
                                        <i class="bi bi-circle-fill boldIcon"></i>
                                        ${allData.footer_link_name} 
                                    </div>
                                    <div class="col-lg-2 col-md-2 col-2 ml-1 d-flex">
                                        <span onclick='CategoriesEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                        <span onclick='CategoriesDestroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i></span>
                                    </div>
                                </div>
                            </div>
                           
                        `;
            });
            $(".categoriesTableBody").html(getHtml);
        },
    });
}
getCategoriesData();
function CategoriesEditableData(id) {
    // alert(id);
    $('.adFooterCategories').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/FooterCategoriesEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            $('.categories_footer_link_name').val(data.footer_link_name);
            $('.categories_link').val(data.link);
            $('.categoriesClickedId').html(data.id);

        }
    })
}
$('#FooterCategoriesForm').on('submit', function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('.categoriesClickedId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/FooterCategoriesAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.adFooterCategories').modal('hide');
                clearFormData();
                getCategoriesData();
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
            url: "/FooterCategoriesEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.adFooterCategories').modal('hide');
                clearFormData();
                getCategoriesData();
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
function CategoriesDestroyData(id) {
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
                , url: "/FooterCategoriesDelete/" + id
                , success: function (data) {
                    getCategoriesData();
                }
            })
        } else {


        }
    });

}
// Explore 
function getExploreData() {
    $.ajax({
        type: "GET",
        DataType: "json",
        url: "/FooterExploreAllData",
        success: function (data) {
            // console.log(fundRaiseCategories);
            var getHtml = "";
            $.each(data, function (key, allData) {
                getHtml += `
                            <div class="row my-2">
                            <div class=" col-12 px-2 d-flex">
                                <div>
                                    <i class="bi bi-circle-fill boldIcon"></i>
                                    ${allData.footer_link_name} 
                                </div>
                                <div class="col-lg-2 col-md-2 col-2 ml-1 d-flex">
                                    <span onclick='ExploreEditableData(${allData.id})'><i class=" manageIcons fas fa-edit "></i></span>
                                    <span onclick='ExploreDestroyData(${allData.id})'><i class=" manageIcons fas fa-trash"></i></span>
                                </div>
                            </div>
                        </div>
                           
                        `;
            });
            $(".exploreTableBody").html(getHtml);
        },
    });
}
getExploreData();
function ExploreEditableData(id) {
    // alert(id);
    $('.adFooterExplore').modal('show');
    $.ajax({
        type: "GET"
        , DataType: 'json'
        , url: "/FooterExploreEditableData/" + id
        , success: function (data) {
            // alert(data.category_id);
            $('.updateButtonShow').show();
            $('.addButtonShow').hide();

            // $('.formInputValue').removeAttr('required');
           
            $('.Explore_footer_link_name').val(data.footer_link_name);
            $('.Explore_link').val(data.link);
            $('.ExploreClickedId').html(data.id);

        }
    })
}
$('#FooterExploreForm').on('submit', function (event) {
    event.preventDefault();

    const Msg = Swal.mixin({
        toast: true
        , position: 'top-end'
        , icon: 'success'
        , showConfirmButton: false
        , timer: 1500
    })
    var id = $('.ExploreClickedId').html();

    if (id == "") {
        // add data -----------------------------------------------------------------------------
        $.ajax({
            url: "/FooterExploreAddData"
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                // console.log(data);
                $('.adFooterExplore').modal('hide');
                clearFormData();
                getExploreData();
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
            url: "/FooterExploreEditSubmit/" + id
            , method: "POST"
            , data: new FormData(this)
            , dataType: 'JSON'
            , contentType: false
            , cache: false
            , processData: false
            , success: function (data) {
                $('.adFooterExplore').modal('hide');
                clearFormData();
                getExploreData();
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
function ExploreDestroyData(id) {
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
                , url: "/FooterExploreDelete/" + id
                , success: function (data) {
                    getExploreData();
                }
            })
        } else {


        }
    });

}