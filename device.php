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
include('getdevicetypes.php');
include('getdevicemakes.php');
$deviceid=$_GET['id'];
include('getdevice.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
  $hbnumber=$_POST['hbnumber'];
  $devicetype=$_POST['devicetype'];
  $make=$_POST['make'];
  $working=$_POST['working'];
  $comment=$_POST['comment'];
  if (empty($hbnumber)) {
    $smarty->assign("error","<p>HB Number empty</p>");
    $smarty->display('error.tpl');
    die();
  }

    $sql = "UPDATE devices SET userid='$userid', device_type_id='$devicetype', device_makeid='$make', device_working='$working',device_comment='$comment' WHERE device_id='$deviceid'";
    if (mysqli_query($conn, $sql)) {
        echo "Record updated successfully";
        include('getdevice.php');
    } else {
        echo "Error updating record: " . mysqli_error($conn);
    }





}
$smarty->display('device.tpl');
