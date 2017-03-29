<?php
/* Displays user information and some useful messages */
session_start();

// Check if user is logged in using the session variable
if ( $_SESSION['logged_in'] != 1 ) {
  $_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: error.php");    
}
else {
    // Makes it easier to read
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
  <title>Register Computer - Minnie Dashboard</title>
  <?php include 'css/css.html'; ?>
    <style>
        label {position: relative; line-height: 1.8; margin-bottom: 5px; font-size: 1em;}
        input[type=text],select {margin:0 0 5px 0 !important; color: #000 !important; font-size: 1em !important; font-weight: bold;}
        input[type=text] {background: #fff !important;}
    </style>
</head>

<body>
<div class="midrow row">
<div class="vcenter columns large-6 large-centered"><div class="vcent_p"><div class="vcent_c">
    
<form action="regcomputer.php" method="post">
    <div class="form">
  <div class="row">
      <div class="row">
          <div class="small-12 large-12 columns text-center">
              <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                      <li><a href="profile.php">Home</a></li>
                      <li>
                          <span class="show-for-sr">Current: </span> Register Computer
                      </li>
                      <li><a href="register_device.php">Add Applications</a></li>
                  </ul>
              </nav>
          </div>
      </div>
      
  <div class="row">
    <div class="small-10 large-9 columns large-centered small-centered text-center">
      <h1>Register Computer</h1><br/>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="mapid" class="large-text-right">Computer ID:</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" class="linput_edit" id="pcid" name="pcid" placeholder="your computer's registered name" disabled>
        <input type="hidden" name="pcidh" id="pcidh" />
    </div>
  </div>
  <div class="row">
    <div class="small-11 large-5 columns">
      <label for="mname" class="large-text-right">Computer Name:</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" class="linput_edit" id="pcname" name="pcname" placeholder="this will be used for voice command" required>
    </div>
  </div>
  <div class="row">
    <div class="small-11 large-5 columns">
      <label for="mposition" class="large-text-right">OS Version:</label>
    </div>
    <div class="small-12 large-7 columns">
      <select class="linput_edit" id="pcos" name="pcos" style="height: auto;" disabled>
    <option value="windows7">Windows 7</option>
    <option value="windows8">Windows 8</option>
    <option value="windows8.1">Windows 8.1</option>
    <option value="windows10">Windows 10</option>
  </select>
        <input type="hidden" name="pcosh" id="pcosh" />
    </div>
  </div>
  <div class="row">
    <div class="small-11 large-5 columns">
      <label for="mpins" class="large-text-right">Architecture:</label>
    </div>
    <div class="small-12 large-7 columns">
      <select class="linput_edit" id="pcarch" name="pcarch" style="height: auto;" disabled>
    <option value="x86">x86</option>
    <option value="x64">x64</option>
  </select>
        <input type="hidden" name="pcarchh" id="pcarchh" />
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-12 columns">
        <input type="submit" class="button button-block" name="register" id="registerc" value="REGISTER" />
        <!--button type="submit" class="button-block button float-center" value="CREATE MODULE"></button-->
    </div>
  </div>

  </div>
</div>
</form>
</div></div></div></div>

    
    <!-- Insert this line above script imports  -->
    <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
    <!-- normal script imports etc  -->
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/foundation.min.js"></script>
    <script src='js/pre.js'></script>
    <script src="js/index.js"></script>
    <script>
        var inBrowser = true;
        if(window && window.process && window.process.type){
            var electron = require('electron')
            inBrowser = false;
            
            //alert("In Electron !");
            var os = require("os");
            var hostname = os.hostname();
            var type = os.type();
            var platform = os.platform();
            var arch = os.arch();
            var release = os.release();
            var osver = null;

            $("#pcid").val(hostname);
            if(platform == "win32" && (6.1 <= parseFloat(release) && parseFloat(release) < 6.2)) {
                $('#pcos').val("windows7");
                //$('#pcos option').eq(1).prop('selected', true);
            } else if(platform == "win32" && (6.2 <= parseFloat(release) && parseFloat(release) < 6.3)) {
                $('#pcos').val("windows8");
            } else if(platform == "win32" && (6.3 <= parseFloat(release) && parseFloat(release) < 6.4)) {
                $('#pcos').val("windows8.1");
            } else if(platform == "win32" && (10 <= parseFloat(release) && parseFloat(release) < 11)) {
                $('#pcos').val("windows10");
            }
            if(arch == "x86")
                $('#pcarch').val("x86");
            else if(arch == "x64")
                $('#pcarch').val("x64");
            
            $("#pcidh").val($("#pcid").val());
            $("#pcosh").val($("#pcos").val());
            $("#pcarchh").val($("#pcarch").val());
        } else {
            //alert("In Chrome !");
            
        }
    </script>
    <!-- Insert this line after script imports -->
    <script>if (window.module) module = window.module;</script>

</body>
</html>
