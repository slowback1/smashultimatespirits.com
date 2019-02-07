<?php 
//POST request with 1 parameter, ban_list, which should be an array of integers.  Will grab one question not in ban_list.
include_once '../../connection/connect.php';

$ban_list = $_POST['ban_list'];
$sql = "SELECT * FROM quizQuestions WHERE id NOT IN ( '".implode("', '", "", $ban_list )."' )";
$result = $conn->query($sql);
$res_arr = array();
$res_arr['records'] = array();
if($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $item = array(
                "id" => $row['id'],
                "question" => $row['question'],
                "corAns" => $row['corAns'],
                "wrongAns1" => $row['wrongAns1'],
                "wrongAns2" => $row['wrongAns2'],
                "wrongAns3" => $row['wrongAns3']
            );   
            array_push($res_arr['records'], $item);
    }
    http_response_code(200);
    echo json_encode($res_arr);
} else {
    http_response_code(404);
    echo json_encode(array('message' => 'no questions found'));
}


?>