<?php
    include './sanitize.php';
    include '../connection/connect.php';
    include './redirect.php';
    include './pwHash.php';
?>

<?php
$email = sanitize($_POST['email']);
$username = sanitize($_POST['username']);
$password = sanitize($_POST['password']);
$password2 = sanitize($_POST['password2']);
$secretQuestion = sanitize($_POST['secretQuestion']);

if($password !== $password2) {
    redirect('../admin/register.php?ecode=badpw');
}
if(!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    redirect('../admin/register.php?ecode=bademail');
}
//secretQuestion needs to be changed regularly
if($secretQuestion !== "") {
    redirect('../admin/register.php?ecode=badsq');
}

$storedPW = pwHash($password);
$storedUsername = pwHash($username);
$storedEmail = pwHash($email);
$sql = "INSERT INTO users (email, username, password) 
    VALUES ('$storedEmail', '$storedUsername', '$storedPW')";
    
if($conn->query($sql) === TRUE) {
        setcookie('admin_access', $storedUsername, time() + (86400 * 30), "/");
        redirect('../admin/panel.php?ecode=registered');
} else {
    echo "error: " .  $conn->error;
}
?>