<?php

    class Admin extends Controller {
        function __construct()
        {
            parent::__construct();
        }

        function index() {
            $this->view->showPage('Admin/Admin');
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

        //update form

         public function updateAccount1() {
            // $this->view->showPage('Admin/updateAccount1');

              if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'name' => trim($_POST['name']),
                    'user_id' => trim($_POST['user_id']),
                    'user_type' => trim($_POST['user_type']),
                    'address' => trim($_POST['address']),
                    'contact_number' => trim($_POST['contact_number']),
                    // 'route_number' => trim($_POST['route_number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),


                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];

                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "confirmation not matching";
                }
                if($this->model->searchUserContact($data['contact_number'])) {
                    $data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($data['contact_number_err']) && empty($data['confirm_password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $this->model->userRegistration11($data);
                    $this->view->render('admin/updateAccount1', $data);
                }else {
                    $this->view->render('admin/updateAccount1', $data);
                }
            }else{
                $data = [
                    'name' => '',
                    'user_id' => '',
                    'user_type' => '',
                    'address' => '',
                    'contact_number' => '',
                    // 'route_number' => '',
                    'password' => '',
                    'confirm_password' => '',


                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view->render('admin/updateAccount1', $data);
            }
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

        public function createAccountSelect() {
            $this->view->showPage('Admin/createAccountSelect');
        }

        public function agent_land_account() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'name' => trim($_POST['name']),
                    'user_id' => trim($_POST['user_id']),
                    'user_type' => trim($_POST['user_type']),
                    'address' => trim($_POST['address']),
                    'contact_number' => trim($_POST['contact_number']),
                    'route_number' => trim($_POST['route_number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),


                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];

                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "confirmation not matching";
                }
                if($this->model->searchUserContact($data['contact_number'])) {
                    $data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($data['contact_number_err']) && empty($data['confirm_password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $this->model->userRegistration($data);
                    $this->view->render('admin/fullAccount/agent_land_account', $data);
                }else {
                    $this->view->render('admin/fullAccount/agent_land_account', $data);
                }
            }else{
                $data = [
                    'name' => '',
                    'user_id' => '',
                    'user_type' => '',
                    'address' => '',
                    'contact_number' => '',
                    'route_number' => '',
                    'password' => '',
                    'confirm_password' => '',


                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view->render('admin/fullAccount/agent_land_account', $data);
            }
        }

        public function create_account() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'name' => trim($_POST['name']),
                    'user_id' => trim($_POST['user_id']),
                    'user_type' => trim($_POST['user_type']),
                    'address' => trim($_POST['address']),
                    'contact_number' => trim($_POST['contact_number']),
                    'route_number' => trim($_POST['route_number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),


                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];

                if($data['password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "confirmation not matching";
                }
                if($this->model->searchUserContact($data['contact_number'])) {
                    $data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($data['contact_number_err']) && empty($data['confirm_password_err'])) {
                    $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                    $this->model->userRegistration($data);
                    $this->view->render('admin/fullAccount/create_account', $data);
                }else {
                    $this->view->render('admin/fullAccount/create_account', $data);
                }
            }else{
                $data = [
                    'name' => '',
                    'user_id' => '',
                    'user_type' => '',
                    'address' => '',
                    'contact_number' => '',
                    'route_number' => '',
                    'password' => '',
                    'confirm_password' => '',


                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view->render('admin/fullAccount/create_account', $data);
            }
        }

        public function agent_land_tempaAccount() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'user_id' => trim($_POST['user_id']),
                    'user_type' => trim($_POST['user_type']),
                    'contact_number' => trim($_POST['contact_number']),
                    'route_number' => trim($_POST['route_number']),
                ];

                if($this->model->searchUserContact($data['contact_number'])) {
                    $data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($data['contact_number_err'])) {
                    $this->model->userTempRegistration($data);
                    $this->view->render('admin/tempAccount/agent_land_tempaAccount', $data);
                }else {
                    $this->view->render('admin/tempAccount/agent_land_tempaAccount', $data);
                }
            }else{
                $data = [
                    'user_id' => '',
                    'user_type' => '',
                    'contact_number' => '',
                    'route_number' => '',
                ];
                $this->view->render('admin/tempAccount/agent_land_tempaAccount', $data);
            }
        }

        public function create_tempAccount() {
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'user_id' => trim($_POST['user_id']),
                    'user_type' => trim($_POST['user_type']),
                    'contact_number' => trim($_POST['contact_number']),
                    'route_number' => trim($_POST['route_number']),
                ];

                if($this->model->searchUserContact($data['contact_number'])) {
                    $data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($data['contact_number_err'])) {
                    $this->model->userTempRegistration($data);
                    $this->view->render('admin/tempAccount/create_tempAccount', $data);
                }else {
                    $this->view->render('admin/tempAccount/create_tempAccount', $data);
                }
            }else{
                $data = [
                    'user_id' => '',
                    'user_type' => '',
                    'contact_number' => '',
                    'route_number' => '',
                ];
                $this->view->render('admin/tempAccount/create_tempAccount', $data);
            }
        }
     
    }

?>
