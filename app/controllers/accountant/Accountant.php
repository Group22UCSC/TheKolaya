<?php

class Accountant extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('accountant/accountant');
    }
    function setTeaPrice() {
        $result = $this->model->teaPriceTable();
        $this->view->render('accountant/setTeaPrice',$result);
    }
    function payments() {
        $this->view->showPage('accountant/payments');
    }
    function landowners() {
        $this->view->showPage('accountant/landowners');
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