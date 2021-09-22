<?php

    class Admin extends Controller {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            echo "hello";
            $this->view->showPage('Admin/Admin');
        }

        public function createAccount() {
            echo "hello2";
            $this->view->showPage('Admin/createAccount');
        }
    }

?>