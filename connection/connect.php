<?php

    $servername = "";
    $username = "";
    $password = "";
    $dbname = "";
    
    $conn = new mysqli($servername, $username, $password, $dbname);
    
    if($conn->connect_error) {
        die("connection failed: " . $conn->connect_error);
    }
?>