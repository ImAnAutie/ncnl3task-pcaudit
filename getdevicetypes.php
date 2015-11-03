<?php
require_once('config.php');
require_once('loginneeded.php');

$sql = "SELECT * FROM device_types";
$result = $conn->query($sql);

unset($device_types);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
//type_id,type_type_id,type_makeid,type_hbnumber_type_working
            $type['id']=$row['device_type_id'];
	    $id=$row['device_type_id'];
            $type['name']=$row['device_type_name'];
            $device_types[$id]=$type;
    }
}
$smarty->assign("device_types", $device_types);
