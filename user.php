<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require 'libs/Smarty.class.php';
require_once('config.php');
require_once('loginneeded.php');
$smarty = new Smarty;

$fuserid=$_GET['id'];

include('getfloorrooms.php');
$sql = "SELECT * FROM users WHERE userid='$fuserid'";
$result = $conn->query($sql);
if ($result->num_rows < 1) {
  $smarty->assign("error","<p>Invalid user");
  $smarty->display('error.tpl');
  die();
}
while($row = $result->fetch_assoc()) {
  $fusername=$row['user_name'];
  $smarty->assign("fusername",$fusername);

}

include('getdevicesforuser.php');
include('getdevicetypes.php');
include('getdevicemakes.php');


$smarty->display('user.tpl');
