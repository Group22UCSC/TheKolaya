<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/otp/otp-style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <div class="container">
        <h3 class="title">OTP Verification</h3>
        <p class="sub-title">
          Enter the OTP you received to
          <span class="phone-number"><?php echo $_SESSION['contact_number']?></span>
        </p>
        <form action="<?php echo URL?>OtpVerify/checkOtp" method="POST">
            <div class="wrapper">
            <input type="text" class="field 1" name="n-1">
            <input type="text" class="field 2" name="n-2">
            <input type="text" class="field 3" name="n-3">
            <input type="text" class="field 4" name="n-4">
            
            </div>
            <!-- <input type="submit" value="Verify" name="verify" class="btn" /> -->
            <input type="submit" value="Verify" name="<?php echo $_SESSION['controller']?>-verify" class="btn" />
        </form>
        
        <p class="sub-title bottom-sub">Didn't receive the code?</p>
        <a href="<?php echo URL?>OtpVerify/reSendOtp" class="resend">Resend OTP <i class="fa fa-caret-right"></i></a>
        
    </div>
    <script src="<?php echo URL?>vendors/js/otp/otp-js.js"></script>
</body>
</html>