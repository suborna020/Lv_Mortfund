jQuery(function ($) {
    // --admin login page -------------------------
    // passward icon change
    $("#aLoginPass").on("keyup", function () {
        var getHtml = ` <div class="input-group-text">
      <span class="fas fa-eye"  onclick="showPass()"></span>
  </div>`;
        $("#passwordShow").html(getHtml);
    });
    // --------adashboard page ------------
    // header
    $("#sidebarCollapse").click(function () {
        $("body").toggleClass("sidebar-collapse");
        $(".main-sidebar").toggleClass("sideBarSizeChange");
        $("#frontEndSettingsSideBar").hide();
        return false;
    });
    // header end
    // asidebar
    $("#frontEndSettings").click(function () {
        $("#frontEndSettingsSideBar").toggle();
        return false;
    });
  
  if ($("#frontEndSettings").hasClass("menu-open")) {
    $("#frontEndSettingsSideBar").show();

  }

    $("body")
        .on("mouseenter", "#adminDashboard", function () {
            $(".carouselIcon").show();
        })
        .on("mouseleave", ".adminDashboardContainer", function () {
            $(".carouselIcon").hide();
        });
    // adminDashboardContainer
    jQuery("body").on("click", ".carouselIcon", function (event) {
        // $('.carouselIcon').hide();
        var leftPos = $(".carouselIcon").scrollLeft();
        $("#adminDashboard").animate({ scrollLeft: leftPos + 1000 }, 800);
    });
});
// javascript code
function showPass() {
    var x = document.getElementById("aLoginPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}
// adcategories page --------------------------------------------------------------
// for all 
$('input[type="file"].fileName').on("change", function () {
    var file = $(this).val();
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".copiedFilename").addClass("selected").html(fileName);
});
$(" .myCustomFileInput .custom-file-input").on("change", function () {
    var fileName = $(this).val().split("\\").pop();
    $(this).siblings(".customFileLabel").addClass("selected").html(fileName);
});
$(".searchFormButton").on("click", function () {
    var value = $(".mySearchForm").val().toLowerCase();
    $(".table tr").filter(function () {
        $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
    });
});

//Date  picker
$(".datepicker").datepicker({
    weekStart: 1,
    daysOfWeekHighlighted: "6,0",
    autoclose: true,
    todayHighlight: true,
});
$("#datepicker").datepicker("setDate", new Date());

//bootstrap tooltip
$(function () {
    $('[data-toggle="tooltip"]').tooltip();
});
// $('.social-icon').iconpicker();
// summernote 
$(document).ready(function () {
    $('.MyEditorSummernote1').summernote();
    $('.MySmallSummernote').summernote();


});
$('.MyEditorSummernote1').summernote({
    height: '50vh', // set editor height
    minHeight: null,
    maxHeight: '50vh',
    focus: true,
    placeholder: 'Enter text',
     toolbar: [
        ["style", ["style"]],
        ["font", ["bold", "underline", "clear"]],
        ["fontname", ["fontname"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["table", ["table"]],
        //["insert", ["link", "picture", "video"]],
        ["view", ["fullscreen", "codeview"]]

    ],
});

$('.MySmallSummernote').summernote({
    height: '90px', // set editor height
    minHeight: null,
    maxHeight: '50vh',
    focus: true,
    placeholder: 'Enter text',
     toolbar: [
        ["style", ["style"]],
        ["font", ["bold", "underline", "clear"]],
        ["fontname", ["fontname"]],
        ["color", ["color"]],
        ["para", ["ul", "ol", "paragraph"]],
        ["table", ["table"]],
        //["insert", ["link", "picture", "video"]],
        ["view", ["fullscreen", "codeview"]]

    ],
});