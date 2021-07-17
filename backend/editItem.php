<?php
	session_start();
	include "conn.php";
	
	//Wag po tanggalin yung mga lines na may comment symbol. For logs po ito.
	$edited_item = "Edit Item";//
	$edited_component = "Edit Component";

//	function sanitize($variables){
 //       $sanitized_variables = filter_var($variables, FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_LOW | FILTER_FLAG_STRIP_HIGH);
 //       	return $sanitized_variables;
 //   }

	if(isset($_POST['updatebtn'])){
		$iid = $_POST['id'];
		$iname = $_POST['name'];
		$ides = $_POST['des'];
		$prop_no = $_POST['prop_no'];
		$date = $_POST['date'];
		$unit_measure = $_POST['umeasure'];
		$unit_value = $_POST['uvalue'];
		$total_value = $_POST['totalvalue'];
		$quantity_prop_card = $_POST['quantity_prop_card'];
		$quantity_physical_count = $_POST['quantity'];
		$quantity_shortage = $_POST['quantity_shortage'];
		$total_shortage = $_POST['total_shortage'];
		$remarks = $_POST['remarks'];
		$classification = $_POST['classification'];
		
		$enter_logItem = "INSERT into log(item_name, action, date_action) VALUES ('$iname', '$edited_item', NOW())";//
		$query_logItem = mysqli_query($conn, $enter_logItem);//

		$sql = "UPDATE item SET item_name = '$iname', item_desc = '$ides', property_num = '$prop_no', date_aq = '$date', unit_meas = '$unit_measure', unit_val = '$unit_value', total_val = '$total_value', quant_propcar = '$quantity_prop_card', quant_phycou = '$quantity_physical_count', remarks = '$remarks', classification = '$classification', SO_quant = '$quantity_shortage', SO_val = '$total_shortage' WHERE item_id = '$iid'";
        $updateresult = mysqli_query($conn, $sql);

        if($updateresult && $query_logItem){
            echo "Updated Successfully!";
            header("location: ../kapagalan.php");
        }
        else{
            echo "Update Failed!";
            header("location: ../kapagalan.php");
        }

	}
	else{
		echo "Error!";
	}
?>