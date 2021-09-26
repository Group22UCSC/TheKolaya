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

    function manageRequests() {
        $this->view->showPage('Supervisor/manageRequests');
    }

    function manageFertilizer() {
        $this->view->showPage('Supervisor/manageFertilizer');
    }

    function manageFirewood() {
        $this->view->showPage('Supervisor/manageFirewood');
    }

}

?>