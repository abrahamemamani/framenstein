<?php
    class User extends Model{

        public function __construct(){
            $this->table = 'Users';
            $this->fields = [
                'id', 'name'
            ];
        }
    }
?>