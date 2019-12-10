<?php
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    if($_SERVER['REQUEST_METHOD'] === "PUT")
    {
        if($c->verifyUser())
        {
            $token = $c->auth->getToken();
            $user = $token->username;
            $pass = $token->pass;
            $postBody = json_decode(file_get_contents('php://input'));
            if(
                isset($postBody->username) &&
                isset($postBody->password) &&
                isset($postBody->newpassword)
            )
            {
                $u = $c->cf->sanitize($postBody->username);
                $p = $c->cf->sanitize($postBody->password);
                $np = $c->cf->sanitize($postBody->newpassword);
                
                if($u == $user && $p == $pass)
                {
                    #TO-DO, write a hashing function (probably in the Auth class)
                    #np -> hash it!
                    $stmt = $c->conn->prepare("UPDATE users SET password = ? WHERE username = ?");
                    $stmt->bind_param("ss", $p, $u);
                    
                    if($stmt->execute())
                    {
                        $response = new Response(ResponseCodes::Edited, "Edit Successful");
                    }
                    else
                    {
                        $response = new Response(ResponseCodes::ServerError, "Unknown Error");
                    }

                }
                else
                {
                    $response = new Response(ResponseCodes::BadInput, "Username or password is incorrect");
                }
            }
            else
            {
                $response = new  Response(ResponseCodes::BadInput, "Missing Input");
            }

        }
        else
        {
            $response = new Response(ResponseCodes::BadInput, "Authorization needed");
        }
    }
    else
    {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
    }
    echo $response->build();
?>