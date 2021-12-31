<?php

class Manager extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $stock = $this->model->getStock();
        $_SESSION['fertilizer_stock'] = $stock[0]['full_stock'];
        $_SESSION['firewood_stock'] = $stock[1]['full_stock'];
        // $teaCollection = $this->model->getTeaCollection();
        // $todayRequests = $this->model->getTodayFertilizerRequest();

        // $this->getNotificationCount(); //This for get Notification count

        $stock2 = $this->model->getStock2();
        $_SESSION['Green_Tea_stock'] = $stock2[0]['stock'];
        $_SESSION['White_Tea_stock'] = $stock2[1]['stock'];
        $_SESSION['B-100_Black_Tea_stock'] = $stock2[2]['stock'];
        $_SESSION['N_Black_Tea_stock'] = $stock2[3]['stock'];
        $_SESSION['Early_Black_Tea_stock'] = $stock2[4]['stock'];
        $_SESSION['Masala_chai_stock'] = $stock2[5]['stock'];
        $_SESSION['Matcha_Tea_stock'] = $stock2[6]['stock'];
        $_SESSION['Oolang_Tea_stock'] = $stock2[7]['stock'];
        $_SESSION['Sencha_Tea_stock'] = $stock2[8]['stock'];
        



        $this->view->render('Manager/Manager', $stock, $stock2);
         // $this->view->render('Manager/Manager', $stock, $teaCollection, $todayRequests);
    }

    public function viewAccount()
    {
        // $this->view->showPage('Manager/viewAccount');
        $result = $this->model->availablelistTable();
        // print_r($result);
        $this->view->render('Manager/viewAccount', $result);
    }



    public function viewTeaQuality()
    {
      
         $this->model->getNotificationCount(); //This for get Notification count
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->model->manageRequests1($_POST);
        } else {
            $request = $this->model->getRequests1();
            $this->view->render('Manager/viewTeaQuality', $request);
        }
    }

    public function viewTeaQuality1()
    {
        $this->view->showPage('Manager/viewTeaQuality1');
    }


    public function viewPayments()
    {
        // $this->view->showPage('Manager/viewPayments');
        $result = $this->model->view_payments_table();
        // print_r($result);
        $this->view->render('Manager/viewPayments', $result);
    }


    public function viewPayments1()
    {
        $this->view->showPage('Manager/viewPayments1');
    }


    public function viewStock()
    {
        $this->view->showPage('Manager/viewStock');
    }

    public function viewProduct()
    {
        $result=$this->model->viewProduct_instock();
        $this->view->render('Manager/viewProduct', $result);
    }

     public function instock()
    {
        $result = $this->model->view_instock();
        // print_r($result);
        $this->view->render('Manager/in_stock', $result);
    }


    public function outstock()
    {
        $result = $this->model->view_outstock();
        $this->view->render('Manager/outstock',$result);
    }

    public function manager()
    {
        $this->view->showPage('Manager/Manager');
    }

    //Manage Profile
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

   
     //send emergency message to manager
    function emergency(){
   
     
         
         $result = $this->model->emergencyTable();
        $this->view->render('Manager/emergency', $result);
       
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
            'message' => '',           
            'emp_id' => ''
        ]; 
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->data['message'] = trim($_POST['message']);
            $this->data['emp_id'] =trim($_POST['emp_id']);
            $result = $this->model->storeEmergencyMessage($this->data);
            
        }else{

              $data = [
                'message' => '',           
                'emp_id' => ''
            ];
           
        }

    }


// view buyer

 public function viewbuyer()
    {
        $result = $this->model->buyerTable();
        $this->view->render('Manager/viewbuyer', $result);
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
                echo
                '<div class="sec new ' . $notification[$i]['notification_type'] . ' ' . $notificationStatus . '" id="n-' . $notification[$i]['notification_id'] . '">
                        <div class = "profCont">
                            <img class = "notification_profile" src = "' . $imgPath . '">
                        </div>
                        <div class="txt ' . $notification[$i]['notification_type'] . '">' . $notification[$i]['message'] . '</div>
                        <div class="txt sub">' . $dateTime . '</div>
                    </div>';
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
