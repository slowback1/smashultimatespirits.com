<?php
    include '../../models/Spirit.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';
    
    if($_SERVER['REQUEST_METHOD'] === 'GET') 
    {
        //the below if statement blocks determine which
        //spirits to get, and bind parameters if needed
        $stmt;
        //block for range queries
        if(isset($_GET['range'])) {
            $range = $c->cf->sanitize($_GET['range']);
            $rarr = explode('-', $range);
            //switch values if order is incorrect
            if(intval($rarr[0]) < intval($rarr[1])) 
            {
                $min = intval($rarr[0]);
                $max = intval($rarr[1]);
            }
            else 
            {
                $min = intval($rarr[1]);
                $max = intval($rarr[0]);
            }

            $stmt = $c->conn->prepare("SELECT id, name, game, game2, series, description, author, release_year FROM spirits WHERE id BETWEEN ? AND ? ORDER BY id");
            $stmt->bind_param("ii", $min, $max);
        }
        //block for singular queries
         else if(isset($_GET['id'])) 
         {
            $id = $c->cf->sanitize($_GET['id']);
            //get random one
            if($id === 'r') 
            {
                $stmt = $c->conn->prepare("SELECT id, name, game, game2, series, description, author, release_year FROM spirits ORDER BY RAND() LIMIT 1");
            } 
            else 
            {
                $stmt = $c->conn->prepare("SELECT id, name, game, game2, series, description, author, release_year FROM spirits WHERE id = ? LIMIT 1");
                $stmt->bind_param("i", $id);
            }
        }
        //block for all queries 
        else 
        {
            $stmt = $c->conn->prepare("SELECT id, name, game, game2, series, description, author, release_year FROM spirits ORDER BY id");  
        }
        
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
        $response = new Response(ResponseCodes::Recieved, $resArr);
        }
        else 
        {
            $response = new Response(ResponseCodes::BadInput, "Incorrect Input");
        }
    } 
    else 
    {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");  
    }
    echo $response->build();
?>