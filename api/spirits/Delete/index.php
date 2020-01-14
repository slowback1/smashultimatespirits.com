<?php
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");

    if($_SERVER['REQUEST_METHOD'] === "DELETE") 
    {
        if($c->verifyUser()) 
        {
            
            $deleteBody = json_decode(file_get_contents('php://input'));

            if(isset($deleteBody->id)) 
            {

                $del = $c->cf->sanitize($deleteBody->id);
                $stmt = $c->conn->prepare(
                    "DELETE FROM spirits 
                    WHERE id = ?"
                    );
                $stmt->bind_param("i", $del);

                if($stmt->execute()) 
                {
                    $clVal = "id &STOP2; " . strval($del);
                    $c->addToChangeLog("sd", $clVal);
                    $response = new Response(
                        ResponseCodes::Deleted, 
                        "Deletion Successful"
                    );
                } else 
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
                    "No Input"
                );
            }
        } 
        else 
        {
            $response = new Response(
                ResponseCodes::BadInput, 
                "No Authorization"
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