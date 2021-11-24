<?php

class User extends Controller {
    function __construct()
    {
        parent::__construct();
    }

    function index() {
        $this->view->showPage('user/home');
    }

    function editProfile() {
        
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            
            if(isset($_POST['accept-btn'])) {
                $data = [
                    'contact_number' => trim($_POST['contact_number']),
                    'name' => trim($_POST['name'])
                ];
    
                $_SESSION['contact_number'] = $data['contact_number'];
                $_SESSION['name'] = $data['name'];
                $this->view->render('user/profile/enterPassword');
            }else if(isset($_POST['enter_btn'])) {
                $data = [
                    'password' => $_POST['password'],
                ];
                if($this->model->checkPassword($data['password'])) {
                    $this->model->editProfile();
                    $this->view->render('user/profile/correctPassword');
                }else {
                    $this->view->render('user/profile/wrongPassword');
                }
            }
            
        }else{
            $this->view->render('user/profile/editProfile', 0, 0, 0, $this->getNotificationCount());
        }
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
            }else if(!($this->model->checkPassword($data['password']))) {
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

            if(empty($data['password_err']) && empty($data['new_password_err']) && empty($data['confirm_password_err'])) {
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

    public function getNotificationCount()
    {
        $notification = $this->model->getNotSeenNotification();
        return $notification;
    }
    
}

?>