<?php
   
  
   include './backend/conn.php';

   if ($conn->connect_error) {
       die("Connection Failed: ". $conn->connect_error);
   } else {
       $items = getData($conn);
     //  $summary = getSummary($items);
       //krsort($summary);
       // print_r($summary);
       //echo json_encode($summary);
   }

     // functions
   function getData($conn) {
       $query = " SELECT
       *
   FROM
       item AS i
       LEFT JOIN employee AS e ON (i.remarks = e.id)
   LEFT JOIN component AS c ON (i.item_id=c.item_id) order by i.date_aq";
       $result = mysqli_query($conn, $query);
       $dataArr = getRowsFrmDB($result);
       return $dataArr;
   };

   function getRowsFrmDB($result) {
       if (!empty($result)) {
           return mysqli_fetch_all($result, MYSQLI_ASSOC);
       } else {
           return [];
       }
   }
     
?>
