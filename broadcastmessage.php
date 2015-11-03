<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require 'libs/Smarty.class.php';
require_once('config.php');
$smarty = new Smarty;


include('getfloorrooms.php');
$smarty->display('broadcastmessage.tpl');
