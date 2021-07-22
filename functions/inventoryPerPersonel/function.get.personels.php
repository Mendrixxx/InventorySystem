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
        echo json_encode(utf8ize($employee));
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

    function utf8ize( $mixed ) {
        if (is_array($mixed)) {
            foreach ($mixed as $key => $value) {
                $mixed[$key] = utf8ize($value);
            }
        } elseif (is_string($mixed)) {
            return mb_convert_encoding($mixed, "UTF-8", "UTF-8");
        }
        return $mixed;
    }