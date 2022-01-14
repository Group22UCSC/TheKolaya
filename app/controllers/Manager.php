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




        $this->view->render('manager/manager', $stock, $stock2);
    }

    public function viewAccount()
    {

        $result = $this->model->availablelistTable();
        $this->view->render('manager/viewAccount', $result);
    }

    public function viewTeaQuality()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            // $_POST = filter_input_array(INPUT_POST, FIviewTeaSTRING);
            $teaQuality = $this->model->getTeaQuality($_POST['landowner_id']);
            if ($teaQuality) {
                $quality = [
                    '1_star' => 0,
                    '2_star' => 0,
                    '3_star' => 0,
                    '4_star' => 0,
                    '5_star' => 0,
                ];
                for ($i = 0; $i < count($teaQuality); $i++) {
                    // if($teaQuality[$i]['quality'] != '') {
                    //     echo $teaQuality[$i]['quality'];
                    // }
                    $tempQuality = $teaQuality[$i]['quality'] / 20;
                    switch ($tempQuality) {
                        case 1:
                            $quality['1_star'] += 1;
                            break;
                        case 2:
                            $quality['2_star'] += 1;
                            break;
                        case 3:
                            $quality['3_star'] += 1;
                            break;
                        case 4:
                            $quality['4_star'] += 1;
                            break;
                        case 5:
                            $quality['5_star'] += 1;
                            break;
                    }
                }
                // print_r($quality);
                $allStars = 0;
                for ($i = 1; $i <= 5; $i++)
                    $allStars += $quality[$i . '_star'];
                $this->view->render('manager/teaQuality', $quality, $allStars);
            }
        } else {
            $result = $this->model->teaQualityTable();
            $this->view->render('manager/viewTeaQuality', $result);
        }
        
    }



    public function viewPayments()
    {

        $result = $this->model->view_payments_table();
        $this->view->render('manager/viewPayments', $result);
    }


    public function viewStock()
    {
        $this->view->showPage('manager/viewStock');
    }

    public function viewProduct()
    {
        $result = $this->model->viewProduct_instock();
        $this->view->render('manager/viewProduct', $result);
    }

    public function instock()
    {
        $result = $this->model->view_instock();
        // print_r($result);
        $this->view->render('manager/in_stock', $result);
    }


    public function outstock()
    {
        $result = $this->model->view_outstock();
        $this->view->render('manager/outstock', $result);
    }

    public function manager()
    {
        $this->view->showPage('manager/manager');
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


    //send emergency message to agent
    function emergency()
    {

        // $result = $this->model->emergencyTable();
        $this->view->render('manager/emergency');

        if ($_SERVER['REQUEST_METHOD'] == 'POST') {

            $data = [
                // 'message' => '',
                'user_id' => '',
                'route_number' => ''
            ];
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $this->data['route_number'] = trim($_POST['route_number']);
            $this->data['user_id'] = $_SESSION['user_id'];
            $result = $this->model->storeEmergencyMessage($this->data);
        } else {

            $data = [
                // 'message' => '',
                'route_number' => '',
            ];
        }
    }


    // view buyer

    public function viewbuyer()
    {
        $result = $this->model->buyerTable();
        $this->view->render('manager/viewbuyer', $result);
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
