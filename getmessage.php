<?php
require_once('config.php');
if ($_SESSION['loggedin']!="1") {
  $url="index.php";
          echo "NOMSG";
          die();
}


$sql = "SELECT  * FROM messages WHERE  messageid NOT IN (SELECT message_id FROM message_ack WHERE user_id='$userid') LIMIT 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
        $message['messageid']=$row['messageid'];
        $message['title']=$row['title'];
        $message['message']=$row['message'];
        $message['type']=$row['type'];
        echo json_encode($message);
      }
} else {
  echo "NOMSG";
}