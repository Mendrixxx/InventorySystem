<?php
	session_start();
  	include "conn.php";

  	$classification = $_POST['newC'];
  	$clnum = $_POST['clnum'];
  	
  	$sql = "UPDATE `classification` SET `cl_name`='$classification' WHERE `classification_id`= '$clnum'";
  	$result = mysqli_query($conn,$sql);
	
	//For Logs
		$editedClassi ="Update Classification  <b>" .$classification. " </b>.";//LOGS
		$addClassi_log = "INSERT into log(action, date_action) VALUES ('$editedClassi', NOW())";
		$result1 = mysqli_query($conn,$addClassi_log);
	//
		
  	if($result && $result1){
  		echo "success";
  	}else{
  		echo "query fail";
  	}
?>