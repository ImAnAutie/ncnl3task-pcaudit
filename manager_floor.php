<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');

$smarty->assign("loggedin",$loggedin);
require_once('getfloorrooms.php');
$floorid=$_GET['id'];
$sql = "SELECT floor FROM floors WHERE floorid='$floorid' limit 1";
$result2 = $conn->query($sql);

$num_rows = mysqli_num_rows($result2);
if ($num_rows<1) {
  $smarty->assign("error","<p>Floor does not exist, mayby another manager removed it?");
  $smarty->display('error.tpl');
  die();
}

$row2 = $result2->fetch_assoc();
$floorname=$row2['floor'];
echo $floorname;
$smarty->assign('floor_name',$floorname);
$smarty->assign('floorid',$floorid);
require_once('manageronly.php');

require_once('get_all_rooms_for_floor.php');
require_once('get_all_users.php');
$smarty->display('manager_floor.tpl');
