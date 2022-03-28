<?php

class User extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // $this->view->render('user/home');
    }

    function setProfile() {
        if(isset($_POST['change_profile_sumbit_btn'])) {
            $image_name = $_FILES['image_file']['name'];
            $extension = pathinfo($image_name, PATHINFO_EXTENSION);
            $image = $_SESSION['user_id'].'.'.$extension;

            $fileToUpload ="images/".strtolower($_SESSION['user_type'])."/".$image;
            $fileName = $_FILES['image_file']['tmp_name'];
            if(move_uploaded_file($fileName, $fileToUpload)) {
                $this->model->profileUpload($image);
                $this->view->render('user/profile/profile');
            }
        }else {
            $this->view->render('Errors/Errors');
        }
    }
    function editProfile()
    {
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {

                if (isset($_POST['accept-btn'])) {
                    $data = [
                        'contact_number' => trim($_POST['contact_number']),
                        'name' => trim($_POST['name'])
                    ];

                    $_SESSION['contact_number'] = $data['contact_number'];
                    $_SESSION['name'] = $data['name'];
                    $this->view->render('user/profile/enterPassword');
                } else if (isset($_POST['enter_btn'])) {
                    $data = [
                        'password' => $_POST['password'],
                    ];
                    if ($this->model->checkPassword($data['password'])) {
                        $this->model->editProfile();
                        $this->view->render('user/profile/correctPassword');
                    } else {
                        $this->view->render('user/profile/wrongPassword');
                    }
                }
            } else {
                $this->view->render('user/profile/editProfile', 0, 0, 0, $this->getNotificationCount());
            }
        } else {
            $this->view->render('Errors/Errors');
        }
    }


    function editName() {
        if(isLoggedIn()){
            if($_SERVER['REQUEST_METHOD'] == "POST") {
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $this->model->editName($_POST['name'], $_SESSION['user_id']);
            }
        }
        
    }

    function passwordChange() {
        if(isset($_SESSION['changePassword'])) {
            $this->view->render('user/profile/changePassword');
        }else {
            $this->view->render('Errors/Errors');
        }
    }

    function changePassword()
    {
        if (isLoggedIn()) {
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                unset($_SESSION['changePassword']);
                $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
                $data = [
                    'password' => $_POST['password'],
                    'new_password' => $_POST['new_password'],
                    'confirm_password' => $_POST['confirm_password'],

                    'password_err' => '',
                    'new_password_err' => '',
                    'confirm_password_err' => ''
                ];
                if (empty($data['new_password'])) {
                    $data['password_err'] = "Please enter the old passoword";
                } else if (!($this->model->checkPassword($data['password']))) {
                    $data['password_err'] = "Wrong Password";
                }

                if (empty($data['new_password'])) {
                    $data['new_password_err'] = "Please enter a new passoword";
                }

                if (empty($data['confirm_password'])) {
                    $data['confirm_password_err'] = "Please confirm the password";
                } else if ($data['new_password'] != $data['confirm_password']) {
                    $data['confirm_password_err'] = "Doesn't match with password";
                }

                if (empty($data['password_err']) && empty($data['new_password_err']) && empty($data['confirm_password_err'])) {
                    $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                    $this->model->changePassword($data);
                    unset($_SESSION['user_type']);
                    unset($_SESSION['user_id']);
                    unset($_SESSION['OTP']);
                    session_destroy();
                    // redirect('Login');
                } else {
                    $this->view->render('user/profile/changePassword', $data);
                }
            } else {
                $_SESSION['controller'] = 'profile';
                otpSend();
                // $this->view->render('user/profile');
            }
        } else {
            $this->view->render('Errors/Errors');
        }
    }

    function isPasswordCorrect() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $contact_number = $_SESSION['contact_number'];

            $data = $this->model->isPasswordCorrect($contact_number, $_POST['old_password']);
            echo json_encode($data);
        }
    }
    public function getNotificationCount()
    {
        if (isLoggedIn()) {
            $notification = $this->model->getNotSeenNotification();
            return $notification;
        } else {
            $this->view->render('Errors/Errors');
        }
    }

    function termsConditions() {
        $this->view->render('user/termsConditions');
    }
}
