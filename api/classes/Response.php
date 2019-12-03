<?php
    abstract class ResponseCodes {
        const Ok = 200;
        const BadInput = 350;
        const EvilInput = 351;
        const ServerError = 400;
        
    }
    class Response {
        
        public $rc;
        public $rb;
        function __construct($code, $body) {
            $this->rc = $code;
            $this->rb = $body;
        }
        public function build() {
            return json_encode(array("responseID" => $this->rc, "responseBody" => $this->rb));
        }
    }
?>