<?php
require 'db.php';

$uid = $_GET['uid'];
$pcid = $_GET['ppcid'];
$pcname = $_GET['ppcname'];
$aname = $_GET['paname'];
$astatus = $_GET['pastatus'];

//echo $uid.'<br/>'.$mname.'<br/>'.$dname.'<br/>'.$dstatus.'<br/>'.$mpos.'<br/>'.$mnear;

if(isset($_GET['ppcid'])) {
    //echo 'command with module name !';
    $search_bymod = $mysqli->query("SELECT * FROM mincapps WHERE pcaid=(SELECT pcid FROM mincomputers WHERE minucid=$uid AND pcid='$pcid') AND aname='$aname'") or die($mysqli->error());

    /* (device + module) successfully found for this user. */
    if ( $search_bymod->num_rows > 0 ) {
        while($row1 = $search_bymod->fetch_assoc()) {
            $pcid = $row1["pcaid"];
            $aname = $row1["aname"];

            $update_bymod = $mysqli->query("UPDATE mincapps SET astatus='$astatus' WHERE pcaid='$pcid' AND aname='$aname'");
            if ($mysqli->affected_rows != 0) {
                /* successfully updated by computer name */
                echo(json_encode(array('response' => '1', 'message' => 'Opening '.$aname.' !')));
            } else {
                /* not updated by computer name */
                echo(json_encode(array('response' => '0', 'message' => 'Something went wrong ! Let me check it.')));
            }
        }
    }
    else {
        //echo '(device + module) not found for this user.';
        echo $uid.','.$pcid.','.$pcname.','.$aname.','.$astatus;
        echo(json_encode(array('response' => '2', 'message' => 'Sorry, said Application or Computer is not registered !')));
    }
} else if(isset($_GET['ppcname'])) {
    //echo 'command with module name !';
    $search_bymod = $mysqli->query("SELECT * FROM mincapps WHERE pcaid=(SELECT pcid FROM mincomputers WHERE minucid=$uid AND pcname='$pcname') AND aname='$aname'") or die($mysqli->error());

    /* (device + module) successfully found for this user. */
    if ( $search_bymod->num_rows > 0 ) {
        while($row1 = $search_bymod->fetch_assoc()) {
            $pcid = $row1["pcaid"];
            $aname = $row1["aname"];

            $update_bymod = $mysqli->query("UPDATE mincapps SET astatus='$astatus' WHERE pcaid='$pcid' AND aname='$aname'");
            if ($mysqli->affected_rows != 0) {
                /* successfully updated by computer name */
                echo(json_encode(array('response' => '1', 'message' => 'Opening '.$aname.' !')));
            } else {
                /* not updated by computer name */
                echo(json_encode(array('response' => '0', 'message' => 'Something went wrong ! Let me check it.')));
            }
        }
    }
    else {
        //echo '(device + module) not found for this user.';
        echo(json_encode(array('response' => '2', 'message' => 'Sorry, said Application or Computer is not registered !')));
    }
}
?>

