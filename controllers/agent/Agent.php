<?php

class Agent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('Agent/Agent');
    }

    function viewAvailableLandownerList(){
        $this->view->showPage('Agent/AvailableList');
    }

    function updateTeaWeight(){
        $this->view->showPage('Agent/TeaCollection');
    }


}

?>