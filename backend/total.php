
<?php
session_start();
include "conn.php";
include '../ChromePhp.php';

 if (isset($_POST['reset'])) {

        $sql = "SELECT * FROM classification" ;
        $run = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($run)){
            $total = 0;
            $cls = $row['classification_id'];
            $sql2 = "SELECT * FROM yearcosting where classification = '$cls'" ;
            $run2 = mysqli_query($conn, $sql2);
            if(mysqli_num_rows($run2) > 0) { 
                while($row2 = mysqli_fetch_assoc($run2)){
                    $total = $total + $row2['cost'];
                }       
                $tdy = date("Y");
                $sql3 = "INSERT into archive(ayear, total,classification) values ( '$tdy' , '$total', '$cls')";
                $run3 = mysqli_query($conn, $sql3);
            }
        }
        $sql4 = "DELETE FROM yearcosting";
        $run4 = mysqli_query($conn, $sql4);
        if($run && $run2 && $run4){
            header("location: ../summary.php");
        }
           
    }
    ?>