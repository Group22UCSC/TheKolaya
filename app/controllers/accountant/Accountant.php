<?php

class Accountant extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('accountant/accountant');
    }

    public function profile()
    {
        $this->view->showPage('accountant/profile');
    }

    public function editProfile()
    {
        $this->view->showPage('accountant/editProfile');
    }


    function setTeaPrice() {
        if(!empty($_POST)){
            

            $result = $this->model->insertTeaPrice();
            if($result==true){
                // if there is a result which mean query is executed - > success pop up
                $_POST['success']=1;
                $result = $this->model->teaPriceTable();
                $this->view->render('accountant/setTeaPrice',$result);
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
}

?>