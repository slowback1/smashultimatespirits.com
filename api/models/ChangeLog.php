<?php
    class ChangeLog
    {
        private $user;
        private $type;
        private $value;
        public function __construct($u, $t, $v)
        {
            $this->user = $u;
            $this->type = $t;
            $this->value = $v;
        }
        public function build()
        {
            return array(
                "user" => $this->user,
                "type" => $this->type,
                "value" => $this->value
            );
        }
    }
?>