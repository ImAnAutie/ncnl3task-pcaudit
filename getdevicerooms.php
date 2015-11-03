<?php
require_once('config.php');
require_once('loginneeded.php');

$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $roomid=$row['roomid'];
            $stats[$roomid]['value']++;
    }
}
foreach ($stats as $key => $stat) {

    $sql = "SELECT * FROM rooms WHERE roomid='$key'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $roomname=$row['roomname'];
    $total=$stat['value'];

    $charti['value']=$total;
    $charti['color']="Blue";
    $charti['highlight']="Blue";
    $charti['label']=$roomname;
    $charts[]=$charti;
  //    echo "<p>$key";
//    print_r($faultstat);

}

//$smarty->assign("faultstats", $faultstats);
//print_r($faultstats);
//print_r($charts);
echo json_encode($charts);
die();
