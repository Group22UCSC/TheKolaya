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
            if(isset($_POST['accept-btn'])) {
                $data = [
                    'contact_number' => trim($_POST['contact_number']),
                    'name' => trim($_POST['name'])
                ];
    
                
                $this->view->render('user/profile/enterPassword');
            }else if(isset($_POST['enter-btn'])) {
                $data = [
                    'password' => $_POST['password']
                ];
                if($this->model->checkPassword($data)) {
                    $this->model->editProfile($data);
                    $this->view->render('user/profile/correctPassword');
                }else {
                    $this->view->render('user/profile/wrongPassword');
                }
            }
            
        }else
            $this->view->render('Supervisor/editProfile');
    }

    // function enterPassword() {
        
        
    // }
}

?>