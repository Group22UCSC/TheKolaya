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
        
        // $result = $this->model->availablelistTable_landowners();
        // // print_r($result);
        // $this->view->render('Manager/viewTeaQuality', $result);



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


    // public function emergency()
    // {
    //     $this->view->showPage('Manager/emergency');
    // }


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

    //  function manageRequests()
    // {
    //     $this->getNotificationCount(); //This for get Notification count
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         $this->model->manageRequests($_POST);
    //     } else {
    //         $request = $this->model->getRequests();
    //         $this->view->render('Supervisor/manageRequests', $request);
    //     }
    // }



        
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
            // print_r($this->msg_data);
            // $this->view->showPage('Manager/emergency');

            // $this->view->render('Manager/emergency', $result);
        }else{

              $data = [
                'message' => '',           
                'emp_id' => ''
            ];
           
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
                echo '<div class="manage-request-row tabel-header">
                        <div class="manage-request-cell">Previous Request Date</div>
                        <div class="manage-request-cell">Monthly Tea Amount(kg)</div>
                    </div>';
                for ($i = 0; $i < count($lastRequests); $i++) {
                    $monthNum  = $month - 1;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F'); // March
                    echo '<div class="manage-request-row">
                            <div class="manage-request-cell" data-title="Previous Request Date">' . $lastRequests[$i]['request_date'] . '</div>
                            <div class="manage-request-cell" data-title="Mounthly Tea Amount(kg)">' . $this->model->getMonthTeaWeight($month - $i, $_POST['landowner_id']). 'Kg for '. $monthName . '</div>
                        </div>';
                }
                echo '</div>';
            } else {
                echo '<div id="previous_details">';
                // echo '<div class="manage-request-row tabel-header">
                //         <div class="manage-request-cell">Previous Request Date</div>
                //         <div class="manage-request-cell">Monthly Tea Amount(kg)</div>
                //     </div>';
                for ($i = 0; $i < 2; $i++) {
                    $monthNum  = $month - 1;
                    $dateObj   = DateTime::createFromFormat('!m', $monthNum);
                    $monthName = $dateObj->format('F');
                    echo '<div class="manage-request-row">
                            <div class="manage-request-cell" data-title="Previous Request Date">' . '<b style="color: #4DD101;">No Previously requests for ' . $monthName .'</b>' . '</div>
                            <div class="manage-request-cell" data-title="Mounthly Tea Amount(kg)">' . $this->model->getMonthTeaWeight($month - $i, $_POST['landowner_id']). 'Kg for '. $monthName . '</div>
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
                $this->view->render('manager/teaQuality', $quality, $allStars);
            }
        }
    }

}
