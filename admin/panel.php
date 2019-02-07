<?php include 'adminHeader.php' ?>
<?php 
    if($_GET['ecode'] === 'registered') {
        echo "<div class='message'><p>Successfully Registered</p></div>";
    }
?>
<head>
    <title>Panel | SSBUSD Admin Section </title>
</head>
<style>
body {
    background-color: #444;
}
    .panel {
        display: flex;
        flex-direction: row;
        flex-wrap: wrap;
        width: 100%;
        max-height: 100%;
        justify-content: space-around;
        align-items: center;
    }
    .adminButton {
        margin-left: 10%;
        margin-right: 15%;
        margin-top: 10px;
        margin-bottom: 10px;
        text-decoration: none;
        border: 3px solid black;
        color: #eee;
        padding: 25px 100px;
        
    }
    .adminButton:hover {
        border-color: #555;
        background-color: #999;
        color: #fff;
        transition: .5s;
    }
</style>
<div class="panel">
    <a class="adminButton" href="addSpirit.php">Add Spirit</a>
    
    <a class="adminButton" href="addQuestion.php">Add Question</a>
    <a class="adminButton" href="editSpirit.php">Edit Spirit</a>
    
    <a class="adminButton" href="editQuestion.php">Edit Question</a>
    <a class="adminButton" href="deleteSpirit.php">Delete Spirit</a>
    <a class="adminButton" href="deleteQuestion.php">Delete Question</a>
</div>
<?php include 'adminFooter.php' ?>