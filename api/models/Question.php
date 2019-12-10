<?php
    class Question
    {
        private $id;
        private $question;
        private $corAns;
        private $wrongAns1;
        private $wrongAns2;
        private $wrongAns3;

        public function __construct(
            $i,
            $q,
            $cA,
            $wA1,
            $wA2,
            $wA3
        )
        {
            $this->id = $i;
            $this->question = $q;
            $this->corAns = $cA;
            $this->wrongAns1 = $wA1;
            $this->wrongAns2 = $wA2;
            $this->wrongAns3 = $wA3;
        }

        public function build() 
        {
            $answersArr = array(
                $this->corAns,
                $this->wrongAns1,
                $this->wrongAns2,
                $this->wrongAns3
            );

            shuffle($answersArr);
            
            return array(
                "id" => $this->id,
                "question" => $this->question,
                "answers" => $answersArr
            );
        }
    }
?>