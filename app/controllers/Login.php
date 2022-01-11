<?php

class Login extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        // $this->view->goHome('user/login');
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'contact_number' => trim($_POST['contact_number']),
                'password' => $_POST['password'],
            ];
            $loggedInUser = $this->model->login($data['contact_number'], $data['password']);

            if ($loggedInUser) {
                $this->createUserSession($loggedInUser);
                redirect($_SESSION['user_type']);
            }
        } else {
            $this->view->render('user/login');
        }
    }

    function controllCheckData()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'contact_number' => trim($_POST['contact_number']),
            'password' => $_POST['password'],
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $function_name = $_POST['function_name'];
            switch ($function_name) {
                case 'checkUser':
                    if ($this->model->isVerifiedUser($data['contact_number'])) {
                        echo 'Verified';
                    } else if ($this->model->isRegisteredUser($data['contact_number'])) {
                        echo 'Registered';
                    } else {
                        echo 'notRegistered';
                    }
                    break;
                case 'login':
                    $loggedInUser = $this->model->login($data['contact_number'], $data['password']);

                    if (!$loggedInUser) {
                        echo 'wrongPassword';
                    }
                    break;
            }
        }
    }

    function createUserSession($user)
    {
        $_SESSION['user_id'] = $user[0]['user_id'];
        $_SESSION['user_type'] = str_replace("_", "", $user[0]['user_type']);
        $_SESSION['contact_number'] = $user[0]['contact_number'];
        $_SESSION['name'] = $user[0]['name'];
        $_SESSION['address'] = $user[0]['address'];
        $_SESSION['profile_picture'] = $user[0]['profile_picture'];
        $profile_location = "images/".strtolower($_SESSION['user_type']) . "/" . $_SESSION['profile_picture'];
        if(!file_exists($profile_location)) {
            $_SESSION['profile_picture'] = "default_profile/profile.jpg";
        }else {
            if ($_SESSION['profile_picture'] == null) {
                $_SESSION['profile_picture'] = "default_profile/profile.jpg";
            } else {
                $_SESSION['profile_picture'] = strtolower($_SESSION["user_type"]) . "/" . $_SESSION['profile_picture'];
            }
        }

        $_SESSION['user_type'] = ucwords(strtolower($_SESSION['user_type']));
        if ($_SESSION['user_type'] == 'Agent' || $_SESSION['user_type'] == 'Landowner') {
            $this->model->getRoute($_SESSION['user_type']);
        }
        $_SESSION['NotSeenCount'] = $this->model->getNotSeenNotificationCount($_SESSION['user_type']);
    }

    function logout()
    {
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['contact_number']);
        unset($_SESSION['name']);
        unset($_SESSION['address']);
        unset($_SESSION['profile_picture']);

        session_destroy();
        redirect('Login');
    }

    function isLoggedIn()
    {
        if (isset($_SESSION['user_id'])) {
            return true;
        } else {
            return false;
        }
    }

    function forgetPassword()
    {
        if (isset($_POST['enter_btn'])) {
            $data = [
                'contact_number' => trim($_POST['contact_number']),
                'controller' => 'login'
            ];

            if ($this->model->isRegisteredUser($data['contact_number'])) {
                // $otp = new OtpVerify;
                // $otp->otpSend($data);
                $_SESSION['contact_number'] = $data['contact_number'];
                $_SESSION['controller'] = $data['controller'];
                otpSend();
            } else {
                $this->view->render('user/forgetPassword/wrongNumber', $data);
            }
        } else {
            $this->view->render('user/forgetPassword/forgetPassword');
        }
    }

    function changePassword()
    {
        if (isset($_POST['change_pw_btn'])) {
            unset($_SESSION['changePassword']);
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'new_password' => $_POST['new_password'],
                'confirm_password' => $_POST['confirm_password'],
                'contact_number' => $_SESSION['contact_number'],

                'new_password_err' => '',
                'confirm_password_err' => ''
            ];
            // unset($_SESSION['contact_number']);
            if (empty($data['new_password'])) {
                $data['new_password_err'] = "Please enter a new passoword";
            }

            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm the password";
            } else if ($data['new_password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Doesn't match with password";
            }

            if (empty($data['new_password_err']) && empty($data['confirm_password_err'])) {
                $data['new_password'] = password_hash($data['new_password'], PASSWORD_DEFAULT);
                $this->model->changePassword($data);
                redirect('Login');
            } else {
                $this->view->render('user/forgetPassword/changePassword', $data);
            }
        } else if (isset($_SESSION['changePassword'])) {
            $this->view->render('user/forgetPassword/changePassword');
        } else {
            $this->view->render('Errors/Errors');
        }
    }
}
