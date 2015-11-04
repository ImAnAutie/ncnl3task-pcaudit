<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');

include('getfloorrooms.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){

$authcode=$_POST['authcode'];
  $username=$_POST['username'];
  $password=$_POST['password'];
  
$first_name=$_POST['first_name'];
$last_name=$_POST['last_name'];

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
  
if (empty($first_name)) {
   $error["EMPTY_FIRST_NAME"]="EMPTY_FIRST_NAME";
}

if (empty($last_name)) {
   $error["EMPTY_LAST_NAME"]="EMPTY_LAST_NAME";
}

if (empty($error)) {
  $hashedpassword=password_hash($password, PASSWORD_DEFAULT);
  $sql = "INSERT INTO users (user_name, user_password, first_name, last_name) VALUES ('$username','$hashedpassword', '$first_name', '$last_name')";
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
          $_SESSION['first_name']=$first_name;
          $_SESSION['last_name']=$last_name;
        
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
