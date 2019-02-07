<?php include '../actions/redirect.php' ?>
<?php 
    include_once '../connection/connect.php';
    $username = $_COOKIE['admin_access'];
    $adminAccessBool = false;
    $usql = "SELECT username FROM users WHERE username='$username'";
    $result = $conn->query($usql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $adminAccessBool = true;
        }
    }
    if(!$adminAccessBool) {
        redirect('../index.php?ecode=accessdenied');
    }
?>
<style>
    * {
        margin: 0;
        padding: 0;
    }
    nav {
        width: 100%;
        height: 64px;
        background-color: #111;
        margin: 0;
    }
    .title {
        font-size: 32px;
        color: #eee;
        text-align: center;
    }
    .subTitle {
        font-size: 16px;
        color: #ccc;
        text-align: center;
    }
</style>
<nav>
    <h1 class="title">Super Smash Brothers Ultimate Spirits Directory</h1>
    <h2 class="subTitle">Admin Section</h2>
</nav>