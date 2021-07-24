<?php
	session_start();
	include "conn.php";

	//Wag po tangallin yung mga lines na may comment symbol. For logs po ito.

    if (isset($_POST['continue'])) {
    $id = $_POST['Delete_ID'];
	$item_name = $_POST['item_name'];

	$unservicable= "Item  <b>" .$item_name. " </b> is set as Unservicable.";//LOGS
	
	
    $sql = "DELETE FROM item where item_id = $id";
	$del_logs = "INSERT into log(action, date_action) VALUES ('$unservicable', NOW())";//

    $run = mysqli_query($conn, $sql);
	$log_del = mysqli_query($conn, $del_logs);//
    if($run && $log_del){
        header("location: ../Inventory.php");
    }
    }
    else if (isset($_POST['xdata'])) {
        $id = $_POST['Delete_ID'];
        $item_name = $_POST['item_name'];
        $sql = "DELETE FROM item where item_id = $id";
        $run = mysqli_query($conn, $sql);
        $sql2 = "DELETE FROM yearcosting where item_id = $id";
        $run2 = mysqli_query($conn, $sql2);
		$delete_item = "Delete Item  <b>" .$item_name. " </b> to the Inventory.";// Logs
        $del_logs = "INSERT into log(action, date_action) VALUES ('$delete_item', NOW())";//
        $log_del = mysqli_query($conn, $del_logs);//
        if($run && $log_del && $run2){
            header("location: ../Inventory.php");
    }
    }

?>
