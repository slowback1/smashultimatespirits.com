<?php
    include '../../models/Changelog.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';

    $c->cf->setCors("private");
    if($_SERVER['REQUEST_METHOD'] === 'GET')
    {
        $stmt;
        if(isset($_GET['range']))
        {
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
            $stmt = $c->conn->prepare("SELECT user, type, value FROM changelog WHERE id BETWEEN ? AND ? ORDER BY id");
            $stmt->bind_param("ii", $min, $max);
        }
        else
        {
            $stmt = $c->conn->prepare("SELECT user, type, value FROM changelog ORDER BY id");
        }
        if($stmt->execute())
        {
            $stmt->store_result();
            $stmt->bind_result(
                $u,
                $t,
                $v
            );
            $resArr = array();
            while($stmt->fetch())
            {
                $cl = new ChangeLog($u, $t, $v);
                array_push($resArr, $cl->build());
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
            $response = new Response(ResponseCodes::ServerError, "Unknown Error");
        }
    }
    else
    {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");
    }
    echo $response->build();
?>