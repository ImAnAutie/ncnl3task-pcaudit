<?php
require_once('config.php');

if ($_SESSION['loggedin']!="1") {
  $url="index.php";
          header('HTTP/1.1 301 Moved Permanently');
          header('Location: ' . $url);
          die();
}
?>