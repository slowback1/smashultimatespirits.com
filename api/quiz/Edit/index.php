<?php
    include '../../models/Question.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("cf");

    if($_SERVER['REQUEST_METHOD'] === "PUT")
    {
        if($c->verifyUser())
        {
            $postBody = json_decode(file_get_contents('php://input'));
            if(
                isset($postBody->id) &&
                isset($postBody->question) &&
                isset($postBody->corAns) &&
                isset($postBody->wrongAns1) &&
                isset($postBody->wrongAns2) &&
                isset($postBody->wrongAns3)
            )
            {
                $id = $c->cf->sanitize($postBody->id);
                $question = $c->cf->sanitize($postBody->question);
                $corAns = $c->cf->sanitize($postBody->corAns);
                $wrongAns1 = $c->cf->sanitize($postBody->wrongAns1);
                $wrongAns2 = $c->cf->sanitize($postBody->wrongAns2);
                $wrongAns3 = $c->cf->sanitize($postBody->wrongAns3);

                $stmt = $c->conn->prepare(
                    "UPDATE quizquestions 
                        SET     
                            question = ?, 
                            corAns = ?, 
                            wrongAns1 = ?, 
                            wrongAns2 = ?, 
                            wrongAns3 = ? 
                        WHERE id = ?"
                );
                $stmt->bind_param("siiiii",
                    $question, 
                    $corAns, 
                    $wrongAns1, 
                    $wrongAns2, 
                    $wrongAns3, 
                    $id
                );

                if($stmt->execute())
                {
                    $cVal = 
                        "id &STOP2; " . 
                        $id . 
                        "&STOP1; question &STOP2; " . 
                        $question . 
                        "&STOP1; correct answer &STOP2; " . 
                        $corAns . 
                        "&STOP1; wrong answer 1 &STOP2; " . 
                        $wrongAns1 . 
                        "&STOP1; wrong answer 2 &STOP2; " . 
                        $wrongAns2 . 
                        "&STOP1; wrong answer 3 &STOP2; " . 
                        $wrongAns3;

                    $c->addToChangeLog("qe", $cVal);
                    $response = new Response(
                        ResponseCodes::Edited, 
                        "Edit was a success"
                    );
                }
                else
                {
                    $response = new Response(
                        ResponseCodes::ServerError, 
                        "Unknown Error"
                    );
                }
            }
            else
            {
                $response = new Response(
                    ResponseCodes::BadInput, 
                    "Missing Input"
                );
            }

        }
        else
        {
            $response = new Response(
                ResponseCodes::BadInput, 
                "Authorization Needed"
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