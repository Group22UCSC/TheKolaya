<?php

class Controller {
    function __construct()
    {
        $this->view = new View();
    }

    public function loadModel($fileName,$modelName) {
        $path = 'models/'.$fileName.'/'. $modelName. '_Model.php';
        if(file_exists($path)) {
            require $path;
            $className = $modelName . '_Model';
            $this->model = new $className();
        }
    }

    public function loadModelUser($modelName) {
        $path = 'models/'. $modelName. '_Model.php';
        if(file_exists($path)) {
            require $path;
            $className = $modelName . '_Model';
            $this->model = new $className();
        }
    }
}

?>