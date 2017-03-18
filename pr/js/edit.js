
//new WOW().init();
//$(document).foundation();

$(document).ready(function () {
  alert(2);
});
/*
$(document).ready(function () {
    alert(2);
    $(".editbtn").click(function (e) {
        e.preventDefault();
        $(this).parent().parent().find("input").removeAttr("disabled").focus().css("background","#999");
        $(this).parent().parent().find(".editdonebtn").css("visibility","visible");
    });
    $(".editdonebtn").click(function () {
        $(this).css("visibility","hidden");
        $(this).parent().parent().find("input").attr("disabled","disabled").css("background","#f9f9f9");
    });
    $(".delbtn").click(function (e) {
        e.preventDefault();
        $("#deldevname").html("Device Name: " + $(this).parent().parent().find("input").val());
    });
    $("#edit").click(function (e) {
        alert(2);
        //e.preventDefault();
        //$(".editbtn").css("visibility","visible");
        //$(".delbtn").css("visibility","visible");
    });
    
    //index.js
    $('.form').find('input, textarea').on('keyup blur focus', function (e) {
  
      var $this = $(this),
          label = $this.prev('label');

          if (e.type === 'keyup') {
                if ($this.val() === '') {
              label.removeClass('active highlight');
            } else {
              label.addClass('active highlight');
            }
        } else if (e.type === 'blur') {
            if( $this.val() === '' ) {
                label.removeClass('active highlight'); 
                } else {
                label.removeClass('highlight');   
                }   
        } else if (e.type === 'focus') {

          if( $this.val() === '' ) {
                label.removeClass('highlight'); 
                } 
          else if( $this.val() !== '' ) {
                label.addClass('highlight');
                }
        }

    });

    $('.tab a').on('click', function (e) {

      e.preventDefault();

      $(this).parent().addClass('active');
      $(this).parent().siblings().removeClass('active');

      target = $(this).attr('href');

      $('.tab-content > div').not(target).hide();

      $(target).fadeIn(600);

    });
    
    //pre.js
    $("#mapid").change(function(){
    $mid = $(this).val();
    //alert($mid);
    $.get("pins.php", { mid: $mid }, function(data){
        //alert(data);
        if(data == "0" || data == 0) {
            alert("Sorry this module has already registered devices.\nPlease choose your other module.");
            $("#dpinh").val(0);
        } else {
            $("#dpin").val(data);
            $("#dpinh").val(data);
        }
    });
    });
    $("#register").click(function(e) {
    e.preventDefault();
    if($("#dpinh").val() != 0) {
        $("form").submit();
    } else {
        alert("Sorry this module has already registered devices.\nPlease choose your other module.");
    }
    });

});
*/