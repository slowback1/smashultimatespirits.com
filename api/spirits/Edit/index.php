<?php
    include '../../models/Spirit.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';
    
    if($c->verifyUser()) {
        if($_SERVER['REQUEST_METHOD'] === "PUT") {
            $postBody = json_decode(file_get_contents('php://input'));
            if(
            isset($postBody->id) &&
            isset($postBody->name) &&
            isset($postBody->game) &&
            isset($postBody->series) &&
            isset($postBody->description)
            ) {
                $id = $c->cf->sanitize($postBody->id);
                $name = $c->cf->sanitize($postBody->name);
                $game = $c->cf->sanitize($postBody->game);
                $series = $c->cf->sanitize($postBody->series);
                $description = $c->cf->sanitize($postBody->description);
                $stmt = $c->conn->prepare("UPDATE spirits SET name = ?, game = ?, series = ?, description = ? WHERE id= ? LIMIT 1");
                $stmt->bind_param("ssssi", $name, $game, $series, $description, $id);
                if($stmt->execute()) {
                    $response = new Response(ResponseCodes::Ok, "Update was a success");
                } else {
                    $response = new Response(ResponseCodes::ServerError, "Unknown Error");
                }

            } else {
                $response = new Response(ResponseCodes::BadInput, "Missing Input");
            }
        } else {
            $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
        }
    } else {
        $response = new Response(ResponseCodes::BadInput, "No Authorization");
    }
    echo $response->build();
?>