<?php
    class PagesController{
        public function index(){
            $model = new User();
            $get = $model->get();
            var_dump($get);
        }
    }
?>