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
  

});
function showPass() {
    var x = document.getElementById("aLoginPass");
    if (x.type === "password") {
        x.type = "text";
    } else {
        x.type = "password";
    }
}