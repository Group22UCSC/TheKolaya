<?php

class View {
    function __construct(){

    }

    public function render($viewName, $data = []) {
        if(file_exists('../app/views/' .$viewName. '.php')){
            require '../app/views/' .$viewName. '.php';
        } else {
            die('View does not exist');
        }
    }
    public function render2($viewName, $data1 = [], $data2 = []) {
        if(file_exists('../app/views/' .$viewName. '.php')){
            require '../app/views/' .$viewName. '.php';
        } else {
            die('View does not exist');
        }
    }
    
    public function show($viewName, $data = [], $user_data = []) {
        if(file_exists('../app/views/' .$viewName. '.php')){
            require '../app/views/' .$viewName. '.php';
        } else {
            die('View does not exist');
        }
    }

    public function showPage($viewName) {
        if(file_exists('../app/views/'.$viewName. '.php')){
            require '../app/views/' .$viewName. '.php';
        } else {
            die('View does not exist');
        }
    }

}

?>