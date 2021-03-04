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
  // $(".copiedFilename").html(filename);
  // console.log(filename);

});


