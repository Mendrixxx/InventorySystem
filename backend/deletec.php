
<?php
include "conn.php";

	//Wag po tangallin yung mga lines na may comment symbol. For logs po ito.
	$delete_comp = "Deleted Component";//
 if (isset($_POST['continuec'])) {
        $id = $_POST['Delete_IDc'];
        $comp_name = $_POST['comp_name'];
        $sql = "DELETE FROM component where comp_id = $id";
        $del_logs = "INSERT into log(item_name, action, date_action) VALUES ('$comp_name', '$delete_comp', NOW())";//

        $run = mysqli_query($conn, $sql);
        $log_del = mysqli_query($conn, $del_logs);//
        if($run && $log_del){
            header("location: ../kapagalan.php");
    }
    }
    ?>