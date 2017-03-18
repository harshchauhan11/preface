<?php
require 'db.php';
session_start();
$mid = $_GET['mid'];
$mpins = 0;
$freepin = 0;

$result_modules = $mysqli->query("SELECT mpins FROM minmodules WHERE mapid='$mid'") or die($mysqli->error());

// We know user email exists if the rows returned are more than 0
if ( $result_modules->num_rows > 0 ) {
    while($row_modules = $result_modules->fetch_assoc()) {
        $mpins = $row_modules["mpins"];
    }
    //echo $mpins;
    for($i=1;$i<=$mpins;$i=$i+1) {
        //echo $i;
        $result_devices = $mysqli->query("SELECT dpin FROM mindevices WHERE mapdid='$mid' AND dpin=$i") or die($mysqli->error());
        if ( $result_devices->num_rows > 0 ) {
            //echo "Pin No. ".$i." is not free !<br/>";
        } else {
            //echo "Pin No. ".$i." is free !<br/>";
            $freepin = $i;
            break;
        }
    }
    echo $freepin;
}
?>