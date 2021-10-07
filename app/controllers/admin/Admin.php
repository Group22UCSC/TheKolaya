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

         public function DLandowner_createAccount() {
            $this->view->showPage('Admin/DLandowner_createAccount');
        }

         public function DLandowner_create_Temp_Account() {
            $this->view->showPage('Admin/DLandowner_create_Temp_Account');
        }

          public function InDLandowner_createAccount() {
            $this->view->showPage('Admin/InDLandowner_createAccount');
        }

          public function InDLandowner_create_Temp_Account() {
            $this->view->showPage('Admin/InDLandowner_create_Temp_Account');
        }


         public function createAccount1() {
            $this->view->showPage('Admin/createAccount1');
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
     
         public function create_agent() {
            $this->view->showPage('Admin/create_agent');
        }
        
          public function create_agentTemp() {
            $this->view->showPage('Admin/create_agentTemp');
        }

         public function create_accountant() {
            $this->view->showPage('Admin/create_accountant');
        }

          public function create_accountantTemp() {
            $this->view->showPage('Admin/create_accountantTemp');
        }

         public function create_Pmanager() {
            $this->view->showPage('Admin/create_Pmanager');
        }

         public function create_PmanagerTemp() {
            $this->view->showPage('Admin/create_PmanagerTemp');
        }
    }

?>
