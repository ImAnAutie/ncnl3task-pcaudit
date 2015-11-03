<?php

require_once('vendor/autoload.php');

use Pubnub\Pubnub;

$pubnub = new Pubnub("pub-c-c22bf29d-2eba-48c2-84f5-1946ed66539e", "sub-c-2556ee06-7916-11e5-9720-0619f8945a4f", "sec-c-MDEyMjA1MTUtODY2YS00YmI1LTlhNGItYTFiZWFjNmVhY2Y2");
$key="05c1fa9341e3a754ba4b";

$pubnub->grant(true, true, "device_add", $key, 0);
$pubnub->grant(true, true, "device_delete", $key, 0);
