<?php
    include_once './redirect.php';
    
    setcookie('banList', '', time() - 3000, '/');
    setcookie('score', '', time() - 4000, '/');
    redirect('../nuQuiz.php');
?>