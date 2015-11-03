<?php
require __DIR__ . '/vendor/autoload.php';
use Thruway\ClientSession;
use Thruway\Peer\Client;
use Thruway\Transport\PawlTransportProvider;
$client = new Client("realm1");
$client->addTransportProvider(new PawlTransportProvider("ws://127.0.0.1:8080/ws"));

$title=$_GET['title'];
$message=$_GET['message'];
$type=$_GET['type'];
$notification['title']=$title;
$notification['message']=$message;
$notification['type']=$type;

$notification=json_encode($notification);
echo "\n $notification \n";
//die();
$client->on('open', function (ClientSession $session) {
 global $notification;
 $session->publish('pcaudit.broadcastmessage', [$notification], [], ["acknowledge" => true])->then(
        function () {
            echo "Publish Acknowledged!\n";
	    die();
        },
        function ($error) {
            // publish failed
            echo "Publish Error {$error}\n";
	    die();
        }
    );

});
$client->start();
