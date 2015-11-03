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
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$authcode=$_POST['authcode'];
  $username=$_POST['username'];
  $password=$_POST['password'];
if (empty($authcode)) {
   $error["EMPTY_AUTHCODE"]="EMPTY_AUTHCODE";
}
if ($authcode!="2772712") {
  $error["INVALID_AUTHCODE"]="INVALID_AUTHCODE";
}

if (empty($username)) {
   $error["EMPTY_USERNAME"]="EMPTY_USERNAME";
}

if (empty($password)) {
   $error["EMPTY_PASSWORD"]="EMPTY_PASSWORD";
}

if (empty($error)) {
  $hashedpassword=password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (user_name, user_password) VALUES ('$username','$hashedpassword')";
      if (mysqli_query($conn, $sql)) {
          $userid=mysqli_insert_id($conn);

          $keystring="$key-$userid";
          $authkey=hash('sha256', $keystring);
          echo "Keystring is:$keystring authkey is:$authkey";
          print_r($pubnub->grant(true, true, "device_add", $authkey, 0));
          print_r($pubnub->grant(true, true, "device_delete", $authkey, 0));
          print_r($pubnub->grant(true, true, "broadcastmessage", $authkey, 0));
          print_r($pubnub->grant(true, true, "broadcastmessage_ack", $authkey, 0));

          $_SESSION['authkey']=$authkey;

          $_SESSION['loggedin']="1";
          $_SESSION['userid']=$userid;
          $_SESSION['username']=$username;
          $url="index.php";
          header('HTTP/1.1 301 Moved Permanently');
          header('Location: ' . $url);
          die();
} else {
        $error["CREATEFAIL"]="CREATEFAIL";
        $smarty->assign("error",$error);
        $smarty->display('signup.tpl');
        die();
}

} else {

        $smarty->assign("error",$error);
        $smarty->display('signup.tpl');
        die();
}

} else {
$smarty->display('signup.tpl');
}