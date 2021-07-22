<?php

    include "../../backend/conn.php";

    if ($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    } else {
        $employeeID = getData($conn);
        $arr = array_unique(array_column($employeeID, 'remarks'));
        
        $query = "  SELECT *
                    FROM `employee`
                    WHERE `id` 
                    IN (". implode (',', array_map('strval', $arr)) .")";
        

        $result = mysqli_query($conn, $query);
        $employee = getRowsFrmDB($result);
        // print_r($employee);
        echo json_encode($employee, JSON_UNESCAPED_UNICODE);
    }


    // functions

    function getData($conn) {
        $query = "SELECT remarks FROM item";
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
