<?php
require ('vendor/autoload.php');

use Pubnub\Pubnub;

$pubnub = new Pubnub("pub-c-c22bf29d-2eba-48c2-84f5-1946ed66539e", "sub-c-2556ee06-7916-11e5-9720-0619f8945a4f", "client0001");

$pubnub->subscribe('hello_world', function ($envelope) {
    $msg = $envelope['message'];
    print_r($envelope);

    if (strcmp($msg, "exit") == 0) {
        print_r('<<< So long, and thanks for all the messages! >>>');
        return false;
    }
    else {
        print_r('>>> May I have some more message, please? <<<');
        return true;
    }
});