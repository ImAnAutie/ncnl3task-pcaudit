<?php
require_once('config.php');
require_once('loginneeded.php');

$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $roomid=$row['roomid'];
            $working=$row['device_working'];
            if ($working) {
              $faultstats[$roomid]['working']++;
            } else {
              $faultstats[$roomid]['faulty']++;
            }
    }
}
foreach ($faultstats as $key => $faultstat) {

    $sql = "SELECT * FROM rooms WHERE roomid='$key'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $roomname=$row['roomname'];
    $working=$faultstat['working'];
    if (empty($working)) {
      $working=0;
    }
    $faulty=$faultstat['faulty'];
    if (empty($faulty)) {
      $faulty=0;
    }
    $allfaultstats[$key]['name']=$roomname;
    $allfaultstats[$key]['working']=$working;
    $allfaultstats[$key]['faulty']=$faulty;

    $charti['value']=$faulty;
    $charti['color']="Red";
    $charti['highlight']="Red";
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
