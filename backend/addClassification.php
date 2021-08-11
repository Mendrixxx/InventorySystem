<?php
	session_start();
  	include "conn.php";
	
	$classification = $_POST['newC'];
	//find duplicates
	$chsql = "SELECT * FROM `classification` WHERE `cl_name`='$classification'";
	$chresult = mysqli_query($conn,$chsql);
	$numrows = mysqli_num_rows($chresult);

	if($numrows<=0){
		$sql = "INSERT INTO `classification` (`classification_id`, `cl_name`) VALUES (NULL, '$classification')";
		$result = mysqli_query($conn,$sql);
		
		//For Logs
		$addedClassi ="Add Classification  <b>" .$classification. " </b> to the inventory.";//LOGS
		$addClassi_log = "INSERT into log(action, date_action) VALUES ('$addedClassi', NOW())";
		$result1 = mysqli_query($conn,$addClassi_log);
		//
		if($result && $result1){
			echo "1";
		}
		else{
			echo "0";
		}
	}else{
		//has duplicate
		echo "3";
	}

?>