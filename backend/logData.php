<?php
	session_start();
	include "conn.php";

	$sql = "SELECT * FROM log ORDER BY date_action DESC";
	$result = mysqli_query($conn,$sql);

	$rows = array();
	while($row = mysqli_fetch_array($result)){
		$rows[] = $row;
	}
	echo json_encode($rows);
?>
