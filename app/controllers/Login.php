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

    public function createUserSession($user) {
        session_start();
        $_SESSION['user_id'] = $user[0]['user_id'];
        $_SESSION['user_type'] = str_replace("_", "", $user[0]['user_type']);
        $_SESSION['user_contact_number'] = $user[0]['contact_number'];
        $_SESSION['user_name'] = $user[0]['name'];
        //   echo $_SESSION['user_type'];
        redirect($_SESSION['user_type']);
      }

      public function logout() {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['user_contact_number']);
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