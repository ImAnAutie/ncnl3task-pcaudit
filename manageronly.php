<?php
require_once('config.php');
require_once('loginneeded.php');

if ($userrole!=1) {
  $smarty->assign("error","<p>Access Denied. You are not a manager and cannot access this page.");
  $smarty->display('error.tpl');
  die();
}
