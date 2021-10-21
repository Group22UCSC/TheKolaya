<?php

class User extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->view->showPage('user/home');
    }

    function changePassword() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'password' => $_POST['password'],
                'new_password' => $_POST['new_password'],
                'confirm_password' => $_POST['confirm_password'],

                'password_err' => '',
                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            if(empty($data['new_password'])) {
                $data['password_err'] = "Please enter the old passoword";
            }else if(!($this->model->checkPassword($data))) {
                $data['password_err'] = "Wrong Password";
            }

            if(empty($data['new_password'])) {
                $data['new_password_err'] = "Please enter a new passoword";
            }

            if(empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm the password";
            }else if($data['new_password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Doesn't match with password";
            }

            if(!empty($data['password']) && !empty($data['new_password']) && !empty($data['confirm_password'])) {
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                $this->model->changePassword($data);
                unset($_SESSION['user_type']);
                redirect('login');
            }else {
                $this->view->render('User/profile/changePassword', $data);
            }
        }else {
            $_SESSION['controller'] = 'profile';
            otpSend();
            // $this->view->render('user/profile/');
        }
    }
    
}

?>