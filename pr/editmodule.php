<?php
/* Displays user information and some useful messages */
require 'db.php';
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
    $uid = $_SESSION['uid'];
    $first_name = $_SESSION['first_name'];
    $last_name = $_SESSION['last_name'];
    $email = $_SESSION['email'];
    $active = $_SESSION['active'];
}
?>
<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
  <title>Edit Modules</title>
  <?php include 'css/css.html'; ?>
    <style>
        label {position: relative; line-height: 1.8; margin-bottom: 5px; font-size: 1em;}
        input[type=text],select {margin:0 0 5px 0 !important;background: #fff !important; color: #000 !important; font-size: 1em !important; font-weight: bold;}
        .position {margin: 0px 0px 0px 10px;}
    </style>
</head>

<body>
<div class="midrow row">
<div class="vcenter columns large-6 large-centered"><div class="vcent_p"><div class="vcent_c">

<form name="regdevice" action="regdevice.php" method="post">
<div class="form">
    <div class="row">
    <div class="small-12 large-12 columns text-center">
        <small><a class="back" href="">&#9668; Back To Profile</a></small>
      <h1>Edit Modules</h1>
    </div>
  </div>
    <div class="modules">
            <div class="row wifititle">
                <div class="column large-12 small-12 entitle text-center">
                    <span>WiFi Modules</span>
                </div>
            </div>
                    <?php
                        $result_modules = $mysqli->query("SELECT * FROM minmodules WHERE minumid='$uid'") or die($mysqli->error);

                        if ( $result_modules->num_rows > 0 ) {
                            $count = 0;
                            $rfpins = 0;
                            while($row_modules = $result_modules->fetch_assoc()) {
                                $mapid = $row_modules["mapid"];
                                $mname = $row_modules["mname"];
                                $mpins = $row_modules["mpins"];
                                $mpos = $row_modules["mposition"];
                                $mnear = $row_modules["mnear"];
                                if($count == 0) {
                    ?>
            <div class="row litem fd">
                    <?php
                                } else {
                    ?>
            <div class="row litem">
                    <?php
                                }
                    ?>
                <div class="small-7 large-9 columns">
                    <input type="text" class="linput" value="<?php echo $mname; ?>" disabled style="background: #f9f9f9 !important;" />
                    <input type="hidden" class="pmapid" name="pmapid" value="<?php echo $mapid; ?>">
                </div>
                <div class="small-1 large-1 columns">
                    <a href="#" class="editdonebtn"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                </div>
                <div class="small-4 large-2 columns text-right">
                    <a href="#" class="editbtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-open="deldevice" class="delbtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </div>
                <div class="small-12 large-12 columns">
                    <small class="position capitalize">( In <?php echo $mpos; ?>, near <?php echo $mnear; ?> )</small>
                </div>
            </div>
                    <?php
                                $count = $count + 1;
                            }
                        }
                    ?>
    </div>
    <div class="reveal" id="deldevice" data-reveal>
            <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warning: </h1>
            <p class="lead">Are you sure, you want to delete this Device ? <br/><span id="deldevname"></span></p>
            <p>Note: This action can not be undone !<br/>You have to register this device again.</p>
            <input type="hidden" id="pmapid" value="" /><input type="hidden" id="pmname" value="" />
            <div class="column text-center">
                <button type="button" id="delyes" class="button large button2 success">YES</button>
                <button type="button" id="delno" data-close class="button button2 alert">NO</button>
            </div>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="reveal" id="alertbox" data-reveal>
            <p>Are you sure, you want to delete this Device ? <br/><span id="deldevname"></span></p>
            <button class="close-button" data-close aria-label="Close modal" type="button">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>


</div>
</form>
</div></div></div></div>
    
    
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/foundation.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src='js/pre.js'></script>
<script src='js/device.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.accordion.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.keyboard.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.motion.min.js'></script>
<script src="js/index.js"></script>
        <script>
        var closealert = function() {
            $('#alertbox').foundation('close');
            location.reload(true);
        };
        $(document).ready(function () {
            $('a.back').click(function(){
                parent.history.back();
                return false;
            });
            //alert(2);
            //$('.callout').closest('[data-closable]').fadeOut(3500);
            //if($(".divider").find("span.excl")) {
                //alert($(".divider").find("span.excl").parent().parent().parent().attr("class"));
            //    $(".divider").find("span.excl").parent().parent().parent().append("<div class='row litem accordion-content accord_con text-center' data-tab-content><div class='column large-12 small-12'>Add Remaining Devices <a class='button button2' href='register_device.php'>ADD</a></div></div>");
            //}
            
            $(".editbtn").click(function (e) {
                e.preventDefault();
                $(this).parent().parent().find("input").removeAttr("disabled").addClass("linput_edit").focus();
                $(this).parent().parent().find(".editdonebtn").css("visibility","visible");
                $(this).parent().parent().css("background","#dedede");
            });
            $(".editdonebtn").click(function (e) {
                e.preventDefault();
                $(this).css("visibility","hidden");
                $(this).parent().parent().find("input").attr("disabled","disabled").removeClass("linput_edit");
                $(this).parent().parent().css("background","#f9f9f9");
                
                $pmapid = $(this).parent().parent().find("input.pmapid").val();
                $newmname = $(this).parent().parent().find("input").val();
                alert($pmapid + ", " + $newmname);
                //alert($pmapid + ", " + $pdpin);
                
                $.post("modifymodule.php", {pmapid: $pmapid, new: $newmname}, function(result){
                    $('#alertbox').foundation('close');
                    if(result == 1) {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-check golden" aria-hidden="true"></i> Module Name Modified To: <span class="capitalize golden">' + $newmname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    } else {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-exclamation" aria-hidden="true"></i> Error occured while modifying Module: <span id="deldevname2">' + $pdname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    }
                        $('#alertbox').foundation('open');
                        setTimeout(closealert,2000);
                });
            });
            $(".delbtn").click(function (e) {
                e.preventDefault();
                $("#deldevname").html("Device Name: " + $(this).parent().parent().find("input").val().toUpperCase() + ", Module ID: " + $(this).parent().parent().find("input.pmapid").val().toUpperCase());
                $("#pmname").val($(this).parent().parent().find("input").val());
                $("#pmapid").val($(this).parent().parent().find("input.pmapid").val());
                //$("#pdpin").val($(this).parent().parent().find("input.pdpin").val());
            });
            $("#delyes").click(function (e) {
                e.preventDefault();
                $pmapid = $("#pmapid").val();
                $pmname = $("#pmname").val();
                alert($pmapid);
                $.post("delmodule.php", {pmapid: $pmapid}, function(result){
                    //alert(result);
                    $('#alertbox').foundation('close');
                    if(result == 1) {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-check golden" aria-hidden="true"></i> Module Deleted: <span id="deldevname2" class="capitalize">' + $pmname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    } else {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-exclamation" aria-hidden="true"></i> Error occured while deleting Module: <span id="deldevname2" class="capitalize">' + $pmname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    }
                        $('#alertbox').foundation('open');
                        setTimeout(closealert,2000);
                });
            });
        });
    </script>

</body>
</html>
