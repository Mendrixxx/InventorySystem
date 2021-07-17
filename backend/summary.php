<?php
	session_start();
	include "conn.php";

$column = array("archive.ayear", "archive.total", "classification.cl_name");
$query = "
 SELECT * FROM archive 
 INNER JOIN classification 
 ON classification.classification_id = archive.classification 
";
$query .= " WHERE ";
if(isset($_POST["is_classification"]))
{
 $query .= "archive.classification = '".$_POST["is_classification"]."' AND ";
}
if(isset($_POST["search"]["value"]))
{
 $query .= '(archive.ayear LIKE "%'.$_POST["search"]["value"].'%" ';
 $query .= 'OR archive.total LIKE "%'.$_POST["search"]["value"].'%") ';
 $query .= 'OR classification.cl_name LIKE "%'.$_POST["search"]["value"].'%" ';
}

if(isset($_POST["order"]))
{
 $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
}
else
{
 $query .= 'ORDER BY archive.ayear DESC ';
}

$query1 = '';

if($_POST["length"] != 1)
{
 $query1 .= 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
}

$number_filter_row = mysqli_num_rows(mysqli_query($conn, $query));

$result = mysqli_query($conn, $query . $query1);

$data = array();

while($row = mysqli_fetch_array($result))
{
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
 return mysqli_num_rows($result);
}

$output = array(
 "draw"    => intval($_POST["draw"]),
 "recordsTotal"  =>  get_all_data($conn),
 "recordsFiltered" => $number_filter_row,
 "data"    => $data
);

echo json_encode($output);

?>
