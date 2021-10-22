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
               // $this->view->showPage('Manager/viewAccount');
               $result = $this->model->availablelistTable();
               // print_r($result);
                $this->view->render('Admin/viewAccount',$result);
        }

         public function viewAccount1() {
            $this->view->showPage('Admin/viewAccount1');
        }

         public function updateAccount() {
              // $this->view->showPage('Manager/viewAccount');
               $result = $this->model->availablelistTable();
               // print_r($result);
                $this->view->render('Admin/updateAccount',$result);
            
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
                    $this->model->userRegistration($data);
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
            // $this->view->showPage('Admin/deleteAccount');

               $result = $this->model->availablelistTable();
               // print_r($result);
                $this->view->render('Admin/deleteAccount',$result);

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

        // public function editProfile() {
        // $this->view->showPage('admin/editProfile');
        // }

        //Create Accounts

        public function createAccountSelect() {
            $this->view->showPage('Admin/createAccountSelect');
        }
        
//111111111111111111111111111111111111111111111111111111111111111111111111111111111111111111
        public $user_data = [
            'name' => '',
            'reg_id' => '',
            'reg_type' => '',
            'address' => '',
            'mobile_number' => '',
            'route_number' => '',
            'password' => '',
            'confirm_password' => '',

            'confirm_password_err' => '',
            'reg_id_err' => '',
            'mobile_number_err' => '',
        ];
        public function create_account() {
            
            if($_SERVER['REQUEST_METHOD'] == 'POST') {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $this->user_data['name'] = trim($_POST['name']);
                $this->user_data['reg_id'] = trim($_POST['user_id']);
                $this->user_data['mobile_number'] = trim($_POST['contact_number']);
                $this->user_data['reg_type'] = trim($_POST['user_type']);
                
                $account_type = $_SESSION['account_type'];
                switch($account_type) {
                    case 'full' :
                        $this->user_data['address'] = trim($_POST['address']);
                        $this->user_data['password'] = trim($_POST['password']);
                        $this->user_data['confirm_password'] = trim($_POST['confirm_password']);
                        break;
                    case 'agentLandFull' :
                        $this->user_data['address'] = trim($_POST['address']);
                        $this->user_data['password'] = trim($_POST['password']);
                        $this->user_data['confirm_password'] = trim($_POST['confirm_password']);
                        $this->user_data['route_number'] = trim($_POST['route_number']);
                        break;
                    case 'agentLandTemp' :
                        $this->user_data['route_number'] = trim($_POST['route_number']);
                }
                if($this->user_data['password'] != $this->user_data['confirm_password']) {
                    $this->user_data['confirm_password_err'] = "confirmation not matching";
                }
                if($this->model->searchUserContact($this->user_data['mobile_number'])) {
                    $this->user_data['mobile_number_err'] = "This mobile number is already Taken";
                }
                if($this->model->searchUserId($this->user_data['reg_id'])) {
                    $this->user_data['user_id_err'] = "This user_id is already Taken";
                }

                if(empty($this->user_data['mobile_number_err']) && empty($this->user_data['confirm_password_err']) && empty($this->user_data['user_id_err'])) {
                    $this->user_data['password'] = password_hash($this->user_data['password'], PASSWORD_DEFAULT);
                    
                    $this->model->userRegistration($this->user_data);
                    
                    if($this->user_data['reg_type'] == 'direct_landowner' || $this->user_data['reg_type'] == 'indirect_landowner' || $this->user_data['reg_type'] == 'agent'){
                        if($this->user_data['address'] != '') {
                            $this->agent_land_account();
                        }else {
                            $this->agent_land_tempAccount();
                        }
                    }else {
                        if($this->user_data['address']) {
                            $data = $this->model->checkTable();
                            $this->view->show('admin/fullAccount/create_account', $data, $this->user_data);
                        }else {
                           $this->create_tempAccount();
                        }
                    }
                }else {
                    if($this->user_data['reg_type'] == 'direct_landowner' || $this->user_data['reg_type'] == 'indirect_landowner' || $this->user_data['reg_type'] == 'agent'){
                        if($this->user_data['address'] != '') {
                            $this->agent_land_account();
                        }else {
                            $this->agent_land_tempAccount();
                        }
                    }else {
                        if($this->user_data['address'] != '') {
                            $data = $this->model->checkTable();
                            $this->view->show('admin/fullAccount/create_account', $data, $this->user_data);
                        }else {
                            $data = $this->model->checkTable();
                            $this->create_tempAccount();
                        }
                    }
                }
            }else{
                $data = $this->model->checkTable();
                $this->view->show('admin/fullAccount/create_account', $data, $this->user_data);
            }
        }


        public function agent_land_account() {
            $data = $this->model->checkTable();
            $this->view->show('admin/fullAccount/agent_land_account', $data, $this->user_data);
        }


        public function agent_land_tempAccount() {
            $data = $this->model->checkTable();
            $this->view->show('admin/tempAccount/agent_land_tempAccount', $data, $this->user_data);
        }

        public function create_tempAccount() {
            $data = $this->model->checkTable();
            $this->view->show('admin/tempAccount/create_tempAccount', $data, $this->user_data);
        }



        //Manage Profile
        function editProfile() {
            include '../app/controllers/User.php';
            $user = new User();
            $user->loadModelUser('user');
            $user->editProfile();
        }
    
        function enterPassword() {
            $this->view->render('user/profile/enterPassword');
        }
    
         
        }

?>
