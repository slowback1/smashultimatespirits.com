<?php
    include './sanitize.php';
    include '../connection/connect.php';
    include './redirect.php';
?>
<?php
    $question = addslashes(sanitize($_POST['question']));
    $corAns = addslashes(sanitize($_POST['corAns']));
    $wrongAns1 = addslashes(sanitize($_POST['wrongAns1']));
    $wrongAns2 = addslashes(sanitize($_POST['wrongAns2']));
    $wrongAns3 = addslashes(sanitize($_POST['wrongAns3']));
    $usql "SELECT id FROM quizQuestions ORDER BY id DESC LIMIT 1";
    $res = $conn->query($usql);
    if($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            $id = $row['id'] + 1;
        }
    }
    $sql = "INSERT INTO quizQuestions (
	id, question, corAns, wrongAns1, wrongAns2, wrongAns3)
	VALUES ('$id','$question', '$corAns', '$wrongAns1', '$wrongAns2', '$wrongAns3')";
	
	if($conn->query($sql) === TRUE) {
	    redirect('../index.php?ecode=addsuccess');
	} else {
	    redirect('../index.php?ecode=failure');
	}
?>