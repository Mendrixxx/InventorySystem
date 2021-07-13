<?php
if(isset($_POST['add'])){
    $db = mysqli_connect("localhost","root","","inventory");
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
    $query_run = mysqli_query($db, $additem);
    if ($query_run) {
        header("location: kapagalan.php");
    }
}
?>