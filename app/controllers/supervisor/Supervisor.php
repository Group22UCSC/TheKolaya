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

    function fertilizerInStock() {
        $this->view->showPage('Supervisor/fertilizerInStock');
    }

    function firewoodInStock() {
        $this->view->showPage('Supervisor/firewoodInStock');
    }

    function fertilizerOutStock() {
        $this->view->showPage('Supervisor/fertilizerOutstock');
    }
    
    function firewoodOutStock() {
        $this->view->showPage('Supervisor/firewoodOutStock');
    }

    function fertilizerStock() {
        $this->view->showPage('Supervisor/fertilizerStock');
    }

    function firewoodStock() {
        $this->view->showPage('Supervisor/firewoodStock');
    }

    function profile() {
        $this->view->showPage('Supervisor/profile');
    }

    function editProfile() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'contact_number' => trim($_POST['contact_number']),
                'name' => trim($_POST['name'])
            ];

            $this->model->editProfile($data);
            $this->view->showPage('Profile/enterPassword');
        }else
            $this->view->showPage('Supervisor/editProfile');
    }

    // function enterPassword() {
        
        
    // }
}

?>