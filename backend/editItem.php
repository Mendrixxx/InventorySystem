<?php
	session_start();
	include "conn.php";
	
	//Wag po tanggalin yung mga lines na may comment symbol. For logs po ito.

	function sanitize($variables){
        $sanitized_variables = filter_var($variables, FILTER_SANITIZE_STRING);
        	return $sanitized_variables;
    }

	function equipment_check($unit_value){
		$equipment_value = 15000;
			if($unit_value < $equipment_value){
				return false;
			}
			else{
				return true;
			}
	}

	function total_check($quantity, $value){
		if($quantity == 0 || $quantity == NULL){
			return $value;
		}
		else{
			return $value * $quantity;
		}
	}

if(isset($_POST['updatebtn'])){
		$iid = sanitize(mysqli_real_escape_string($conn,trim($_POST['id'])));
        $iname = sanitize(mysqli_real_escape_string($conn,trim($_POST['name'])));
        $ides = sanitize(mysqli_real_escape_string($conn,trim($_POST['des'])));
        $prop_no = sanitize(mysqli_real_escape_string($conn,trim($_POST['prop_no'])));
        $date = sanitize(mysqli_real_escape_string($conn,trim($_POST['date'])));
        $unit_measure = sanitize(mysqli_real_escape_string($conn,trim($_POST['umeasure'])));
        $unit_value = sanitize(mysqli_real_escape_string($conn,trim($_POST['uvalue'])));
        $total_value = 0;
        $quantity_prop_card = sanitize(mysqli_real_escape_string($conn,trim($_POST['quantity_prop_card'])));
        $quantity_physical_count = sanitize(mysqli_real_escape_string($conn,trim($_POST['quantity'])));
        $quantity_shortage = sanitize(mysqli_real_escape_string($conn,trim($_POST['quantity_shortage'])));
        $total_shortage = sanitize(mysqli_real_escape_string($conn,trim($_POST['total_shortage'])));
        $remarks_no = sanitize(mysqli_real_escape_string($conn,trim($_POST['remarks'])));
        $classification = sanitize(mysqli_real_escape_string($conn,trim($_POST['classification'])));

        $propno_sql = "SELECT property_num FROM item WHERE property_num = '$prop_no'";
        $propno_result = mysqli_query($conn, $propno_sql);
        $rows_check = mysqli_num_rows($propno_result);
            if($rows_check > 1){
                //cannot be updated
                echo "Property Number cannot be duplicated!";
            }
            else{
            	if(equipment_check($unit_value)){
            		$total_value = total_check($quantity_physical_count, $unit_value);
            			$sql = "UPDATE item SET item_name = '$iname', item_desc = '$ides', property_num = '$prop_no', date_aq = '$date', unit_meas = '$unit_measure', unit_val = '$unit_value', total_val = '$total_value', quant_propcar = '$quantity_prop_card', quant_phycou = '$quantity_physical_count', remarks = '$remarks_no', classification = '$classification', SO_quant = '$quantity_shortage', SO_val = '$total_shortage' WHERE item_id = '$iid'";
                		$updateresult = mysqli_query($conn, $sql);

    					//logs
						$edited_item = "Update Item <b>" .$iname. " </b>.";//
                		$enter_logItem = "INSERT into log(action, date_action) VALUES ('$edited_item', NOW())";//
                		$query_logItem = mysqli_query($conn, $enter_logItem);//

                		//yearcosting
                		$addtocost = "UPDATE yearcosting SET item_id = '$iid', cost = '$total_value', classification = '$classification' WHERE item_id = '$iid'";
    					$query_run = mysqli_query($conn, $addtocost);

                		if($updateresult && $query_logItem && $query_run){						  							
    						echo "Updated Successfully!";
						}
                		else{
                    	    echo "Update Failed";
                		}
            		}
            	else{
            		echo "Item unit value should be 15k above!";
            	}
                
            }
}

//update component
if(isset($_POST['cupdatebtn'])){
	$iid = sanitize(mysqli_real_escape_string($conn,trim($_POST['id'])));
	$cid = sanitize(mysqli_real_escape_string($conn,trim($_POST['cid'])));
    $cname = sanitize(mysqli_real_escape_string($conn,trim($_POST['name'])));
	$cdate = sanitize(mysqli_real_escape_string($conn,trim($_POST['date'])));
	$cumeasure = sanitize(mysqli_real_escape_string($conn,trim($_POST['umeasure'])));
	$cuvalue = sanitize(mysqli_real_escape_string($conn,trim($_POST['uvalue'])));
	$ctotalvalue = 0;
	$cquantity_prop_card = sanitize(mysqli_real_escape_string($conn,trim($_POST['quantity_prop_card'])));
	$cquantity = sanitize(mysqli_real_escape_string($conn,trim($_POST['quantity'])));
	$cquantity_shortage = sanitize(mysqli_real_escape_string($conn,trim($_POST['quantity_shortage'])));
	$ctotal_shortage = sanitize(mysqli_real_escape_string($conn,trim($_POST['total_shortage'])));

		$ctotalvalue = total_check($cquantity, $cuvalue);
		$sql = "SELECT item_name FROM item WHERE item_id = '$iid'";
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_array($result);
		if($result){
			$iname = $row['item_name'];
			$compupdate = "UPDATE component SET comp_name = '$cname', c_date_aq = '$cdate', c_unit_meas = '$cumeasure', c_unit_val = '$cuvalue', c_total_val = '$ctotalvalue', c_quan_propcar = '$cquantity_prop_card', c_quan_phycou = '$cquantity', c_SO_quan = '$cquantity_shortage', c_SO_val = '$ctotal_shortage' WHERE comp_id = '$cid'";
			$updateresult = mysqli_query($conn, $compupdate);
			
			$for_item = "SELECT * FROM item WHERE item_id = $iname";//
				if($fetch_item = mysqli_query($conn,$for_item)){//
					while($roww = mysqli_fetch_row($fetch_item)){//
						$itemm_name = $roww['1'];//
					}
					mysqli_free_result($fetch_item);//
				}
			$edited_component = "Update Component <b>" .$cname. " </b> of the item <b>" .$iname. " </b>.";
			$enter_logComp = "INSERT into log(action, date_action) VALUES ('$edited_component', NOW())";//
            $query_logComp = mysqli_query($conn, $enter_logComp);//

			if($updateresult && $query_logComp){
				//logs
				echo "Component Updated Successfully!";
				//header("location: ../Inventory.php");
			}
			else{
				echo "Component Update Failed!";
				//header("location: ../Inventory.php");
			}
		}
}
?>

