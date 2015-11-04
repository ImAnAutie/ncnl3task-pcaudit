<?php
require_once('config.php');
require_once('loginneeded.php');
require_once('manageronly.php');

$assignid=$_GET['id'];

if (empty($assignid)) {
  echo "INVALID assign";
  $smarty->assign("error","<p>Try again, that user assign pair is invalid.");
  $smarty->display('error.tpl');
  die();
}


$sql = "DELETE FROM room_assigns WHERE room_assign_id='$assignid' LIMIT 1";

$floorid=$_GET['floorid'];

if ($conn->query($sql) === TRUE) {
      log2db ("ASSIGN","DELETE",$assignid,'');
      $deleteassign['id']=$assignid;
      $pubnub->setAuthKey($key);
      print_r($pubnub->publish('assign_delete',$deleteassign));
      $url="manager_floor.php?id=$floorid";
      header("Location: $url");
      die();
} else {
  echo "Error deleting record: " . $conn->error;
  $smarty->assign("error","<p>Something went wrong, mayby you refreshed and tried to delete twice?, or did someone else delete this assign? <p>Please also check that there are no devices in this assign.");
  $smarty->display('error.tpl');
  die();
}
