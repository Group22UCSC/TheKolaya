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

//////////////////////////////////update form///////////////////////////////////////////////////////////////////////////////////
         public function updateAccount1() {
            // $this->view->showPage('Admin/updateAccount1');
                $data = $this->model->checkTable();
              if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user_data = [
                    'name' => trim($_POST['name']),
                    'reg_id' => trim($_POST['user_id']),
                    'reg_type' => trim($_POST['user_type']),
                    'address' => trim($_POST['address']),
                    'mobile_number' => trim($_POST['contact_number']),
                    // 'route_number' => trim($_POST['route_number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

               
                    'user_id_err' => '',
                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];
                
                
                if($user_data['password'] != $user_data['confirm_password']) {
                    $user_data['confirm_password_err'] = "confirmation not matching";
                }
                if($this->model->searchUserContact($user_data['mobile_number'])) {
                    $user_data['contact_number_err'] = "This mobile number is already Taken";
                }

                if($this->model->searchUserId($user_data['reg_id'])) {
                    $user_data['user_id_err'] = "This ID is already Taken";
                }


                if(empty($user_data['contact_number_err']) && empty($user_data['confirm_password_err'])) {
                    $user_data['password'] = password_hash($user_data['password'], PASSWORD_DEFAULT);
                    $this->model->userRegistration11($user_data);
                    $this->view->render('admin/updateAccount1', $data, $user_data);
                }else {
                    $this->view->render('admin/updateAccount1', $data, $user_data);
                }
            }else{
                $user_data = [
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
                 $user_data = $this->model->checkTable();
                $this->view->render('admin/updateAccount1', $data, $user_data);
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
        
//111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
        public function agent_land_account() {
            $data = $this->model->checkTable();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user_data = [
                    'name' => trim($_POST['name']),
                    'reg_id' => trim($_POST['user_id']),
                    'reg_type' => trim($_POST['user_type']),
                    'address' => trim($_POST['address']),
                    'mobile_number' => trim($_POST['contact_number']),
                    'route_number' => trim($_POST['route_number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),


                    'user_id_err' => '',
                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];

                if($user_data['password'] != $user_data['confirm_password']) {
                    $user_data['confirm_password_err'] = "confirmation not matching";
                }
                if($this->model->searchUserContact($user_data['mobile_number'])) {
                    $user_data['contact_number_err'] = "This mobile number is already Taken";
                }
                if($this->model->searchUserId($user_data['reg_id'])) {
                    $user_data['user_id_err'] = "This user_id is already Taken";
                }

                if(empty($user_data['mobile_number_err']) && empty($user_data['confirm_password_err']) && empty($user_data['mobile_number_err'])) {
                    $user_data['password'] = password_hash($user_data['password'], PASSWORD_DEFAULT);
                    $this->model->userRegistration($user_data);
                    
                    $this->view->show('admin/fullAccount/agent_land_account', $data, $user_data);
                }else {
                    $this->view->show('admin/fullAccount/agent_land_account', $data, $user_data);
                }
            }else{
                $user_data = [
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
                $user_data = $this->model->checkTable();
                $this->view->show('admin/fullAccount/agent_land_account', $data, $user_data);
            }
        }

//222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222222
        public function create_account() {
            $data = $this->model->checkTable();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user_data = [
                    'name' => trim($_POST['name']),
                    'reg_id' => trim($_POST['user_id']),
                    'reg_type' => trim($_POST['user_type']),
                    'address' => trim($_POST['address']),
                    'mobile_number' => trim($_POST['contact_number']),
                    'password' => trim($_POST['password']),
                    'confirm_password' => trim($_POST['confirm_password']),

                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];

                if($user_data['password'] != $user_data['confirm_password']) {
                    $user_data['confirm_password_err'] = "confirmation not matching";
                }
                if($this->model->searchUserContact($user_data['mobile_number'])) {
                    $user_data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($user_data['contact_number_err']) && empty($user_data['confirm_password_err'])) {
                    $user_data['password'] = password_hash($user_data['password'], PASSWORD_DEFAULT);
                    $this->model->userRegistration_employee($user_data);
                    $this->view->show('admin/fullAccount/create_account', $data, $user_data);
                }else {
                    $this->view->show('admin/fullAccount/create_account', $data, $user_data);
                }
            }else{
                $user_data = [
                    'name' => '',
                    'user_id' => '',
                    'user_type' => '',
                    'address' => '',
                    'contact_number' => '',
                    'password' => '',
                    'confirm_password' => '',


                    'contact_number_err' => '',
                    'confirm_password_err' => ''
                ];
                $this->view->show('admin/fullAccount/create_account', $data, $user_data);
            }
        }


//33333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333333
        public function agent_land_tempaAccount() {
            $data = $this->model->checkTable();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user_data = [
                    'reg_id' => trim($_POST['user_id']),
                    'reg_type' => trim($_POST['user_type']),
                    'mobile_number' => trim($_POST['contact_number']),
                    'route_number' => trim($_POST['route_number']),
                ];

                if($this->model->searchUserContact($user_data['mobile_number'])) {
                    $user_data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($user_data['contact_number_err'])) {
                    $this->model->userTempRegistration($user_data);
                    $this->view->show('admin/tempAccount/agent_land_tempaAccount', $data, $user_data);
                }else {
                    $this->view->show('admin/tempAccount/agent_land_tempaAccount', $data, $user_data);
                }
            }else{
                $user_data = [
                    'user_id' => '',
                    'user_type' => '',
                    'contact_number' => '',
                   'route_number' => '',

                    'contact_number_err' => ''
                ];
                 $user_data = $this->model->checkTable();
                $this->view->show('admin/tempAccount/agent_land_tempaAccount', $data, $user_data);
            }
        }


//4444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444444
        public function create_tempAccount() {
            $data = $this->model->checkTable();
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $user_data = $this->model->checkTable();
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $user_data = [
                    'name' => trim($_POST['name']),
                    'reg_type' => trim($_POST['user_type']),
                    'reg_id' => trim($_POST['user_id']),
                    'mobile_number' => trim($_POST['contact_number']),
                    // 'route_number' => trim($_POST['route_number']),
                ];

                if($this->model->searchUserContact($user_data['mobile_number'])) {
                    $user_data['contact_number_err'] = "This mobile number is already Taken";
                }

                if(empty($user_data['contact_number_err'])) {
                    $this->model->userTempRegistration_employee($user_data);
                    $this->view->show('admin/tempAccount/create_tempAccount', $data, $user_data);
                }else {
                    $this->view->show('admin/tempAccount/create_tempAccount', $data, $user_data);
                }
            }else{
                $user_data = [
                    'name' => '',
                    'user_type' => '',
                    'user_id' => '',
                    'contact_number' => '',
                    // 'route_number' => '',

                    // 'confirm_password_err' => '',
                    'contact_number_err' => ''
                ];
                 $user_data = $this->model->checkTable();
                $this->view->show('admin/tempAccount/create_tempAccount', $data, $user_data);
            }
        }
     
    }

?>
