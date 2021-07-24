<?php
session_start();

include "backend/conn.php";


$log_out = "Logged Out";
$unset = session_unset();
$destroy = session_destroy();

if($unset && $destroy){
	$out_log = "INSERT into log(action,date_action) VALUES('$log_out',NOW())";
	$result = mysqli_query($conn, $out_log);
	
	if($result){
		header("Location: login.php");
	}
}
?>
