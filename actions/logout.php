<?php
    include './redirect.php';
    setcookie("admin_access", "secretcode", time() - 3600, "/");
    redirect('../index.php');
?>