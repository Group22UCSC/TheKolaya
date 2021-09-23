<?php

class Agent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('Agent/Agent');
    }

}

?>