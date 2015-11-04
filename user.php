<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');
require_once('loginneeded.php');

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

  $f_first_name=$row['first_name'];
  $smarty->assign("f_first_name",$f_first_name);
  $f_last_name=$row['last_name'];
  $smarty->assign("f_last_name",$f_last_name);

  $smarty->assign("f_user_id",$fuserid);
}

include('getdevicesforuser.php');
include('getdevicetypes.php');
include('getdevicemakes.php');


$smarty->display('user.tpl');
