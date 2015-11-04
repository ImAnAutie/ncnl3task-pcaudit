<?php
require_once('config.php');
require_once('loginneeded.php');
require_once('manageronly.php');

$floorid=$_GET['id'];

if (empty($floorid)) {
  echo "INVALID FLOOR";
  $smarty->assign("error","<p>Try again, that floor is invalid.");
  $smarty->display('error.tpl');
  die();
}
$sql = "SELECT floor FROM floors WHERE floorid='$floorid' limit 1";
            $result2 = $conn->query($sql);
$num_rows = mysqli_num_rows($result2);
if ($num_rows<1) {
  $smarty->assign("error","<p>That floor does not exist, mayby another manager removed it?");
  $smarty->display('error.tpl');
  die();
}
            $row2 = $result2->fetch_assoc();
            $floorname=$row2['floor'];
$sql = "DELETE FROM floors WHERE floorid='$floorid'";

if ($conn->query($sql) === TRUE) {
      log2db ("FLOOR","DELETE",$floorid,$floorname);
      $deletefloor['id']=$floorid;
      $pubnub->setAuthKey($key);
      print_r($pubnub->publish('floor_delete',$deletefloor));
      $url="managerfunctions.php";
      header("Location: $url");
      die();
} else {
  echo "Error deleting record: " . $conn->error;
  $smarty->assign("error","<p>Something went wrong, mayby you refreshed and tried to delete twice?, or did someone else delete this floor? <p>Please also check that there are no rooms on this floor.");
  $smarty->display('error.tpl');
  die();
}
