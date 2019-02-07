<?php 
function pwHash($password) {
    return hash('sha512', $password);
}
?>