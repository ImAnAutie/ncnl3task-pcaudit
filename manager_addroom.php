<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');
require_once('loginneeded.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$room_name=$_POST['room_name'];
$floor_id=$_POST['floor_id'];

  if (empty($room_name)) {
  $smarty->assign("error","<p>Room name cannot be empty</p>");
  $smarty->display('error.tpl');
  die();
} else {
$sql = "INSERT INTO rooms (roomname,floorid) VALUES ('$room_name','$floor_id')";

if (mysqli_query($conn, $sql)) {
      $roomid=mysqli_insert_id($conn);
      log2db ("ROOM","ADD",$roomid,$room_name);
      $url="manager_room.php?id=$roomid";
      header("Location: $url");
      die();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $smarty->assign("error","<p>Could not add floor, please check if it exists(someone may have only just this second added it)</p>");
  $smarty->display('error.tpl');
  die();
}
  }
  die();
}
