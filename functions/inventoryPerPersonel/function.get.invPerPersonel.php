<?php

    include "../../backend/conn.php";

    if ($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    } else {
        echo getData($conn);    
    }

    // FUNCTIONS

    function getData($conn) {
        
        $query = "  SELECT * 
                    FROM `item`
                    INNER JOIN `employee` 
                    ON employee.id = item.remarks";

        $result = mysqli_query($conn, $query);

        $dataArr = getRowsFrmDB($result);
        // print_r($dataArr);
        return json_encode(utf8ize($dataArr));
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
    


