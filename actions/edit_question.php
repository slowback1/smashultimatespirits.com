<?php
    include './sanitize.php';
    include './redirect.php';
    include '../connection/connect.php';
    
    $id = sanitize($_POST['id']);
    $question = addslashes(sanitize($_POST['question']));
    $corAns = addslashes(sanitize($_POST['corAns']));
    $wrongAns1 = addslashes(sanitize($_POST['wrongAns1']));
    $wrongAns2 = addslashes(sanitize($_POST['wrongAns2']));
    $wrongAns3 = addslashes(sanitize($_POST['wrongAns3']));
    
    function checkIfEmpty($item) {
        if($item == null || $item == "" || empty($item)) {
            return true;
        } else {
            return false;
        }
    }
    
    $qry_question = (!checkIfEmpty($question) ? "question='$question'" : "");
    $qry_corAns = (!checkIfEmpty($corAns) ? "corAns='$corAns'" : "");
    $qry_wrongAns1 = (!checkIfEmpty($wrongAns1) ? "wrongAns1='$wrongAns1'" : "");
    $qry_wrongAns2 = (!checkIfEmpty($wrongAns2) ? "wrongAns2='$wrongAns2'" : "");
    $qry_wrongAns3 = (!checkIfEmpty($wrongAns3) ? "wrongAns3='$wrongAns3'" : "");
    
    $settings_arr = [$qry_question, $qry_corAns, $qry_wrongAns1, $qry_wrongAns2, $qry_wrongAns3];
    $last = 0;
    $res = "";
    
    foreach($settings_arr as $key=>$value) {
        if(checkIfEmpty($value)) {
            
        } else {
            $last = $key;
        }
    }
    foreach($settings_arr as $key=>$value) {
        if(checkIfEmpty($value)) {
            $res = $res;
        } else {
            $res = $res . $value;
        }
    }
    $sql = "UPDATE quizQuestions SET $res WHERE id=$id";
    if($conn->query($sql) == TRUE) {
        redirect('../index.php?ecode=editsuccess');
    } else {
        redirect('../index.php?ecode=failure');
        echo $db->error;
    }
?>