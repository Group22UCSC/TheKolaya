<?php

class View {
    function __construct(){

    }

    public function render($viewName, $data = []) {
        if(file_exists('views/' .$viewName. '.php')){
            require 'views/' .$viewName. '.php';
        } else {
            die('View does not exist');
        }
    }

    public function showPage($viewName) {
        if(file_exists('views/'.$viewName. '.php')){
            require 'views/' .$viewName. '.php';
        } else {
            die('View does not exist');
        }
    }

}

?>