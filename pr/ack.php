<?php
session_start();
$acktitle = $_SESSION['acktitle'];
$ackmsg = $_SESSION['ackmsg'];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Thanks</title>
  <?php include 'css/css.html'; ?>
    <style>
    span.line {
        display: inline-block;
    }
    </style>
</head>

<body>
<div class="midrow row">
<div class="vcenter columns large-6 large-centered"><div class="vcent_p"><div class="vcent_c">
    <div class="form">
          <h1><?php echo $acktitle; ?></h1><br/>
          <p><?php echo $ackmsg; ?></p>
    </div>
</div></div></div>
</div>
</body>
</html>
