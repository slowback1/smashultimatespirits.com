<?php
    include '../../models/Spirit.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("public");
    
    if($_SERVER['REQUEST_METHOD'] === 'GET') 
    {
        $stmt = $c->conn->prepare(
            "SELECT COUNT(id) 
            FROM spirits"
            );
        $stmt->execute();
        $stmt->store_result();
        
        $stmt->bind_result(
            $count
        );

        $resArr = array();
        while($stmt->fetch()) 
        {
            $response = new Response(
                ResponseCodes::Recieved, 
                $count
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