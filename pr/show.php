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
<?php
$servername = "localhost";
$username = "adminHuTkSSb";
$password = "GMgvKYB5qknf";
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
	      <label class="text-right middle"><big><b><?php= $row["dname"] ?></b></big></label>
	</div>
	<div class="large-1 small-2 columns"><input type="submit" class="button success" id="onbtn" value="ON" /></div>
	<div class="large-1 small-2 columns"><input type="submit" class="button alert" id="offbtn" value="OFF" /></div>
	<div class="large-2 small-2 columns"><label class="text-right middle"><?php= $row["dstatus"] ?></label></div>
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
            $("#onbtn").click(function(event){
               $.post( 
                  "update.php",
                  { name: <?php= $dname ?>, up="on" },
                  function(data) {
                     //$('#stage').html(data);
                  }
               );				
            });			
            $("#offbtn").click(function(event){
               $.post( 
                  "update.php",
                  { name: <?php= $dname ?>, up="off" },
                  function(data) {
                     //$('#stage').html(data);
                  }
               );				
            });			
         });
      </script>
</body>
</html>