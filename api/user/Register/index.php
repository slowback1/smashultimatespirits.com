<?php
    include '../../models/Response.php';
    include '../../models/Token.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");

    if($_SERVER['REQUEST_METHOD'] === 'POST')
    {
        $postBody = json_decode(file_get_contents('php://input'));
        if(
            isset($postBody->username) &&
            isset($postBody->password) &&
            isset($postBody->secretKey)
        )
        {
            $u = $c->cf->sanitize($postBody->username);
            $p = $c->cf->sanitize($postBody->password);
            $sk = $c->cf->sanitize($postBody->secretKey);

            if($sk === $c->config['register_key'])
            {
                $stmt = $c->conn->prepare(
                    "INSERT INTO 
                        users 
                            (username, 
                            password) 
                    VALUES 
                        (?, ?)"
                );
                $hp = $c->auth->hash($p);
                $stmt->bind_param('ss', 
                    $u, 
                    $hp
                );
                if($stmt->execute())
                {
                    $tci = new Token($u, $hp);
                    $tokenParams = $tci->build();
                    $nuToken = $c->auth->setToken($tokenParams);
                    $response = new Response(
                            ResponseCodes::Ok, 
                            $nuToken
                    );
                }
                else
                {
                    $response = new Response(
                            ResponseCodes::BadInput, 
                            "user already exists"
                    );
                }
            }
            else
            {
                $response = new Response(
                        ResponseCodes::BadInput, 
                        "Wrong Secret Key"
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
                ResponseCodes::WrongMethod, 
                "Wrong Method"
        );
    }
    echo $response->build();
?>