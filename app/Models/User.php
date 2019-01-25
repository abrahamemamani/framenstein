<?php
    class User extends Model{

        public function __construct(){
            echo 'Clase User';
            $this->table = 'User';
            $this->fields = [];
        }
    }
?>