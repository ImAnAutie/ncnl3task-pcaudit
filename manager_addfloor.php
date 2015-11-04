<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');
require_once('loginneeded.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$floor_name=$_POST['floor_name'];

  if (empty($floor_name)) {
  $smarty->assign("error","<p>Floor name cannot be empty</p>");
  $smarty->display('error.tpl');
  die();
} else {
$sql = "INSERT INTO floors (floor) VALUES ('$floor_name')";

if (mysqli_query($conn, $sql)) {
      $floorid=mysqli_insert_id($conn);
      log2db ("FLOOR","ADD",$floorid,$floor_name);
      $url="manager_floor.php?id=$floorid";
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
