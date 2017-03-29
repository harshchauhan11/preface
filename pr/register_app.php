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
  <title>Register Device - Minnie Dashboard</title>
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

<form name="regapp" action="regapp.php" method="post">
    <div class="form">
  <div class="row">
      <div class="row">
          <div class="small-12 large-12 columns text-center">
              <nav aria-label="You are here:" role="navigation">
                  <ul class="breadcrumbs">
                      <li><a href="profile.php">Home</a></li>
                      <li><a href="register_module.php">Register Computer</a></li>
                      <li>
                          <span class="show-for-sr">Current: </span> Add Applications
                      </li>
                  </ul>
              </nav>
          </div>
      </div>
      
  <div class="row">
    <div class="small-12 large-12 columns text-center">
      <h1>Register Application</h1>
        <small class="note">( <strong>Note</strong>: Please provide executable file path, not the path of shortcut. Check application's extension. )</small><br/><br/>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="mapid" class="large-text-right">Computer ID:</label>
    </div>
    <div class="small-12 large-7 columns">
      <!--input type="text" id="mapid" name="mapid" placeholder="your module's AP name" value="ESP" disabled-->
        <select class="linput_edit" id="pcid" name="pcid" style="height: auto;">
            <option>Select Your Computer</option>
            <?php
                $result_modules = $mysqli->query("SELECT * FROM mincomputers WHERE minucid='$uid'") or die($mysqli->error());
                $total_pins = 0;
                $pcname = "";

                if ( $result_modules->num_rows > 0 ) {
                    while($row_modules = $result_modules->fetch_assoc()) {
                        $pcid = $row_modules["pcid"];
                        $pcname = $row_modules["pcname"];
            ?>
            <option value="<?php echo $pcid; ?>"><?php echo $pcname; ?></option>
            <?php
                    }
                }
            ?>
        </select>
        <input type="hidden" id="modname" name="modname" value="" />
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="dname" class="large-text-right">Application Name:</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" class="linput_edit" id="aname" name="aname" placeholder="this will be used for voice command" required>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="dpin" class="large-text-right">Executable File Path:</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" class="linput_edit" id="apath" name="apath" placeholder="your application's executable file path">
        <input type="hidden" id="dpinh" name="dpinh" />
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-5 columns">
      <label for="dpin" class="large-text-right">Parameters (optional):</label>
    </div>
    <div class="small-12 large-7 columns">
      <input type="text" class="linput_edit" id="aparam" name="aparam" placeholder="extra parameters for application">
        <input type="hidden" id="dpinh" name="dpinh" />
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-12 columns">
        <button type="submit" class="button button-block" id="register" name="register" />REGISTER</button>
	   <!-- input type="submit" class="button float-center large-6" value="CREATE MODULE" -->
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
<script src='js/device.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.accordion.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.keyboard.min.js'></script>
<script src='https://cdnjs.cloudflare.com/ajax/libs/foundation/6.3.1/js/plugins/foundation.util.motion.min.js'></script>
<script src="js/index.js"></script>

</body>
</html>
