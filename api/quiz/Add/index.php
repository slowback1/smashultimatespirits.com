<?php
    include '../../models/Question.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        if($c->verifyUser())
        {
            $postBody = json_decode(file_get_contents('php://input'));
            if(
                isset($postBody->question) &&
                isset($postBody->corAns) &&
                isset($postBody->wrongAns1) &&
                isset($postBody->wrongAns2) &&
                isset($postBody->wrongAns3)
            )
            {
                $question = $c->cf->sanitize($postBody->question);
                $corAns = $c->cf->sanitize($postBody->corAns);
                $wrongAns1 = $c->cf->sanitize($postBody->wrongAns1);
                $wrongAns2 = $c->cf->sanitize($postBody->wrongAns2);
                $wrongAns3 = $c->cf->sanitize($postBody->wrongAns3);

                $stmt = $c->conn->prepare(
                    "INSERT INTO quizquestions (question, corAns, wrongAns1, wrongAns2, wrongAns3) VALUES (?, ?, ?, ?, ?)"
                );
                $stmt->bind_param("siiii",
                $question, $corAns, $wrongAns1, $wrongAns2, $wrongAns3);

                if($stmt->execute())
                {
                    $response = new Response(ResponseCodes::Created, "Insert was a success");
                }
                else
                {
                    $response = new Response(ResponseCodes::ServerError, "Unknown Error");
                }
            }
            else
            {
                $response = new Response(ResponseCodes::BadInput, "Missing Input");
            }

        }
        else
        {
            $response = new Response(ResponseCodes::BadInput, "Authorization Needed");
        }
    }
    else
    {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
    }
    echo $response->build();
?>