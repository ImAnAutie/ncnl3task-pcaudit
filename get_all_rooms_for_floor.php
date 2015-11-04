<?php

require_once('config.php');

$sql = "SELECT * FROM rooms WHERE floorid='$floorid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                $room['id']=$row['roomid'];
                $room['name']=$row['roomname'];
                $flr_rooms[$room['id']]=$room;
}
}
$floor['rooms']=$flr_rooms;
$smarty->assign("floor_rooms", $floor);