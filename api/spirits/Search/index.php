<?php
    include '../../models/Spirit.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("public");
    
    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        if(isset($_GET['query']) && 
        isset($_GET['type']) &&
        isset($_GET['limit'])
        )
        {
            $query = $c->cf->sanitize($_GET['query']);
            $type = $c->cf->sanitize($_GET['type']);
            $limit = $c->cf->sanitize($_GET['limit']);
            
            $stmt = $c->conn->prepare(
                "SELECT id, name, game, series, description, author, release_year FROM spirits WHERE ? LIKE ? LIMIT ?"
            );

            $stmt->bind_param("ssi", $type, $query, $limit);

            $stmt->execute();
            $stmt->store_result();

            $stmt->bind_result(
                $id,
                $name,
                $game,
                $game2,
                $series,
                $description,
                $author,
                $release_year
            );

            $resArr = array();
            while($stmt->fetch())
            {
                array_push($resArr, $c->cf->addSpiritToResponse(
                    $id,
                    $name,
                    $game,
                    $game2,
                    $series,
                    $description,
                    $author,
                    $release_year
                ));
            }
            if(sizeof($resArr) > 0)
            {
                $response = new Response(ResponseCodes::Recived, $resArr);
            }
            else 
            {
                $response = new Response(ResponseCodes::BadInput, "Incorrect Input");
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