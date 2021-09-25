<?php

class Agent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('Agent/Agent');
    }

    function availalbleList(){
        $this->view->showPage('Agent/AvailableList');
    }

    function teaCollection(){
        $this->view->showPage('Agent/TeaCollection');
    }

}

?>