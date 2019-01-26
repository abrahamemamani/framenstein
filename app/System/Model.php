<?php
    class Model extends DataManager{
        protected $table = '';
        protected $fields = [];

        public function get(){
            $link = DataManager::connection();
            $sql = 'SELECT ';
            
            foreach($this->fields as $key => $field):
                $sql .= $field;
                if(($key + 1) < count($this->fields))
                    $sql .= ', ';
                else
                    $sql .= ' ';
            endforeach;

            $sql .= 'FROM '.$this->table;
            $stmt = $link->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        public function save(){

        }
        public function update(){

        }
        public function findOrFail($id){

        }
    }
?>