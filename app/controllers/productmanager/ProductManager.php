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
    function auctionDetails() {

        $this->view->showPage('Productmanager/auctionDetails');
    }
    function updateProducts() {

        $this->view->showPage('Productmanager/updateProducts');
    }

    function loadProductIds(){
        
    }
    function updateAuction(){
            $result = $this->model->auction();
           // print_r($result);
            $this->view->render('Productmanager/updateAuction', $result);
    }
    
    
}

?>