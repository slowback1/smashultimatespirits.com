<?php
    include substr(dirname(__FILE__),0,-7) . "config\\vendor\\firebase\php-jwt\src\JWT.php";
    
    class Auth 
    {
        public $jwt;
        public $config;
        function __construct($configArr) 
        {
            $this->jwt = new JWT();
            $this->config = $configArr;
        }
        public function getToken() 
        {
            $headers = getallheaders();
            if(!isset($headers['token'])) 
            {
                return false;
            }
            $token = $headers['token'];
            $decoded = $this->jwt::decode($token, $this->config['jwt']['secret_key'], array('HS256'));
            return $decoded;
        }
        public function getUser()
        {
            $token = $this->getToken();
            if(!$token) 
            {
                return false;
            }
            return $token->username;
        }
        public function setToken($params) 
        {
            return $this->jwt::encode($params, $this->config['jwt']['secret_key']);
        }
    }
?>