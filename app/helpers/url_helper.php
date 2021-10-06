<?php

function redirect($page) {
    header('location: ' . URL . $page);
}

function otpSend($data) {
    $OTPcode = '1001';
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
    redirect('OtpVerify');
    // $this->view->render('otp/OTPverify', $data);
}

?>