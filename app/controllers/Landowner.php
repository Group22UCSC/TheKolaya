<?php

class Landowner extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->showPage('landowner/landowner');
    }

    function Make_Requests()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $this->model->insertRequest($_POST);

            // $this->view->render('landowner/Make_Requests');
            // print_r($result);
        } else {
            $this->view->render('landowner/Make_Requests');
        }
    }

    function Update_Tea_Availability()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            if ($_POST['availability'] == 'on') {
                $data = [
                    'tea_availability' => 1,
                    'no_of_estimated_containers' => ''
                ];
            }
            if ($_POST['containers']) {
                $data['no_of_estimated_containers'] = $_POST['containers'];
            }
            // echo $_POST['containers'];
            $this->model->Update_Tea_Availability($data);
        } else {
            $availability = $this->model->getAvailability();
            // print_r($availability);
            $this->view->render('landowner/Update_Tea_Availability', $availability);
        }
    }

    function Monthly_Income()
    {
        $this->view->showPage('landowner/Monthly_Income');
    }

    function Daily_Net_Weight()
    {
        if (!empty($_POST)) {


            $result = $this->model->searchDailyDetails();
            if ($result) {
                // print_r($result);
                $this->view->render('landowner/Daily_Net_Weight', $result);
            } else {
                $_POST['Error'] = "Search date not found";
                $result = $this->model->getLandonwerTable();
                $this->view->render('landowner/Daily_Net_Weight', $result);
                return false;
            }
        } else {
            $result = $this->model->getLandonwerTable();
            $this->view->render('landowner/Daily_Net_Weight', $result);
        }
    }

    function Monthly_Tea_Price()
    {
        $this->view->showPage('landowner/Monthly_Tea_Price');
    }

    //test
    public function Test()
    {
        if (!empty($_POST)) {


            $result = $this->model->searchDailyDetails();
            if ($result) {
                // print_r($result);
                $this->view->render('landowner/Test', $result);
            } else {
                $this->view->render('landowner/Test?', $result);
                return false;
            }
        } else {
            $result = $this->model->getLandonwerTable();
            $this->view->render('landowner/Test', $result);
        }
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

    //monthly tea price
    function getTeaPrice()
    {
        $result = $this->model->teaPriceTable();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }


    //dashbord cards

    function lastMonthIncomeAndAdvance()
    {
        $result = $this->model->lastMonthIncomeAndAdvance();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }

    //get tea qulity to dashboard
    function getTeaQulity()
    {
        $result = $this->model->getTeaQulity();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }

    //get fertilizer usage to the dash board
    function fertilizerUsage()
    {
        $result = $this->model->fertilizerUsage();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }

    //get fertilizer usage to the dash board
    function chartValuse()
    {
        $result = $this->model->chartValuse();
        $json_arr = json_encode($result);
        //print_r($json_arr);
        echo $json_arr;
    }
}
