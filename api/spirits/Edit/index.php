<?php
    include '../../models/Spirit.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';
    
    $c->cf->setCors("private");

    if($_SERVER['REQUEST_METHOD'] === "PUT") 
    {
        if($c->verifyUser()) 
        {
            $postBody = json_decode(file_get_contents('php://input'));
            if(
                isset($postBody->id) &&
                isset($postBody->name) &&
                isset($postBody->game) &&
                isset($postBody->game2) &&
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
                    $game2 = $c->cf->sanitize($postBody->game2);
                    $series = $c->cf->sanitize($postBody->series);
                    $description = $c->cf->sanitize($postBody->description);
                    $author = $c->cf->sanitize($postBody->author);
                    $year = $c->cf->sanitize($postBody->year);

                $stmt = $c->conn->prepare(
                    "UPDATE spirits 
                    SET 
                        name = ?, 
                        game = ?, 
                        game2 = ?, 
                        series = ?, 
                        description = ?, 
                        author = ?, 
                        release_year = ? 
                    WHERE 
                        id= ? 
                    LIMIT 1"
                );
                
                $stmt->bind_param("ssssssii", 
                    $name, 
                    $game, 
                    $game2, 
                    $series, 
                    $description, 
                    $author, 
                    $year, 
                    $id
                );

                //stmt->execute will return false if query fails
                if($stmt->execute()) 
                {
                    $clVal = 
                        "id &STOP2; " . 
                        strval($id) . 
                        "&STOP1; name &STOP2; " . 
                        $name . 
                        "&STOP1; game &STOP2; " . 
                        $game . 
                        "&STOP1; series &STOP2; " . 
                        $series . 
                        "&STOP1; description &STOP2; " . 
                        $description . 
                        "&STOP1; author &STOP2; " . 
                        $author . 
                        "&STOP1; release_year &STOP2; " . 
                        $year;

                    $c->addToChangeLog("se", $clVal);

                    $response = new Response(
                        ResponseCodes::Edited, 
                        "Update was a success"
                    );
                } 
                else 
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
                        "Missing Input"
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