<?php
	include "conn.php";

	$sql = "SELECT * FROM ((item INNER JOIN classification ON item.classification = classification.classification_id)INNER JOIN employee ON item.remarks = employee.id)";

	$result = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($result);

	$sqlCompItem = "SELECT * FROM `item` INNER JOIN component ON `item`.`item_id` = `component`.`item_id`"; 
	$resultCompItem = mysqli_query($conn,$sqlCompItem);
	$components= array();
	

	$rows = array();
	while($row = mysqli_fetch_array($result)){
		$datarow = array();
		$datarow['item_id'] = $row['item_id'];
		$datarow['item_name'] = $row['item_name'];
		$datarow['item_desc'] = $row['item_desc'];
		$datarow['property_num'] = $row['property_num'];
		$datarow['date_aq'] = $row['date_aq'];
		$datarow['unit_meas'] = $row['unit_meas'];
		$datarow['unit_val'] = $row['unit_val'];
		$datarow['total_val'] = $row['total_val'];
		$datarow['quant_propcar'] = $row['quant_propcar'];
		$datarow['quant_phycou'] = $row['quant_phycou'];
		$datarow['SO_quant'] = $row['SO_quant'];
		$datarow['SO_val'] = $row['SO_val'];
		$datarow['cl_name'] = $row['cl_name'];
		$datarow['last_name'] = $row['last_name'];
		$datarow['button'] = '<a href="#" data-toggle="modal" data-title="Edit" data-placement="top" data-target="#edititem" editId="'.$row['item_id'].'" class="btn btn-primary">Edit</a> <button id ="dtbn" class="btn btn-danger btn-xs" data-assigned-id ='.$row['item_id'].' data-title="Delete" data-toggle="modal" data-placement="top" data-toggle="tooltip" title="Delete"><span class="fa fa-trash-alt"></span> DELETE</button>';
		$datarow['component']['name'] = "hatdog";

		$rows[] = $datarow;
	}

	$output = array(
		"draw"	=>	"",			
		"iTotalRecords"	=> 	$numRows,
		"iTotalDisplayRecords"	=>  $numRows,
		"data"	=> 	$rows
	);
	echo json_encode($output);
?>