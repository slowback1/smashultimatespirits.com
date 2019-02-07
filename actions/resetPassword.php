<?php
    include './sanitize.php';
    include '../connection/connect.php';
    include './redirect.php';
    include './pwHash.php';
?>

<?php 
    $email = pwHash(sanitize($_POST['email']));
    $tempPW = pwHash("test");
    $sql = "UPDATE users SET password='$tempPW' WHERE email='$email'";
    if($conn->query($sql) == TRUE) {
        redirect('../admin/changePassword.php?ecode=resetPW');
    } else {
        redirect('../admin/forgotPassword.php?ecode=bademail');
    }
?>