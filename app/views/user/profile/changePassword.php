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
        <h3 class="title">Change your Password</h3>
        <p class="sub-title">
          Fill those Fields
        </p>
        <form action="<?php echo URL.$_SESSION['user_type']?>/changePassword" method="POST">
            <div class="form">
                <div class="inputfield">
                  <label for="new-password">old password</label>
                    <input type="password" class="input" name="password">

                    <label for="new-password">new password</label>
                    <input type="password" class="input" name="new_password">

                    <label for="confirm-password">Confirm password</label>
                    <input type="password" class="input" name="confirm_password">
                </div>
              <div class="inputfield">
                <input type="submit" value="Change" name="change_pw_btn" class="btn">
              </div>
            </div>
        </form>
    </div>
    <script src="<?php echo URL?>vendors/js/otp/otp-js.js"></script>
</body>
</html>