<script>
//searchbar functionality
function showResult(str) {
  if (str.length==0) {
    document.getElementById("livesearch").innerHTML="";
    document.getElementById("livesearch").style.border="0px";
    return;
  }
  if (window.XMLHttpRequest) {
    // code for IE7+, Firefox, Chrome, Opera, Safari
    xmlhttp=new XMLHttpRequest();
  } else {  // code for IE6, IE5
    xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
  }
  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("livesearch").innerHTML=this.responseText;
      document.getElementById("livesearch").style.border="1px solid #A5ACB2";
    }
  }
  xmlhttp.open("GET","./actions/search.php?q="+str,true);
  xmlhttp.send();
}


window.onclick = function(e) {
let liveSearch = document.getElementById("livesearch");
  if(e.target !== liveSearch) {
      liveSearch.innerHTML = "";
      liveSearch.style.border = "none";
  }
}
</script>
<div id="carrier"><div id='swipeReader'></div></div>
<div id="holder"></div>
<script>
  //swipe functionality
  class Swipe {
    constructor(element) {
      this.xDown = null;
      this.yDown = null;
      this.element = typeof(element) === "string" ? document.querySelector(element) : element;
      this.element.addEventListener('touchstart', function(e) {
        this.xDown = e.touches[0].clientX;
        this.yDown = e.touches[0].clientY;
      }.bind(this), false);
    }
    onLeft(callback) {
      this.onLeft = callback;
      return this;
    }
    onRight(callback) {
      this.onRight = callback;
      return this;
    }
    onUp(callback) {
      this.onUp = callback;
      return this;
    }
    onDown(callback) {
      this.onDown = callback;
      return this;
    }
    handleTouchMove(e) {
      if(!this.xDown || !this.yDown) {
        return;
      }
      var xUp = e.touches[0].clientX;
      var yUp = e.touches[0].clientY;
      this.xDiff = this.xDown - xUp;
      this.yDiff = this.yDown - yUp;
      if(Math.abs(this.xDiff) > Math.abs(this.yDiff)) {
        if(this.xDiff > 0) {
          this.onLeft();
        } else {
          this.onRight();
        }
      } else {
        if(this.yDiff > 0) {
          this.onUp();
        } else {
          this.onDown();
        }
      }
      this.xDown = null;
      this.yDown = null;
    }
    run() {
      this.element.addEventListener('touchmove', function(e) {
        this.handleTouchMove(e).bind(this);
      }.bind(this), false);
    }
  }
  let swiper = new Swipe('#swipeReader');
  swiper.onRight(function(){openNav()});
  swiper.run();
  

</script>
<script>
  //slide panel functionality
  function openNav() {
    document.getElementById('sideNav').style.width = "250px";
    document.getElementById('holder').innerHTML = "<div id='closeReader'></div>";  
    document.getElementById('carrier').innerHTML = '';
    let closeSwiper = new Swipe('#closeReader');
    closeSwiper.onLeft(function(){closeNav()});
    closeSwiper.run();
  }
  function closeNav() {
    document.getElementById('sideNav').style.width = "0";
    document.getElementById('holder').innerHTML = "";
    document.getElementById('carrier').innerHTML = "<div id='swipeReader'></div>";
    let swiper = new Swipe('#swipeReader');
    swiper.onRight(function(){openNav()});
    swiper.run();
  }
</script>
<?php include_once './connection/connect.php';?>


<html>
    <head>
        <title>Smash Ultimate Spirits </title>

    </head>
    <body>

        <nav>

<div onclick='openNav()' class='adminNav'><img src='./img/hamburger.png' /></div>
<style>
  .logoutBtn {
    position: relative;
    bottom: 0;
    left: 10px;
    color: #cdcdcd;
    transition: 0.5s;
  }
  .logoutBtn:hover {
    color: #dfdfdf;
  }
  .loginBtn {
    position: relative;
    bottom: 0;
    left: 5px;
    color: #cdcdcd;
    transition: 0.5s;
  }
  .loginBtn:hover {
    color: #dfdfdf;
  }
  .registerBtn {
    position: relative;
    bottom: 0;
    right: 5px;
    color: #cdcdcd;
    transition: 0.5s;
  }
  registerBtn:hover {
    color: #dfdfdf;
  }
  
  #swipeReader {
    position: fixed;
    left: 0;
    width: 400px;
    height: 100%;
    z-index: -1;
    overflow-x: hidden;
  }
  #closeReader {
    position: fixed;
    left: 0;
    width: 120%;
    height: 80%;
    z-index: -1;
  }
  .adminNav {
    width: 42px;
    height: 42px;
    background-color: rgba(22,22,22, 0.6);
    position: fixed;
    top: 0;
    left: 0;
  }
  .adminNav img {
    margin: 2px 2px;
    width: 36px; 
    height: 36px;
  }
  .quizLink {
    position: absolute;
    top: 0;
    right: 0;
    background-color: #333;
    color: #eee;
    width: 5vw;
    height: 10vh;
    margin: 0;
  }
  .sideNav {
    height: 100vh;
    width: 0;
    position: fixed;
    z-index: 100;
    top: 0;
    left: 0;
    background-color: #111;
    overflow-x: hidden;
    padding-top: 60px;
    transition: 0.5s;
  }
  .sideNav a {
    height: 25px;
    width: 220px;
    padding: 8px;
    text-decoration: none;
    font-size: 25px;
    color: #818181;
    display: block;
    transition: 0.3s;
  }
  .sideNav p {
    color: #eaeaea;
    font-size: 28px;
  }
  .sideNav a:hover {
    color: #f1f1f1;
  }
  .sideNav .closeBtn {
    position: absolute;
    color: #818181;
    top: 0;
    right: 10px;
    width: 100%;
    font-size: 42px;
    text-align: right;
  }
  .scroller {
    height: 200px;
width: 100px;
overflow-x: hidden;
overflow-y: scroll;
margin-left: 65px;
overflow-y: hidden;
border: 1px solid white;
  }
  .scroller .scrollee {
      height: 200px;
width: 120px;
overflow: hidden;
    overflow-y: scroll;
display: flex;
flex-wrap: wrap;
text-align: center;
justify-content: center;
  }
  .scroller .scrollee p {
    font-size: 18px;
  }
  .sideNav .stats {
      font-size: 18px;
margin-top: 20px;
margin-bottom: 20px;
margin-left: 12px;
  }
  @media screen and (max-height: 450px) {
    .sideNav {
      padding-top: 15px;
    }
    .sideNav a {
      font-size: 18px;
    }
  } 
</style>
<div id="sideNav" class="sideNav">
  <a href="javascript:void(0)" class="closeBtn" onclick="closeNav()">&times;</a>
  <a href="quiz.php">Quiz Game</a>
            <?php 
    include_once '../connection/connect.php';
    $username = $_COOKIE['admin_access'];
    $adminAccessBool = false;
    $usql = "SELECT username FROM users WHERE username='$username'";
    $result = $conn->query($usql);
    if($result->num_rows > 0){
        while($row = $result->fetch_assoc()) {
            $adminAccessBool = true;
        }
    }
    if($adminAccessBool) {
      echo "  
  <p>Secret Admin Area</p>
  <a href='admin/addSpirit.php'>Add Spirit</a>
  <a href='admin/editSpirit.php'>Edit Spirit</a>
  <a href='admin/deleteSpirit.php'>Delete Spirit</a>
  <a href='admin/addQuestion.php'>Add Question</a>
  <a href='admin/editQuestion.php'>Edit Question</a>
  <a href='admin/deleteQuestion.php'>Delete Question</a>";
  echo "<a href='actions/logout.php' class='logoutBtn'>Log Out</a>";
  echo "<a href='admin/changePassword.php'>Change Password</a>";
  
    include_once '../connection/connect.php';
    $max = 1304;
    $left = 0;
    $total = 0;
    $idArr = [];
    $qry = "SELECT id FROM spirits ORDER BY id";
    $result = $conn->query($qry);
    if($result->num_rows > 0) {
      while($row = $result->fetch_assoc()){
        array_push($idArr, $row['id']);
      }
    } else {
      echo "something went wrong";
    }
    $total = sizeof($idArr);
    $left = $max - $total - 1;
    echo "<p class='stats'>$total spirits added to date!</p>
          <p class='stats'>$left spirits left to be added!</p>
          <p class='stats'>Spirit IDs that need to be added:</p>";
    echo "<div class='scroller'><div class='scrollee'>";
    for($i = 1; $i < $max; $i++) {
      if(!in_array($i, $idArr)) {
        echo "<p>#$i.</p>";
      }
    }
    echo "</div></div>";
    
    } else {
      echo "<a href='./admin/login.php' class='loginBtn'>Log In</a>";
      echo "<a href='./admin/register.php' class='registerBtn'>Register</a>";
    };
?>

</div>
            <a href="index.php"><h1>Super Smash Brothers Ultimate Spirits Directory</h1></a>
                <form action="./searchResults.php" id="searchBar">
                <input type="text" size="30" onkeyup="showResult(this.value)" name="q" id="q" placeholder="Search" autocomplete="off">
                <input type="submit" value="Search" />
                <div id="livesearch"></div>
            </form>
        </nav>