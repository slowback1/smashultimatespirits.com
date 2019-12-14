<?php
    class CommonFunctions {
        function __construct() {
            
        }
        public function sanitize($inputString) {
            return (htmlspecialchars(strip_tags(trim($inputString))));
        }
        public function addSpiritToResponse(
            $id, 
            $name, 
            $game, 
            $game2,
            $series, 
            $description, 
            $author, 
            $year) 
        {
            $s = new Spirit(
                $id, 
                $name, 
                $game, 
                $game2,
                $series, 
                $description, 
                $author, 
                $year);
    
    
            return $s->build();
        }
        public function setCors($type)
        {
            if($_SERVER['REQUEST_METHOD'] === 'OPTIONS')
            {
                header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, OPTIONS');
                header('Access-Control-Allow-Headers: token, Content-Type');
                header('Access-Control-Max-Age: 1728000');
                header('Content-Length: 0');
            }
            switch($type)
            {
                case "public":
                    header('Access-Control-Allow-Origin: *');
                    break;
                case "private":
                    header('Access-Control-Allow-Origin: https://smashultimatespirits.com');
                    break;
                default:
                    return false;
                    break;
            }
            return true;
        }
    }
?>