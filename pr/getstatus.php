<?php
require 'db.php';
//session_start();
$mid = $_GET['mid'];
$mpins = 0;
$freepin = 0;

$result_devices = $mysqli->query("SELECT * FROM mindevices WHERE mapdid='$mid'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
$rows = array();
while($r = mysqli_fetch_assoc($result_devices)) {
    $rows[] = $r;
}
print json_encode($rows);
/*
if ( $result_devices->num_rows > 0 ) {
    while($row_devices = $result_devices->fetch_assoc()) {
        $did = $row_devices["mapdid"];
        $dname = $row_devices["dname"];
        $dtype = $row_devices["dtype"];
        $dpin = $row_devices["dpin"];
        $dst = $row_devices["dstatus"];
    }
    echo $freepin;
}
*/
?>