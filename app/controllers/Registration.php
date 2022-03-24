<?php

class Registration extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        $this->view->render('user/registration');
    }

    function controllCheckData()
    {
        $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        $data = [
            'name' => trim($_POST['name']),
            'contact_number' => trim($_POST['contact_number']),
            'user_id' => trim($_POST['user_id']),
            'user_type' => trim($_POST['user_type']),
            'address' => trim($_POST['address']),
            'password' => $_POST['password'],
            'verify' => '0',
            'confirm_password' => $_POST['confirm_password'],
            'controller' => 'registration',
        ];
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $function_name = $_POST['function_name'];
            switch ($function_name) {
                case 'checkUser':
                    if($this->model->getUser($data['contact_number'])) {
                        $userVerify = $this->model->getUser($data['contact_number']);
                    }else {
                        $userVerify = false;
                    }
                    if ($userVerify[0]['verify'] == 1) {
                        echo json_encode('Verified');
                    } else if ($userVerify[0]['is_delete'] == 1 && $userVerify[0]['verify'] == 0) {
                        echo json_encode('Deleted');
                    } else if (!$userVerify) {
                        echo json_encode('notRegistered');
                    } else {
                        $userFilter = [
                            'user_id' => $userVerify[0]['user_id'],
                            'user_type' => $userVerify[0]['user_type']
                        ];
                        echo json_encode($userFilter);
                    }
                    break;

                case 'registration':
                    $_SESSION['name'] = $data['name'];
                    $_SESSION['contact_number'] = $data['contact_number'];
                    $_SESSION['user_id'] = $data['user_id'];
                    $_SESSION['user_type'] = $data['user_type'];
                    $_SESSION['address'] = $data['address'];
                    $_SESSION['password'] = $data['password'];
                    $_SESSION['mobile_number'] = $data['contact_number'];
                    $_SESSION['controller'] = $data['controller'];
                    otpSend();
                    // $this->model->registration($data);
                    break;
            }
        }
    }

    // function checkOtp()
    // {
    //     $verifyOTP = "";
    //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //         for ($i = 1; $i < 5; $i++) {
    //             $number = 'n-' . $i;
    //             $verifyOTP .= trim($_POST[$number]);
    //         }

    //         if ($verifyOTP == $_SESSION['OTP']) {
    //             $_SESSION['verify'] = 1;

    //             $this->view->render('otp/correctOTP');
    //             $this->updateVerifiedUser();
    //         } else {
    //             $_SESSION['verify'] = 0;
    //             $this->view->render('otp/wrongOTP');
    //         }
    //     }
    // }

    public function updateVerifiedUser()
    {
        $data = [
            'name' => $_SESSION['name'],
            'contact_number' => $_SESSION['contact_number'],
            'user_id' => $_SESSION['user_id'],
            'user_type' => $_SESSION['user_type'],
            'address' => $_SESSION['address'],
            'password' => $_SESSION['password'],
            'verify' => $_SESSION['verify']
        ];
        unset($_SESSION['name']);
        // unset($_SESSION['contact_number']);
        unset($_SESSION['user_id']);
        unset($_SESSION['user_type']);
        unset($_SESSION['address']);
        unset($_SESSION['password']);
        unset($_SESSION['verify']);
        session_destroy();
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->model->registration($data);
        // echo 'hi';
    }
}
