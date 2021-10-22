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
            for($i = 1; $i < 5; $i++) {
                $number = 'n-'.$i;
                $verifyOTP .= trim($_POST[$number]);
            }
            if(isset($_POST['registration-verify'])) {
                if($verifyOTP == $_SESSION['OTP']){
                    $verifyOTP = '';
                    $_SESSION['verify'] = 1;
                    require_once '../app/controllers/Registration.php';
                    $otpCorrect = new registration();
                    $otpCorrect->loadModelUser('registration');
                    $otpCorrect->updateVerifiedUser();
                    $this->view->render('otp/correctOTP');
                }
                else{
                    $verifyOTP = '';
                    $_SESSION['verify'] = 0;
                    $this->view->render('otp/wrongOTP');
                }
            }
            else if(isset($_POST['login-verify'])) {
                if($verifyOTP == $_SESSION['OTP']){
                    $verifyOTP = '';
                    redirect('login/changePassword');
                }
                else{
                    $verifyOTP = '';
                    $this->view->render('otp/wrongOTP');
                }
            }else if(isset($_POST['profile-verify'])) {
                if($verifyOTP == $_SESSION['OTP']){
                    $verifyOTP = '';
                    $this->view->render('user/profile/changePassword');
                }
                else{
                    $verifyOTP = '';
                    $this->view->render('otp/wrongOTP');
                }
            }
            
        }
    }

    public function reSendOtp() {
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

?>