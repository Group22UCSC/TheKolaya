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
    <h3 class="title">Change your Password</h3>
    <p class="sub-title">
      Fill those Fields
    </p>
    <form action="<?php echo URL ?>User/changePassword" method="POST" id="change_password_form">
      <div class="form">
        <div class="inputfield">
          <label for="old-password">old password</label>
          <p style="color: red;"><?php (empty($data['password_err'])) ? print '' : print '*' . $data['password_err'] ?></p>
          <input style="margin-bottom:20px" type="password" class="input" name="password" id="password">

          <label for="new-password">new password</label>
          <p style="color: red;"><?php (empty($data['new_password_err'])) ? print '' : print '*' . $data['new_password_err'] ?></p>
          <input style="margin-bottom:20px" type="password" class="input" name="new_password">

          <label for="confirm-password">Confirm password</label>
          <p style="color: red;"><?php (empty($data['confirm_password_err'])) ? print '' : print '*' . $data['confirm_password_err'] ?></p>
          <input style="margin-bottom:20px" type="password" class="input" name="confirm_password">
        </div>
        <div class="inputfield">
          <input type="submit" value="Change" name="change_pw_btn" class="btn" id="change_password_btn">
        </div>
      </div>
    </form>
  </div>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {
      var inputField = $("#change_password_form input");
      var form = '';
      var pTags = $("#change_password_form p")

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

      $(inputField[0]).keydown(function() {
        removeError(0);
      });

      $(inputField[1]).keydown(function() {
        removeError(1);
      });

      $(inputField[2]).keydown(function() {
        removeError(2);
      });

      $('#change_password_btn').click(function(event) {
        if (inputField[0].value == "") {
          errors[0] = "*This must be filled !";
          showError(errors[0], event, 0);
        } else {
          var oldPassword = inputField[0].value;
          $.ajax({
            url: "<?php echo URL ?>/User/isPasswordCorrect",
            type: 'POST',
            data: "old_password=" + oldPassword,
            dataType: "JSON",
            success: function(response) {
              if (response) {
                removeError(0)
              } else {
                errors[0] = "*Old password is wrong !";
                showError(errors[0], event, 0);
              }
            }
          })
        }

        if (inputField[1].value == "") {
          errors[1] = "*This must be filled !";
          showError(errors[1], event, 1);
        } else if (!CheckPassword((inputField[1].value))) {
          errors[1] = "*This must be a strong password !";
          showError(errors[1], event, 1);
        }

        if (inputField[2].value == "") {
          errors[2] = "*This must be filled !";
          showError(errors[2], event, 2);
        } else if (inputField[1].value != inputField[2].value) {
          errors[2] = "*Password confirmation is wrong !";
          showError(errors[2], event, 2);
        }

        if (errors[0] == '' && errors[1] == '' && errors[2] == '') {
          event.preventDefault();
          var form = $('#change_password_form').serializeArray();
          var url = "<?php echo URL ?>User/changePassword";
          $.ajax({
            url: url,
            type: 'POST',
            data: form,
            success: function() {
              Swal.fire({
                icon: 'success',
                title: 'Updated !',
                text: 'Your file has been updated.',
                confirmButtonColor: '#01830c'
              }).then((result) => {
                location.replace("<?php echo URL ?>Login");
              })
            }
          })
        }
      })
    })
  </script>
  <script>
    $(document).ready(function() {

    })
  </script>
  <script src="<?php echo URL ?>vendors/js/otp/otp-js.js"></script>
</body>

</html>