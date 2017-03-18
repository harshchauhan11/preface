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
  <title>Welcome <?php echo $first_name.' '.$last_name; ?></title>
  <?php include 'css/css.html'; ?>
    <style>
        label {position: relative; line-height: 1.8; margin-bottom: 5px; font-size: 1em;}
        input[type=text],select {margin:0 0 0px 0 !important; font-size: 1em !important; font-weight: bold;}
        span.line {display: inline-block; color: #fff; font-weight: 100;}
    </style>
</head>

<body>
<div class="midrow row">
<div class="vcenter columns large-6 large-centered"><div class="vcent_p"><div class="vcent_c">
    
<div class="form">
    <div class="row">
        <div class="column large-12 small-12">
            <h1>Welcome to <span class="line"><strong class="logo">Minnie</strong> Dashboard</span></h1>
            <h2><?php echo $first_name.' '.$last_name; ?></h2>
          
          <?php 
     
          // Display message about account verification link only once
            /*
          if ( isset($_SESSION['message']) )
          {
              echo $_SESSION['message'];
              
              // Don't annoy the user with more messages upon page refresh
              unset( $_SESSION['message'] );
          }
          */
          
          ?>
          
          <?php
          
          // Keep reminding the user this account is not active, until they activate
            /*
          if ( !$active ){
              echo
              '<div class="info">
              Account is unverified, please confirm your email by clicking
              on the email link!
              </div>';
          }
          */
          ?>
          
            <p>
                <?php echo $email; ?><a href="logout.php"><button class="button button2 logout" name="logout"/>Log Out</button></a>
            </p>
        </div>
        <div class="column large-12 small-12">
        <div class="modules">
            <div class="row wifititle">
                <div class="column large-6 small-12 entitle large-text-left">
                    <span>WiFi Modules: </span>
                </div>
                <div class="column large-6 small-12 large-text-right">
                    <a class="button button2 pink" href="register_module.php">Register New</a>
                    <!-- a class="button button2 pink" href="#" id="edit">Edit</a -->
                </div>
            </div>
            <ul class="row accordion" data-accordion data-multi-expand="true" id="accordbox">
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
                <li class="column large-12 accordion-item is-active" data-accordion-item>
                    <a href="#" class="row accordion-title accord fd divider">
                    <?php
                                } else {
                    ?>
                <li class="column large-12 accordion-item" data-accordion-item>
                    <a href="#" class="row accordion-title accord divider">
                    <?php
                                }
                    ?>

                      <div class="small-7 large-9 columns">
                          <?php echo $mname; ?><input type="hidden" class="pmapid" name="pmapid" value="<?php echo $mapid; ?>">
                          <small><span class="line">( In <?php echo $mpos; ?></span> <span class="line">near <?php echo $mnear; ?> )</span></small>
                      </div>
                      <div class="small-5 large-3 columns text-right">
                          <?php
                                $result_pins = $mysqli->query("SELECT GREATEST(mpins - (SELECT COUNT(dpin) FROM mindevices WHERE mapdid='$mapid'),0) AS FPINS FROM minmodules WHERE mapid='$mapid'") or die($mysqli->error);
                                if ( $result_pins->num_rows > 0 ) {
                                    while($row_pins = $result_pins->fetch_assoc()) {
                                        $rfpins = $row_pins["FPINS"];
                                        if($rfpins == 0) {
                          ?>
                                            <span class="check" title="This module's all devices are registered."><?php echo $mpins; ?> <i class="fa fa-check" aria-hidden="true"></i></span>
                          <?php
                                        } else {
                                            $fpins = $mpins - $rfpins;
                          ?>
                                            <span class="excl" title="This module has remaining devices to be registered."><?php echo $fpins; ?> <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span>
                          <?php
                                        }
                                    }
                                }
                          ?>
                      </div>
                    </a>
                        <?php
                                $result_devices = $mysqli->query("SELECT * FROM mindevices WHERE mapdid='$mapid'") or die($mysqli->error());

                                if ( $result_devices->num_rows > 0 ) {
                                    while($row_devices = $result_devices->fetch_assoc()) {
                                        $dname = $row_devices["dname"];
                                        $dpin = $row_devices["dpin"];
                                        $dstatus = $row_devices["dstatus"];
                        ?>

                    <div class="row litem accordion-content accord_con" data-tab-content>

                      <div class="small-10 large-5 columns">
                          <input type="text" class="linput" value="<?php echo $dname; ?>" disabled />
                          <input type="hidden" class="pdpin" name="pdpin" value="<?php echo $dpin; ?>">
                      </div>
                      <div class="small-1 large-1 columns">
                          <a href="#" class="editdonebtn"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
                      </div>
                      <div class="small-8 large-4 columns">
                          <button type="button" class="button button2 success">ON</button>
                          <button type="button" class="button button2 alert">OFF</button>
                      </div>
                      <div class="small-4 large-2 columns text-right">
                          <a href="#" class="editbtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-open="deldevice" class="delbtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                      </div>
                      <div class="small-12 large-12 columns text-right">
                          <p>STATUS: <strong class="status"><?php echo $dstatus; ?></strong> | Last updated: <strong>12 Mar, 8 PM</strong></p>
                      </div>

                    </div>
                        <?php
                                    }
                                    if($rfpins != 0) {
                        ?>
                    <div class="row litem accordion-content accord_con" data-tab-content>
                        <div class="column large-12 small-12 text-center capitalize">Add Remaining Devices To <b><?php echo $mname; ?> :</b><a class="button button2" href="register_device.php">Add Device</a></div>
                    </div>
                        <?php
                                        
                                    }
                                } else {
                        ?>
                    <div class="row litem accordion-content accord_con" data-tab-content>
                        <div class="column large-12 small-12 text-center capitalize">You haven't added any Device to this module. <a class="button button2" href="register_device.php">ADD DEVICE</a></div>
                    </div>
                        <?php
                                }
                        ?>
                </li>
                    <?php
                                    $count = $count + 1;
                                }
                        }
                    ?>
            </ul>
            <div class="row accord_ld ld"></div>
        
            
            <!-- div class="row">
                <div class="column large-12 small-12">
                    <hr/>
                    <ul class="accordion" data-accordion data-allow-all-closed="true">
                        <?php 
                            $result_modules = $mysqli->query("SELECT * FROM minmodules WHERE minumid='$uid'") or die($mysqli->error);

                            if ( $result_modules->num_rows > 0 ) {
                                    while($row_modules = $result_modules->fetch_assoc()) {
                                        $mapid = $row_modules["mapid"];
                                        $mname = $row_modules["mname"];
                                        //echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. "<br>";
                        ?>
                        <li class="accordion-item" data-accordion-item>
                            <a href="#" class="accordion-title accord fd divider">&#8212; <b><?php echo $mname; ?><input type="hidden" id="pmapid" name="pmapid" value="<?php echo $mapid; ?>"><small></small></b></a>
                            <div class="accordion-content accord_con" data-tab-content>
                                <ul class="vertical menu docs-nav">
                                <?php
                                        $result_devices = $mysqli->query("SELECT * FROM mindevices WHERE mapdid='$mapid'") or die($mysqli->error());
                                        
                                        if ( $result_devices->num_rows > 0 ) {
                                            while($row_devices = $result_devices->fetch_assoc()) {
                                                $dname = $row_devices["dname"];
                                ?>
                                    <li>
                                        <div class="row text-center">
                                        <div class="column large-6 small-12 large-text-left"><b><?php echo $dname; ?></b></div>
                                        <div class="column large-6 small-12 large-text-right">
                                            <a class="button button2" href="regmodule.php">ON</a>
                                            <a class="button button2" href="regmodule.php">OFF</a>
                                        </div>
                                        </div>
                                    </li>
                                    <?php
                                            }
                                    ?>
                                    <li>
                                        <div class="row text-center">
                                        <div class="column large-12 small-12 text-center">
                                            <a href="register_device.php">Register devices</a> for this module.
                                        </div>
                                        </div>
                                    </li>
                                    <?php
                                        } else {
                                    ?>
                                    <li>
                                        <div class="row text-center">
                                            <div class="column large-12 small-12">You haven't added any Device for this module. <a class="button button2" href="register_device.php">ADD</a></div>
                                        </div>
                                    </li>
                                    <?php
                                        }
                                    ?>
                                </ul>
                            </div>
                        </li>
                        <?php
                                    }
                            }
                        ?>
                    </ul>
                </div>
            </div -->
        </div>
            
        <div class="reveal" id="deldevice" data-reveal>
            <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warning: </h1>
            <p class="lead">Are you sure, you want to delete this Device ? <br/><span id="deldevname"></span></p>
            <p>Note: This action can not be undone !<br/>You have to register this device again.</p>
            <input type="hidden" id="pmapid" value="" /><input type="hidden" id="pdpin" value="" /><input type="hidden" id="pdname" value="" />
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
    </div>
</div>
</div></div></div></div>
    
	
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.2.1/foundation.js"></script>
    <script>
        $(document).foundation();
        var closealert = function() {
            $('#alertbox').foundation('close');
            location.reload(true);
        };
        $(document).ready(function () {
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
                
                $pmapid = $(this).parent().parent().parent().find("input.pmapid").val();
                $pdpin = $(this).parent().parent().find("input.pdpin").val();
                $pdname = $(this).parent().parent().find("input").val();
                $newdname = $(this).parent().parent().find("input").val();
                //alert($pmapid + ", " + $pdpin + ", " + $newdname);
                //alert($pmapid + ", " + $pdpin);
                $.post("modifydevice.php", {pmapid: $pmapid, pdpin: $pdpin, new: $newdname}, function(result){
                    $('#alertbox').foundation('close');
                    if(result == 1) {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-check golden" aria-hidden="true"></i> Device Name Modified To: <span class="capitalize golden">' + $newdname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    } else {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-exclamation" aria-hidden="true"></i> Error occured while modifying Device: <span id="deldevname2">' + $pdname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    }
                        $('#alertbox').foundation('open');
                        setTimeout(closealert,2000);
                });
            });
            $(".delbtn").click(function (e) {
                e.preventDefault();
                $("#deldevname").html("Device Name: " + $(this).parent().parent().find("input").val().toUpperCase() + ", Module ID: " + $(this).parent().parent().parent().find("input.pmapid").val().toUpperCase());
                $("#pdname").val($(this).parent().parent().find("input").val());
                $("#pmapid").val($(this).parent().parent().parent().find("input.pmapid").val());
                $("#pdpin").val($(this).parent().parent().find("input.pdpin").val());
            });
            $("#delyes").click(function (e) {
                e.preventDefault();
                $pmapid = $("#pmapid").val();
                $pdpin = $("#pdpin").val();
                $pdname = $("#pdname").val();
                //alert($pmapid + ", " + $pdpin);
                $.post("deldevice.php", {pmapid: $pmapid, pdpin: $pdpin}, function(result){
                    alert(result);
                    $('#alertbox').foundation('close');
                    if(result == 1) {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-check golden" aria-hidden="true"></i> Device Deleted: <span id="deldevname2" class="capitalize">' + $pdname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    } else {
                        $("#alertbox").html('<p class="lead"><i class="fa fa-exclamation" aria-hidden="true"></i> Error occured while deleting Device: <span id="deldevname2" class="capitalize">' + $pdname + '</span></p><button class="close-button" data-close aria-label="Close modal" type="button"><span aria-hidden="true">&times;</span></button>');
                    }
                        $('#alertbox').foundation('open');
                        setTimeout(closealert,2000);
                });
            });
            /*
            $("#edit").click(function (e) {
                //alert(2);
                e.preventDefault();
                if($(this).html() == "Edit") {
                    $(".editbtn").css("visibility","visible");
                    $(".delbtn").css("visibility","visible");
                    $(this).html("Done");
                } else if($(this).html("Done")) {
                    $(".editbtn").css("visibility","hidden");
                    $(".delbtn").css("visibility","hidden");
                    $(this).html("Edit");
                }
            });
            */

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

    </script>
    <!-- script type="application/javascript" src="js/edit.js"></script -->

<script type="application/javascript" src = "https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.accordion.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.tooltip.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.mediaQuery.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.box.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.triggers.min.js'></script>

<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.keyboard.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.motion.min.js'></script>
<!--script type="application/javascript" src='js/pre.js'></script-->
<!--script type="application/javascript" src="js/index.js"></script -->


</body>
</html>
