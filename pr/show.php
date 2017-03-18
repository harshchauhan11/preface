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
<div class="row large-6">
	<div class="large-12 small-12 columns text-center">
		<span id="respmsg" class="label secondary"></span>
	</div>
</div>
<br/>
<?php
$servername = "localhost";
$username = "admine8NgaEg";
$password = "P5vVcfKb4Ixz";
$dbname = "preface";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
?>
<div class="row large-6">
	<div class="large-4 small-3 columns">
	      <label id="did" class="text-right middle"><big><b><?php echo $row["dname"]; ?></b></big></label>
	</div>
	<div class="large-1 small-2 columns"><input id="onbtn" type="submit" class="button success" value="ON" /></div>
	<div class="large-1 small-2 columns"><input id="offbtn" type="submit" class="button alert" value="OFF" /></div>
	<div class="large-2 small-2 columns"><label id="status" class="text-right middle"><?php echo $row["dstatus"]; ?></label></div>
	<div class="large-5 small-2 columns"></div>
</div>

<?php
//        echo "Name: " . $row["dname"]. "<br/>Type: " . $row["dtype"]. "<br/>Pin: " . $row["dpin"]. "<br/>Status: " . $row["dstatus"] . "<hr/>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>


	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/vendor/jquery.min.js"></script>
	<script src = "https://cdnjs.cloudflare.com/ajax/libs/foundation/6.0.1/js/foundation.min.js"></script>
      
	<script src="../js/vendor/jquery.easing.1.3.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
	<script src="../js/vendor/jquery.counterup.min.js"></script>
	<script src="../js/wow.min.js"></script>
	<script src="../js/modernizr.js"></script>
	<script type = "text/javascript" language = "javascript">
	$(document).ready(function() {
		$("#respmsg").css("visibility", "hidden");
		name = $("#did big b").html();
//		alert(name);

		$("#onbtn").click(function(e){
			e.preventDefault();
			$.post("update.php", { name: name, up:"on" }, function(data) {
				//$('#stage').html(data);
				$('#status').html(data);
				$("#respmsg").html(name + " is successfully on.");
				$("#respmsg").css("visibility", "visible");
			});
		});
		$("#offbtn").click(function(e){
			e.preventDefault();
			$.post("update.php", { name: name, up:"off" }, function(data) {
				$('#status').html(data);
				$("#respmsg").html(name + " is successfully off.");
				$("#respmsg").css("visibility", "visible");
			});
		});
	});
      </script>
</body>
</html>