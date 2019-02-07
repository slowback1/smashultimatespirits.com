<?php
    include './sanitize.php';
    include '../connection/connect.php';
    include './redirect.php';
    include './pwHash.php';
?>

<?php
    $email = pwHash(sanitize($_POST['email']));
    $password = sanitize($_POST['password']);
    
    $sql = "SELECT * FROM users WHERE email='$email'";
    
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            if (pwHash($password) == $row['password']) {
                setcookie('admin_access', $row['username'], time() + (86400 * 30), "/");
                redirect('../index.php');
            } else {
                redirect('../admin/login.php?ecode=badinfo');
            }
        }
    } else {
        redirect('../admin/login.php?ecode=badinfo');
    }
?>    