<?php 
    include '../connection/connect.php';
    include './redirect.php';
    include './sanitize.php';
?>
<?php 
    $id = $_POST['id'];
    $sql1 = "DELETE FROM quizQuestions WHERE id=$id";
    if($conn->query($sql1) === TRUE) {
        redirect('../index.php?ecode=deletesuccess');
    } else {
        redirect('../index.php?ecode=failure');
    }
    $conn->close();
?>