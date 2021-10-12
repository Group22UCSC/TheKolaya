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
            // if ($result == true) {
            //     // if there is a result which mean query is executed - > success pop up
            //     echo "successfuly added";
            // } else {
            //     // un successfull pop up 
            //     // first check using a alert ()
            //     echo "failed to add";
            // }
        } else {
            //$result = $this->model->teaPriceTable();
            // $this->view->render('landowner/Make_Requests', $result);
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
}
