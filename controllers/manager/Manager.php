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

         public function viewTeaQuality1() {
            $this->view->showPage('Manager/viewTeaQuality1');
        }


         public function viewPayments() {
            $this->view->showPage('Manager/viewPayments');
        }


         public function viewPayments1() {
            $this->view->showPage('Manager/viewPayments1');
        }
    }
?>