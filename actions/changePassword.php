<?php
    include './sanitize.php';
    include '../connection/connect.php';
    include './redirect.php';
    include './pwHash.php';
?>
<?php
    $email = pwHash(sanitize($_POST['email']));
    $oPassword = pwHash(sanitize($_POST['opassword']));
    $npassword1 = pwHash(sanitize($_POST['npassword1']));
    $npassword2 = pwHash(sanitize($_POST['npassword2']));
    if($npassword1 !== $npassword2) {
        redirect('../changePassword.php?ecode=notmatching');
    }
    $sql = "SELECT * FROM users WHERE email='$email'";
    $res = $conn->query($sql);
    if($res->num_rows > 0) {
        while($row = $res->fetch_assoc()) {
            $username = $row['username'];
            if(!$oPassword == $row['password']) {
                redirect('../changePassword.php?ecode=badinfo');
            } else {
                $uql = "UPDATE users SET password='$npassword1' WHERE email='$email'";
                if($conn->query($uql) == TRUE) {
                    setcookie('admin_access', $row['username'], time() + (86400 * 30), "/");
                    redirect('../index.php?ecode=passwordchange');
                }
            }
            
        }
    }
?>