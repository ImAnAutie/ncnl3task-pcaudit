<?php
require_once('config.php');

function log2db ($edited_thing_type,$edit_type,$edited_thing_id,$comment) {
global $conn;
$editing_user_id=$_SESSION['userid'];
$sql = "INSERT INTO log (editing_user_id, edited_thing_type, edit_type, edited_thing_id,comment)
VALUES ('$editing_user_id','$edited_thing_type','$edit_type','$edited_thing_id','$comment')";
      if (mysqli_query($conn, $sql)) {
        echo "LOGGED";
      } else {
		  echo("Error description: " . mysqli_error($conn));
     }
}
