<?php

    class Admin extends Controller {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->showPage('Admin/Admin');
        }

        public function createAccount() {
            $this->view->showPage('Admin/createAccount');
        }
    }

?>