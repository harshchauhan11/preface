<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en">
<head>
	<title>Minnie</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href='http://fonts.googleapis.com/css?family=Roboto:400,700' rel='stylesheet' type='text/css' />
	<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
	<link rel="stylesheet" href="../css/normalize.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/css/foundation.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../css/cap_style.css">
	<link rel="stylesheet" href="../css/animate.css">

	<script src="../js/vendor/custom.modernizr.js"></script>
</head>

<body>
<form action="register_device.php" method="post">
  <div class="row large-5">
  <div class="row">
    <div class="small-12 large-12 columns text-center">
      <h1>Devices</h1>
    </div>
  </div>
  <div class="row">
    <div class="small-5 large-5 columns">
      <label for="middle-label" class="text-right middle">Device Name:</label>
    </div>
    <div class="small-7 large-7 columns">
      <input type="text" id="dname" name="dname" placeholder="create name">
    </div>
  </div>
  <div class="row">
    <div class="small-5 large-5 columns middle">
      <label for="middle-label" class="text-right middle">Type:</label>
    </div>
    <div class="small-7 large-7 columns">
      <select name="dtype" style="height: auto;">
    <option value="digital">Digital</option>
    <option value="analog">Analog</option>
  </select>
    </div>
  </div>
  <div class="row">
    <div class="small-5 large-5 columns middle">
      <label for="middle-label" class="text-right middle">Pin:</label>
    </div>
    <div class="small-7 large-7 columns">
      <select name="dpin" style="height: auto;">
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
    <div class="small-5 large-5 columns middle">
      <label for="middle-label" class="text-right middle">Status:</label>
    </div>
    <div class="small-7 large-7 columns">
      <select name="dstatus" style="height: auto;">
    <option value="off">On/Off</option>
  </select>
    </div>
  </div>
  <div class="row">
    <div class="small-12 large-12 columns"><br/>
	<input type="submit" class="button float-center large-6" value="Create Device">
    </div>
  </div>

  </div>
</form>

	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/foundation.min.js"></script>
      
	<script src="../js/vendor/jquery.easing.1.3.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="../js/vendor/jquery.counterup.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/modernizr.js"></script>
</body>
</html>