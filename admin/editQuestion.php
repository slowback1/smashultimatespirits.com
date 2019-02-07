<?php 
    include 'adminHeader.php';
    include '../connection/connect.php';
?>
<head>
    <title>Edit Question | SSBUSD Admin Section</title>
</head>
<style>
    body {
        background-color: #444;
        color: #eee;
    }
    #edit_question {
        width: 80%;
        margin: 50px auto;
        display: flex;
        flex-direction: column;
    }
    select, input, textarea {
        margin-left: 2%;
        margin-top: 5px;
        padding: 10px 5px;
        border-radius: 10px;
        width: 50%;
    }
    @media only screen and (max-width: 800px) {
        #edit_question {
            width: 100%;
            margin: 50px 0;
        }
    }
</style>
<form id="edit_question" action="../actions/edit_question.php" method="POST" accept-charset="UTF-8">
    <label for="old question">Select Question</label>
    <select name="id" id="id">
        <?php
            $sql = "SELECT * FROM quizQuestions ORDER BY id";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<option value='".$row['id']."'>".$row['question']."</option>";
                }
            } else {
                echo "<h3>No results?</h3>";
            }
        ?>
    </select>
    <label for="question">Question:</label><textarea type="text" placeholder="Question" name="question" id="question"></textarea>
    <label for="corAns">Correct Answer</label><select name="corAns" id="corAns">
        <option value="">-- Correct Answer --</option>
        <?php 
            $sql = "SELECT * FROM spirits ORDER BY id";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['id'].". ". $row['name'] ."</option>";
            }
        } else {
            "<h3>No results!  Either the DB isn't set up or somethings wrong with the DB</h3>";
        }
        ?>
    </select>
    <label>Incorrect Answers: </label>
    <select name="wrongAns1" id="wrongAns1">
        <option value="">-- Incorrect Answer 1 --</option>
        <option value="0">Random</option>
        <?php 
            $sql = "SELECT * FROM spirits ORDER BY id";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['id'].". ". $row['name'] ."</option>";
            }
        } else {
            "<h3>No results!  Either the DB isn't set up or somethings wrong with the DB</h3>";
        }
        ?>
    </select>
    <select name="wrongAns2" id="wrongAns2">
        <option value="">-- Incorrect Answer 2 --</option>
        <option value="0">Random</option>
        <?php 
            $sql = "SELECT * FROM spirits ORDER BY id";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['id'].". ". $row['name'] ."</option>";
            }
        } else {
            "<h3>No results!  Either the DB isn't set up or somethings wrong with the DB</h3>";
        }
        ?>
    </select>
    <select name="wrongAns3" id="wrongAns3">
        <option value="">-- Incorrect Answer 3 -- </option>
        <option value="0">Random</option>
        <?php 
            $sql = "SELECT * FROM spirits ORDER BY id";
            $result = $conn->query($sql);
            if($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row['id']."'>".$row['id'].". ". $row['name'] ."</option>";
            }
        } else {
            "<h3>No results!  Either the DB isn't set up or somethings wrong with the DB</h3>";
        }
        ?>
    </select>
    <input type="submit" value="Edit Question" />
</form>

<?php include_once './adminFooter.php'; ?>