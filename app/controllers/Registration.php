<?php

class Registration extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
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

                'name_err' => '',
                'contact_number_err' => '',
                'user_id_err' => '',
                'user_type_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];

            $_SESSION['name'] = $data['name'];
            $_SESSION['contact_number'] = $data['contact_number'];
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['user_type'] = $data['user_type'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['password'] = $data['password'];
            //Validate name
            if (empty($data['name'])) {
                $data['name_err'] = "Please enter the name";
            }

            //Validate contact_number
            if (empty($data['contact_number'])) {
                $data['contact_number_err'] = "Please enter the mobile number";
            } elseif ($this->model->isRegisteredUser($data['contact_number'])) {
                $data['contact_number_err'] = "Mobile number is already Taken";
            }
            //Validate user id
            if (empty($data['user_id'])) {
                $data['user_id_err'] = "Please enter the user id";
            } else if (!($this->model->checkUserByUserID($data))) {
                $data['user_id_err'] = "Your are not registered";
            }

            if (empty($data['user_type'])) {
                $data['user_type_err'] = "Please enter the user type";
            } else if (!($this->model->checkUserByUserType($data))) {
                $data['user_type_err'] = "Entered user type is wrong!";
            }

            //Validate address
            if (empty($data['address'])) {
                $data['address_err'] = "Please enter the address";
            }

            //Validate password
            if (empty($data['password'])) {
                $data['password_err'] = "Please enter the password";
            } elseif (strlen($data['password']) < 6) {
                $data['password_err'] = "Please enter at least 6 characters";
            }

            //Validate Confirm password
            if (empty($data['confirm_password'])) {
                $data['confirm_password_err'] = "Please confirm password";
            } elseif ($data['password'] != $data['confirm_password']) {
                $data['confirm_password_err'] = "Doesn't match with password";
            }

            //Make sure errors are empty
            if (empty($data['name_err']) && empty($data['contact_number_err']) && empty($data['address_err']) && empty($data['user_id_err']) && empty($data['user_type_err']) && empty($data['password_err']) && empty($data['confirm_password_err'])) {
                //Validated
                //Hash Password
                $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
                //Register a user
                if (!($this->model->isRegisteredUser($data['contact_number']))) {
                    $contact_number = $data['contact_number'];
                    if ($this->model->findUser($data['contact_number'], $data['user_id'])) {
                        $_SESSION['mobile_number'] = $data['contact_number'];
                        $_SESSION['controller'] = $data['controller'];
                        otpSend();
                    }
                }
            } else {
                $this->view->render('user/registration', $data);
            }
        } else {
            $data = [
                'name' => '',
                'contact_number' => '',
                'user_id' => '',
                'user_type' => '',
                'address' => '',
                'password' => '',
                'verify' => '',
                'confirm_password' => '',

                'name_err' => '',
                'contact_number_err' => '',
                'user_id_err' => '',
                'user_type_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            $this->view->render('user/registration', $data);
        }
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
                    if ($this->model->isVerifiedUser($data['contact_number'])) {
                        echo 'Verified';
                    } else if (!$this->model->isRegisteredUser($data['contact_number'])) {
                        echo 'notRegistered';
                    } else {
                        $user_id = $this->model->isRegisteredUser($data['contact_number']);
                        $user_id = $user_id[0]['user_id'];
                        echo $user_id;
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
                    // $this->model->registration($data);
                    break;
            }
        }
    }

    function checkOtp()
    {
        $verifyOTP = "";
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            for ($i = 1; $i < 5; $i++) {
                $number = 'n-' . $i;
                $verifyOTP .= trim($_POST[$number]);
            }

            if ($verifyOTP == $_SESSION['OTP']) {
                $_SESSION['verify'] = 1;

                $this->view->render('otp/correctOTP');
                $this->updateVerifiedUser();
            } else {
                $_SESSION['verify'] = 0;
                $this->view->render('otp/wrongOTP');
            }
        }
    }

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
    }
}
