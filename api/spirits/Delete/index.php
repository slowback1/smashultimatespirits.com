<?php
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    if($_SERVER['REQUEST_METHOD'] === "DELETE") {
        if($c->verifyUser()) {
            $deleteBody = json_decode(file_get_contents('php://input'));
            if(isset($deleteBody->id)) {
                $del = $deleteBody->id;
                $stmt = $c->conn->prepare("DELETE FROM spirits WHERE id = ?");
                $stmt->bind_param("i", $del);
                if($stmt->execute()) {
                    $response = new Response(ResponseCodes::Ok, "Deletion Successful");
                } else {
                    $response = new Response(ResponseCodes::ServerError, "Unknown Error");
                }
            } else {
                $response = new Response(ResponseCodes::BadInput, "No Input");
            }
        } else {
            $response = new Response(ResponseCodes::BadInput, "No Authorization");
        }
    } else {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
    }
    echo $response->build();
?>