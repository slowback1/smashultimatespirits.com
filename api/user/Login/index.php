<?php
    include '../../models/Response.php';
    include '../../models/Token.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");

    if($_SERVER['REQUEST_METHOD'] === "POST")
    {
        $postBody = json_decode(file_get_contents('php://input'));
        if(
            isset($postBody->username) &&
            isset($postBody->password)
        )
        {
            $u = $c->cf->sanitize($postBody->username);
            $p = $c->cf->sanitize($postBody->password);
            
            $gstmt = $c->conn->prepare("SELECT username, password FROM users WHERE username = ? LIMIT 1");
            $gstmt->bind_param("s", $u);
            if($gstmt->execute())
            {
                $gstmt->store_result();
                $gstmt->bind_result($username, $password);
                while($stmt->fetch())
                {
                    if($c->auth->compareHash($p, $password))
                    {
                        $tci = new Token($username, $password);
                        $tokenParams = $tci->build();
                        $nuToken = $c->auth->setToken($tokenParams);
                        $response = new Response(ResponseCodes::Ok, $nuToken);
                    }
                    else
                    {
                        $response = new Response(ResponseCodes::BadInput, "Wrong Input");
                    }
                }
            }
            else
            {
                $response = new Response(ResponseCodes::BadInput, "Wrong Input");
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