<?php include 'adminHeader.php'; ?>
<?php include '../connection/connect.php'; ?>

<head>
    <title>Delete Question | SSBUSD Admin Section </title>
</head>
<style>
    body {
        background-color: #444;
    }
    #delete_question {
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
        #delete_question {
            width: 100%;
            margin: 50px 0;
        }
    }
</style>
<form id="delete_question" action="../actions/delete_question.php" method="post" accept-charset="UTF-8">
    <select name="id" id="id">
        <?php 
        $sql = "SELECT * FROM quizQuestions ORDER BY id";
        $result = $conn->query($sql);
        
        if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo $row['name'];
                echo "<option value='".$row['id']."'>". $row['question'] ."</option>";
            }
        } else {
            "<h3>No results!  Either the DB isn't set up or somethings wrong with the DB</h3>";
        }
    ?>
    </select>
    <input type="submit" value="Delete Question" />
</form>
<?php include 'adminFooter.php' ?>