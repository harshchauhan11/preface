<?php
require 'db.php';
//session_start();
//$mapid = $_GET['pmapid'];
$uid = $_GET['uid'];
$mapid = '';
$mname = $_GET['pmname'];
$dname = $_GET['pdname'];
$dpin = 0;
$dstatus = $_GET['pdstatus'];

$result1 = $mysqli->query("SELECT * FROM mindevices WHERE mapdid=(SELECT mapid FROM minmodules WHERE minumid=$uid AND mname='$mname') AND dname='$dname'") or die($mysqli->error());

// (device + module) successfully found for this user.
if ( $result1->num_rows > 0 ) {
    while($row1 = $result1->fetch_assoc()) {
        $mapid = row1["mapdid"];
        $dpin = row1["dpin"];
    }
    $result2 = $mysqli->query("UPDATE mindevices SET dstatus='$dstatus' WHERE mapdid='$mapid' AND dpin='$dpin'");
    if ($mysqli->affected_rows != 0) {
        echo 1;
    } else {
        echo 0;
    }
}
else {
    echo 2;   
}

/*
$result = $mysqli->query("UPDATE mindevices SET dstatus='$dstatus' WHERE mapdid='$mapid' AND dpin='$dpin'");

//echo $mysqli->affected_rows;
if ($mysqli->affected_rows != 0) {
    echo 1;
} else {
    echo 0;
}
*/

?>

