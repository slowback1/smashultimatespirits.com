<?php
    //I use my own code system because I generally want 
    //the http status code to stay at 200 unless a serious 
    //error occured
    abstract class ResponseCodes 
    {
        const Ok = 200;
        const Recieved = 201;
        const Created = 202;
        const Edited = 203;
        const Deleted = 204;
        const BadInput = 350;
        const EvilInput = 351;
        const ServerError = 400;
        const WrongMethod = 300;   
    }
    class Response 
    {
        
        private $rc;
        private $rb;
        function __construct($code, $body) {
            $this->rc = $code;
            $this->rb = $body;
        }

        //standardized response for all queries
        public function build() {
            return json_encode(array("
                responseID" => $this->rc, 
                "responseBody" => $this->rb)
            );
        }
    }
?>