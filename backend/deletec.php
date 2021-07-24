
<?php
session_start();
include "conn.php";

	//Wag po tangallin yung mga lines na may comment symbol. For logs po ito.
 if (isset($_POST['continuec'])) {
        $id = $_POST['Delete_IDc'];
        $comp_name = $_POST['comp_name'];

		
        $sql = "DELETE FROM component where comp_id = $id";
		
		$for_comp = "SELECT * FROM component WHERE comp_id = $id";//
			if($fetch_comp = mysqli_query($conn,$for_comp)){//
				while($roww = mysqli_fetch_row($fetch_comp)){//
					$comp_id = $roww['1'];//
				}
			mysqli_free_result($fetch_comp);//
		}
		$for_item = "SELECT * FROM item WHERE item_id = $comp_id";//
			if($fetch_item = mysqli_query($conn,$for_item)){//
				while($roww = mysqli_fetch_row($fetch_item)){//
					$itemm_name = $roww['1'];//
				}
			mysqli_free_result($fetch_item);//
		}
		
		$delete_comp = "Delete Component <b>" .$comp_name. " </b> from the item <b> " .$itemm_name. " </b>.";//
        $del_logs = "INSERT into log(action, date_action) VALUES ('$delete_comp', NOW())";//

        $run = mysqli_query($conn, $sql);
        $log_del = mysqli_query($conn, $del_logs);//
        if($run && $log_del){
            header("location: ../Inventory.php");
    }
    }
    ?>
