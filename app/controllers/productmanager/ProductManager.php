<?php

class ProductManager extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    public function profile()
    {
        $this->view->showPage('Productmanager/profile');
    }

    public function editProfile()
    {
        $this->view->showPage('Productmanager/editProfile');
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
        $productResults = $this->model->getProductDetails();
        $this->view->render('Productmanager/updateProducts',$productResults);
    }

    function loadProductNames(){
            $productResults = $this->model->getProductDetails();//"SELECT product_id,product_name,amount FROM product";
            return $productResults;
    }
    function updateAuction(){
        if($_SERVER['REQUEST_METHOD']=='POST'){
                
            $result = $this->model->insertAution();
            if($result==true){
            //     $buyers=$this->model->getBuyersDetails();
            // $tblResult = $this->model->auction();
            // $productResults = $this->model->getProductDetails();
            
           // print_r($result);
            //$this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            $buyers=$this->model->getBuyersDetails();
            $tblResult = $this->model->auction();
            $productResults = $this->model->getProductDetails();
            
           // print_r($result);
            $this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
        }
            
    }
    function getAuctionTable(){
        $tblResult = $this->model->auction();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }

    // get the data of the last row of suction(Latest updated row)
    function getLastRowAuction(){
        echo "getLastRowAuction";
        $tblResult = $this->model->getLastRowAuction();
        print_r($tblResult);
        // -- $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        // -- echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }

    
    
    
}

?>