<?php
//        echo(json_encode(array('outcome' => true, 'message' => 'Success')));
$dname = $_GET["name"];
$dstatus = $_GET["up"];
if($dstatus == "on")
	$dstatus2 = "off";
else
	$dstatus2 = "on";

$servername = "localhost";
$username = "admine8NgaEg";
$password = "P5vVcfKb4Ixz";
$dbname = "preface";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "UPDATE devices SET dstatus='" . $dstatus . "' WHERE dname='" . $dname . "'";

if ($conn->query($sql) === TRUE) {
    echo $dstatus;
} else {
    echo $dstatus2;
}
$conn->close();
?>