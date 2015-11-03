<?php
require_once('config.php');
//require_once('loginneeded.php');

$sql = "SELECT * FROM devices WHERE roomid='$roomid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $workingcount['working']=0;
    $workingcount['faulty']=0;
    while($row = $result->fetch_assoc()) {
//device_id,device_type_id,device_makeid,device_hbnumber_device_working
            $device['id']=$row['device_id'];
            $deviceid=$row['device_id'];
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
            $userid=$row['userid'];
            $device['userid']=$userid;
            $roomid=$row['roomid'];
            $device['roomid']=$roomid;
            $sql = "SELECT first_name, last_name FROM users WHERE userid='$userid' limit 1";
            $result2 = $conn->query($sql);
            $row2 = $result2->fetch_assoc();
            $device['first_name']=$row2['first_name'];
            $device['last_name']=$row2['last_name'];
            $devices[$deviceid]=$device;
    }
}
$smarty->assign("devices", $devices);
$smarty->assign("workingcount", $workingcount);
