<?php

class ProductManager extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('Productmanager/Productmanager');
    }


}

?>