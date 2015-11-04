<?php
require_once('config.php');
require_once('loginneeded.php');

$userid=$_GET['userid'];
$sql = "SELECT * FROM devices WHERE userid='$userid'";

  $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            $typeid=$row['device_type_id'];
              $stats[$typeid]['total']++;
    }
}
foreach ($stats as $key => $stat) {

    $sql = "SELECT * FROM device_types WHERE device_type_id='$key'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $typename=$row['device_type_name'];
    $total=$stat['total'];

    $charti['value']=$total;
    $charti['color']="Blue";
    $charti['highlight']="Blue";
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
