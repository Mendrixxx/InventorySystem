<?php
	session_start();
	include "conn.php";

	$sql = "SELECT * FROM `classification`";
	$result = mysqli_query($conn,$sql);
	$numrows = mysqli_num_rows($result);
	if($numrows > 0){
		while($row = mysqli_fetch_assoc($result)){
			echo "<tr><td>".$row['cl_name']."</td> 
			<td><button type='button' class='btn btn-warning' id='editC' editClassi='".$row['classification_id']."' ><span class='fa fa-check-circle'></span> Edit </button> <button type='button' class='btn btn-danger' id='deleteC' deleteClassi='".$row['classification_id']."'><span class='fa fa-check-circle'></span> Delete</button></td></tr>";
		}
	}else{
		//echo no data in table 
	}	
?>