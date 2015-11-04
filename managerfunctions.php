<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');

$smarty->assign("loggedin",$loggedin);
include('getfloorrooms.php');

require_once('manageronly.php');
$smarty->display('managerfunctions.tpl');
