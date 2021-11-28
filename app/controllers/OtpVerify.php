<?php

class Otpverify extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
        if (!empty($_SESSION['OTP'])) {
            $this->view->render('otp/OTPverify');
        } else {
            if(isset($_SESSION['flash_message'])) {
                $this->view->render('Errors/Errors');
            }else {
                $this->view->render('Errors/Errors');
            }
        }
    }

    function validateOtp($OTP = [])
    {
        $verifyOTP = "";
        for ($i = 1; $i < 5; $i++) {
            $number = 'n-' . $i;
            $verifyOTP .= trim($OTP[$number]);
        }
        return $verifyOTP;
    }

    function checkOtp()
    {
        if (!empty($_SESSION['OTP'])) {
            flash('OTP');
            if (isset($_GET['registration-verify'])) {
                $verifyOTP = $this->validateOtp($_GET);
                if ($verifyOTP == $_SESSION['OTP']) {
                    $verifyOTP = '';
                    $_SESSION['verify'] = 1;
                    require_once '../app/controllers/Registration.php';
                    $otpCorrect = new Registration();
                    $otpCorrect->loadModelUser('Registration');
                    $otpCorrect->updateVerifiedUser();
                    unset($_SESSION['OTP']);
                    $this->view->render('otp/correctOTP');
                } else {
                    $verifyOTP = '';
                    $_SESSION['verify'] = 0;
                    unset($_SESSION['OTP']);
                    $this->view->render('otp/wrongOTP');
                }
            } else if (isset($_GET['login-verify'])) {
                $verifyOTP = $this->validateOtp($_GET);
                if ($verifyOTP == $_SESSION['OTP']) {
                    $verifyOTP = '';
                    unset($_SESSION['OTP']);
                    $_SESSION['changePassword'] = true;
                    redirect('Login/changePassword');
                } else {
                    $verifyOTP = '';
                    unset($_SESSION['OTP']);
                    $this->view->render('otp/wrongOTP');
                }
            } else if (isset($_GET['profile-verify'])) {
                $verifyOTP = $this->validateOtp($_GET);
                if ($verifyOTP == $_SESSION['OTP']) {
                    $verifyOTP = '';
                    unset($_SESSION['OTP']);
                    $_SESSION['changePassword'] = true;
                    redirect('User/passwordChange');
                    
                } else {
                    $verifyOTP = '';
                    unset($_SESSION['OTP']);
                    $this->view->render('otp/wrongOTP');
                }
            } else {
                unset($_SESSION['OTP']);
                $this->view->render('Errors/Errors');
            }
        } else {
            $this->view->render('Errors/Errors');
        }
    }

    function reSendOtp()
    {
        $OTPcode = '1002';
        $_SESSION['OTP'] = $OTPcode;
        // $data['OTP'] = $OTPcode;
        // $OTPcode = rand(1000, 9999);
        // $contact_number = $_SESSION['contact_number'];
        // $_SESSION['OTP'] = $OTPcode;
        // $user = "94769372530";
        // $password = "9208";
        // $text = urlencode("Your තේ කොළය verification code is: ".$OTPcode);
        // $to = "$contact_number";

        // $baseurl ="http://www.textit.biz/sendmsg";
        // $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
        // $ret = file($url);

        // $res= explode(":",$ret[0]);
        // $_SESSION['controller'] = $controller;
        redirect('OtpVerify');
        // $this->view->render('otp/OTPverify', $data);
    }
}
