<?php

class OtpVerify extends Controller {
    function __construct(){
        parent::__construct();
    }

    function index() {
        $this->view->showPage('otp/OtpVerify');
    }

    function checkOtp() {
        $verifyOTP = "";
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            $OTP = $_SESSION['OTP'];
            for($i = 1; $i < 5; $i++) {
                $number = 'n-'.$i;
                $verifyOTP .= trim($_POST[$number]);
            }

            if($verifyOTP == $OTP){
                $_SESSION['verify'] = 1;
                $this->view->render('otp/correctOTP');
            }
            else{
                $_SESSION['verify'] = 0;
                $this->view->render('otp/wrongOTP');
            }
        }
        // session_destroy();
    }

    function otpSend() {
        $OTPcode = '1000';
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

        redirect('OtpVerify');
    }
}

?>