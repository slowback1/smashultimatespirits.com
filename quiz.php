<?php   include './templates/header.php';
include_once './connection/connect.php';
    
  $sql = "SELECT * FROM spirits ORDER by RAND() LIMIT 4";
  $corAns = rand(1,4);
  $result = $conn->query($sql);
  $i = 1;
  $answers = "";
  $question = "";
  $cid;
  if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {
          if($i == $corAns) {
              $cid = $row['id'];
              $q = $row['description'];
              $question = str_replace($row['name'], "This Spirit", $q);
          }
          $i += 1;
          $id = $row['id'];
          $answers = $answers . "<input type='radio' name='answer' id='answer' value='$id'>".$row['name']."<img src=".$row['image']." alt='image' /></input>";
      }
  }
    
?>

<style>
	img {
		height: 100px;
		width: auto;
	}
</style>

<div class="wrapper">
    <div class="main">
        <?php
            if ($_GET['ecode'] == 'correctAnswer') {
                echo "<p>Correct!  Onto the next one.</p>";
            }
            if($_GET['ecode'] == 'incorrectAnswer') {
                echo "<p>Incorrect!  Make it up with this one!</p>";
            }
        ?>
        <h2><?php echo $question;?></h2>
        <form action="actions/handleResults.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $cid;?>" />
            <?php echo $answers; ?>
            <input type="submit" value="Submit Answer" />
        </form>
    </div>
</div>