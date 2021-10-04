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

          public function viewStock() {
            $this->view->showPage('Manager/viewStock');
        }

         public function viewProduct() {
            $this->view->showPage('Manager/viewProduct');
        }

         public function viewFertilizer() {
            $this->view->showPage('Manager/viewFertilizer');
        }

         public function viewFirewood() {
            $this->view->showPage('Manager/viewFirewood');
        }

        public function manager() {
            $this->view->showPage('Manager/Manager');
        }

        public function profile() {
        $this->view->showPage('manager/profile');
        }

        public function editProfile() {
        $this->view->showPage('manager/editProfile');
        }

    }
?>