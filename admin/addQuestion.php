<?php include './adminHeader.php' ?>
<?php include '../connection/connect.php' ?>
<style>
    body {
        background-color: #444;
        color: #eee;
    }
    fieldset {
        display: flex;
        flex-direction: column;
        width: 80%;
        margin: 10px auto;
    }
    .description {
        padding-bottom: 100px;
    }
    #add_question {
        width: 100%;
        margin: 50px auto;
        display: flex;
        flex-direction: column;
    }
    input, textarea {
        border-radius: 10px;
        margin-left: 2%;
        padding: 10px 5px;
        width: 50%;
    }
    @media only screen and (max-width: 800px) {
        fieldset {
            width: 100%;
            margin-left: 0;
            margin-right: 0;
        }
    }
</style>
<head>
    <title>Add Question | SSBUSD Admin Section </title>
</head>
<form id="add_question" action="../actions/add_question.php" method="post" accept-charset="UTF-8">
    <label for="question">Question:<textarea type="text" placeholder="Question" name="question" id="question"></textarea></label>
    <label for="corAns">Correct Answer</label>
    <select name="corAns" id="corAns">
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
    <label for="wrongAns1">Incorrect Answers:</label>
    <select name="wrongAns1" id="wrongAns1">
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
    <input type="submit" value="Add Question" />
</form>

<?php include './adminFooter.php'; ?>