<?php
    //POST request with 2 parameters, id, which is an integer for the question id, and answer, which is an integer of the answer id.  Both should be passed through from your previous fetch_question request.
    
  include_once '../../connection/connect.php';
  $id = json_decode($_POST['id']);
  $answer = json_decode($_POST['corAns']);
  $sql = "SELECT corAns FROM quizQuestions WHERE id=$id";
  $result = $conn->query($sql);
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          if($row['corAns'] === $answer) {
              http_response_code(200);
              echo json_encode(array("records"=>array("response"=>true)));
          } else {
              http_response_code(200);
              echo json_encode(array("records"=>array("response"=>false)));
          }
      }
  } else {
      http_response_code(404);
      echo json_encode(array('message' => 'no questions found'));
  }
?>