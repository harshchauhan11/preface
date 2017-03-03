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
        echo "Name: " . $row["dname"]. "<br/>Type: " . $row["dtype"]. "<br/>Pin: " . $row["dpin"]. "<br/>Status: " . $row["dstatus"] . "<hr/>";
    }
} else {
    echo "0 results";
}
$conn->close();
?>