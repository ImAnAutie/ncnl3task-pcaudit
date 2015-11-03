<?php
require 'libs/Smarty.class.php';
require_once('config.php');
$smarty = new Smarty;
require_once('config.php');

$deviceid=$_GET['id'];
$roomname=$_GET['roomid'];

if (empty($deviceid)) {
  echo "INVALID DEVICE";
  $smarty->assign("error","<p>Invalid device id, mayby someone has just deleted it?");
  $smarty->display('error.tpl');
  die();
}
$sql = "DELETE FROM devices WHERE device_id='$deviceid'";

if ($conn->query($sql) === TRUE) {
      $deletedevice['id']=$deviceid;
      $pubnub->setAuthKey($key);
      print_r($pubnub->publish('device_delete',$deletedevice));

      $url="room.php?id=$roomname";
      header("Location: $url");
      die();
} else {
  echo "Error deleting record: " . $conn->error;
  $smarty->assign("error","<p>Something went wrong, mayby you refreshed and tried to delete twice?");
  $smarty->display('error.tpl');
  die();
}