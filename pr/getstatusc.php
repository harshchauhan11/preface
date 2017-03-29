<?php
require 'db.php';
//session_start();
$uid = $_GET['uid'];
$pcid = $_GET['pcid'];

$result_pcs = $mysqli->query("SELECT * FROM mincomputers WHERE minucid='$uid' AND pcid='$pcid'") or die($mysqli->error());

if ( $result_pcs->num_rows > 0 ) {
    
    $result_apps = $mysqli->query("SELECT * FROM mincapps WHERE pcaid='$pcid'") or die($mysqli->error());

    if ( $result_apps->num_rows > 0 ) {

        // We know user email exists if the rows returned are more than 0
        $rows = array();
        while($r = mysqli_fetch_assoc($result_apps)) {
            $rows[] = $r;
        }
        print json_encode($rows);
    } else {
        echo(json_encode(array('outcome' => false, 'message' => 'You haven\'t registered any application for this computer ! Please register.')));
    }
} else {
    echo(json_encode(array('outcome' => false, 'message' => 'You haven\'t registered this computer yet ! Please register.')));
}
?>