<?php
	session_start();
  	include "conn.php";

  	$classification = $_POST['newC'];
  	$clnum = $_POST['clnum'];
  	
  	$sql = "UPDATE `classification` SET `cl_name`='$classification' WHERE `classification_id`= '$clnum'";
  	$result = mysqli_query($conn,$sql);
  	if($result){
  		echo "success";
  	}else{
  		echo "query fail";
  	}
?>