<?php
	include "conn.php";

	$sql = "SELECT * FROM item";
	$result = mysqli_query($conn,$sql);

	$rows = array();
	while($row = mysqli_fetch_array($result)){
		$button = '<a href="#" class="btn btn-primary">Edit</a> <a href="#" class="btn btn-primary">Delete</a>'; 
		array_push($row, $button);
		$rows[] = $row;
	}
	echo json_encode($rows);
?>