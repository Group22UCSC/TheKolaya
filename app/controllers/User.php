<?php

class User extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->view->goHome('user/home');
    }

    public function registration() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'mobile_number' => trim($_POST['mobile_number']),
                'user_id' => trim($_POST['user_id']),
                'address' => trim($_POST['address']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'name_err' => '',
                'mobile_number_err' => '',
                'user_id_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Validate name
            if(empty($data['name'])) {
                $data['name_err'] = "Please enter the name";
            }

            //Validate mobile_number
            if(empty($data['mobile_number'])) {
                $data['mobile_number_err'] = "Please enter the mobile number";
            }
            elseif($this->model->findUserByMobileNumber($data['mobile_number'])) {
                $data['mobile_number_err'] = "Mobile number is already Taken";
            }

            //Validate user id
            if(empty($data['user_id'])) {
                $data['user_id_err'] = "Please enter the user id";
            }

            //Validate address
            if(empty($data['address'])) {
                $data['address_err'] = "Please enter the address";
            }

            //Validate password
            if(empty($data['password'])) {
                $data['password_err'] = "Please enter the password";
            }elseif(strlen($data['password']) < 6) {
                $data['password_err'] = "Please enter at least 6 characters";
            }

            //Validate Confirm password
            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm password";
            }elseif($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Doesn't match with password";
            }

            //Make sure errors are empty
            if(empty($data['name_err']) && empty($data['mobile_number_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                //Validated
                
                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //Register a user
                $this->model->registration($data);
                // flash('register_success', 'You are registed and can log in');
                flash('register_success', 'You are registed and can log in');
                redirect('login');

            }else {
                $this->view->render('user/registration', $data);
            }
            
        }else {
            $data = [
                'name' => '',
                'mobile_number' => '',
                'user_id' => '',
                'address' => '',
                'password' => '',
                'confirm_password' => '',
                
                'name_err' => '',
                'mobile_number_err' => '',
                'user_id_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view->render('user/registration', $data);
        }
        // $this->view->render('User','Registration');
    }

    public function login(){
        // Check for POST
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
          // Process form

          $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'mobile_number' => trim($_POST['mobile_number']),
                'password' => trim($_POST['password']),
                'mobile_number_err' => '',
                'password_err' => '',
            ];

            //Validate mobile number
            if(empty($data['mobile_number'])) {
                $data['mobile_number_err'] = "Please enter the mobile number";
            }

            //Validate password
            if(empty($data['password'])) {
                $data['password_err'] = "Please enter the password";
            }

            if($this->model->findUserByMobileNumber($data['mobile_number'])) {
                //User found
            }else {
                //User not Found
                $data['mobile_number_err'] = "No User Found";
            }

            //Make sure errors are empty
            if(empty($data['mobile_number_err']) && empty($data['password_err'])) {
                //Validated
                //Check and set logged in user
                $loggedInUser = $this->model->login($data['mobile_number'], $data['password']);

                if($loggedInUser) {
                    //Create Session
                    $this->createUserSession($loggedInUser);
                }else {
                    $data['password_err'] = "Password incorrect";

                    $this->view->render('user/login', $data);
                }
            }else {
                $this->view->render('user/login', $data);
            }

        } else {
          // Init data
          $data =[    
            'mobile_number' => '',
            'password' => '',
            'mobile_number_err' => '',
            'password_err' => '',
          ];
  
          // Load view
          $this->view->render('user/login', $data);
        }
      }

      public function createUserSession($user) {
          $_SESSION['user_id'] = $user[0]['user_id'];
          $_SESSION['user_type'] = str_replace("_", " ", $user[0]['user_type']) ;
          $_SESSION['user_mobile_number'] = $user[0]['mobile_number'];
          $_SESSION['user_name'] = $user[0]['name'];
        //   echo $_SESSION['user_type'];
          redirect($_SESSION['user_type']);
      }

      public function logout() {
          unset($_SESSION['user_id']);
          unset($_SESSION['user_type']);
          unset($_SESSION['user_mobile_number']);
          unset($_SESSION['user_name']);

          session_destroy();
          redirect('login');
      }

      public function isLoggedIn() {
          if(isset($_SESSION['user_id'])) {
              return true;
          }else {
              return false;
          }
      }
    
}

?>