<?php
/* Displays all error messages */
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Error</title>
  <?php include 'css/css.html'; ?>
</head>
<body>
<div class="midrow row">
<div class="vcenter columns large-6 large-centered"><div class="vcent_p"><div class="vcent_c">
<div class="form">
    <h1 class="golden"><i class="fa fa-exclamation-triangle" aria-hidden="true"></i> ERROR</h1><br/>
    <p>
    <?php 
    if( isset($_SESSION['message']) AND !empty($_SESSION['message']) ): 
        echo $_SESSION['message'];    
    else:
        header( "location: index.php" );
    endif;
    ?>
    <br/>
    <a class="back" href="#" onclick="parent.history.back();return false;">&#9668; Back</a>
    </p>
    <a href="index.php"><button class="button button-block"/>Home</button></a>
</div>
</div></div></div></div>
</body>
</html>
