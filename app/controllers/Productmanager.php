<?php

class ProductManager extends Controller{
    function __construct()
    {
        parent::__construct();
    }
    function index() {
        $this->getNotificationCount();
        $incomeBarChart = $this->model->incomeBarChart();//for the bar chart
        $last30ProductSales=$this->model->last30ProductSales();//sold product categories of the last 30 days for the pie chart
        $this->view->render('Productmanager/Productmanager',$incomeBarChart,$last30ProductSales);
    }
    
    function products() {
        $this->getNotificationCount();
        $productResults = $this->model->getProductDetails();
        $this->view->render('Productmanager/products',$productResults);
    }
    function auctionDetails() {
        $this->getNotificationCount();
        $tblResult = $this->model->auction();
        $this->view->render('Productmanager/auctionDetails',$tblResult);
    }
    function updateProducts() {


        if($_SERVER['REQUEST_METHOD']=='POST'){
                
            $result = $this->model->insertProduct();
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
            $this->getNotificationCount();
            $productResults = $this->model->getProductDetails();
            $this->view->render('Productmanager/updateProducts',$productResults);   
        }
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
            
           //return($result);
            //$this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            $this->getNotificationCount();
            $buyers=$this->model->getBuyersDetails();
            $tblResult = $this->model->auction();
            $productResults = $this->model->getProductDetails();
            
           // print_r($result);
            $this->view->render3('Productmanager/updateAuction', $tblResult,$productResults,$buyers);
        }
            
    }
    // ==== get the details of the auction table for the updateAuction UI
    function getAuctionTable(){
        $tblResult = $this->model->auction();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }
    // get details of the products_in table
    function getProductsINTable(){
        $tblResult = $this->model->getProductsINTable();
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

    //Manage Profile
    function profile()
    {
        $this->getNotificationCount();  
        $this->view->render('user/profile/profile');
    }
    
    function editProfile()
    {
        include '../app/controllers/User.php';
        $user = new User();
        $user->loadModelUser('user');
        $user->editProfile();
    }

    function enterPassword()
    {
        $this->view->render('user/profile/enterPassword');
    }
    
    function getProductStock(){
        // $pid=$this->input->get('pid');
        $pid=$_GET['pid'];
        $result = $this->model->getProductStock();
        // print_r($tblResult);
        $json_arr=json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
       //echo $pid;
       //return $pid;
    }
    function AuctionIncome30(){
        $tblResult = $this->model->AuctionIncome30();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    } 
    

    // tot tea sales for last 30 days
    function totSales30(){
        $tblResult = $this->model->totSales30();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    }

    //get the tot tea stock available for the dashboard box
    function totTeaStockNow(){
        $tblResult = $this->model->totTeaStockNow();
        $json_arr=json_encode($tblResult);
        echo $json_arr;
    }

    //Get Notification
function setNotification($notification)
{
    if (!empty($notification)) {
        echo '<div id="all_notifications">';
        for ($i = 0; $i < count($notification); $i++) {
            switch ($notification[$i]['notification_type']) {
                case 'warning':
                    $imgPath = URL . '/vendors/images/notifications/warning.jpg';
                    break;
                case 'request':
                    $imgPath = URL . '/vendors/images/notifications/request.jpg';
                    break;
            }

            switch ($notification[$i]['read_unread']) {
                case 0:
                    $notificationStatus = "unread";
                    break;
                case 1:
                    $notificationStatus = "read";
                    break;
            }
            $dateTime = $notification[$i]['receive_datetime'];
            echo
            '<div class="sec new ' . $notification[$i]['notification_type'] . ' ' . $notificationStatus . '" id="n-' . $notification[$i]['notification_id'] . '">
                    <div class = "profCont">
                        <img class = "notification_profile" src = "' . $imgPath . '">
                    </div>
                    <div class="txt ' . $notification[$i]['notification_type'] . '">' . $notification[$i]['message'] . '</div>
                    <div class="txt sub">' . $dateTime . '</div>
                </div>';
        }
        echo '</div>';
    } else {
        echo
        '<div id="all_notifications">
            <div class="nothing">
                <i class="fas fa-child stick"></i>
                <div class="cent">Looks Like your all caught up!</div>
            </div>
        </div>';
    }
}

public function getNotificationCount()
{
    $notificationCount = $this->model->getNotificationCount($_GET);
    return $notificationCount;
}

function getNotification()
{
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if (isset($_POST['notification_type'])) {
            $notification = $this->model->getNotification($_POST);
            $this->setNotification($notification);
        }
    }
}
}
