<?php

class Agent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

      
       $result = $this->model->availablelistTable();
      // print_r($result);
       $this->view->render('Agent/Agent',$result);
    }

    function availableLandownerList(){
        $this->view->showPage('Agent/AvailableList');
    }

    function updateTeaWeight(){
        $this->view->showPage('Agent/popup');
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

    function loadPopup(){
        $this->view->showPage('Agent/popup');
    }
}




?>