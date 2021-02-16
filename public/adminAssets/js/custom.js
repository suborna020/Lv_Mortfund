jQuery(function ($) {
  $("#aLoginPass").on("keyup", function () {
    var getHtml = ` <div class="input-group-text">
      <span class="fas fa-eye"  onclick="showPass()"></span>
  </div>`
    $('#passwordShow').html(getHtml);

  });

  $('#sidebarCollapse').click(function () {
    $('body').toggleClass('sidebar-collapse');
    $('.main-sidebar').toggleClass('sideBarSizeChange');
    return false;
  });
  $("#adminDashboard").on("hover", function () {
    alert("hi");
   
    $('.carouselIcon').show();

  });
  $('body').on('mouseenter', '#adminDashboard', function () {
    $('.carouselIcon').show();
}).on('mouseleave', '.adminDashboardContainer', function () {
  $('.carouselIcon').hide();
});
// adminDashboardContainer
jQuery('body').on('click', '.carouselIcon', function (event) {
  // $('.carouselIcon').hide();
  var leftPos = $('.carouselIcon').scrollLeft();
  $("#adminDashboard").animate({scrollLeft: leftPos + 1000}, 800);

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

