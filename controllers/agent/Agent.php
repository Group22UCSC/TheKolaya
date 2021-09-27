<?php

class Agent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

       $this->view->showPage('Agent/Agent');
     //$this->view->showPage('Agent/TeaCollection');
      //$this->view->showPage('Agent/AvailableList');
      
    }

    function viewAvailableLandownerList(){
        $this->view->showPage('Agent/AvailableList');
    }

    function updateTeaWeight(){
        $this->view->showPage('Agent/TeaCollection');
    }


}

?>