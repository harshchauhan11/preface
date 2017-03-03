<?php
//        echo(json_encode(array('outcome' => true, 'message' => 'Success')));
$dname = $_GET["name"];
echo $dname;

$servername = "localhost";
$username = "adminHuTkSSb";
$password = "GMgvKYB5qknf";
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