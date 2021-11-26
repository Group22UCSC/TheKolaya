<?php

class Login extends Controller {
    function __construct(){
        parent::__construct();
    }

    function index() {
        // $this->view->goHome('user/login');
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // Process form
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
              $data = [
                  'contact_number' => trim($_POST['contact_number']),
                  'password' => trim($_POST['password']),
                  'contact_number_err' => '',
                  'password_err' => '',
              ];
  
              //Validate mobile number
              if(empty($data['contact_number'])) {
                  $data['contact_number_err'] = "Please enter the mobile number";
              }
  
              //Validate password
              if(empty($data['password'])) {
                  $data['password_err'] = "Please enter the password";
              }
  
              if($this->model->findUserByMobileNumber($data['contact_number'])) {
                  //User found
              }else {
                  //User not Found
                  $data['contact_number_err'] = "No User Found";
              }

              //Make sure errors are empty
              if(empty($data['contact_number_err']) && empty($data['password_err'])) {
                  //Validated
                  //Check and set logged in user
                  $loggedInUser = $this->model->login($data['contact_number'], $data['password']);
  
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
              'contact_number' => '',
              'password' => '',
              'contact_number_err' => '',
              'password_err' => '',
            ];
    
            // Load view
            $this->view->render('user/login', $data);
          }
    }

    function createUserSession($user) {
        $_SESSION['user_id'] = $user[0]['user_id'];
        $_SESSION['user_type'] = str_replace("_", "", $user[0]['user_type']);
        $_SESSION['contact_number'] = $user[0]['contact_number'];
        $_SESSION['name'] = $user[0]['name'];
        $_SESSION['address'] = $user[0]['address'];
        
        // switch($_SESSION['user_type']) {
        //     case 'LandOwner' : $_SESSION['user_type'] = 
        // }
        $_SESSION['user_type'] = ucwords(strtolower($_SESSION['user_type']));
        if($_SESSION['user_type'] == 'Agent' || $_SESSION['user_type'] == 'Landowner') {
            $this->model->getRoute($_SESSION['user_type']);
        }
        $_SESSION['NotSeenCount'] = $this->model->getNotSeenNotificationCount($_SESSION['user_type']);
        redirect($_SESSION['user_type']);
    }

    function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['contact_number']);
        unset($_SESSION['name']);
        unset($_SESSION['address']);
            
        session_destroy();
        redirect('Login');
    }

    function isLoggedIn() {
        if(isset($_SESSION['user_id'])) {
            return true;
        }else {
            return false;
        }
    }

    function forgetPassword() {
        if(isset($_POST['enter_btn'])) {
            $data = [
                'contact_number' => trim($_POST['contact_number']),
                'controller' => 'login'
            ];
            
            if($this->model->isRegisteredUser($data['contact_number'])) {
                // $otp = new OtpVerify;
                // $otp->otpSend($data);
                $_SESSION['contact_number'] = $data['contact_number'];
                $_SESSION['controller'] = $data['controller'];
                otpSend();
            }else {
                $this->view->render('User/forgetPassword/wrongNumber', $data);
            }
        }
        
        else {
            $this->view->render('User/forgetPassword/forgetPassword');
        }
    }

    public function changePassword() {
        if(isset($_POST['change_pw_btn'])) {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'new_password' => $_POST['new_password'],
                'confirm_password' => $_POST['confirm_password'],
                'contact_number' => $_SESSION['contact_number'],

                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            unset($_SESSION['contact_number']);
            if(empty($data['new_password'])) {
                $data['new_password_err'] = "Please enter a new passoword";
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm the password";
            }else if($data['new_password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Doesn't match with password";
            }

            if(!empty($data['new_password']) || !empty($data['confirm_password'])) {
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                $this->model->changePassword($data);
                redirect('Login');
            }else {
                $this->view->render('User/forgetPassword/changePassword', $data);
            }
        }else {
            $this->view->render('User/forgetPassword/changePassword');
        }
    }
}

?>