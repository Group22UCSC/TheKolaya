<?php

    class Admin extends Controller {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->showPage('Admin/Admin');
        }

        public function createAccountSelect() {
            $this->view->showPage('Admin/createAccountSelect');
        }

         public function viewAccount() {
            $this->view->showPage('Admin/viewAccount');
        }

         public function viewAccount1() {
            $this->view->showPage('Admin/viewAccount1');
        }

         public function updateAccount() {
            $this->view->showPage('Admin/updateAccount');
        }

         public function updateAccount1() {
            $this->view->showPage('Admin/updateAccount1');
        }

        public function deleteAccount() {
            $this->view->showPage('Admin/deleteAccount');
        }

          public function deleteAccount1() {
            $this->view->showPage('Admin/deleteAccount1');
        }

        public function admin() {
            $this->view->showPage('Admin/Admin');
        }

        public function setTeaPrice() {
            $this->view->showPage('Admin/setteaprice');
        }

        public function profile() {
        $this->view->showPage('admin/profile');
        }

        public function editProfile() {
        $this->view->showPage('admin/editProfile');
        }

        //Create Accounts
        public function agent_land_account() {
            $this->view->render('admin/fullAccount/agent_land_account');
        }

        public function create_account() {
            $this->view->render('admin/fullAccount/create_account');
        }

        public function agent_land_tempaAccount() {
            $this->view->render('admin/tempAccount/agent_land_tempaAccount');
        }

        public function create_tempAccount() {
            $this->view->render('admin/tempAccount/create_tempAccount');
        }
     
    }

?>
