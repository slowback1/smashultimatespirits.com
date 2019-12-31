<?php
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $postBody = json_decode(file_get_contents('php://input'));
        if(
            isset($postBody->id) &&
            isset($postBody->answer)
        )
        {
            $id = $c->cf->sanitize($postBody->id);
            $answer = $c->cf->sanitize($postBody->answer);

            $stmt = $c->conn->prepare(
                "SELECT corAns FROM quizQuestions WHERE id = ? LIMIT 1"
            );
            $stmt->bind_param("s", $id);

            $stmt->execute();
            $stmt->store_result();
            $stmt->bind_result($corAns);
            while($stmt->fetch())
            {
                if($corAns == $answer)
                {
                    $response = new Response(ResponseCodes::Ok, true);
                }
                else
                {
                    $response = new Response(ResponseCodes::Ok, false);
                }
            }
        }
        else
        {
            $response = new Response(ResponseCodes::BadInput, "Missing Input");
        }
    }
    else
    {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
    }

    echo $response->build();
?>