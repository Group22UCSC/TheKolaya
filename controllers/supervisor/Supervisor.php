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

    function managerFertilizer() {
        $this->view->showPage('Supervisor/managerFertilizer');
    }

    function managerFirewood() {
        $this->view->showPage('Supervisor/managerFirewood');
    }

}

?>