<?php
require_once('config.php');
require_once('loginneeded.php');

$roomid=$_GET['id'];
$sql = "SELECT * FROM devices WHERE roomid='$roomid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    $workingcount['working']=0;
    $workingcount['faulty']=0;
    while($row = $result->fetch_assoc()) {
//device_id,device_type_id,device_makeid,device_hbnumber_device_working
            $userid=$row['userid'];
            $users[$userid]++;
    }
}


foreach ($users as $key => $user) {
    $sql = "SELECT * FROM users WHERE userid='$key'";
    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $username=$row['user_name'];
    $charti['value']=$user;
    $charti['color']="Blue";
    $charti['highlight']="Blue";
    $charti['label']=$username;
    $charts[]=$charti;
}

echo json_encode($charts);
