<?php
    class Core{
        private $currentController  = 'Pages',
                $currentMethod      = 'index',
                $params             = [];

        public function __construct(){
            $url = $this->getUrl();
            $this->updateCurrentValues($url);
            
            $this->setCurrentController($this->getCurrentController().'Controller');

            $fileController = '../app/Controllers/'.$this->getCurrentController().'.php';
            
            if(file_exists($fileController)){
                require_once $fileController;
                if(method_exists($this->getCurrentController(), $this->getCurrentMethod())){
                    $aux = $this->getCurrentController();
                    $this->setCurrentController(new $aux);
                    $this->params = $url ? array_values($url) : [];
                    
                    call_user_func_array([$this->getCurrentController(), $this->getCurrentMethod()], $this->params);
                }
                else{
                    die('El metodo "'.$this->getCurrentMethod().'" no existe en el controlador "'.$this->getCurrentController().'"');
                }
            }
            else{
                die('El controlador "'.$this->getCurrentController().'" no existe!');
            }
        }

        /*
         * Captura la url, la formatea y la retorna como array
         */
        public function getUrl(){
            if(isset($_GET['url'])){
                $url = rtrim($_GET['url'], '/');
                $url = filter_var($url, FILTER_SANITIZE_URL);
                $url = explode('/', $url);
                return $url;
            }
        }

        public function updateCurrentValues($url){
            if(isset($url[0])){
                $this->setCurrentController(ucwords($url[0]));
                unset($url[0]);
            }
            if(isset($url[1])){
                $this->setCurrentMethod(strtolower($url[1]));
                unset($url[1]);
            }
        }

        /*
         * Getters y Setters
         */

        public function getCurrentMethod(){
            return $this->currentMethod;
        }
        public function setCurrentMethod($method){
            $this->currentMethod = $method;
        }
        public function getCurrentController(){
            return $this->currentController;
        }
        public function setCurrentController($controller){
            $this->currentController = $controller;
        }
    }
?>