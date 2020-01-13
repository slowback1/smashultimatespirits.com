<?php
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");

    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        if($c->verifyUser())
        {
            $response = new Response(
                    ResponseCodes::Ok, 
                    true
            );
        }
        else
        {
            $response = new Response(
                    ResponseCodes::BadInput, 
                    "Bad Token"
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