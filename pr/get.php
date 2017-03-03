<?php
//        echo(json_encode(array('outcome' => true, 'message' => 'Success')));
$dname = $_GET["name"];

$servername = "localhost";
$username = "admine8NgaEg";
$password = "P5vVcfKb4Ixz";
$dbname = "preface";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 

$sql = "SELECT * FROM devices WHERE dname='" . $dname . "'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo $row["dstatus"];
    }
} else {
    echo 0;
}
$conn->close();
?>