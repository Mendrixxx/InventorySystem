<?php

    include "../../backend/conn.php";

    if ($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    } else {
        echo getData($conn);    
    }


    // functions

    function getData($conn) {
        $query = "SELECT remarks FROM item";
        $result = mysqli_query($conn, $query);
        $dataArr = getRowsFrmDB($result);
        return json_encode($dataArr);
    };

    function getRowsFrmDB($result) {
        if (!empty($result)) {
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        } else {
            return [];
        }
    }