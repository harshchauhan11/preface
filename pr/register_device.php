<?php
$dname = $_POST['dname'];
$dtype = $_POST['dtype'];
$dpin = $_POST['dpin'];
$dstatus = $_POST['dstatus'];

$servername = "localhost";
$username = "adminHuTkSSb";
$password = "GMgvKYB5qknf";
$dbname = "preface";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "INSERT INTO devices(dname,dtype,dpin,dstatus) values('".$dname."','".$dtype."','".$dpin."','".$dstatus."')";

if ($conn->query($sql) === TRUE) {
    echo "Device name:".$dname." has been registered successfully !";
} else {
    echo "Registering device failed !";
}

$conn->close();

/*
mysql_connect("localhost","adminHuTkSSb","GMgvKYB5qknf");
mysql_select_db("preface");

$query = mysql_query("INSERT INTO devices(dname,dtype,dpin,dstatus) values('".$dname."','".$dtype."','".$dpin."','".$dstatus."') ");
if($query){
	echo "Device name:".$dname." has been registered successfully !";
}
else{
	echo "Registering device failed !";
}
*/

?>