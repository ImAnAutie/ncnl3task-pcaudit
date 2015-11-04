<?php
/**
 * PC Audit
 * (C) Gregory Oakley-Stevenson
 * @package pcaudit
 */

require_once('config.php');
          session_destroy();
          $url="index.php";
          header('HTTP/1.1 301 Moved Permanently');
          header('Location: ' . $url);
          die();
