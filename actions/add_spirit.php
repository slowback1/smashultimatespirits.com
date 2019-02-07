<?php 
    include './sanitize.php';
    include '../connection/connect.php';
    include './redirect.php';
?>

<?php
    $id = sanitize($_POST['id']);
    $name = addslashes(sanitize($_POST['name']));
    $game = addslashes(sanitize($_POST['game']));
    $series = addslashes(sanitize($_POST['series']));
    $description = addslashes(sanitize($_POST['description']));
    
    $image = sanitize($_POST['image']);
    
    $sql = "INSERT INTO spirits (id, name, game, series, description, image) VALUES ('$id', '$name', '$game', '$series', '$description', '$image')";
    
    if($conn->query($sql) === TRUE) {
        redirect('../index.php?ecode=addsuccess');
    } else {
        redirect('../index.php?ecode=failure');
    }
?>