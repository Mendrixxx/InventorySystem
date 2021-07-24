<?php
   
    include './backend/conn.php';

    if ($conn->connect_error) {
        die("Connection Failed: ". $conn->connect_error);
    } else {
        $items = getData($conn);
        $summary = getSummary($items);
        krsort($summary);
        // print_r($summary);
        //echo json_encode($summary);
    }

      // functions
    function getData($conn) {
        $query = "  SELECT * 
                    FROM `item` WHERE classification = '2' ";
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
    
    function getSummary($items) {
        // get all unique years
        $years = array_unique(array_map(function($date){
            return date('Y', strtotime($date['date_aq']));
        }, $items));
        
        // get all total for each year
        $totalPerYear = array();
        foreach($years as $year) {
            $valsByYear = getValsByYear($items, $year);
            $total= 0;
            foreach ($valsByYear as $values) {
                $total += $values['total_val'];
            }
            $temp = array (
                'year'=> $year,
                'total'=> $total
            );
            array_push($totalPerYear, $temp);
        }
        return $totalPerYear;
        
        /** kung by classification imbis na year */
       /* $classifications = array_unique(array_column($items, 'classification'));
        $totalPerClass = array();
        foreach($classifications as $classification) {
            $valsByClass = getValsByClass($items, $classification);
            $total= 0;
            foreach ($valsByClass as $values) {
                $total += $values['total_val'];
            }
            $temp = array (
                'classification'=> $classification,
                'total'=> $total
            );
            array_push($totalPerYear, $temp);
        }
        // return $totalPerClass;
    }
    function getValsByClass($items, $classification) {
        return array_filter($items, function($element) use ($classification) {
            return $element['classification'] === $classification;
        }); */
    }

    function getValsByYear($items, $year) {
        return array_filter($items, function($element) use ($year) {
            return str_contains($element['date_aq'], $year) === true;
        });   
    }

    
?>