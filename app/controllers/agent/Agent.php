<?php

class Agent extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

      
       $result = $this->model->availablelistTable();
    //    print_r($result);
       $this->view->render('Agent/Agent',$result);
    }

    // function availableLandownerList(){
    //     $this->view->showPage('Agent/AvailableList');
    // }
        // public $weight_data = [
        //      'date' => '',
        //     'lid' => '',
        //     'initial_weight' => '',
        //     'emp_id_agent' => ''
        // ];


    function updateTeaWeight(){  
        $weight_data = [
            'date' => '',
           'lid' => '',
           'initial_weight' => '',
           'agent_id' => ''
       ];      
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->weight_data['date'] = date("Y-m-d");
            $this->weight_data['lid'] = trim($_POST['lid-popup']);
            $this->weight_data['initial_weight'] = trim($_POST['weight-popup']);             
            $this->weight_data['agent_id'] = $_SESSION['user_id'];
            // print_r($_SESSION['user_id']);
            // print_r($this->weight_data);
            $this->model->updateWeight($this->weight_data);
            $result = $this->model->availablelistTable();
            //    print_r($result);
               $this->view->render('Agent/Agent',$result);
               //also add the set the tea availability of landowner to 0
        }
       
    }


    function sendEmergencyMessage(){
        $this->view->showPage('Agent/EmergencyMessage');
    }

    function viewPreviousUpdates(){
        $this->view->showPage('Agent/previousUpdates');
    }

    function confirmDeliverables(){ 
        $result1 = $this->model->fertilizerdeliveryListTable();
        $result2 = $this->model->advancedeliveryListTable();
        // print_r($result);
        $this->view->render2('Agent/DeliveryList', $result1, $result2);
        // $this->view->showPage('Agent/DeliveryList');
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