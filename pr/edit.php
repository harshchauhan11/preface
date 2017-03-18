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
  <title>Register Devices</title>
  <?php include 'css/css.html'; ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <style>
        label {position: relative; line-height: 1.8; margin-bottom: 5px; font-size: 1em;}
        input[type=text],select {margin:0 0 0px 0 !important; font-size: 1em !important; font-weight: bold;}
    </style>
</head>

<body>
<form name="regdevice" action="regdevice.php" method="post">
    <div class="form">
  <div class="row large-12">
      
  <div class="row">
    <div class="small-12 large-12 columns text-center">
      <h1>Register Device</h1><br/>
    </div>
  </div>
      <div class="row divider fd">
          <div class="small-9 large-9 columns">
              Plug 1
              <small>( In leaving room near windows )</small>
          </div>
          <div class="small-3 large-3 columns text-right">
              <span class="check">2 <i class="fa fa-check" aria-hidden="true"></i></span>
          </div>
      </div>
      <div class="row litem">
          <div class="small-5 large-5 columns">
              <input type="text" class="linput" value="Television" disabled style="background: #f9f9f9 !important;" />
          </div>
          <div class="small-1 large-1 columns">
              <a href="#" class="editdonebtn"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
          </div>
          <div class="small-4 large-4 columns">
              <button type="button" class="button button2 success">ON</button>
              <button type="button" class="button button2 alert">OFF</button>
          </div>
          <div class="small-2 large-2 columns text-right">
              <a href="#" class="editbtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-open="deldevice" class="delbtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
          <div class="small-12 large-12 columns text-right">
              <p>STATUS: <strong>ON</strong> | Last updated: <strong>12 Mar, 8 PM</strong></p>
          </div>
      </div>
      <div class="row litem">
          <div class="small-5 large-5 columns">
              <input type="text" class="linput" value="Air Conditioner" disabled style="background: #f9f9f9 !important;" />
              <!--p><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p-->
          </div>
          <div class="small-1 large-1 columns">
              <a href="#" class="editdonebtn"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
          </div>
          <div class="small-4 large-4 columns">
              <button type="button" class="button button2 success">ON</button>
              <button type="button" class="button button2 alert">OFF</button>
          </div>
          <div class="small-2 large-2 columns text-right">
              <a href="#" class="editbtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-open="deldevice" class="delbtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
          <div class="small-12 large-12 columns text-right">
              <p>STATUS: <strong>OFF</strong></p>
          </div>
      </div>
      <div class="row divider">
          <div class="small-9 large-9 columns">
              Plug 2
          </div>
          <div class="small-3 large-3 columns text-right">
              <a href="register_device.php"><span class="excl" data-tooltip aria-haspopup="true" class="has-tip right" data-disable-hover="false" tabindex="1" title="This module has some remaining devices to be registered.">1 <i class="fa fa-exclamation-circle" aria-hidden="true"></i></span></a>
          </div>
      </div>
      <div class="row litem ld">
          <div class="small-5 large-5 columns">
              <input type="text" class="linput" value="Microware Oven" disabled style="background: #f9f9f9 !important;" />
              <!--p><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p-->
          </div>
          <div class="small-1 large-1 columns">
              <a href="#" class="editdonebtn"><i class="fa fa-check-circle" aria-hidden="true"></i></a>
          </div>
          <div class="small-4 large-4 columns">
              <button type="button" class="button button2 success">ON</button>
              <button type="button" class="button button2 alert">OFF</button>
          </div>
          <div class="small-2 large-2 columns text-right">
              <a href="#" class="editbtn"><i class="fa fa-pencil" aria-hidden="true"></i></a> <a href="#" data-open="deldevice" class="delbtn"><i class="fa fa-trash" aria-hidden="true"></i></a>
          </div>
          <div class="small-12 large-12 columns text-right">
              <p><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p>
          </div>
      </div>

<!-- div class="row">
    <div class="small-12 large-12 columns">
        <ul data-role="listview" data-inset="true" data-theme="a" data-divider-theme="b" data-count-theme="b">
            <li data-role="list-divider">Plug 1 <small>( in Leaving room near windows )</small><span class="ui-li-count">2</span></li>
            <li>
                <a href="profile.php">
                    <h2>Television</h2>
                    <p><strong>You've been invited to a meeting at Filament Group in Boston, MA</strong></p>
                    <p></p>
                    <p class="ui-li-aside"><strong>ON</strong> right now</p>
                </a>
            </li>
            <li>
                <a href="index.html">
                    <h2>Air Conditioner</h2>
                    <p><strong>Boston Conference Planning</strong></p>
                    <p></p>
                    <p class="ui-li-aside"><strong>OFF</strong></p>
                </a>
            </li>
            <li data-role="list-divider">Plug 2 <span class="ui-li-count">1</span></li>
    <li><a href="index.html">
    <h2>Avery Walker</h2>
    <p><strong>Re: Dinner Tonight</strong></p>
    <p></p>
        <p class="ui-li-aside"><strong>OFF</strong></p>
    </a></li>
</ul>
    </div>
      </div-->
      <!--
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="mapid" class="large-text-right">Module ID:</label>
    </div>
    <div class="small-12 large-7 columns">
        <select id="mapid" name="mapid" style="height: auto;">
            <option>Select Your Module</option>
            <?php
                $result_modules = $mysqli->query("SELECT * FROM minmodules WHERE minumid='$uid'") or die($mysqli->error());
                $total_pins = 0;

                if ( $result_modules->num_rows > 0 ) {
                    while($row_modules = $result_modules->fetch_assoc()) {
                        $mapid = $row_modules["mapid"];
                        $mname = $row_modules["mname"];
                        $_SESSION['mname'] = $mname;
            ?>
            <option value="<?php echo $mapid; ?>"><?php echo $mname; ?></option>
            <?php
                    }
                }
            ?>
        </select>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="dname" class="large-text-right">Device Name:</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" id="dname" name="dname" placeholder="this will be used for voice command" required>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="dpin" class="large-text-right">Pin Number:</label>
    </div>
    <div class="small-12 large-7 columns">
        <select name="dpincombo" style="height: auto;">
        </select>
        <input type="hidden" id="dpinh" name="dpinh" />
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="dtype" class="large-text-right">Type:</label>
    </div>
    <div class="small-12 large-7 columns">
        <select name="dtype" style="height: auto;">
            <option value="digital">Digital</option>
            <option value="analog">Analog</option>
        </select>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="dstatus" class="large-text-right">Status:</label>
    </div>
    <div class="small-12 large-7 columns">
      <select name="dstatus" style="height: auto;">
    <option value="off">On/Off</option>
  </select>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-12 columns">
        <button type="submit" class="button button-block" id="register" name="register" />REGISTER</button>
    </div>
  </div-->
<div class="reveal" id="deldevice" data-reveal>
  <h1><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> Warning: </h1>
  <p class="lead">Are you sure, you want to delete this Device ? <br/><span id="deldevname"></span></p>
    <p>Note: This action can not be undone !<br/>You have to register this device again.</p>
  <div class="column text-center">
      <button type="button" class="button large button2 success">YES</button>
    <button type="button" class="button button2 alert">NO</button>
    </div>
  <button class="close-button" data-close aria-label="Close modal" type="button">
    <span aria-hidden="true">&times;</span>
  </button>
</div>
  </div>
</div>
</form>

    
    
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/foundation.min.js"></script>
<script src = "https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js"></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.accordion.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.tooltip.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.mediaQuery.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.box.min.js'></script>
<script type="application/javascript" src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.triggers.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.keyboard.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.motion.min.js'></script>
<script src="js/index.js"></script>
    <script src='js/pre.js'></script>
    <script src='js/edit.js'></script>
</body>
</html>
