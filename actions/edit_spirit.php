<?php
include './sanitize.php';
include './redirect.php';
include '../connection/connect.php';

$id = sanitize($_POST['id']);
$name = addslashes(sanitize($_POST['name']));
$game = addslashes(sanitize($_POST['game']));
$series = sanitize($_POST['series']);
$description = addslashes(sanitize($_POST['description']));
$image = sanitize($_POST['image']);

    function checkIfEmpty($item) {
        if($item == null || $item == "" || empty($item)) {
            return true;
        } else {
            return false;
        }
    }
    
    $qry_name = (!checkIfEmpty($name) ? "name='$name'" : "");
    $qry_game = (!checkIfEmpty($game) ? "game='$game'" : "");
    $qry_series = (!checkIfEmpty($series) ? "series='$series'" : "");
    $qry_description = (!checkIfEmpty($description) ? "description='$description'" : "");
    $qry_image = (!checkIfEmpty($image) ? "image='$image'" : "");
    
    $settings_arr = [$qry_name, $qry_game, $qry_series, $qry_description, $qry_image];
    $last = 0;
    $res = "";
    
        foreach($settings_arr as $key=>$value) {
        if(checkIfEmpty($value)) {
            //do nothing
        } else {
            $last = $key;
        }
    }
    foreach($settings_arr as $key=>$value) {
        if(checkIfEmpty($value)) {
            $res = $res;
        } else {
            if($key != $last) {
                $res = $res .  $value . ", ";
            } else {
                $res = $res . $value;
            }
        }
    }
    
    $sql = "UPDATE spirits SET $res WHERE id=$id";
    
    if($conn->query($sql) == TRUE) {
        redirect('../index.php?ecode=editsuccess');
    } else {
    	redirect('../index.php?ecode=failure');
        echo $db->error;
    }