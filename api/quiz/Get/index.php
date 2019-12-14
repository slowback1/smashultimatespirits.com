<?php
    include '../../models/Question.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");

    function addQuestionToResponse(
        $id,
        $question,
        $corAns,
        $wrongAns1,
        $wrongAns2,
        $wrongAns3
    )
    {
        $q = new Question(
            $id,
            $question,
            $corAns,
            $wrongAns1,
            $wrongAns2,
            $wrongAns3
        );
        return $q->build();
    }
    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $headers = getallheaders();

        $banlist = [0];

        if(isset($headers['banlist']))
        {  
            $banlist = $c->cf->sanitize($headers['banlist']);

        }
        $banString = "'" . implode("','",$banlist) . "'";
        if(isset($_GET['id']))
        {
            if($_GET['id'] === 'r')
            {
                $stmt = $c->conn->prepare("SELECT id, question, corAns, wrongAns1, wrongAns2, wrongAns3 FROM quizquestions WHERE NOT id IN (?) ORDER BY RAND() LIMIT 1");
                $stmt->bind_param("s", $banString);
            }
            else
            {
            $id = $c->cf->sanitize($_GET['id']);
            $stmt = $c->conn->prepare( "SELECT id, question, corAns, wrongAns1, wrongAns2, wrongAns3 FROM quizquestions WHERE id = ? LIMIT 1");

            $stmt->bind_param("i", $id);
            }
        }
        else
        {
            $stmt = $c->conn->prepare("SELECT id, question, corAns, wrongAns1, wrongAns2, wrongAns3 FROM quizquestions");
        }
        $stmt->execute();
        $stmt->store_result();

        $stmt->bind_result(
            $id,
            $question,
            $corAns,
            $wrongAns1,
            $wrongAns2,
            $wrongAns3
        );
        $resArr = array();
        while($stmt->fetch())
        {
            array_push($resArr, addQuestionToResponse(
                $id,
                $question,
                $corAns,
                $wrongAns1,
                $wrongAns2,
                $wrongAns3
            ));
        }
        if(sizeof($resArr) > 0)
        {
            $response = new Response(ResponseCodes::Recieved, $resArr);
        }
        else
        {
            $response = new Response(ResponseCodes::BadInput, "Incorrect Input");
        }
    }
    else
    {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
    }

    echo $response->build();
?>