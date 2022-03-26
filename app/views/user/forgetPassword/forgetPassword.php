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
    <h3 class="title">Verify The Mobile Number</h3>
    <p class="sub-title">
      Enter Your Registered Mobile Number To Check Your Registration
    </p>
    <form action="<?php echo URL ?>login/forgetPassword" method="POST" id="forgetPasswordForm">
      <div class="form">
        <p id="forgetPasswordError" style="color: red;"></p>
        <div class="inputfield">
          <input type="tel" class="input" name="contact_number">
        </div>
        <div class="inputfield">
          <input type="submit" value="Enter" name="enter_btn" class="btn" id="forgetPasswordSubmit">
        </div>
      </div>
    </form>
  </div>
  <script src="<?php echo URL ?>vendors/js/otp/otp-js.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {
      var inputField = $("#forgetPasswordForm input");
      var form = '';

      function showError(erroMessage, event) {
        event.preventDefault();
        $("#forgetPasswordError").html(erroMessage);
      }

      function removeError() {
        errors.mobile_number = "";
        $("#forgetPasswordError").html("");
      }

      function SerializeData() {
        form = $("#forgetPasswordError").serializeArray();
      }
      var errors = {
        mobile_number: ""
      };

      function phonenumber(inputtxt) {
        var phoneno = /^\d*(?:\.\d{1,2})?$/;
        if (inputtxt.match(phoneno)) {
          return true;
        } else {
          return false;
        }
      }
      $(inputField[0]).keypress(function() {
        removeError(0);
      });
      $("#forgetPasswordSubmit").click(function(event) {
        if (inputField[0].value.length < 10) {
          errors.mobile_number = "*Less than 10 charchters";
          showError(errors.mobile_number, event);
        } else if (inputField[0].value.length > 10) {
          errors.mobile_number = "*More than 10 charchters";
          showError(errors.mobile_number, event);
        } else if (!phonenumber(inputField[0].value)) {
          errors.mobile_number = "*Can't include characters";
          showError(errors.mobile_number, event);
        }
      })
    })
  </script>
</body>

</html>