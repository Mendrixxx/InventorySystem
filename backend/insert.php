<?php
	session_start();
	include "conn.php";

//Wag po tangallin yung mga lines na may comment symbol. For logs po ito.


if(isset($_POST['addbtn'])){
    $iname = $_POST['iname'];
    $desc = $_POST['desc'];
    $pnum = $_POST['pnum'];
    $dateaq  = $_POST['dateaq'];
    $umeas = $_POST['umeas'];
    $uvalue = $_POST['uvalue'];
    $qPropCard = $_POST['qPropCard'];
    $qPhysCount = $_POST['qPhysCount'];
    $remarks = $_POST['remarks'];
    $classif = $_POST['classification2'];
    $qSO = $_POST['qSO'];
    $vSO = $_POST['vSO'];
    // Compute for Total Value
    $tvalue = $uvalue * $qPhysCount;

    $additem = "INSERT into item(item_name, item_desc, property_num, date_aq, unit_meas, unit_val, total_val, quant_propcar, quant_phycou, remarks, classification, SO_quant, SO_val) values ('$iname', '$desc', '$pnum', '$dateaq', '$umeas', '$uvalue', '$tvalue', '$qPropCard', '$qPhysCount', '$remarks', '$classif', '$qSO', '$vSO')";   
    $query_run = mysqli_query($conn, $additem);
	$added_item = "Add Item  <b>" .$iname. " </b> to the inventory.";//LOGS
    $lastid = $conn->insert_id;
    $addtocost = "INSERT into yearcosting(item_id, cost, classification) values ('$lastid', '$tvalue', '$classif')";
    $query_run = mysqli_query($conn, $addtocost);

    $enter_logItem = "INSERT into log(action, date_action) VALUES ('$added_item', NOW())";//
	$query_logItem = mysqli_query($conn, $enter_logItem);//
    if ($query_run &&  $query_logItem && $addtocost)  {
       echo "Record Successfully Added";
    }
}
?>
