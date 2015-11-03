<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require 'libs/Smarty.class.php';
require_once('config.php');
$smarty = new Smarty;

$messageid=$_GET['id'];
$sql = "SELECT * FROM messages WHERE messageid='$messageid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  $sql = "INSERT INTO message_ack (message_id, user_id) VALUES ('$messageid','$userid')";
  mysqli_query($conn, $sql);
  echo "ACKd";
} else {
  echo "INVALID_MSG_ID";
}