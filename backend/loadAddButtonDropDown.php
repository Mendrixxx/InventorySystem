<?php
	session_start();
  	include "conn.php";

  	$classi_array = array();
  	$sql = "SELECT * FROM `classification`";
  	$result = mysqli_query($conn,$sql);
  	while($row = mysqli_fetch_array($result)){
  		$id = $row['classification_id'];
  		$name = $row['cl_name'];
  		$classi_array[] = array('id' =>$id ,'name'=> $name ); 
  	}
  	echo json_encode($classi_array);

  	
 ?>