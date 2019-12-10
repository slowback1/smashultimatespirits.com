<?php
    class Spirit {
        private $id;
        private $name;
        private $game;
        private $series;
        private $description;
        
        public function __construct($id, $name, $game, $series, $description) {
            $this->id = $id;
            $this->name = $name;
            $this->game = $game;
            $this->series = $series;
            $this->description = $description;
        }
        public function build() {
            return array(
                "id" => $this->id,
                "name" => $this->name,
                "game" => $this->game,
                "series" => $this->series,
                "description" => $this->description
            );
        }
    }
?>