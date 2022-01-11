<?php

class Agent extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
     {
        $this->getNotificationCount(); //This for get Notification count
        $agent_id = $_SESSION['user_id'];
        $result=$this->model->checkAvailability($agent_id);
      
        $isreject =$this->model->isReject();
         // take the available landowners count to collect tea and to deliver requests to be displayed on the dashboard 
        if($result[0]['availability'] == 1){           
            if($isreject[0]['is_rejected'] == -1 || $isreject[0]['is_rejected']  == 1){                          
                $available_res = $this->model->availablelistTable();
                $fert_res = $this->model->fertilizerdeliveryListTable();
                $adv_res = $this->model->advancedeliveryListTable();
                $this->model->setAssignDefault();                         
            }
            else if ($isreject[0]['is_rejected']  == 0){               
                $agent_of_assign_route =  $this->model->getAssignedRouteAgent();                
                $agent_availability_of_assign_route = $this->model->checkAvailability($agent_of_assign_route[0]['emp_id']);
                
                if($agent_availability_of_assign_route[0]['availability'] == 0){                                       
                    $available_res = $this->model->assignAvailableListTable();
                    $fert_res = $this->model->assignFertilizerdeliveryListTable();
                    $adv_res = $this->model->assignAdvancedeliveryListTable(); 
                }
                else if($agent_availability_of_assign_route[0]['availability'] == 1){                                        
                    $available_res = $this->model->availablelistTable();
                    $fert_res = $this->model->fertilizerdeliveryListTable();
                    $adv_res = $this->model->advancedeliveryListTable();
                    $this->model->setAssignDefault();  
                }                                       
            }  
            $this->view->render3('agent/zero_dashboard', $available_res, $fert_res, $adv_res);          
        }

        else if($result[0]['availability'] == 0){
            // print_r("agent unavailable");
            // $this->view->showPage('agent/availabilityOn');
            $this->viewEmergencyMessage();
        }
       
    }

    //make the agent available after toggle 
    function makeAvailable(){
        $this->model->availableAgent();
        $this->index();
    }

    function availableLandownerList()
    {                     
        $this->getNotificationCount(); //This for get Notification count
        $agent_id = $_SESSION['user_id'];
        $result=$this->model->checkAvailability($agent_id);
        // print_r($result);
        $isreject =$this->model->isReject();
         // take the available landowners count to collect tea to be displayed      
            if($isreject[0]['is_rejected'] == -1 || $isreject[0]['is_rejected']  == 1){                
                $available_res = $this->model->availablelistTable();               
                $this->model->setAssignDefault();                         
            }
            else if ($isreject[0]['is_rejected'] == 0){
                $agent_of_assign_route =  $this->model->getAssignedRouteAgent();
                $agent_availability_of_assign_route = $this->model->checkAvailability($agent_of_assign_route[0]['emp_id']);
                if($agent_availability_of_assign_route[0]['availability'] == 0){
                    $available_res = $this->model->assignAvailableListTable();                    
                }
                else if($agent_availability_of_assign_route[0]['availability'] == 1){
                    $available_res = $this->model->availablelistTable();                   
                    $this->model->setAssignDefault();  
                }                                       
            }  
            $this->view->render('Agent/availableList', $available_res);                
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
            $pusher->trigger('my-channel', 'today_collection_table', $data);
            // print_r($result);
            // $this->view->render('Agent/availableList', $result);
            
        }
    }

    //load emergency message page
    function viewEmergencyMessage()
    {
        $this->getNotificationCount(); //This for get Notification count
        $this->view->showPage('Agent/EmergencyMessage');
    }

    //send emergency message to manager
    function sendEmergencyMessage(){
        $this->getNotificationCount(); //This for get Notification count
        $msg_data = [
            'message' => '',           
            'agent_id' => ''
        ]; 
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->msg_data['message'] = trim($_POST['message']);
            $this->msg_data['agent_id'] = $_SESSION['user_id'];
            $this->model->storeEmergencyMessage($this->msg_data);
            print_r($this->msg_data);
            $this->view->showPage('Agent/EmergencyMessage');
    }
}

    function viewPreviousUpdates()
    {
        $this->getNotificationCount(); //This for get Notification count
        $this->view->showPage('Agent/previousUpdates');
    }

    function viewTeaUpdates()
    {
        $this->getNotificationCount(); //This for get Notification count
        $this->view->showPage('Agent/previousTeaUpdates');
    }

    function ViewRequestUpdates()
    {
        $this->getNotificationCount(); //This for get Notification count
        $this->view->showPage('Agent/previousRequestUpdates');
    }

    function confirmDeliverables()
    {               
        $this->getNotificationCount(); //This for get Notification count
        $agent_id = $_SESSION['user_id'];
        $result=$this->model->checkAvailability($agent_id);
        // print_r($result);
        $isreject =$this->model->isReject();
         // take the  landowners count to deliver requests to be displayed        
            if($isreject[0]['is_rejected']  == -1 || $isreject[0]['is_rejected']  == 1){                                
                $fert_res = $this->model->fertilizerdeliveryListTable();
                $adv_res = $this->model->advancedeliveryListTable();
                $this->model->setAssignDefault();                         
            }
            else if ($isreject[0]['is_rejected']  == 0){
                $agent_of_assign_route =  $this->model->getAssignedRouteAgent();
                $agent_availability_of_assign_route = $this->model->checkAvailability($agent_of_assign_route[0]['emp_id']);
                if($agent_availability_of_assign_route[0]['availability'] == 0){                    
                    $fert_res = $this->model->assignFertilizerdeliveryListTable();
                    $adv_res = $this->model->assignAdvancedeliveryListTable(); 
                }
                else if($agent_availability_of_assign_route[0]['availability'] == 1){                    
                    $fert_res = $this->model->fertilizerdeliveryListTable();
                    $adv_res = $this->model->advancedeliveryListTable();
                    $this->model->setAssignDefault();  
                }                                       
            }  
            $this->view->render2('Agent/DeliveryList', $fert_res, $adv_res);
    }

    function updateRequest()
    {
        $this->getNotificationCount(); //This for get Notification count
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
            $this->request_data['lid'] = trim($_POST['lid']);
            $this->request_data['rid'] = trim($_POST['rid']);
            $this->request_data['request_type'] = trim($_POST['rtype']);
            $this->request_data['amount'] = trim($_POST['amount']);
            $this->request_data['agent_id'] = $_SESSION['user_id'];

            if ($this->request_data['request_type'] == "Fertilizer") {
                $this->model->updateFertilizerRequest($this->request_data);
            } else if ($this->request_data['request_type'] == "Advance") {
                $this->model->updateAdvanceRequest($this->request_data);
            }
            $result1 = $this->model->fertilizerdeliveryListTable();
            $result2 = $this->model->advancedeliveryListTable();
             print_r($this->request_data);
            $this->view->render2('Agent/DeliveryList', $result1, $result2);
            // $this->view->showPage('Agent/DeliveryList');

        }
    }

    function searchPreviousTeaUpdates(){
        $this->getNotificationCount(); //This for get Notification count
        $pre_tea_data = [
            'date' => '',
            'lid' => ''            
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->pre_tea_data['date'] = trim($_POST['searchdate']); 
            $this->pre_tea_data['lid'] = trim($_POST['searchlid']);   
            
           $result= $this->model->searchTeaUpdates($this->pre_tea_data);
           $this->view->render('Agent/preTeaUpdatesResults', $result);
            // print_r($result);
    }
    }

    function searchPreviousRequestUpdates(){
        $this->getNotificationCount(); //This for get Notification count
        $pre_request_data = [
            'date' => '',
            'lid' => '' ,
            'rtype' =>''
        ];

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->pre_request_data['date'] = trim($_POST['searchdate']); 
            $this->pre_request_data['lid'] = trim($_POST['searchlid']);   
            $this->pre_request_data['rtype'] = trim($_POST['searchtype']);   

            if ($this->pre_request_data['rtype'] == "Fertilizer") {
                $result= $this->model->searchFertilizerUpdates($this->pre_request_data);
                $this->view->render('Agent/preFertilizerRequestsResults', $result);
                //print_r($result);
            } else if ($this->pre_request_data['rtype'] == "Advance") {
                $result= $this->model->searchAdvanceUpdates($this->pre_request_data);
                $this->view->render('Agent/preAdvanceRequestsResults', $result);
               // print_r($result);
            }
          
            
    }
    }

    function loadPopup()
    {
        $this->getNotificationCount(); //This for get Notification count
        $this->view->showPage('Agent/popup');
    }

    //Check the route assign is rejected
    function isRejected() {
        $notificationIsAccepted = $this->model->isNotificationRejected($_POST['notification_id']);
        $popup = [
            'is_accepted' => $notificationIsAccepted[0][0]
        ];
        echo json_encode($popup);
    }

    //Confirm the route Assign
    function confirmRouteAssign() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->confirmRouteAssign($_POST);
        }

    }

    //manage profile
    function profile()
    {
        $this->getNotificationCount(); //This for get Notification count
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
        $this->getNotificationCount(); //This for get Notification count
        $this->view->render('user/profile/enterPassword');
    }

    //Get Notification
    function setNotification($notification)
    {
        if (!empty($notification)) {
            echo '<div id="all_notifications">';
            for ($i = 0; $i < count($notification); $i++) {
                switch ($notification[$i]['notification_type']) {
                    case 'warning':
                        $imgPath = URL . '/vendors/images/notifications/warning.jpg';
                        break;
                    case 'request':
                        $imgPath = URL . '/vendors/images/notifications/request.jpg';
                        break;
                    case 'emergency':
                        $imgPath = URL . '/vendors/images/notifications/emergency.jpg';
                        break;
                }

                switch ($notification[$i]['read_unread']) {
                    case 0:
                        $notificationStatus = "unread";
                        break;
                    case 1:
                        $notificationStatus = "read";
                        break;
                }
                $dateTime = $notification[$i]['receive_datetime'];
                if($notification[$i]['notification_type']=='emergency'){
                    ?><script>console.log("emergency");</script><?php
                    if($_SESSION['availability'] == 1){
                        echo
                        '<div class="sec new ' . $notification[$i]['notification_type'] . ' ' . $notificationStatus . '" id="n-' . $notification[$i]['notification_id'] . '">
                            <div class = "profCont">
                                <img class = "notification_profile" src = "' . $imgPath . '">
                            </div>
                            <div class="txt ' . $notification[$i]['notification_type'] . '">' . $notification[$i]['message'] . '</div>
                            <div class="txt sub">' . $dateTime . '</div>
                        </div>';
                    }
                   
                }
                else{
                    echo
                    '<div class="sec new ' . $notification[$i]['notification_type'] . ' ' . $notificationStatus . '" id="n-' . $notification[$i]['notification_id'] . '">
                        <div class = "profCont">
                            <img class = "notification_profile" src = "' . $imgPath . '">
                        </div>
                        <div class="txt ' . $notification[$i]['notification_type'] . '">' . $notification[$i]['message'] . '</div>
                        <div class="txt sub">' . $dateTime . '</div>
                    </div>';
                }
               
            }
            echo '</div>';
        } else {
            echo
            '<div id="all_notifications">
                <div class="nothing">
                    <i class="fas fa-child stick"></i>
                    <div class="cent">Looks Like your all caught up!</div>
                </div>
            </div>';
        }
    }

    public function getNotificationCount()
    {
        $notificationCount = $this->model->getNotificationCount($_GET);
        return $notificationCount;
    }

    function getNotification()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if (isset($_POST['notification_type'])) {
                $notification = $this->model->getNotification($_POST);
                $this->setNotification($notification);
            }
        }
    }
}
