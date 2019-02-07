<?php
    include '../connection/connect.php';
    include './redirect.php';
    $cid = $_POST['id'];
    $answer = $_POST['answer'];
    $sql = "SELECT id FROM spirits WHERE id='$cid'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if($row['id'] == $answer) {
                redirect('../quiz.php?ecode=correctAnswer');
            } else {
                redirect('../quiz.php?ecode=incorrectAnswer');
            }
        }
    } else {
        echo $conn->error;
    }
?>