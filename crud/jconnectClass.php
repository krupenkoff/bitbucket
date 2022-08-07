<?php
    class jconnectClass {
        public $connection;
        public function __construct($f_name){
            $this->j_connect($f_name);
        }
        public function j_connect($f_name){
            if (file_exists('../'.$f_name)){
                $this->connection = json_decode(file_get_contents('../'.$f_name), true);
            }
        }  
    }
?>