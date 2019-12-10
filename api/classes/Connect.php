<?php
    include substr(dirname(__FILE__),0,-7) . "config\index.php";
    include dirname(__FILE__) . '\Auth.php';
    include dirname(__FILE__) . '\CommonFunctions.php';
    
    class Connection {
        public $conn;
        public $cf;
        public $auth;
        private $config;
        function __construct($confArr) {
            $this->config = $confArr;
            $this->cf = new CommonFunctions();
            $this->auth = new Auth($this->config);

            $this->conn = new mysqli(
                $this->config['hostname'],
                $this->config['username'],
                $this->config['password'],
                $this->config['dbname']
            );
            

        }
        function verifyUser() {
            $token = $this->auth->getToken();
            if(!$token) {
                return false;
            }
            $username = $token->username;
            $stmt = $this->conn->prepare("SELECT username FROM users WHERE username = ?");
            $uname = $this->cf->sanitize($username);
            $stmt->bind_param("s", $uname);
            $stmt->execute();
            $stmt->bind_result($u);
            while($stmt->fetch()) {
                if($u == $username) {
                    return true;
                } else {
                    return false;
                }
            }
        }
    }

    $c = new Connection($Config);
?>