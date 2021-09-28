<?php

class Registration extends Controller {
    function __construct(){
        parent::__construct();
    }

    function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'contact_number' => trim($_POST['contact_number']),
                'user_id' => trim($_POST['user_id']),
                'address' => trim($_POST['address']),
                'password' => trim($_POST['password']),
                'confirm_password' => trim($_POST['confirm_password']),

                'name_err' => '',
                'contact_number_err' => '',
                'user_id_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            //Validate name
            if(empty($data['name'])) {
                $data['name_err'] = "Please enter the name";
            }

            //Validate contact_number
            if(empty($data['contact_number'])) {
                $data['contact_number_err'] = "Please enter the mobile number";
            }
            elseif($this->model->findUserByMobileNumber($data['contact_number'])) {
                $data['contact_number_err'] = "Mobile number is already Taken";
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
            if(empty($data['name_err']) && empty($data['contact_number_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
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
                'contact_number' => '',
                'user_id' => '',
                'address' => '',
                'password' => '',
                'confirm_password' => '',
                
                'name_err' => '',
                'contact_number_err' => '',
                'user_id_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $this->view->render('user/registration', $data);
        }
    }
}

?>