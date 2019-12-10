<?php
    class Spirit 
    {
        private $id;
        private $name;
        private $game;
        private $series;
        private $description;
        private $author;
        private $year;

        public function __construct(
            $id, 
            $name, 
            $game, 
            $series, 
            $description, 
            $author, 
            $year) 
        {
            $this->id = $id;
            $this->name = $name;
            $this->game = $game;
            $this->series = $series;
            $this->description = $description;
            $this->author = $author;
            $this->year = $year;
        }
        //standardized return when getting spirits
        public function build() 
        {
            return array(
                "id" => $this->id,
                "name" => $this->name,
                "game" => $this->game,
                "series" => $this->series,
                "description" => $this->description,
                "author" => $this->author,
                "year" => $this->year
            );
        }
    }
?>