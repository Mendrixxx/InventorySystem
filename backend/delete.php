<?php
	include "conn.php";
	
	//Wag po tangallin yung mga lines na may comment symbol. For logs po ito.
	$delete_item = "Deleted Item";//
	
    if (isset($_POST['continue'])) {
    $id = $_POST['Delete_ID'];
	$item_name = $_POST['item_name'];
    $sql = "DELETE FROM item where item_id = $id";
	$del_logs = "INSERT into log(item_name, action, date_action) VALUES ('$item_name', '$delete_item', NOW())";//
	
    $run = mysqli_query($conn, $sql);
	$log_del = mysqli_query($conn, $del_logs);//
    if($run && $log_del){
        header("location: ../kapagalan.php");
    }
    }
    
?>