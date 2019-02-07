<?php
    //expects GET request with parameter id, which is an integer.  Use to get one spirit
    include_once '../../connection/connect.php';
    $id = $_GET['id'];
    $sql = "SELECT * FROM spirits WHERE id=$id";
    $result = $conn->query($sql);
    $res_arr = array();
    $res_arr['records'] = array();
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $item = array(
                    "id" => $row['id'],
                    "name" => $row['name'],
                    "game" => $row['game'],
                    "series" => $row['series'],
                    "description" => $row['description']
                );
                array_push($res_arr['records'], $item);
        }
        http_response_code(200);
        echo json_encode($res_arr);
    } else {
        http_response_code(404);
        echo json_encode(array('message' => 'no spirits found'));
    }
?>