<?php include 'connection/connect.php' ?>
<?php
    $sql = "SELECT * FROM spirits WHERE id=".$_GET['id'];
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result -> fetch_assoc()) {
            $id = $row['id'];
            $name = $row['name'];
            $game = $row['game'];
            $series = $row['series'];
            $description = $row['description'];
            $image = $row['image'];
        }
    }
    $prevId;
    $nextId;
    $sqlmin = "SELECT id, name FROM spirits WHERE id = (SELECT min(id) FROM spirits WHERE id > $id)";
    $sqlmax = "SELECT id, name FROM spirits WHERE id = (SELECT max(id) FROM spirits where id < $id)";
    $minquery = "SELECT MIN(id) AS minid FROM spirits";
    $maxquery = "SELECT MAX(id) AS maxid FROM spirits";;
    $min;
    $max;
    $result = $conn->query($minquery);
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $min = $row['minid'];
        }
    }
    $result = $conn->query($maxquery);
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $max = $row["maxid"];
        }
    }
    $result = $conn->query($sqlmin);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $nextId = $row['id'];
            $nextName = $row['name'];
        }
    }
    $result = $conn->query($sqlmax);
    if($result->num_rows>0) {
        while($row = $result->fetch_assoc()) {
            $prevId = $row['id'];
            $prevName = $row['name'];
        }
    }
    if ($id == $min) {
        $prevId = $max;
    }
    if ($id == $max) {
        $nextId = $min;
    }
?>
<head>
    <title><?php echo $name?> | Details</title>
    <link rel="stylesheet" href="styles/style.css" />
    <style>
        .buzzbuzz {
            width: 24px;
            height: 24px;
        }
    </style>
</head>
<div class="details" id="scrollHereToo">
    <div class="dHead">
        <a href=<?php echo "details.php?id=$prevId"; ?> class="leftArr"> &larr; <?php echo $prevId . ". " . $prevName;?> </a>
        <div class="idIcon">
            <p><a href="index.php" class="centArr">Return to Index</a></p>  
        </div>
        <a href=<?php echo "details.php?id=$nextId"; ?> class="rightArr"><?php echo $nextId . ". " . $nextName; ?> &rarr;</a>
    </div>

    
    <div class="dBody">
                <div class="dWrapper">
                    <div class="dSpacer" id="scroller">
                <?php 
                    $listQuery = "SELECT name, id, series FROM spirits ORDER BY id";
                    $result = $conn->query($listQuery);
                    if($result->num_rows>0) {
                        while($row = $result->fetch_assoc()) {
                            $lid = $row['id'];
                            if ($lid == $_GET['id']) {
                            	if ($row['series'] == "Other") {
                            		echo "<a href='details.php?id=$lid' id='scrollHere'><div class='listItem'><img src='img/seriesIcons/".$row['series'].".png' alt='' class='other' /><p>".$lid.". ". $row['name']. "</p></div></a>";
                            	} else {
                                echo "<a href='details.php?id=$lid' id='scrollHere'><div class='listItem'><img src='img/seriesIcons/".$row['series'].".png' alt='' /><p>".$lid.". ". $row['name']. "</p></div></a>";
                                }
                            } else {
                            	if($row['series'] == "Other") {
                                echo "<a href='details.php?id=$lid'><div class='listItem'><img src='img/seriesIcons/".$row['series'].".png' alt='' class='other' /><p>".$lid.". ". $row['name']. "</p></div></a>";
                            } else {
                            	echo "<a href='details.php?id=$lid'><div class='listItem'><img src='img/seriesIcons/".$row['series'].".png' alt='' /><p>".$lid.". ". $row['name']. "</p></div></a>";
                            }
                            }
                            
                        }
                    }
                ?>
            </div>
        </div>
        <div class="dRight">
            <div class="dImg">
                <img src="img/spiritImages/<?php echo $id ?>.png" alt="<?php echo $name?>" id='mainImg' <?php
                    if($id == 575) {
                        echo " class='buzzbuzz'";
                    }
                ?>/>
            </div>
            <div class="description">
                <h1 class=<?php echo strlen($name) > 22 ? "tooBig" : "dName"; ?>><?php echo $name ?></h1>
                <p class="dDesc"><?php echo $description ?></p>
                <h2 class="dGame"><img src="<?php echo "img/seriesIcons/".$series.".png"; ?>" alt="<?php echo $series; ?>" class="<?php if($series == 'Other') echo 'other';?>" /><?php echo $game ?><?php 
                    $fighters = [1,4,5,6,7,8,9,10,11,12,13,14,15,16,17,134,135,136,172,173,174,175,176,177,264,265,266,267,297,323,324,325,282,383,384,407,409,410,411,412,414,415,416,417,418,419,519,563,564,606,610,611,612,613,614,616,618,689,703,704,705,729,749,775,798,822,825,827,864,921,922,932,946,951,974,977,978,1004,1006,1025,1050,1051,1090,1091,1092];
                    if(in_array($id, $fighters)) {
                        echo "<p id='reverse' onclick='switchImg($id)'><img src='img/arrows.png' alt='arrows' /></p>";
                    }
                ?></h2>
            </div>
        </div>
    </div>
    <div class="dFoot">
                
    </div>
</div>
<script>
    let e = document.getElementById("scrollHere");
    let topPos = e.offsetTop - 240;
    document.getElementById("scroller").scrollTop = topPos;
    
    
    let defSrc = document.getElementById('mainImg').src;
    let imgSwitch = false;
    function switchImg(id) {
        let mainImg = document.getElementById('mainImg');
        if(imgSwitch == false) {
            imgSwitch = true;
            mainImg.src = './img/fighters/'+id+'.png';
        } else {
            imgSwitch = false;
            mainImg.src = defSrc;
        }
    }
</script>
<!--
<a href='details.php?id=$lid' class='listItem'><img src="" alt="" /><p>".$lid.". ". $row['name']</p></a>

-->