jQuery(function ($) {
  // --admin login page -------------------------
  // passward icon change 
  $("#aLoginPass").on("keyup", function () {
    var getHtml = ` <div class="input-group-text">
      <span class="fas fa-eye"  onclick="showPass()"></span>
  </div>`
    $('#passwordShow').html(getHtml);

  });
  // --------adashboard page ------------
  // header 
  $('#sidebarCollapse').click(function () {
    $('body').toggleClass('sidebar-collapse');
    $('.main-sidebar').toggleClass('sideBarSizeChange');
    $('#frontEndSettingsSideBar').hide();
    return false;
  });
  // header end 

  $('body').on('mouseenter', '#adminDashboard', function () {
    $('.carouselIcon').show();
  }).on('mouseleave', '.adminDashboardContainer', function () {
    $('.carouselIcon').hide();
  });
  // adminDashboardContainer
  jQuery('body').on('click', '.carouselIcon', function (event) {
    // $('.carouselIcon').hide();
    var leftPos = $('.carouselIcon').scrollLeft();
    $("#adminDashboard").animate({ scrollLeft: leftPos + 1000 }, 800);
  });
  // asidebar 
  $('#frontEndSettings').click(function () {
    $('#frontEndSettingsSideBar').toggle();
    return false;
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
$('input[type="file"].fileName').on('change', function () {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".copiedFilename").addClass("selected").html(fileName);
  // var filename = e.target.files[0];
  // $(this).siblings(".copiedFilename").addClass("selected").html(filename);
  // console.log(filename);

});
$(".searchFormButton").on("click", function () {
  var value = $(".mySearchForm").val().toLowerCase();
  $(".table tr").filter(function () {
    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
  });
});

$(" .myCustomFileInput .custom-file-input").on("change", function () {
  var fileName = $(this).val().split("\\").pop();
  $(this).siblings(".customFileLabel").addClass("selected").html(fileName);
});

//Date  picker
$('.datepicker').datepicker({
  weekStart: 1,
  daysOfWeekHighlighted: "6,0",
  autoclose: true,
  todayHighlight: true,
});
$('#datepicker').datepicker("setDate", new Date());

// $(".fancybox").fancybox({
//   helpers: {
//     title: {
//       type: 'float'
//     }
//   }
// });



