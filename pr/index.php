<?php 
ob_start();
require 'db.php';
session_start();

if ( $_SESSION['logged_in'] == 1 ) {
  //$_SESSION['message'] = "You must log in before viewing your profile page!";
  header("location: profile.php");
}
else {
?>
<!DOCTYPE html>
<html>
<head>
  <title>Minnie Dashboard</title>
<?php include 'css/css.html'; ?>
</head>

<?php 
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['login'])) { //user logging in
        require 'login.php';
    }
    elseif (isset($_POST['register'])) { //user registering   
        require 'register.php';
    }
}
?>
<body>
<div class="midrow row">
<div class="vcenter columns large-6 large-centered"><div class="vcent_p"><div class="vcent_c">

  <div class="form">
      <ul class="tab-group">
        <li class="tab"><a href="#signup">Sign Up</a></li>
        <li class="tab active"><a href="#login">Log In</a></li>
      </ul>
      <div class="tab-content">
         <div id="login">   
          <h1>Welcome Back!</h1><br/>
          <form action="index.php" method="post" autocomplete="on">
            <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email" required autocomplete="on" name="email" class="transbg" />
          </div>
          <div class="field-wrap">
            <label>
              Password<span class="req">*</span>
            </label>
            <input type="password" required autocomplete="off" name="password" class="transbg" />
          </div>
          <p class="forgot"><a href="forgot.php">Forgot Password?</a></p>
          <input type="submit" class="button button-block" name="login" value="Log In" />
          </form>
        </div>
          
        <div id="signup">   
          <h1>Sign Up for Free</h1><br/>
          <form action="index.php" method="post" autocomplete="on">
          <div class="top-row">
            <div class="field-wrap">
              <label>
                First Name<span class="req">*</span>
              </label>
              <input type="text" required autocomplete="off" name='firstname' class="transbg" />
            </div>
            <div class="field-wrap">
              <label>
                Last Name<span class="req">*</span>
              </label>
              <input type="text"required autocomplete="off" name='lastname' class="transbg" />
            </div>
          </div>
          <div class="field-wrap">
            <label>
              Email Address<span class="req">*</span>
            </label>
            <input type="email"required autocomplete="on" name='email' class="transbg" />
          </div>
          <div class="field-wrap">
            <label>
              Set A Password<span class="req">*</span>
            </label>
            <input type="password"required autocomplete="off" name='password' class="transbg" />
          </div>
          <input type="submit" class="button button-block" name="register" value="Register" />
          </form>
        </div>  
      </div><!-- tab-content -->
</div> <!-- /form -->
</div></div></div></div>
    
    <!-- Insert this line above script imports  -->
    <script>if (typeof module === 'object') {window.module = module; module = undefined;}</script>
    <!-- normal script imports etc  -->
    <script src='http://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="js/index.js"></script>
    <!-- Insert this line after script imports -->
    <script>if (window.module) module = window.module;</script>

</body>
</html>
<?php
}
?>