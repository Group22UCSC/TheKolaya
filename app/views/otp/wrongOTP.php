<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE ?></title>
    <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/otp/verify-style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
    <div class="container">

        <p style="text-align: center;"><i style="color: red;" class="far fa-times-circle"></i><br>
        <h2 style="text-align: center; color: #089633;">Oops Your OTP is wrong</h2><br>
        <h3 style="text-align: center; color: #089633;">Try Again!</h3>
        </p>
        <!-- <form action="<?php echo URL ?>OtpVerify" method="GET"> -->
            <!-- <input type="submit" value="Back to OTP" name="resend_otp" class="btn" /> -->
            <a style="text-decoration:none;" href="<?php echo URL?>OtpVerify/reSendOtp"><input type="button" value="Back to OTP" name="verify" class="btn"/></a>
        <!-- </form> -->
    </div>
    <script src="<?php echo URL ?>vendors/js/otp/otp-js.js"></script>
</body>

</html>