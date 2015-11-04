<?php

/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');
require_once('loginneeded.php');



include('getdevicetypes.php');
include('getdevicemakes.php');

$roomid=$_GET['id'];

include('getfloorrooms.php');
$roomname=$allrooms[$roomid]['name'];
$smarty->assign("roomname",$roomname);
$smarty->assign("roomid",$roomid);
$sql = "SELECT * FROM rooms WHERE roomid='$roomid'";
$result = $conn->query($sql);
if ($result->num_rows < 1) {
  $smarty->assign("error","<p>Invalid room, please click on a floor name in the top right, then click on a room.");
  $smarty->display('error.tpl');
  die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $hbnumber=$_POST['hbnumber'];
  $devicetype=$_POST['devicetype'];
  $make=$_POST['make'];
  $working=$_POST['working'];
  $comment=$_POST['comment'];
  if (empty($hbnumber)) {
    $smarty->assign("error","<p>HB Number empty</p>");
    $smarty->display('error.tpl');
    die();
  }
 $sql = "INSERT INTO devices (device_type_id,userid,device_makeid,roomid,device_hbnumber,device_working,device_comment) VALUES ('$devicetype','$userid', '$make','$roomid','$hbnumber','$working','$comment')";

if (mysqli_query($conn, $sql)) {
//      TYPENAME,MAKENAME,COMMENT,WORKING,USERNAME,USERID,ROOMID
      $deviceid=mysqli_insert_id($conn);
      $newdevicenotification['id']=$deviceid;
      $newdevicenotification['hb_number']=$hbnumber;
      $newdevicenotification['typename']=$device_types[$devicetype]['name'];
      $newdevicenotification['makename']=$device_makes[$make]['name'];
      $newdevicenotification['comment']=$comment;

      if ($working) {
              $newdevicenotification['working']="Working";
      } else {
              $newdevicenotification['working']="Faulty";
      }
      $sql = "SELECT first_name,last_name FROM users WHERE userid='$userid' limit 1";
      $result2 = $conn->query($sql);
      $row2 = $result2->fetch_assoc();
      $newdevicenotification['first_name']=$row2['first_name'];
      $newdevicenotification['last_name']=$row2['last_name'];
      $newdevicenotification['userid']=$userid;
      $newdevicenotification['roomid']=$roomid;
      print_r($newdevicenotification);
      echo ("<br />");
      $pubnub->setAuthKey($key);
      print_r($pubnub->publish('device_add',$newdevicenotification));
      die();
      $url="room.php?id=$roomid&justdone=1";
      header("Location: $url");
      die();
} else {
   echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $smarty->assign("error","<p>Could not add device, please check if it exists(someone may have only just this second added it)</p>");
  $smarty->display('error.tpl');
  die();
}
  die();
}

include('getdevices.php');


$smarty->display('room.tpl');
