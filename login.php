<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');


include('getfloorrooms.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST'){
//CHECK USER CREDS
  $username=$_POST['username'];
  $password=$_POST['password'];

  $sql = "SELECT  * FROM users WHERE  user_name='$username' LIMIT 1";
  $result = $conn->query($sql);

if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
      //  print_r($row);
  //      echo "<p>";
    //    echo password_hash("rasmuslerdorf", PASSWORD_DEFAULT)."\n";
//echo "<p>";
        $hash=$row['user_password'];
        $userid=$row['userid'];
        $first_name=$row['first_name'];
        $last_name=$row['last_name'];
        if (password_verify($password, $hash)) {
          //echo 'Password is valid!';

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
          $url="login.php?incorrect=incorrect";
          header('HTTP/1.1 301 Moved Permanently');
          header('Location: ' . $url);
          die();
        }


      }
} else {
          $url="login.php?incorrect=incorrectc";
          header('HTTP/1.1 301 Moved Permanently');
          header('Location: ' . $url);
          die();
}

} else {
$smarty->display('login.tpl');
}
