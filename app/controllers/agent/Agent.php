<?php

class Agent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

       $this->view->showPage('Agent/Agent');    
    }

    function availableLandownerList(){
        $this->view->showPage('Agent/AvailableList');
    }

    function updateTeaWeight(){
        $this->view->showPage('Agent/TeaCollection');
    }
    function sendEmergencyMessage(){
        $this->view->showPage('Agent/EmergencyMessage');
    }

    function confirmDeliverables(){
        $this->view->showPage('Agent/Deliverables');
    }

    function profile() {
        $this->view->showPage('Agent/agentProfile');
    }

    function editProfile() {
        $this->view->showPage('Agent/agentEditProfile');
    }
}




?>