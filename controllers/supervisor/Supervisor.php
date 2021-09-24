<?php

class Supervisor extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage('Supervisor/Supervisor');
    }

    function updateTeaMeasure() {
        $this->view->showPage('Supervisor/updateTeaMeasure');
    }

}

?>