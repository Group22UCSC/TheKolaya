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
        $this->view->showPage('landowner/Update_Tea_Availability');
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

    public function profile()
    {
        $this->view->showPage('landowner/profile');
    }

    public function editProfile()
    {
        $this->view->showPage('landowner/editProfile');
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
}
