<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/otp/otp-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/login/forgetPassword-style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>
<body>
    <div class="container">
        <h3 class="title">Verify The Mobile Number</h3>
        <p class="sub-title">
          Enter Your Registered Mobile Number To Check Your Registration
        </p>
        <form action="<?php echo URL?>login/forgetPassword" method="POST">
            <div class="form">
                <div class="inputfield">
                  <input type="tel" class="input" name="contact_number">
                </div>
              <div class="inputfield">
                <input type="submit" value="Enter" name="enter_btn" class="btn">
              </div>
            </div>
        </form>
    </div>
    <script src="<?php echo URL?>vendors/js/otp/otp-js.js"></script>
</body>
</html>