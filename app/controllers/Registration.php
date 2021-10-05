<?php

class Registration extends Controller {
    function __construct(){
        parent::__construct();
    }

    function index() {
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $_SESSION['register_btn_click_time'] = time();
            $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
            $data = [
                'name' => trim($_POST['name']),
                'contact_number' => trim($_POST['contact_number']),
                'user_id' => trim($_POST['user_id']),
                'landowner_type' => trim($_POST['landowner_type']),
                'address' => trim($_POST['address']),
                'password' => trim($_POST['password']),
                'verify' => '0',
                'confirm_password' => trim($_POST['confirm_password']),

                'name_err' => '',
                'contact_number_err' => '',
                'user_id_err' => '',
                'address_err' => '',
                'password_err' => '',
                'confirm_password_err' => ''
            ];
            
            $_SESSION['name'] = $data['name'];
            $_SESSION['contact_number'] = $data['contact_number'];
            $_SESSION['user_id'] = $data['user_id'];
            $_SESSION['landowner_type'] = $data['landowner_type'];
            $_SESSION['address'] = $data['address'];
            $_SESSION['password'] = $data['password'];
            //Validate name
            if(empty($data['name'])) {
                $data['name_err'] = "Please enter the name";
            }

            //Validate contact_number
            if(empty($data['contact_number'])) {
                $data['contact_number_err'] = "Please enter the mobile number";
            }elseif($this->model->isRegisteredUser($data['contact_number'])) {
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
                if(!($this->model->isRegisteredUser($data['contact_number']))) {
                    $contact_number = $data['contact_number'];
                    // $OTPcode = rand(1000, 9999);
                    $OTPcode = '1000';
                    $_SESSION['OTP'] = $OTPcode;
                    if($this->model->findUser($data['contact_number'], $data['user_id'])) {
                        // $user = "94769372530";
                        // $password = "9208";
                        // $text = urlencode("Your තේ කොළය verification code is: ".$OTPcode);
                        // $to = "$contact_number";
    
                        // $baseurl ="http://www.textit.biz/sendmsg";
                        // $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
                        // $ret = file($url);
    
                        // $res= explode(":",$ret[0]);
    
                        redirect('OtpVerify');
                    }
                }
                

            }else {
                $this->view->render('user/registration', $data);
            }
            
        }else {
            $data = [
                'name' => '',
                'contact_number' => '',
                'user_id' => '',
                'landowner_type' => '',
                'address' => '',
                'password' => '',
                'verify' => '',
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

    function checkOtp() {
        $verifyOTP = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            for($i = 1; $i < 5; $i++) {
                $number = 'n-'.$i;
                $verifyOTP .= trim($_POST[$number]);
            }

            if($verifyOTP == $_SESSION['OTP']){
                $_SESSION['verify'] = 1;
                
                $this->view->render('otp/correctOTP');
                $this->updateVerifiedUser();
            }
            else{
                $_SESSION['verify'] = 0;
                $this->view->render('otp/wrongOTP');
            }
        }
        
    }

    public function updateVerifiedUser(){
        $data = [
            'name' => $_SESSION['name'],
            'contact_number' => $_SESSION['contact_number'],
            'user_id' => $_SESSION['user_id'],
            'landowner_type' => $_SESSION['landowner_type'],
            'address' => $_SESSION['address'],
            'password' => $_SESSION['password'],
            'verify' => $_SESSION['verify']
        ];
        unset($_SESSION['name']);
        unset($_SESSION['contact_number']);
        unset($_SESSION['user_id']);
        unset($_SESSION['landowner_type']);
        unset($_SESSION['address']);
        unset($_SESSION['password']);
        unset($_SESSION['verify']);
        $data['password'] = password_hash($data['password'], PASSWORD_DEFAULT);
        $this->model->registration($data);
    }
}

?>