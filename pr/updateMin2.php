<?php
require 'db.php';

$uid = $_GET['uid'];
$mapid = '';
$mname = $_GET['pmname'];
$dname = $_GET['pdname'];
$dpin = '';
$dstatus = $_GET['pdstatus'];
$mpos = $_GET['pmpos'];
$mnear = $_GET['pmnear'];

//echo $uid.'<br/>'.$mname.'<br/>'.$dname.'<br/>'.$dstatus.'<br/>'.$mpos.'<br/>'.$mnear;

if(isset($_GET['pmname'])) {
    //echo 'command with module name !';
    $search_bymod = $mysqli->query("SELECT * FROM mindevices WHERE mapdid=(SELECT mapid FROM minmodules WHERE minumid=$uid AND mname='$mname') AND dname='$dname'") or die($mysqli->error());

    /* (device + module) successfully found for this user. */
    if ( $search_bymod->num_rows > 0 ) {
        while($row1 = $search_bymod->fetch_assoc()) {
            $mapid = $row1["mapdid"];
            $dpin = $row1["dpin"];

            $update_bymod = $mysqli->query("UPDATE mindevices SET dstatus='$dstatus' WHERE mapdid='$mapid' AND dpin=$dpin");
            if ($mysqli->affected_rows != 0) {
                /* successfully updated by module name */
                echo(json_encode(array('response' => '1', 'message' => 'Turning '.$dname.' '.$dstatus.' !')));
            } else {
                /* not updated by module name */
                echo(json_encode(array('response' => '0', 'message' => 'Something went wrong ! Let me check it.')));
            }
        }
    }
    else {
        //echo '(device + module) not found for this user.';
        echo(json_encode(array('response' => '2', 'message' => 'Sorry, said Device or Module is not registered !')));
    }

} else if(isset($_GET['pmpos'])) {
    //echo 'command with module position !';
    $search_bypos = $mysqli->query("SELECT * FROM mindevices WHERE mapdid IN (SELECT mapid FROM minmodules WHERE minumid=$uid AND mposition='$mpos') AND dname='$dname'") or die($mysqli->error());

    /* (device in given position) successfully found for this user. */
    if ( $search_bypos->num_rows > 0 ) {
        //echo '(device in given position) successfully found for this user.';
        while($row2 = $search_bypos->fetch_assoc()) {
            $mapid = $row2["mapdid"];
            //$dname = $row2["dname"];
            $dpin = $row2["dpin"];
            //$dstatus = $row2["dstatus"];
            
            //echo '<br/>'.$mapid.','.$dname.','.$dpin.','.$dstatus;
            $update_bypos = $mysqli->query("UPDATE mindevices SET dstatus='$dstatus' WHERE mapdid='$mapid' AND dpin=$dpin");
            if ($mysqli->affected_rows != 0) {
                /* successfully updated by module position only */
                echo(json_encode(array('response' => '1', 'message' => 'Turning '.$dname.' '.$dstatus.' !')));
            } else {
                /* not updated by module position */
                echo(json_encode(array('response' => '0', 'message' => 'Something went wrong ! Let me check it.')));
            }
        }
    } else {
        //echo '(device in given position) not found for this user.';
        echo(json_encode(array('response' => '2', 'message' => 'Sorry, said Device or Module is not registered !')));
    }
}
?>

