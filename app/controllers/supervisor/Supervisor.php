<?php

class Supervisor extends Controller
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
        $teaCollection = $this->model->getTeaCollection();
        $todayRequests = $this->model->getTodayFertilizerRequest();

        $this->getNotificationCount(); //This for get Notification count
        $this->view->render('Supervisor/Supervisor', $stock, $teaCollection, $todayRequests);
    }

    function getAgentTeaCollection()
    {
        $teaCollection = $this->model->getTeaCollection();
        if (!empty($teaCollection)) {
            $countData = count($teaCollection) - 1;
            echo '<div class="row">
                    <div class="cell" data-title="Landowener_id">' . $teaCollection[$countData]['lid'] . '</div>
                    <div class="cell" data-title="Tea_weight">' . $teaCollection[$countData]['initial_weight_agent'] . '</div>
                    <div class="cell" data-title="Agent_id">' . $teaCollection[$countData]['agent_id'] . '</div>
                </div>';
        }
    }

    function getLandownerRequest()
    {
        $todayRequests = $this->model->getTodayFertilizerRequest();
        if (!empty($todayRequests)) {
            $countData = count($todayRequests) - 1;
            echo '<div class="row">
                    <div class="cell" data-title="Landowener ID">' . $todayRequests[$countData]['user_id'] . '</div>
                    <div class="cell" data-title="Name">' . $todayRequests[$countData]['name'] . '</div>
                    <div class="cell" data-title="Request Amount">' . $todayRequests[$countData]['amount'] . '</div>
                </div>';
        }
    }

    function landownerDetails()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $month = date('m') - 1;
            $lastRequests = $this->model->getLastRequestDate($_POST['landowner_id']);
            $teaQuality = $this->model->getTeaQuality($_POST['landowner_id']);
            if (!empty($lastRequests)) {

                echo '<div id="previous_details">';
                echo '<div class="row tabel-header">
                        <div class="cell">Previous Request Date</div>
                        <div class="cell">Monthly Tea Amount(kg)</div>
                    </div>';
                for ($i = 0; $i < count($lastRequests); $i++) {
                    echo '<div class="row">
                            <div class="cell" data-title="Previous Request Date">' . $lastRequests[$i]['request_date'] . '</div>
                            <div class="cell" data-title="Mounthly Tea Amount(kg)">' . $this->model->getMonthTeaWeight($month - $i, $_POST['landowner_id']) . '</div>
                        </div>';
                }
                echo '</div>';
            } else {
                echo '<div id="previous_details">';
                echo '<div class="row tabel-header">
                        <div class="cell">Previous Request Date</div>
                        <div class="cell">Monthly Tea Amount(kg)</div>
                    </div>';
                for ($i = 0; $i < 2; $i++) {
                    echo '<div class="row">
                            <div class="cell" data-title="Previous Request Date">' . '<b style="color: #4DD101;">No Previously requests</b>' . '</div>
                            <div class="cell" data-title="Mounthly Tea Amount(kg)">' . $this->model->getMonthTeaWeight($month - $i, $_POST['landowner_id']) . '</div>
                        </div>';
                }
                echo '</div>';
            }

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
                $this->view->render('supervisor/teaQuality', $quality, $allStars);
            }
        }
    }

    function updateTeaMeasure()
    {
        $this->getNotificationCount(); //This for get Notification count
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'landowner_id' => $_POST['landowner_id'],
                'weight' => $_POST['weight'],
                'water' => $_POST['water'],
                'mature_leaves' => $_POST['mature_leaves'],
                'container' => $_POST['container'],

                'net_weight' => '',
                'rate' => $_POST['rate']
            ];
            $reduction = ($data['weight'] * ($data['water'] + $data['container'] + $data['mature_leaves'])) / 100;
            $data['net_weight'] = $data['weight'] - $reduction;
            $data['rate'] = ($data['rate']) * 20;

            if ($this->model->updateTeaMeasure($data))
                $updateTable = $this->model->getUpdateTeaMeasureById($data['landowner_id']);

            if (!empty($updateTable)) {
                $countData = count($updateTable) - 1;
                if ($updateTable[$countData]['quality'] <= 20) {
                    $teaQuality = 'Too Bad';
                } else if ($updateTable[$countData]['quality'] > 20 && $updateTable[$countData]['quality'] <= 40) {
                    $teaQuality = 'Bad';
                } else if ($updateTable[$countData]['quality'] > 40 && $updateTable[$countData]['quality'] <= 60) {
                    $teaQuality = 'Average';
                } else if ($updateTable[$countData]['quality'] > 60 && $updateTable[$countData]['quality'] <= 80) {
                    $teaQuality = 'Good';
                } else if ($updateTable[$countData]['quality'] > 80 && $updateTable[$countData]['quality'] <= 100) {
                    $teaQuality = 'Excellent';
                }
                $reductions = $updateTable[$countData]['water_precentage'] + $updateTable[$countData]['container_precentage'] + $updateTable[$countData]['matured_precentage'];
                echo '<div class="row">
                          <div class="cell" data-title="Landowener Id">' . $updateTable[$countData]['lid'] . '</div>
                          <div class="cell" data-title="Reductions(kg)">' . $reductions . '</div>
                          <div class="cell" data-title="Net-Weight(kg)">' . $updateTable[$countData]['net_weight'] . '</div>
                          <div class="cell" data-title="Tea Quality">' . $teaQuality . '</div>
                        </div>';
            }
        } else {
            $updateTable = $this->model->getUpdateTeaMeasure();
            $this->view->render('Supervisor/updateTeaMeasure', $updateTable);
        }
    }

    function manageRequests()
    {
        $this->getNotificationCount(); //This for get Notification count
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->manageRequests($_POST);
        } else {
            $request = $this->model->getRequests();
            $this->view->render('Supervisor/manageRequests', $request);
        }
    }

    function manageFertilizer()
    {
        $this->getNotificationCount(); //This for get Notification count
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'stock_type' => $_POST['stock_type'],
                'type' => $_POST['type'],
                'price_per_unit' => '',
                'amount' => trim($_POST['amount'])
            ];
            if ($_POST['stock_type'] == 'in_stock') {
                $data['price_per_unit'] = trim($_POST['price_per_unit']);
            }
            
            $this->model->manageStock($data);
            $stock = $this->model->getStock();
            $_SESSION['fertilizer_stock'] = $stock[0]['full_stock'];
            if($_SESSION['fertilizer_stock'] <= 500) {
                $this->model->stockGetLimit("Fertilzer Stock");
            }
        } else {
            $this->view->render('Supervisor/manageFertilizer');
        }
    }

    function manageFirewood()
    {
        $this->getNotificationCount(); //This for get Notification count
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $data = [
                'stock_type' => $_POST['stock_type'],
                'type' => $_POST['type'],
                'price_per_unit' => '',
                'amount' => trim($_POST['amount'])
            ];
            if ($_POST['stock_type'] == 'in_stock') {
                $data['price_per_unit'] = trim($_POST['price_per_unit']);
            }

            $this->model->manageStock($data);
            $stock = $this->model->getStock();
            $_SESSION['firewood_stock'] = $stock[1]['full_stock'];
            if($_SESSION['firewood_stock'] <= 500) {
                $this->model->stockGetLimit("Firewood Stock");
            }
        } else {
            $this->view->render('Supervisor/manageFirewood');
        }
    }

    function fertilizerInStock()
    {
        $this->getNotificationCount(); //This for get Notification count
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'fertilizer',
        ];
        $_SESSION['search'] = 0;
        if (isset($_GET['search_btn'])) {
            $_SESSION['searchDate'] = trim($_GET['date']);
            $_SESSION['search'] = 1;
        }
        $instock = $this->model->stock($data);
        $this->view->render('Supervisor/fertilizerInStock', $instock);
    }

    function firewoodInStock()
    {
        $this->getNotificationCount(); //This for get Notification count
        $data = [
            'stock_type' => 'in_stock',
            'type' => 'firewood',
            'date' => ''
        ];
        $instock = $this->model->stock($data);
        $this->view->render('Supervisor/firewoodInStock', $instock);
    }

    function fertilizerOutStock()
    {
        $this->view->render('Supervisor/fertilizerOutstock');
    }

    function firewoodOutStock()
    {
        $this->getNotificationCount(); //This for get Notification count
        $data = [
            'stock_type' => 'out_stock',
            'type' => 'firewood',
        ];
        $outstock = $this->model->stock($data);
        $this->view->render('Supervisor/firewoodOutStock', $outstock);
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

    //Get Notification
    function setNotification($notification)
    {
        if (!empty($notification)) {
            echo '<div id="all_notifications">';
            for ($i = 0; $i < count($notification); $i++) {
                switch($notification[$i]['notification_type']) {
                    case 'warning':
                        $imgPath = URL.'/vendors/images/notifications/warning.jpg';
                        break;
                    case 'request':
                        $imgPath = URL.'/vendors/images/notifications/request.jpg';
                        break;
                }
                $dateTime = $notification[$i]['receive_datetime'];
                echo 
                    '<div class="sec new '. $notification[$i]['notification_type'] .'" id="n-'. $notification[$i]['notification_id'] .'">
                        <div class = "profCont">
                            <img class = "notification_profile" src = "'. $imgPath .'">
                        </div>
                        <div class="txt '. $notification[$i]['notification_type'] .'">'. $notification[$i]['message'] .'</div>
                        <div class="txt sub">'.$dateTime.'</div>
                    </div>';                    
            }
            echo '</div>';
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
            if ($_POST['notification_type'] == 'half') {
                $notification = $this->model->getNotReadedNotification();
                $this->setNotification($notification);
            } else if ($_POST['notification_type'] == 'all') {
                $notification = $this->model->getAllNotification();
                $this->setNotification($notification);
            } else {
                $notification = $this->model->getNotSeenNotification();
                $notification_count = count($notification);
                echo $notification_count;
            }
        }
    }
}
