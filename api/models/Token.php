<?php
    class Token
    {
        private $username;
        private $password;
        private $IssuedDate;

        public function __construct(
            $un, 
            $pw, 
            $date="0"
        ) 
        {
            $this->username = $un;
            $this->password = $pw;
            $this->IssuedDate = $date;
            if($date == "0")
            {
                $this->IssuedDate = date("U");
            }
        }
        public function build()
        {
            return array(
                "username" => $this->username,
                "id" => $this->IssuedDate
            );
        }
    }
    
?>