<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');
require_once('loginneeded.php');

$floorid=$_GET['id'];
$sql = "SELECT * FROM floors WHERE floorid='$floorid'";
$result = $conn->query($sql);

if ($result->num_rows < 1) {
  $smarty->assign("error","<p>Invalid floor number, please click on the floor name in the top right, then click add room.");
  $smarty->display('error.tpl');
  die();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
$roomname=$_POST['roomname'];

  if (empty($roomname)) {
  $smarty->assign("error","<p>Room name cannot be empty</p>");
  $smarty->display('error.tpl');
  die();
} else {
$sql = "INSERT INTO rooms (roomname, floorid) VALUES ('$roomname','$floorid')";

if (mysqli_query($conn, $sql)) {
      $roomid=mysqli_insert_id($conn);
      $url="room.php?id=$roomid";
      header("Location: $url");
      die();
} else {
  //    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  $smarty->assign("error","<p>Could not add room, please check if it exists(someone may have only just this second added it)</p>");
  $smarty->display('error.tpl');
  die();
}
  }
  die();
}

$row = $result->fetch_assoc();
$floorname=$row['floor'];

include('getfloorrooms.php');
$smarty->assign("floorname",$floorname);
$smarty->assign("floorid",$floorid);
$smarty->display('addroom.tpl');
