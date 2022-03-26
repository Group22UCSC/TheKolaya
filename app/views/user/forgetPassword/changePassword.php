<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/otp/otp-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/login/forgetPassword-style.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
</head>

<body>
  <div class="container">
    <h3 class="title">Your Mobile Number is Verified</h3>
    <p class="sub-title">
      You Can Change Password In Here Password should contain at least one lowercase letter, one uppercase letter, one numeric digit, and one special character
    </p>
    <form action="<?php echo URL ?>Login/changePassword" method="POST" id="changePasswordForm">
      <div class="form">
        <div class="inputfield">
          <label for="new-password">new password</label>
          <p id="newPasswordError" style="color: red;"></p>
          <input type="password" class="input" name="new_password">

          <label for="confirm-password">Confirm password</label>
          <p id="confirmPasswordError" style="color: red;"><?php (empty($data['confirm_password_err'])) ? print '' : print '*' . $data['confirm_password_err'] ?></p>
          <input type="password" class="input" name="confirm_password">
        </div>
        <div class="inputfield">
          <input type="submit" value="Change" name="change_pw_btn" class="btn" id="changePasswordSubmit">
        </div>
      </div>
    </form>
  </div>
  <script src="<?php echo URL ?>vendors/js/otp/otp-js.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {
      var inputField = $("#changePasswordForm input");
      var form = '';
      var pTags = $("#changePasswordForm p")

      function showError(erroMessage, event, number) {
        event.preventDefault();
        $(pTags[number]).html(erroMessage);
      }

      function removeError(number) {
        errors[number] = "";
        $(pTags[number]).html("");
      }

      function CheckPassword(inputtxt) {
        var decimal = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[^a-zA-Z0-9])(?!.*\s).{8,15}$/;
        if (inputtxt.match(decimal)) {
          return true;
        } else {
          return false;
        }
      }
      var errors = ['', ''];

      $(inputField[0]).keypress(function() {
        removeError(0);
      });

      $(inputField[1]).keypress(function() {
        removeError(1);
      });
      
      $("#changePasswordSubmit").click(function(event) {
        if (inputField[0].value == "") {
          errors[0] = "*This must be filled !";
          showError(errors[0], event, 0);
        }else if (!CheckPassword((inputField[0].value))) {
          errors[0] = "*This must be a strong password !";
          showError(errors[0], event, 0);
        }

        if (inputField[1].value == "") {
          errors[1] = "*This must be filled !";
          showError(errors[1], event, 1);
        }else if (inputField[0].value != inputField[1].value) {
          errors[1] = "*Password confirmation is wrong !";
          showError(errors[1], event, 1);
        }
      })
    })
  </script>
</body>

</html>