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
    }
?>