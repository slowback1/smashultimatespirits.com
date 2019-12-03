<?php
    include './classes/Response.php';

    $body = array(
        "hello world",
        "this is a test"
    );
    $res = new Response(ResponseCodes::Ok, $body);
    echo $res->build();

?>