<?php include './templates/header.php';
      include_once './connection/connect.php'; ?>
      
      <div class="wrapper">
          <h1>Results for "<?php echo $_GET['q']?>" (game)</h1>
          <div class="main" id="main">
              <?php 
                $q = $_GET['q'];
                $sql = "SELECT * FROM spirits WHERE game='$q'";
                $result = $conn->query($sql);
                if($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<a href='details.php?id=".$row['id']."'><div class='spirit' id='".$row['id']."'><p class='hidden'>".$row['name']."</p><p class='hidden'>".$row['game']."</p><p class='hidden'>".$row['series']."</p><p class='hidden'>".$row['description']."</p><p>". $row['id'] ."</p><div class='imageContainer')><img src='".$row['image']."'/></div><h5>".$row['name']."</h5></div></a>";
                    }
                }
              ?>
          </div>
      </div>
      