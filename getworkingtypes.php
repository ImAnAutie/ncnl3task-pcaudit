<?php
require_once('config.php');
require_once('loginneeded.php');

$sql = "SELECT * FROM devices";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $typeid=$row['device_type_id'];
            $working=$row['device_working'];
            if ($working) {
              $faultstats[$typeid]['working']++;
            } else {
              $faultstats[$typeid]['faulty']++;
            }
    }
}
foreach ($faultstats as $key => $faultstat) {

    $sql = "SELECT * FROM device_types WHERE device_type_id='$key'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $typename=$row['device_type_name'];
    $working=$faultstat['working'];
    if (empty($working)) {
      $working=0;
    }
    $faulty=$faultstat['faulty'];
    if (empty($faulty)) {
      $faulty=0;
    }
    $allfaultstats[$key]['name']=$typename;
    $allfaultstats[$key]['working']=$working;
    $allfaultstats[$key]['faulty']=$faulty;

    $charti['value']=$working;
    $charti['color']="Green";
    $charti['highlight']="Green";
    $charti['label']=$typename;
    $charts[]=$charti;
  //    echo "<p>$key";
//    print_r($faultstat);

}

//$smarty->assign("faultstats", $faultstats);
//print_r($faultstats);
//print_r($charts);
echo json_encode($charts);
die();
