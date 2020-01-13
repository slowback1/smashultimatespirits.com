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
        return $q->build_admin();
    }
    if($_SERVER['REQUEST_METHOD'] === "GET")
    {
        $stmt = $c->conn->prepare("
            SELECT 
                id, 
                question, 
                corAns, 
                wrongAns1, 
                wrongAns2, 
                wrongAns3 
            FROM quizQuestions 
            ORDER BY id ASC");
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
            array_push($resArr, 
                addQuestionToResponse(
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
            $response = new Response(
                ResponseCodes::Recieved, 
                $resArr);
        } 
        else
        {
            $response = new Response(
                    ResponseCodes::BadInput, 
                    "Incorrect Input"
                );
        }
    }
    else 
    {
        $response = new Response(
                ResponseCodes::WrongMethod, 
                "Wrong Method"
            );
    }

    echo $response->build();
?>