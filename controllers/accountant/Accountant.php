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
        $this->view->showPage('accountant/setTeaPrice');
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
}

?>