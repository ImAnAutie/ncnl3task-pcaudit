<?php
require_once('config.php');
require_once('loginneeded.php');

$sql = "SELECT * FROM devices WHERE device_id='$deviceid'";
echo $sql;
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $workingcount['working']=0;
    $workingcount['faulty']=0;
    while($row = $result->fetch_assoc()) {
//device_id,device_type_id,device_makeid,device_hbnumber_device_working
            $device['id']=$row['device_id'];
            $typeid=$row['device_type_id'];
            $device['type_id']=$typeid;
            $sql="SELECT * FROM device_types WHERE device_type_id='$typeid'";
            $resulttype = mysqli_query($conn,$sql);
            $rowtype = mysqli_fetch_row($resulttype);
            $device['type']=$rowtype[1];


            $makeid=$row['device_makeid'];
            $device['makeid']=$makeid;
            $sql="SELECT * FROM device_makes WHERE device_make_id='$makeid'";
            $resultmake = mysqli_query($conn,$sql);
            $rowmake = mysqli_fetch_row($resultmake);
            $device['make']=$rowmake[1];
            $device['hbnumber']=$row['device_hbnumber'];
            $device['comment']=$row['device_comment'];
            $working=$row['device_working'];
            if ($working) {
              $device['working']="Working";
              $workingcount['working']++;
            } else {
              $device['working']="Faulty";
              $workingcount['faulty']++;
            }
    }
} else {
  $smarty->assign("error","<p>Invalid device, mayby someone has deleted it?");
  $smarty->display('error.tpl');
  die();
}
print_r($device);
//die();
$smarty->assign("DEVICE_HBNUMBER", $device['hbnumber']);
$smarty->assign("DEVICE_TYPEID", $typeid);
$smarty->assign("DEVICE_MAKEID", $makeid);
$smarty->assign("WORKING", $working);
$smarty->assign("COMMENT", $device['comment']);
$smarty->assign("workingcount", $workingcount);
