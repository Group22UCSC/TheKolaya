<?php

class Agent extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $available_res = $this->model->availablelistTable();
        $fert_res = $this->model->fertilizerdeliveryListTable();
        $adv_res = $this->model->advancedeliveryListTable();

        $this->view->render3('Agent/zero_dashboard', $available_res, $fert_res, $adv_res);
    }

    function availableLandownerList()
    {
        $result = $this->model->availablelistTable();
        // //    print_r($result);
        $this->view->render('Agent/availableList', $result);
    }

    function updateTeaWeight()
    {
        $weight_data = [
            'date' => '',
            'lid' => '',
            'initial_weight' => '',
            'agent_id' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->weight_data['lid'] = trim($_POST['lid']);
            $this->weight_data['initial_weight'] = trim($_POST['weight']);
            $this->weight_data['agent_id'] = $_SESSION['user_id'];
            // print_r($_SESSION['user_id']);
            // print_r($this->weight_data);
            $this->model->updateWeight($this->weight_data);
            $result = $this->model->availablelistTable();
            
            //Pusher API
            $options = array(
                'cluster' => 'ap1',
                'useTLS' => true
            );
            $pusher = new Pusher\Pusher(
                'ef64da0120ca27fe19a3',
                'd5033393ff3b228540f7',
                '1290222',
                $options
            );

            $data['message'] = 'hello world';
            $pusher->trigger('my-channel', 'my-event', $data);
            // print_r($result);
            // $this->view->render('Agent/availableList', $result);
            //also add the set the tea availability of landowner to 0
        }
    }


    function sendEmergencyMessage()
    {
        $this->view->showPage('Agent/EmergencyMessage');
    }

    function viewPreviousUpdates()
    {
        $this->view->showPage('Agent/previousUpdates');
    }

    function viewTeaUpdates()
    {
        $this->view->showPage('Agent/previousTeaUpdates');
    }

    function ViewRequestUpdates()
    {
        $this->view->showPage('Agent/previousRequestUpdates');
    }

    function confirmDeliverables()
    {
        $result1 = $this->model->fertilizerdeliveryListTable();
        $result2 = $this->model->advancedeliveryListTable();
        // print_r($result);
        $this->view->render2('Agent/DeliveryList', $result1, $result2);
        // $this->view->showPage('Agent/DeliveryList');
    }

    function updateRequest()
    {
        $request_data = [
            'date' => '',
            'lid' => '',
            'rid' => '',
            'request_type' => '',
            'amount' => '',
            'agent_id' => ''
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->request_data['date'] = date("Y-m-d");
            $this->request_data['lid'] = trim($_POST['lid-popup']);
            $this->request_data['rid'] = trim($_POST['rid-popup']);
            $this->request_data['request_type'] = trim($_POST['rtype-popup']);
            $this->request_data['amount'] = trim($_POST['amount-popup']);
            $this->request_data['agent_id'] = $_SESSION['user_id'];

            if ($this->request_data['request_type'] == "Fertilizer") {
                $this->model->updateFertilizerRequest($this->request_data);
            } else if ($this->request_data['request_type'] == "Advance") {
                $this->model->updateAdvanceRequest($this->request_data);
            }
            $result1 = $this->model->fertilizerdeliveryListTable();
            $result2 = $this->model->advancedeliveryListTable();
            // print_r($result);
            $this->view->render2('Agent/DeliveryList', $result1, $result2);
            // $this->view->showPage('Agent/DeliveryList');

        }
    }

    function loadPopup()
    {
        $this->view->showPage('Agent/popup');
    }

    //manage profile
    function profile()
    {
        $this->view->render('user/profile/profile');
    }

    function editProfile()
    {
        include '../app/controllers/User.php';
        $user = new User();
        $user->loadModelUser('user');
        $user->editProfile();
    }

    function enterPassword()
    {
        $this->view->render('user/profile/enterPassword');
    }
}
