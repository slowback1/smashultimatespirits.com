<?php include 'adminHeader.php' ?>
<?php include "../connection/connect.php"; ?>
<head>
    <title>Delete Spirit | SSBUSD Admin Section </title>
</head>
<style>
    body {
        background-color: #444;
    }
    #delete_spirit {
        width: 80%;
        margin: 50px auto;
        display: flex;
        flex-direction: column;
    }
    select, input {
        margin-left: 2%;
        padding: 10px 5px;
        border-radius: 10px;
        width: 50%;
    }
    @media only screen and (max-width: 800px) {
        #delete_spirit {
            width: 100%;
            margin: 50px 0;
        }
    }
</style>
    <form id="delete_spirit" action="../actions/delete_spirit.php" method="post" accept-charset="UTF-8">
        <select name="id" id="id">
    <?php 
        $sql = "SELECT * FROM spirits ORDER BY id";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row['name'];
                echo "<option value='".$row['id']."'>".$row['id'].". ". $row['name'] ."</option>";
            }
        } else {
            "<h3>No results!  Either the DB isn't set up or somethings wrong with the DB</h3>";
        }
    ?>
        </select>
        <input type="submit" value="Delete" />
    </form>
<?php include 'adminFooter.php' ?>