<?php

require_once('config.php');
require_once('loginneeded.php');
$sql = "SELECT * FROM users";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {

	$gau_userid=$row['userid'];
	$gau['userid']=$gau_userid;
	$gau['user_name']=$row['user_name'];
	$gau['first_name']=$row['first_name'];
	$gau['last_name']=$row['last_name'];

	$allusers[$gau_userid]=$gau;
}
}
$smarty->assign("allusers", $allusers);