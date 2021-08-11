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
		if($result){
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