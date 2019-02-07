<?php
    include '../connection/connect.php';
    $q = $_GET['q'];
    
    $sql0 = "SELECT series FROM spirits WHERE series LIKE '%$q%' ORDER BY CASE WHEN series LIKE '$q%' THEN 1 ELSE 2 END LIMIT 1";
    $sql2 = "SELECT game FROM spirits WHERE game LIKE '%$q%' ORDER BY CASE WHEN game LIKE '$q%' THEN 1 ELSE 2 END LIMIT 3";
    $sql = "SELECT name, id FROM spirits WHERE name LIKE '%$q%' ORDER BY CASE WHEN name LIKE '$q%' THEN 1 ELSE 2 END LIMIT 5";
    
    $response;
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        $response = $response . "<p>Spirit</p>";
        while($row = $result->fetch_assoc()) {
            $response = $response . "<a href=details.php?id=".$row['id']." class='searchResult'>".$row['name']."</a>";
        }
    }
    $result = $conn->query($sql2);
    if($result->num_rows > 0) {
        $response = $response . "<p>Game</p>";
        while($row = $result->fetch_assoc()) {
            $a = explode(" ", $row['game']);
            $b = implode("+", $a);
            $response = $response . "<a href=searchGame.php?q=$b class='searchResult'>".$row['game']."</a>";
        }
    }
        $result = $conn->query($sql0);
    if($result->num_rows > 0) {
        $response = $response . "<p>Series</p>";
        while($row = $result->fetch_assoc()) {
            $a = explode(" ", $row['series']);
            $b = implode("+", $a);
            $response = $response . "<a href=searchSeries.php?q=$b class='searchResult'>".$row['series']."</a>";
        }
    }

    if (empty($response)) {
        echo "<p>No Results</p>";
    }
    echo $response;
?>