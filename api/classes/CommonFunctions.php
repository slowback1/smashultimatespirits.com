<?php
    class CommonFunctions {
        function __construct() {
            
        }
        public function sanitize($inputString) {
            return htmlspecialchars(strip_tags(trim($inputString)));
        }
    }
?>