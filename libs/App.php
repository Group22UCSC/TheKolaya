<?php

class App {

    private $_url = null;
    private $_controller = null;

    function __construct()
    {
        $this->_getURL();

        if(empty($this->_url[0])) {
            $this->_loadDefaultController();
            return false;
        }

        if($this->_loadController()) {
            $this->_loadControllerMethod();
        }
    }


    private function _getURL() {
        $url = isset($_GET["url"]) ? $_GET["url"] : null;

        $url = rtrim($url, '/');

        $url = filter_var($url, FILTER_SANITIZE_URL); //ex: $_url = controller/home/...

        $this->_url = explode('/', $url); //Split from '/' this and put url words in array. now $_url = [0=>controller, 1=> home,....]
    
        // print_r($this->_url);
    }

    private function _loadDefaultController() {
        require 'controllers/Index.php';

        $this->_controller = new Index();

        $this->_controller->index();
    }

    private function _loadController() {
        $file = null;
        if($this->_url[0] == 'login' || $this->_url[0] == 'registration') { 
            $file = 'controllers/'. $this->_url[0] . '.php';
        }else if(!empty($_SESSION['user_type'])) {
            $file = 'controllers/'. $_SESSION['user_type'].'/'. $this->_url[0] . '.php';
        }

        if(file_exists($file)) {
            require $file;

            $this->_controller = new $this->_url[0];
            if($this->_url[0] == 'login' || $this->_url[0] == 'registration') {
                $this->_controller->loadModelUser($this->_url[0]);
            }else if(!empty($_SESSION['user_type'])) {
                $this->_controller->loadModel($_SESSION['user_type'],$this->_url[0]);
            }
            return true;
        }
        else {
            require 'controllers/Errors.php';
            $this->_controller = new Errors();

            $this->_controller->index();
            return false;
        }
    }

    private function _loadControllerMethod() {
        $urlLength = count($this->_url);

        if($urlLength > 1) {
            if (!method_exists($this->_controller, $this->_url[1])){
                echo "Request method not found!!";
                exit;
            }
        }

        switch($urlLength) {
            case 6:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4], $this->_url[5]);
                break;
            case 5:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3], $this->_url[4]);
                break;
            case 4:
                $this->_controller->{$this->_url[1]}($this->_url[2], $this->_url[3]);
                break;
            case 3:
                $this->_controller->{$this->_url[1]}($this->_url[2]);
                break;
            case 2:
                $this->_controller->{$this->_url[1]}();
                break;
            default:
                $this->_controller->index();
                break;
        }
    }
}

?>