<?php
require_once('config.php');
require_once('loginneeded.php');

$sql = "SELECT * FROM device_makes";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//make_id,make_make_id,make_makeid,make_hbnumber_make_working
            $make['id']=$row['device_make_id'];
            $makeid=$row['device_make_id'];
            $make['name']=$row['device_make_name'];
            $device_makes[$makeid]=$make;
    }
}
$smarty->assign("device_makes", $device_makes);
