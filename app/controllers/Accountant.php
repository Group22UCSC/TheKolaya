<?php

class Accountant extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('accountant/accountant');
    }  

    function getTeaPrice(){
        $result = $this->model->teaPriceTable();
        $json_arr=json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }

    function setTeaPrice() {
        if(($_SERVER['REQUEST_METHOD']=='POST')){
            

            $result = $this->model->insertTeaPrice();
            if($result==true){
                // if there is a result which mean query is executed - > success pop up
                $_POST['success']=1;
                //$result = $this->model->teaPriceTable();
                //$this->view->render('accountant/setTeaPrice',$result);
                //echo "successfuly added";
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            $result = $this->model->teaPriceTable();
            $this->view->render('accountant/setTeaPrice',$result);
        }
        
    }
    // function to delete tea prices of a row
    function deleteSetTeaPriceRow(){
        if(($_SERVER['REQUEST_METHOD']=='POST')){
            $result = $this->model->deleteSetTeaPriceRow();
            if($result==true){
                
            }
            else{
                // un successfull pop up 
                // first check using a alert ()
                echo "failed to add";
            }
        }
        else{
            echo "Data was not passed to the controller";
        }
    }


    function payments() {
        $this->view->showPage('accountant/payments');
    }
    function landowners() {
        $this->view->showPage('accountant/landowners');
    }
    function pdf() {
        $this->view->showPage('accountant/pdf');
    }
    function landownersGraphpage() {
        $this->view->showPage('accountant/landownersGraphpage');
    }
    function requests(){
        $this->view->showPage('accountant/requests');
    }
    // testing model
    function testModel(){
        $this->view->auction=$this->model->testModel();
        $this->view->showPage('accountant/test');
    }
    //auction details page
    function auction(){
        $result = $this->model->auction();
       // print_r($result);
        $this->view->render('accountant/auction', $result);
        //$this->view->showPage('accountant/auction');
    }

    //Manage Profile
    function profile()
    {
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

    function getLandonwerTable(){
        $tblResult = $this->model->getLandonwerTable();
        $json_arr=json_encode($tblResult);
        echo $json_arr;// echo passes the data 
    }
    // income card - dashboard
    function AuctionIncome30(){
        $tblResult = $this->model->AuctionIncome30();
        // print_r($tblResult);
        $json_arr=json_encode($tblResult);
        //print_r($json_arr);
        echo $json_arr;// echo passes the data to updateAuctionjs.php
        
    } 
    // get advacne request details 
    function getAdvanceRequests(){
        $reslt=$this->model->getAdvanceRequests();
        $json_arr=json_encode($reslt);
        echo $json_arr;
    }
    }
    function acceptAdvanceRequest(){
        $reslt=$this->model->acceptAdvanceRequest();
        return $reslt;
    }
?>