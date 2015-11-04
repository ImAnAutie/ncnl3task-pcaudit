<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');
require_once('loginneeded.php');

$floorid=$_GET['floorid'];
$roomid=$_POST['room_id'];
$a_userid=$_POST['userform'];

  if (empty($a_userid)) {
  $smarty->assign("error","<p>Please select a user before clicking add.</p>");
  $smarty->display('error.tpl');
  die();
} else {
$sql = "INSERT INTO room_assigns (roomid,userid) VALUES ('$roomid','$a_userid')";

if (mysqli_query($conn, $sql)) {
      $assignid=mysqli_insert_id($conn);
      log2db ("ASSIGN","ADD",$assignid,'');
      $url="manager_floor.php?id=$floorid";
      header("Location: $url");
      die();
} else {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $smarty->assign("error","<p>Could not assign user, please check if user is allready assigned to this room.</p>");
  $smarty->display('error.tpl');
  die();
}
  }
