<?php
    include '../connection/connect.php';
    include './redirect.php';
    $qid = $_POST['question'];
    $answer = $_POST['answer'];
    $sql = "SELECT * FROM quizQuestions WHERE id='$qid'";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            addBan($qid);
            if($row['corAns'] == $answer) {
                setScore(true);
                redirect('../quiz.php?ecode=correct');
            } else {
                setScore(false);
                redirect('../quiz.php?ecode=incorrect');
            }
        }
    }
    
    function addBan($id) {
        if(!isset($_COOKIE['banList'])){
            setcookie('banList', json_encode([1, $id]), time() + (86400*745), "/");
        } else {
            $banList = $_COOKIE['banList'];
            array_push($banList, $id);
            setcookie('banList', json_encode($banList), time() + (86400*745), "/");
        }
    }
    function setScore($bool) {
        if($bool) {
            if(!isset($_COOKIE['score'])) {
                setcookie('score', json_encode([1,0]), time()+(86400*745), '/');
            } else {
                $score = json_decode($_COOKIE['score']);
                $score[0] += 1;
                setcookie('score', json_encode($score), time() + (86400*745), "/");
            }
        } else {
            if(!isset($_COOKIE['score'])) {
                setcookie('score', json_encode([0,1]), time()+(86400*745), '/');
            } else {
                $score = json_decode($_COOKIE['score']);
                $score[1] += 1;
                setcookie('score', json_encode($score), time() + (86400*745), "/");
            }
        }
    }
?>