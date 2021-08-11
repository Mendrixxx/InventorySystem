<?php
	session_start();
  	include "conn.php";

  	if(isset($_POST['clnum'])){
		$clnum =$_POST['clnum'];
		$chsql = "SELECT `classification` FROM `item` INNER JOIN `classification` ON `item`.`classification` = `classification`.`classification_id` WHERE classification = '$clnum'";
		$chresult = mysqli_query($conn,$chsql);
		$numrows = mysqli_num_rows($chresult);

		if($numrows <= 0){
			$sql = "DELETE FROM `classification` WHERE `classification_id` = '$clnum'";
			$result = mysqli_query($conn,$sql);
			echo "success";
		}else{
			echo "delete error";
		}
	}

	/*$sql = "DELETE FROM `classification` WHERE `classification_id` = '$clnum'";
	$result = mysqli_query($conn,$sql);*/
  
?>