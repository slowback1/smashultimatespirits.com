<?php
    include '../../models/Spirit.php';
    include '../../models/Response.php';
    include '../../classes/Connect.php';
    function addSpiritToResponse($id, $name, $game, $series, $description) {
        $s = new Spirit($id, $name, $game, $series, $description);
        return $s->build();
    }
    if($_SERVER['REQUEST_METHOD'] === 'GET') {
        $stmt;
        
        if(isset($_GET['range'])) {
            $range = $c->cf->sanitize($_GET['range']);
            $rarr = explode('-', $range);
            if(intval($rarr[0]) < intval($rarr[1])) {
                $min = intval($rarr[0]);
                $max = intval($rarr[1]);
            } else {
                $min = intval($rarr[1]);
                $max = intval($rarr[0]);
            }
            $stmt = $c->conn->prepare("SELECT id, name, game, series, description FROM spirits WHERE id BETWEEN ? AND ?");
            $stmt->bind_param("ii", $min, $max);
        }
         else if(isset($_GET['id'])) {
            $id = $c->cf->sanitize($_GET['id']);
            if($id === 'r') {
                $stmt = $c->conn->prepare("SELECT id, name, game, series, description FROM spirits ORDER BY RAND() LIMIT 1");
            } else {
                $stmt = $c->conn->prepare("SELECT id, name, game, series, description FROM spirits WHERE id = ? LIMIT 1");
                $stmt->bind_param("i", $id);
            }
        } else {
            $stmt = $c->conn->prepare("SELECT id, name, game, series, description FROM spirits ORDER BY id");  
        }
        $stmt->execute();
        $stmt->store_result();
        $stmt->bind_result($id, $name, $game, $series, $description);
        $resArr = array();
        while($stmt->fetch()) {
            array_push($resArr, addSpiritToResponse(
                $id,
                $name,
                $game, 
                $series,
                $description
            ));
        }
        if(sizeof($resArr) > 0) {
        $response = new Response(ResponseCodes::Ok, $resArr);
        }
        else {
            $response = new Response(ResponseCodes::BadInput, "Incorrect Input");
        }
    } else {
        $response = new Response(ResponseCodes::WrongMethod, "Wrong Method");  
    }
    echo $response->build();
?>