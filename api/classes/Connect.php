<?php
    include '../config/index.php';
    include './Auth.php';
    include './CommonFunctions';
    class Connection {
        public $conn;
        private $auth;
        public $cf;
        function constructor() {
            $this->conn = new mysqli(
                $Config['hostname'],
                $Config['username'],
                $Config['password'],
                $Config['dbname']
            );
            $this->cf = new CommonFunctions();
            $this->auth = new Auth();
            

        }
    }
?>