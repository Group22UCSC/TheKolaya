<?php

class Manager extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->showPage('Manager/Manager');
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
        $result = $this->model->availablelistTable_landowners();
        // print_r($result);
        $this->view->render('Manager/viewTeaQuality', $result);
    }

    public function viewTeaQuality1()
    {
        $this->view->showPage('Manager/viewTeaQuality1');
    }


    public function viewPayments()
    {
        // $this->view->showPage('Manager/viewPayments');
        $result = $this->model->availablelistTable_landowners();
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
        $this->view->showPage('Manager/viewProduct');
    }

    public function viewFertilizer()
    {
        $this->view->showPage('Manager/viewFertilizer');
    }

    public function viewFirewood()
    {
        $this->view->showPage('Manager/viewFirewood');
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

}
