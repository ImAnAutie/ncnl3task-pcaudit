<?php

require_once('config.php');

$sql = "SELECT * FROM rooms WHERE floorid='$floorid'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
                $room_id=$row['roomid'];
                $room['id']=$row['roomid'];
                $room['name']=$row['roomname'];
                    $sql2 = "SELECT * FROM room_assigns WHERE roomid='$room_id'";
			echo $sql2;
                    $result2 = $conn->query($sql2);
                    if ($result2->num_rows > 0) {
                      // output data of each row
                      unset($assigns);
                      while($row2 = $result2->fetch_assoc()) {
                      unset($assign);
                        $a_userid=$row2['userid'];

                        $sql = "SELECT first_name, last_name FROM users WHERE userid='$a_userid' limit 1";
                        $result3 = $conn->query($sql);
                        $row3 = $result3->fetch_assoc();
                        $assign['userid']=$a_userid;
                        $assign['first_name']=$row3['first_name'];
                        $assign['last_name']=$row3['last_name'];

                        $assigns[$row2['room_assign_id']]=$assign;
                  }
}
                      $room['assigns']=$assigns;
			unset($assigns);
			unset($assign);

                $flr_rooms[$room['id']]=$room;
}
}
$floor['rooms']=$flr_rooms;
$smarty->assign("floor_rooms", $floor);
//print_r($flr_rooms);
//die();
