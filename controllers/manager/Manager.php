<?php

    class Manager extends Controller {
        function __construct() {
            parent::__construct();
        }

        function index() {
            $this->view->showPage('Manager/Manager');
        }

        public function viewAccount() {
            $this->view->showPage('Manager/viewAccount');
        }

        public function viewAccount1() {
            $this->view->showPage('Manager/viewAccount1');
        }

        public function viewTeaQuality() {
            $this->view->showPage('Manager/viewTeaQuality');
        }
    }
?>