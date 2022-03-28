<?php

function redirect($page) {
    header('location: ' . URL . $page);
}

function otpSend() {
    // $OTPcode = '1001';
    // $_SESSION['OTP'] = $OTPcode;

    $OTPcode = rand(1000, 9999);
    $_SESSION['OTP'] = $OTPcode;
    // $data['OTP'] = $OTPcode;
    $contact_number = $_SESSION['contact_number'];
    $user = "94701826475";
    $password = "7027";
    $text = urlencode("Your තේ කොළය verification code is: " . $OTPcode);
    $to = "$contact_number";

    $baseurl ="http://www.textit.biz/sendmsg";
    $url = "$baseurl/?id=$user&pw=$password&to=$to&text=$text";
    $ret = file($url);

    $res= explode(":",$ret[0]);
    if($_SESSION['controller'] != 'registration')
        redirect('OtpVerify');
    // $this->view->render('otp/OTPverify', $data);
}

?>