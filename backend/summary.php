<?php
	session_start();
	include "conn.php";

// storing  request (ie, get/post) global array to a variable  
$requestData= $_REQUEST;
$columns = array( 
// datatable column index  => database column name
	0 =>'ayear', 
	1 => 'total',
	2=> 'cl_name');
// getting total number records without any search
$sql = " SELECT * FROM archive 
 INNER JOIN classification 
 ON classification.classification_id = archive.classification ";
$query=mysqli_query($conn, $sql) or die("summary.php: get summary");
$totalData = mysqli_num_rows($query);
$totalFiltered = $totalData;  // when there is no search parameter then total number rows = total number filtered rows.



// getting records as per search parameters
if( !empty($requestData['columns'][0]['search']['value']) ){   //year
	$sql.=" AND ayear LIKE '".$requestData['columns'][0]['search']['value']."%' ";}
if( !empty($requestData['columns'][1]['search']['value']) ){  //total
	$sql.=" AND total LIKE '".$requestData['columns'][1]['search']['value']."%' ";}
if( !empty($requestData['columns'][2]['search']['value']) ){ //classification
	$sql.=" AND classification LIKE '".$requestData['columns'][2]['search']['value']."%' ";}
 $sql .= 'ORDER BY archive.ayear DESC ';
$query=mysqli_query($conn, $sql) or die("summary.php: get employees");
$totalFiltered = mysqli_num_rows($query); // when there is a search parameter then we have to modify total number filtered rows as per search result.
	


$data = array();
while( $row=mysqli_fetch_array($query) ) {  // preparing an array
	$nestedData=array(); 
	$nestedData[] = $row["ayear"];
	$nestedData[] = $row["total"];
	$nestedData[] = $row["cl_name"];
	$data[] = $nestedData;}
$json_data = array(
			"draw"            => intval( $requestData['draw'] ),   // for every request/draw by clientside , they send a number as a parameter, when they recieve a response/data they first check the draw number, so we are sending same number in draw. 
			"recordsTotal"    => intval( $totalData ),  // total number of records
			"recordsFiltered" => intval( $totalFiltered ), // total number of records after searching, if there is no searching then totalFiltered = totalData
			"data"            => $data );  // total data array

echo json_encode($json_data);  // send data as json format