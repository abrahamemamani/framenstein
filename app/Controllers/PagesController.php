<?php
    class PagesController{
        public function index(){
            $obj = new Model();
            $objModel = $obj->model('User');
        }
    }
?>