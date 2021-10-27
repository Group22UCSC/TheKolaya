<?php

class landowner extends Controller
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
        if (!empty($_POST)) {

            $result = $this->model->insertRequest();
            print_r($result);
        } else {
            $this->view->render('landowner/Make_Requests');
        }
    }

    function Update_Tea_Availability()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if($_POST['availability'] == 'on') {
                $data = [
                    'tea_availability' => 1,
                    'no_of_estimated_containers' => ''
                ];
            }
            if($_POST['containers']) {
                $data['no_of_estimated_containers'] = $_POST['containers'];
            }
            echo $_POST['containers'];
            $this->model->Update_Tea_Availability($data);
        }else {
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
        $this->view->showPage('landowner/Daily_Net_Weight');
    }

    function Monthly_Tea_Price()
    {
        $this->view->showPage('landowner/Monthly_Tea_Price');
    }

    //test
    public function Test()
    {
        if (!empty($_POST)) {

            $result = $this->model->insertRequest();
            print_r($result);
        } else {
            $this->view->render('landowner/Test');
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
}
