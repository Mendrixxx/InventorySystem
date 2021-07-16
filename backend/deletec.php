
<?php
include "conn.php";

	//Wag po tangallin yung mga lines na may comment symbol. For logs po ito.
	$delete_item = "Deleted Item";//
 if (isset($_POST['continuec'])) {
        $id = $_POST['Delete_IDc'];
        $item_name = $_POST['item_name'];
        $sql = "DELETE FROM component where comp_id = $id";
        $del_logs = "INSERT into log(item_name, action, date_action) VALUES ('$item_name', '$delete_item', NOW())";//

        $run = mysqli_query($conn, $sql);
        $log_del = mysqli_query($conn, $del_logs);//
        if($run && $log_del){
            header("location: ../kapagalan.php");
    }
    }
    ?>