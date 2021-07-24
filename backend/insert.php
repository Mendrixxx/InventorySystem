<?php
	session_start();
	include "conn.php";

//Wag po tangallin yung mga lines na may comment symbol. For logs po ito.


if(isset($_POST['add'])){
    $iname = $_POST['iname'];
    $desc = $_POST['desc'];
    $pnum = $_POST['pnum'];
    $dateaq  = $_POST['dateaq'];
    $umeas = $_POST['umeas'];
    $uvalue = $_POST['uvalue'];
    $tvalue = $_POST['tvalue'];
    $qPropCard = $_POST['qPropCard'];
    $qPhysCount = $_POST['qPhysCount'];
    $remarks = $_POST['remarks'];
    $classif = $_POST['classification'];
    $qSO = $_POST['qSO'];
    $vSO = $_POST['vSO'];


    $additem = "INSERT into item(item_name, item_desc, property_num, date_aq, unit_meas, unit_val, total_val, quant_propcar, quant_phycou, remarks, classification, SO_quant, SO_val) values ('$iname', '$desc', '$pnum', '$dateaq', '$umeas', '$uvalue', '$tvalue', '$qPropCard', '$qPhysCount', '$remarks', '$classif', '$qSO', '$vSO')";   
    $query_run = mysqli_query($conn, $additem);
	$added_item = "Add Item  <b>" .$iname. " </b> to the inventory.";//LOGS
    $lastid = $conn->insert_id;
    $addtocost = "INSERT into yearcosting(item_id, cost, classification) values ('$lastid', '$tvalue', '$classif')";
    $query_run = mysqli_query($conn, $addtocost);

    $enter_logItem = "INSERT into log(action, date_action) VALUES ('$added_item', NOW())";//
	$query_logItem = mysqli_query($conn, $enter_logItem);//
    if ($query_run &&  $query_logItem && $addtocost)  {
        header("location: ../Inventory.php");
    }
}
if(isset($_POST['addc'])){
    $itmname = $_POST['itmname'];
    $cname = $_POST['cname'];
    $cdateaq  = $_POST['cdateaq'];
    $cumeas = $_POST['cumeas'];
    $cuvalue = $_POST['cuvalue'];
    $ctvalue = $_POST['ctvalue'];
    $cqPropCard = $_POST['cqPropCard'];
    $cqPhysCount = $_POST['cqPhysCount'];
    $cqSO = $_POST['cqSO'];
    $cvSO = $_POST['cvSO'];

    $addcomp = "INSERT into component(item_id, comp_name, c_date_aq, c_unit_meas, c_unit_val, c_total_val, c_quan_propcar, c_quan_phycou, c_SO_quan, c_SO_val) values ('$itmname', '$cname', '$cdateaq', '$cumeas', '$cuvalue', '$ctvalue', '$cqPropCard', '$cqPhysCount', '$cqSO', '$cvSO')";
	$for_item = "SELECT * FROM item WHERE item_id = $itmname";//
	if($fetch_item = mysqli_query($conn,$for_item)){//
		while($roww = mysqli_fetch_row($fetch_item)){//
			$itemm_name = $roww['1'];//
		}
		mysqli_free_result($fetch_item);//
	}
	
	$added_component = "Add Component  <b>" .$cname. " </b> to the item <b>" .$itemm_name. " </b>.";//LOGS
	$enter_logComp = "INSERT into log(action, date_action) VALUES ('$added_component', NOW())";//LOGS
    $query_run = mysqli_query($conn, $addcomp);
	$query_logComp = mysqli_query($conn, $enter_logComp);//
    if ($query_run && $query_logComp)  {
        header("location: ../Inventory.php");
    }
}
?>
