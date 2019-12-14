<?php
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");

    if($_SERVER['REQUEST_METHOD'] === "DELETE")
    {
        if($c->verifyUser())
        {
            $deleteBody = json_decode(file_get_contents("php://input"));
            if(isset($deleteBody->id))
            {
                $del = $c->cf->sanitize($deleteBody->id);
                $stmt = $c->conn->prepare("DELETE from quizquestions WHERE id = ? LIMIT 1");
                $stmt->bind_param('i', $del);
                if($stmt->execute())
                {
                    $cVal = "id = " . $del;
                    $c->addToChangeLog("qd", $cVal);
                    $response = new Response(ResponseCodes::Deleted, "Deletion Successful");
                }
                else
                {
                    $response = new Response(ResponseCodes::ServerError, "Unknown Error");
                }
            }
            else
            {
                $response = new Response(ResponseCodes::BadInput, "Missing ID Parameter");
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