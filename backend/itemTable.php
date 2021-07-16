<?php
	include "conn.php";

	$sql = "SELECT * FROM ((item INNER JOIN classification ON item.classification = classification.classification_id)INNER JOIN employee ON item.remarks = employee.id)";

	$result = mysqli_query($conn,$sql);
	$numRows = mysqli_num_rows($result);

	$sqlCompItem = "SELECT * FROM component"; 
	$resultCompItem = mysqli_query($conn,$sqlCompItem);
	$components = array();
	while($rowComp = mysqli_fetch_array($resultCompItem)){
		$temp = array();
		$temp['comp_id'] = $rowComp['comp_id'];
		$temp['item_id'] = $rowComp['item_id'];
		$temp['comp_name'] = $rowComp['comp_name'];
		$temp['c_date_aq'] = $rowComp['c_date_aq'];
		$temp['c_unit_meas'] = $rowComp['c_unit_meas'];
		$temp['c_unit_val'] = $rowComp['c_unit_val'];
		$temp['c_total_val'] = $rowComp['c_total_val'];
		$temp['c_quan_propcar'] = $rowComp['c_quan_propcar'];
		$temp['c_quan_phycou'] = $rowComp['c_quan_phycou'];
		$temp['c_SO_quan'] = $rowComp['c_SO_quan'];
		$temp['c_SO_val'] = $rowComp['c_SO_val'];
		$components[] = $temp;
	}

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
		foreach($components as $temp){
			/*echo "<b>item_id</b> = ".$temp['item_id']."=== <b>row['item_id']</b>".$row['item_id']."<br>";*/
			if($temp['item_id']==$row['item_id']){	
				$datum = array();
				$datum['comp_id'] = $temp['comp_id'];
				$datum['item_id'] = $temp['item_id'];
				$datum['comp_name'] = $temp['comp_name'];
				$datum['c_date_aq'] = $temp['c_date_aq'];
				$datum['c_unit_meas'] = $temp['c_unit_meas'];
				$datum['c_unit_val'] = $temp['c_unit_val'];
				$datum['c_total_val'] = $temp['c_total_val'];
				$datum['c_quan_propcar'] = $temp['c_quan_propcar'];
				$datum['c_quan_phycou'] = $temp['c_quan_phycou'];
				$datum['c_SO_quan'] = $temp['c_SO_quan'];
				$datum['c_SO_val'] = $temp['c_SO_val'];
				$datum['button'] = '<a href="#" editCompId="'.$temp['comp_id'].'" class="btn btn-primary">Edit</a> <button id ="dtbnc" class="btn btn-danger btn-xs" data-assigned-id ='.$temp['comp_id'].' data-title="Delete" data-toggle="modal" data-placement="top" data-toggle="tooltip" title="Delete"><span class="fa fa-trash-alt"></span> DELETE</button>';
				$datarow[] = $datum;
			}
		}	

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