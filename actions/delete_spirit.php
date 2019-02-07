<?php 
    include '../connection/connect.php';
    include './redirect.php';
    include './sanitize.php';
?>
<?php 
    $id = $_POST['id'];
    $sql1 = "DELETE FROM spirits WHERE id=".$id;
    /* $sql2 = "SELECT * FROM spirits WHERE id=$id";
    
    $result = $conn->query($sql2);
    if($result->num_rows > 0) {
        while($row = $result->fetchassoc()) {
            $oldid = $row['id'];
            $name = $row['name'];
            $game = $row['game'];
            $series = $row['series'];
            $description = $row['description'];
            $image = $row['image'];
            $query = "INSERT INTO deletedSpirits (oldid, name, game, series, description, image) VALUES ('$oldid','$name','$game','$series','$description','$image')";
        }
    }
    
    echo $query;
    
    if($conn->query($query) === TRUE) {
        echo "success again";
    } */
    if($conn->query($sql1) === TRUE) {
        redirect('../index.php?ecode=deletesuccess');
    } else {
        redirect('../index.php?ecode=failure');
    }
    $conn->close();
?>