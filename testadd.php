<?php
require ('vendor/autoload.php');

use Pubnub\Pubnub;

//Publish Key pub-c-5931fa5f-7488-44be-9b30-9bfa2955980d
//Subscribe Key sub-c-7cdfda56-7007-11e5-924b-02ee2ddab7fe
//Secret Key sec-c-YjhlZGRhYjAtYjVmNS00OGY5LTk2MTMtMWU1OTI5NTU3NjEz

$pubnub = new Pubnub("pub-c-c22bf29d-2eba-48c2-84f5-1946ed66539e", "sub-c-2556ee06-7916-11e5-9720-0619f8945a4f", "sec-c-MDEyMjA1MTUtODY2YS00YmI1LTlhNGItYTFiZWFjNmVhY2Y2");

$notification['id']="1";
$notification['hb_number']="TEST_HB3691";
$notification['type']="Computer";
$notification['make']="Dell";
$notification['Comment']="";
$notification['status']="Working";
$notification['userid']="1";
$notification['username']="gregory";
$notification['roomid']="1";
$notificationjson=json_encode($notification);
print_r($pubnub->grant(true, true, "hello_world", "client0001", 0));
print_r($pubnub->grant(true, false, "hello_world", "client0002", 0));
$pubnub->setAuthKey("client0001");
echo "\n\n\n";
$publish_result = $pubnub->publish('hello_world',$notificationjson);

print_r($publish_result);