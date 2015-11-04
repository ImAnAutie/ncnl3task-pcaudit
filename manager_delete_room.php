<?php
require_once('config.php');
require_once('loginneeded.php');
require_once('manageronly.php');

$roomid=$_GET['id'];

if (empty($roomid)) {
  echo "INVALID ROOM";
  $smarty->assign("error","<p>Try again, that room is invalid.");
  $smarty->display('error.tpl');
  die();
}
$sql = "SELECT roomname,floorid FROM rooms WHERE roomid='$roomid' limit 1";
$result2 = $conn->query($sql);
$num_rows = mysqli_num_rows($result2);
if ($num_rows<1) {
  $smarty->assign("error","<p>That Room does not exist, mayby another manager removed it?");
  $smarty->display('error.tpl');
  die();
}
            $row2 = $result2->fetch_assoc();
            $roomname=$row2['roomname'];
            $floorid=$row2['floorid'];
$sql = "DELETE FROM rooms WHERE roomid='$roomid' LIMIT 1";

if ($conn->query($sql) === TRUE) {
      log2db ("ROOM","DELETE",$roomid,$roomname);
      $deleteroom['id']=$roomid;
      $pubnub->setAuthKey($key);
      print_r($pubnub->publish('room_delete',$deleteroom));
      $url="manager_floor.php?id=$floorid";
      header("Location: $url");
      die();
} else {
  echo "Error deleting record: " . $conn->error;
  $smarty->assign("error","<p>Something went wrong, mayby you refreshed and tried to delete twice?, or did someone else delete this room? <p>Please also check that there are no devices in this room.");
  $smarty->display('error.tpl');
  die();
}
