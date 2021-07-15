<?php
	include "conn.php";

	$sql = "SELECT * FROM ((item INNER JOIN classification ON item.classification = classification.classification_id)INNER JOIN employee ON item.remarks = employee.id)";
	$result = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($result);

	$rows = array();
	while($row = mysqli_fetch_array($result)){
		$datarow = array();
		$datarow[] = $row['item_name'];
		$datarow[] = $row['item_desc'];
		$datarow[] = $row['property_num'];
		$datarow[] = $row['date_aq'];
		$datarow[] = $row['unit_meas'];
		$datarow[] = $row['unit_val'];
		$datarow[] = $row['total_val'];
		$datarow[] = $row['quant_propcar'];
		$datarow[] = $row['quant_phycou'];
		$datarow[] = $row['SO_quant'];
		$datarow[] = $row['SO_val'];
		$datarow[] = $row['cl_name'];
		$datarow[] = $row['last_name'];
		$datarow[] = '<a href="#" editId="'.$row['item_id'].'" class="btn btn-primary">Edit</a> <button id ="dtbn" class="btn btn-danger btn-xs" data-assigned-id ='.$row['item_id'].' data-title="Delete" data-toggle="modal" data-placement="top" data-toggle="tooltip" title="Delete"><span class="fa fa-trash-alt"></span> DELETE</button>';

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