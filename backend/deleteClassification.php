<?php
	session_start();
  	include "conn.php";

  	if(isset($_POST['clnum'])){
		$clnum =$_POST['clnum'];
		$chsql = "SELECT `classification` FROM `item` INNER JOIN `classification` ON `item`.`classification` = `classification`.`classification_id` WHERE classification = '$clnum'";
		$chresult = mysqli_query($conn,$chsql);
		$numrows = mysqli_num_rows($chresult);
		
		$result="";
		if($numrows <= 0){
			$sql = "DELETE FROM `classification` WHERE `classification_id` = '$clnum'";	
			
			$for_comp = "SELECT * FROM classification WHERE classification_id = $clnum";//
			if($fetch_comp = mysqli_query($conn,$for_comp)){//
				while($roww = mysqli_fetch_row($fetch_comp)){//
					$classi_name = $roww['1'];//
				}
				mysqli_free_result($fetch_comp);//
			}
			
			
			$deletedClassi ="Delete Classification  <b>" .$classi_name. " </b> to the inventory.";//LOGS
			$addClassi_log = "INSERT into log(action, date_action) VALUES ('$deletedClassi', NOW())";
			
			$result = mysqli_query($conn,$sql);
			$result1 = mysqli_query($conn,$addClassi_log);
		//
		}
		if($result && $result1){
			echo "success";
		}else{
			echo "delete error";
		}
	}

	/*$sql = "DELETE FROM `classification` WHERE `classification_id` = '$clnum'";
	$result = mysqli_query($conn,$sql);*/
  
?>