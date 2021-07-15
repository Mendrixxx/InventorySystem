<?php
	include "conn.php";
    if (isset($_POST['continue'])) {
    $id = $_POST['Delete_ID'];
    $sql = "DELETE FROM item where item_id = $id";
    $run = mysqli_query($conn, $sql);
    if($run){
        header("location: ../kapagalan.php");
    }
    }
?>