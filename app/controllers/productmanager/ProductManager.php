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

    function loadProductNames(){
            $productResults = $this->model->getProductDetails();
            return $productResults;
    }
    function updateAuction(){
            $tblResult = $this->model->auction();
            $productResults = $this->model->getProductDetails();
            
           // print_r($result);
            $this->view->render2('Productmanager/updateAuction', $tblResult,$productResults);
    }
    
    
}

?>