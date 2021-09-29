<?php

class ProductManager extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('Productmanager/Productmanager');
    }
    function products() {

        $this->view->showPage('Productmanager/products');
    }
   
}

?>