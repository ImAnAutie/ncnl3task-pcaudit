<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');

$smarty->assign("loggedin",$loggedin);
include('getfloorrooms.php');
$smarty->display('index.tpl');
