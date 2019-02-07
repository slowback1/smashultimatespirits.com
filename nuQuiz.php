<?php
    include './templates/header.php';
    include_once './connection/connect.php';
?>
<style>
#main {
    margin-left: 8%;
    margin-top: 35px;
    margin-bottom: 80px;
    display: flex;
    flex-direction: row;
    flex-wrap: wrap;
    width: 80%;
    justify-content: center;
    flex-direction: column;
    align-items: center;
}
.question {
    margin-top: 10px;
    padding-bottom: 10px;
    font-size: 28px;
    width: 100%;
    text-align: center;
    background-color: #666;
    color: #fbfb1f;
    border-top-left-radius: 10px;
    border-top-right-radius: 10px;
}
.message {
    position: absolute;
    top: 80px;
    width: 50%;
    height: 100px;
    background-color: #efefef;
    color: #424242;
    font-size: 20px;
    transition: 0.25s;
    border: 3px solid #424242;
    border-radius: 10px;
}
.message a {
    position: absolute;
    top: 2px;
    right: 2px;
    width: 10px;
    height: 10px;
}
.message p {
    margin: 40px auto;
    text-align: center;
}
.answers {
    display: flex;
    flex-direction: row;
    width: 100%;
    background-color: #777;
    margin: 0;
    padding: 0;
    flex-wrap: wrap;
    align-items: center;
    justify-content: center;
}
.answerBox {

    width: 20%;
    height: 200px;
    background-color: #efefef;
    margin: 20px 10%;
    color: #666;
    display: flex;
    flex-direction: column;
    border: 2px solid #555;
    border-radius: 10px;
    overflow: hidden;
    transition: 0.5s;
}
.answerBox img {

    width: auto;
    height: 80%;
    align-self: center;
    margin-top: 20px;

}
.answer {
    margin-top: auto;
    margin-left: auto;
    margin-right: auto;
}
    .selectedAnswer {
    background-color: #c0ffbc;
    border-color: #6a9667;
}
.buttons {

    width: 100%;
    display: flex;
    flex-direction: row-reverse;
    background-color: #666;
    padding-top: 10px;
    padding-bottom: 10px;
    justify-content: space-around;

}
.buttons form input {

    border-radius: 10px;
    font-size: 16px;
    padding: 10px;
    background-color: aliceblue;
    border-color: #060c56;
    transition: 0.25s;
    color: #060c56;

}
.buttons form input:hover {
    background-color: #d13a51;
    border-color: #efefef;
    color: #efefef;
}
    .noQuestionsMsg {
        
    }
@media only screen and (max-width: 820px) {
    #main {
        width: 100%;
        margin-left: 0;
    }
    .answers {
        width: 100%;
        margin: 0;
        flex-direction: column;
    }
    .answerBox {
        width: 80%;
        margin: 10px auto;
        
    }
}
</style>
<?php
    if(!isset($_COOKIE['banList'])) {
        setcookie('banList', json_encode([1]), time() + (86400 * 745), "/");
    }
    $sql = "SELECT * FROM quizQuestions WHERE id NOT IN ( '".implode("', '", json_decode($_COOKIE['banList']) )."' ) ORDER BY RAND() LIMIT 1";
    $result = $conn->query($sql);
    if($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            $ans1 = $row['corAns'];
            $ans2 = $row['wrongAns1'];
            $ans3 = $row['wrongAns2'];
            $ans4 = $row['wrongAns3'];
            $question = $row['question'];
            $qid = $row['id'];
        }
    }
    $ansArr = array($ans1, $ans2, $ans3, $ans4);
    shuffle($ansArr);
    $score = json_decode($_COOKIE['score']);
    $totQ = $score[0] + $score[1];
?>
<div class="main" id="main">
    <h4 class="question"><?php echo $question;?></h4>
    <div class="answers">
    <?php
    if($ans1 != null) {
        if($_GET['ecode'] == 'incorrect') {
    echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Wrong! You have gotten ". $score[0] ." out of ". $totQ ." questions correct so far.</p></div>";
}
if($_GET['ecode'] == 'correct') {
    echo "<div id='message' class='message'><a href='javascript:void(0)' onclick='closeMsg()'>&times;</a><p>Correct! You have gotten ". $score[0] ." out of ". $totQ ." questions correct so far.</p></div>";
}
        $key = 0;
        foreach($ansArr as $answer) {
            if($answer == 0) {
            $qry = "SELECT * FROM spirits ORDER BY RAND() LIMIT 1";           
            } else {
            $qry = "SELECT * FROM spirits WHERE id=$answer";
            }
            $res = $conn->query($qry);
            if($res->num_rows > 0) {
                while($r = $res->fetch_assoc()) {
                    echo "<div class='answerBox' id='answer_".$r['id']."' onclick='selectAnswer(".$r['id'].")'><img src=".$r['image']." alt='image' /><p class='answer'>".$r['name']."</p></div>";
                    
                }
            }
        }
    } else { ?>
        <p class='noQuestionsMsg'>no more questions! You got <?php echo $score[0]; ?> Out of <?php echo $totQ; ?> questions right!</p>
    <?php 
    }
    ?>
    </div>
    <!--<button onclick="processAnswer(<?php //echo $qid;?>)">Submit</button>-->
    <div class="buttons">
    <?php if($ans1 != null) { ?>
    <form action='../actions/processAnswer.php' method="POST">
        <input type="hidden" id="question" name="question" value="<?php echo $qid; ?>" />
        <input type="hidden" id="answer" name="answer" value="" />
        <input id="answerButton" type="submit" value="Submit Answer">
        </form>
        <?php }; ?>
    <form action='../actions/reset_cookie.php' method="POST">
        <input type="submit" value="Reset Quiz" />
    </form>
    </div>
</div>
<?php include './templates/footer.php'; ?>
<script>
    function setCookie(name, value, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*3600*1000));
        var expires = "expires=" + d.toUTCString();
        document.cookie = name + "=" + value + ";" + expires + ";path=/";
    }
    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i < ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if(c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }
    function processQuestion(qid) {
        let content = {
            id: document.getElementById('question').value,
            corAns: document.getElementById('answer').value
        }
        fetch('./api/quiz/process_question.php', {
            method: 'post',
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify(content)
        }).then(response => {
            response.json()
        }).then(data => {
            return data;
        }).catch(error => {
            console.error(error);
        });
    }
    console.log(processQuestion(3));
    let answerSelected = 0;
    //id = answer id
    function selectAnswer(id) {
        if(answerSelected != 0) {
            document.getElementById('answer_'+answerSelected).className = 'answerBox';
        }
        document.getElementById('answer_'+id).className += ' selectedAnswer';
        document.getElementById('answer').value = id;
        answerSelected = id;
    }
    function validateForm() {
        if (answerSelected == 0) {
            returnToPreviousPage();
            return false;
        } else {
            return true;
        }
    }
    //qid = question id
    function processAnswer(qid) {
        if(answerSelected == 0) {
            return;
        }
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if(this.readyState == 4 && this.status == 200) {
                let json = JSON.parse(req.responseText);
                answerSelected = 0;
                let main = document.getElementById('main');
                if(json.records.response == true) {
                    main.innerHTML = "";
                } else {
                    main.innerHTML = "";
                }
            }
        };
        xmlhttp.open("GET", "api/quiz/process_question.php?id="+qid+"&answer="+answerSelected, true);
        xmlhttp.send();
    }
    function closeMsg() {
        document.getElementById('message').style.display = "none";
    }
    document.addEventListener('click', function(e) {
        if (e.target.id != 'message') {
            document.getElementById('message').style.display = "none";
        }
    }, false);
</script>