<?php
	session_start();
	include "conn.php";

$query = "
 SELECT * FROM archive 
 INNER JOIN classification 
 ON classification.classification_id = archive.classification ";
	if(isset($_POST['is_classification'])){
		$category = $_POST['is_classification'];
		$query .= "WHERE `cl_name` = '".$category."'";
	}
	
	$result = mysqli_query($conn,$query );
	$numRows = mysqli_num_rows($result);

$data = array();
while($row = mysqli_fetch_array($result)){
 $sub_array = array();
 $sub_array[] = $row["ayear"];
 $sub_array[] = $row["total"];
 $sub_array[] = $row["cl_name"];
 $data[] = $sub_array;
}
function get_all_data($conn)
{
 $query = "SELECT * FROM archive";
 $result = mysqli_query($conn, $query);
 return mysqli_num_rows($result);}
$output = array(
 "draw"    => "",
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $numRows,
 "data"    => $data
);
echo json_encode($output);
?>
