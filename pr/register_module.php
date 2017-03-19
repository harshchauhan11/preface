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
  <title>Register WiFi Modules</title>
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
    
<form action="regmodule.php" method="post">
    <div class="form">
  <div class="row">
      <div class="row">
          <div class="small-12 large-12 columns text-center">
              <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                      <li><a href="profile.php">Home</a></li>
                      <li>
                          <span class="show-for-sr">Current: </span> Register Module
                      </li>
                      <li><a href="register_device.php">Add Devices</a></li>
                  </ul>
              </nav>
          </div>
      </div>
      
  <div class="row">
    <div class="small-10 large-9 columns large-centered small-centered text-center">
      <h1>Register WiFi Module</h1>
        <small class="note">( <strong>Note</strong>: Module ID is unique hardware specific ID. It can not be modified after registration. You have to re-register whole module. )</small><br/><br/>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="mapid" class="large-text-right">Module ID:</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" class="linput_edit" id="mapid" name="mapid" placeholder="specify your module's AP name" required>
    </div>
  </div>
  <div class="row">
    <div class="small-11 large-5 columns">
      <label for="mname" class="large-text-right">Module Name:</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" class="linput_edit" id="mname" name="mname" placeholder="this will be used for voice command" required>
    </div>
  </div>
  <div class="row">
    <div class="small-11 large-5 columns">
      <label for="mposition" class="large-text-right">Position:</label>
    </div>
    <div class="small-12 large-7 columns">
      <select class="linput_edit" name="mposition" style="height: auto;" required>
    <option value="leaving room">Leaving Room</option>
    <option value="bedroom">Bedroom</option>
    <option value="kitchen">Kitchen</option>
    <option value="bathroom">Bathroom Etc.</option>
    <option value="store room">Store Room</option>
  </select>
    </div>
  </div>
  <div class="row">
    <div class="small-11 large-5 columns">
      <label for="mpins" class="large-text-right">Available Pins:</label>
    </div>
    <div class="small-12 large-7 columns">
      <select class="linput_edit" name="mpins" style="height: auto;">
    <option value="1">1</option>
    <option value="2">2</option>
    <option value="3">3</option>
    <option value="4">4</option>
    <option value="5">5</option>
    <option value="6">6</option>
    <option value="7">7</option>
    <option value="8">8</option>
    <option value="9">9</option>
    <option value="10">10</option>
    <option value="11">11</option>
    <option value="12">12</option>
    <option value="13">13</option>
  </select>
    </div>
  </div>
  <div class="row">
    <div class="small-11 large-5 columns">
      <label for="mnear" class="large-text-right">Near:</label>
    </div>
    <div class="small-12 large-7 columns">
      <select class="linput_edit" name="mnear" style="height: auto;">
    <option value="windows">Windows</option>
    <option value="tv">TV</option>
    <option value="ac">Air Conditioner</option>
    <option value="gas">Gas</option>
    <option value="washing_machine">Washing Machine</option>
    <option value="oven">Microwave Oven</option>
    <option value="fridge">Fridge</option>
    <option value="wardrobe">Wardrobe</option>
    <option value="sofa">Sofa Set</option>
  </select>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-12 columns">
        <button type="submit" class="button button-block" name="register" />REGISTER</button>
        <!--button type="submit" class="button-block button float-center" value="CREATE MODULE"></button-->
    </div>
  </div>

  </div>
</div>
</form>
</div></div></div></div>

    
    
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/foundation.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src='js/pre.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.accordion.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.keyboard.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.motion.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
