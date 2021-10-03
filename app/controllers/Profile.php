<?php

class Profile extends Controller{
    function __construct()
    {
        parent::__construct();
    }

    function index() {

        $this->view->showPage($_SESSION['user_type'].'/Profile');
    }

}

?>