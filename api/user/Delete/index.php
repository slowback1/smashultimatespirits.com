<?php
    include '../../models/Response.php';
    include '../../classes/Connect.php';
    
    $c->cf->setCors("private");
    
    if($_SERVER['REQUEST_METHOD'] === 'DELETE')
    {
        if($c->verifyUser())
        {
            $token = $c->auth->getToken();
            $user = $token->username;

            $stmt = $c->conn->prepare("DELETE FROM users WHERE username = ? LIMIT 1");
            $stmt->bind_param("s", $user);

            if($stmt->execute())
            {
                $response = new Response(ResponseCodes::Deleted, "Deletion Successful");
            }
            else
            {
                $response = new Response(ResponseCodes::ServerError, "Unknown Error");
            }
        }
    }
    else 
    {
        $response = new Response(ResponseCodes::WrongMethod);
    }

    echo $response->build();
?>