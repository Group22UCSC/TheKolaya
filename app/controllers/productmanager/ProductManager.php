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
        if(isset($_POST[''])){
            

            $result = $this->model->insertAution();
            if($result==true){
                $buyers=$this->model->getBuyersDetails();
            $tblResult = $this->model->auction();
            $productResults = $this->model->getProductDetails();
            
           // print_r($result);
            $this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
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
    
    
}

?>