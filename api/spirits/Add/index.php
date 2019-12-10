<?php
    include '../../models/Spirit.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';
    
    if($_SERVER['REQUEST_METHOD'] === "POST")
     {
        if($c->verifyUser())
         {
            $postBody = json_decode(file_get_contents('php://input'));
            if(
            isset($postBody->id) &&
            isset($postBody->name) &&
            isset($postBody->game) &&
            isset($postBody->series) &&
            isset($postBody->description) && 
            isset($postBody->author) && 
            isset($postBody->year)
            ) 
            {
                //prepare inputs
                $id = $c->cf->sanitize($postBody->id);
                $name = $c->cf->sanitize($postBody->name);
                $game = $c->cf->sanitize($postBody->game);
                $series = $c->cf->sanitize($postBody->series);
                $description = $c->cf->sanitize($postBody->description);
                $author = $c->cf->sanitize($postBody->author);
                $year = $c->cf->sanitize($postBody->year);

                $stmt = $c->conn->prepare(
                    "INSERT INTO spirits (id, name, game, series, description, author, year) VALUES (?, ?, ?, ?, ?, ?, ?)");
                    
                $stmt->bind_param("isssssi", 
                $id, $name, $game, $series, $description, $author, $year);

                //stmt->execute will return false is query fails
                if($stmt->execute()) 
                {
                    $response = new Response(ResponseCodes::Created, "Insert was a success");
                } 
                else 
                {
                    $response = new Response(ResponseCodes::ServerError, "Unknown Error");
                }

            } 
            else 
            {
                $response = new Response(ResponseCodes::BadInput, "Missing Input");
            }
        } 
        else 
        {
            $response = new Response(ResponseCodes::BadInput, "No Authorization");
        }
    } 
    else 
    {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
    }
    echo $response->build();
?>