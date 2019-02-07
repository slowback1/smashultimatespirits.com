<?php
    include '../connection/connect.php';
    $sql = "SELECT description FROM spirits";
    $arr = [];
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $tArr = explode(" ", $row['description']);
            for ($j = 0; $j < sizeof($tArr); $j++) {
            	if($tArr[$j] !== "the" && $tArr[$j] !== "a" && $tArr[$j] !== "and" && $tArr[$j] !== "to" && $tArr[$j] !== "of") {
                array_push($arr, $tArr[$j]);
                }
            }
        }
    }
    sort($arr);
    $max_count = 1;
    $res = $arr[0];
    $curr_count = 1;
    for($i = 1; $i < sizeof($arr); $i++) {
        if($arr[$i] == $arr[$i - 1]) {
            $curr_count += 1;
        } else {
            if($curr_count > $max_count) {
                $max_count = $curr_count;
                $res = $arr[$i - 1];
            }
            $curr_count = 1;
        }
    }
    if($curr_count > $max_count) {
        $max_count = $curr_count;
        $res = $arr[sizeof($arr) - 1];
    }
    
    echo "Most Frequent word is " . $res . " at " . $max_count . " times.";
?>
