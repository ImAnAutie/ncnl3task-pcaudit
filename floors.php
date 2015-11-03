<?php
unset($rooms);
$room['name']="Room 213";
$room['id']="1";
$rooms[]=$room;

$room['name']="Room 214";
$room['id']="2";
$rooms[]=$room;

$room['name']="Room 217";
$room['id']="3";
$rooms[]=$room;

$floor['name']="Floor 2";
$floor['ID']="1";
$floor['rooms']=$rooms;
$floors[]=$floor;




unset($rooms);
$room['name']="Room 313";
$room['id']="1";
$rooms[]=$room;

$room['name']="Room 314";
$room['id']="2";
$rooms[]=$room;

$room['name']="Room 317";
$room['id']="3";
$rooms[]=$room;

$floor['name']="Floor 3";
$floor['ID']="2";
$floor['rooms']=$rooms;
$floors[]=$floor;
echo json_encode($floors);