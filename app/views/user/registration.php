<!DOCTYPE html>
<html lang="en">

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .signin-signup .forget-password {
      margin-top: 10px;
    }

    .signin-signup .forget-password a:link,
    .signin-signup .forget-password a:visited {
      text-decoration: none;
      color: #33aa3d;
      padding: 1px 0px;
      border-bottom: 1px solid transparent;
      transition: border-bottom 0.2s;
    }

    .signin-signup .forget-password a:hover,
    .signin-signup .forget-password a:active {
      border-bottom: 1px solid #33aa3d;
    }

    #register_here:hover,
    #login_here:hover {
      border-bottom: 1px solid black;
    }

    .forget-password a {
      text-decoration: none;
      color: black;
      cursor: pointer
    }
  </style>
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/login/style.css" />
</head>

<body>
  <div class="container sign-up-mode">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="<?php echo URL ?>Login" class="sign-in-form" method="POST">
          <div class="logo">
            <img src="<?php echo URL ?>vendors/images/login/logo.png" alt="">
          </div>
          <h2 class="title">LOG IN</h2>
          <div class="input-field <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-phone icon <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['contact_number_err'])) ? '-is-invalid' : ''; ?>" type="tel" placeholder="<?php (!empty($data['contact_number_err'])) ? print $data['contact_number_err'] : print 'mobile number*'; ?>" name="contact_number" />
          </div>

          <div class="input-field <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-lock icon <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['password_err'])) ? '-is-invalid' : ''; ?>" type="password" placeholder="<?php (!empty($data['password_err'])) ? print $data['password_err'] : print 'password*'; ?>" name="password" />
          </div>
          <input type="submit" value="Login" name="login" class="btn solid" />
          <div style="text-align: center;" class="forget-password">
            <a href="<?php echo URL ?>/Login/forgetPassword">Forget Password?</a>
          </div>
          <div style="text-align: center;" class="forget-password">
            <span style="color: blue; cursor:default;">Not a member? </span> <a id="register_here">Register Here</a>
          </div>
        </form>


        <form action="<?php echo URL ?>Registration" class="sign-up-form" method="POST" id="registration_form">
          <div class="logo">
            <img src="<?php echo URL ?>vendors/images/login/logo.png" alt="">
          </div>
          <h2 class="title">REGISTRATION</h2>
          <div class="input-field <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-user icon <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['name_err'])) ? '-is-invalid' : ''; ?>" type="text" placeholder="<?php (!empty($data['name_err'])) ? print $data['name_err'] : print 'name*'; ?>" name="name" />

          </div>

          <div class="input-field <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-phone icon <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['contact_number_err'])) ? '-is-invalid' : ''; ?>" type="tel" placeholder="<?php (!empty($data['contact_number_err'])) ? print $data['contact_number_err'] : print 'mobile number*'; ?>" name="contact_number" />
          </div>

          <div class="input-field <?php echo (!empty($data['user_type_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-chevron-circle-right icon <?php echo (!empty($data['user_type_err'])) ? 'is-invalid' : ''; ?>"></i>
            <!-- <label width for=""></label> -->
            <select name="user_type" id="landowner_type">
              <option value="accountant">Accountant</option>
              <option value="agent">Agent</option>
              <option value="direct_landowner">Direct Land Owner</option>
              <option value="indirect_landowner">Indirect Land Owner</option>
              <option value="manager">Manager</option>
              <option value="product_manager">Product Manager</option>
              <option value="supervisor">Supervisor</option>
            </select>
          </div>

          <div class="input-field <?php echo (!empty($data['user_id_err'])) ? 'is-invalid' : ''; ?>">
            <i class="far fa-id-card icon <?php echo (!empty($data['user_id_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['user_id_err'])) ? '-is-invalid' : ''; ?>" type="text" placeholder="<?php (!empty($data['user_id_err'])) ? print $data['user_id_err'] : print 'user id*'; ?>" name="user_id" />
          </div>

          <div class="input-field <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-envelope icon <?php echo (!empty($data['address_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['address_err'])) ? '-is-invalid' : ''; ?>" type="text" placeholder="<?php (!empty($data['address_err'])) ? print $data['address_err'] : print 'address*'; ?>" name="address" />
          </div>

          <div class="input-field <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-lock icon <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['password_err'])) ? '-is-invalid' : ''; ?>" type="password" placeholder="<?php (!empty($data['password_err'])) ? print $data['password_err'] : print 'password*'; ?>" name="password" />
          </div>

          <div class="input-field <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>">
            <i class="fas fa-check-circle icon <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['confirm_password_err'])) ? '-is-invalid' : ''; ?>" type="password" placeholder="<?php (!empty($data['confirm_password_err'])) ? print $data['confirm_password_err'] : print 'confirm password*'; ?>" name="confirm_password" />
          </div>

          <input type="submit" class="btn" value="Register" name="register" id="registrationBtn" />

          <div style="text-align: center;" class="forget-password">
            <span style="color: blue; cursor: default;">One OF Us? </span><a style="color: black;" id="login_here">Login Here</a>
          </div>
        </form>

      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <div class="content">
          <h3>NEW TO තේ කොළය?</h3>
          <button class="btn transparent" id="sign-up-btn">REGISTER</button>
        </div>
        <img src="<?php echo URL ?>vendors/images/login/login.svg" alt="" class="image">
      </div>
      <div class="panel right-panel">
        <div class="content">
          <h3>ONE OF තේ කොළය?</h3>
          <button class="btn transparent" id="sign-in-btn">LOG IN</button>
        </div>
        <img src="<?php echo URL ?>vendors/images/login/register.svg" alt="" class="image">
      </div>
    </div>
  </div>

  <script src="<?php echo URL ?>vendors/js/login/app.js"></script>
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
  <script>
    $(document).ready(function() {
      var inputField = $('#registration_form input');
      var selectField = $('#registration_form select');
      var options = $('#registration_form option');
      var user_id = '';
      var form = '';
      console.log(options);
      var icon = $('#registration_form i');
      var url = "<?php echo URL ?>Registration/controllCheckData";
      var noErrors = 0;

      var errors = {
        'name': '',
        'mobile_number': '',
        'user_type': '',
        'user_id': '',
        'address': '',
        'password': '',
        'confirm_password': ''
      };

      function hasNumber(string) {
        return /\d/.test(string);
      }

      function showError(number, error) {
        inputField[number].value = '';
        inputField[number].placeholder = error;
        $(inputField[number]).removeClass('input-field input')
        $(inputField[number]).addClass('is-invalid');
        $(inputField[number].parentNode).addClass('is-invalid');
        if (number > 2) {
          number++;
          $(icon[number]).addClass('is-invalid');
        } else {
          $(icon[number]).addClass('is-invalid');
        }
      }

      function removeError(number) {
        SerializeData();
        $(inputField[number]).removeClass('is-invalid');
        $(inputField[number].parentNode).removeClass('is-invalid');
        if (number > 2) {
          number++;
          $(icon[number]).removeClass('is-invalid');
        } else {
          $(icon[number]).removeClass('is-invalid');
        }
      }

      function SerializeData() {
        form = $('#registration_form').serializeArray();
      }

      function isEmpty(number) {
        if (inputField[number].value.length == 0) {
          return true;
        } else {
          return false;
        }
      }

      //Validate The Name
      $(inputField[0]).change(function() {
        if (hasNumber(inputField[0].value)) {
          errors.name = "The name Can't contain Numbers";
          showError(0, errors.name);
        } else if (isEmpty(0)) {
          errors.name = "The must be filled";
          console.log('hi')
          showError(0, errors.name);
        } else {
          errors.name = '';
          removeError(0);
        }
      });

      //Validate The mobile
      function phonenumber(inputtxt) {
        var phoneno = /^\d*(?:\.\d{1,2})?$/;
        if (inputtxt.match(phoneno)) {
          return true;
        } else {
          return false;
        }
      }
      $(inputField[1]).change(function() {
        if (inputField[1].value.length < 10) {
          errors.mobile_number = "There must 10 charchters";
          showError(1, errors.mobile_number);
        } else if (inputField[1].value >= 10) {
          SerializeData();
          form.push({
            name: 'function_name',
            value: 'checkUser'
          });
          $.ajax({
            url: url,
            type: 'POST',
            data: form,
            success: function(responseText) {
              if (responseText == 'Verified') {
                console.log('verified');
                errors.mobile_number = "Mobile Numuber is already Taken";
                showError(1, errors.mobile_number);
              } else if (responseText == 'notRegistered') {
                errors.mobile_number = "Not Registered Mobile Number";
                showError(1, errors.mobile_number);
              } else {
                inputField[2].value = responseText;
                $(inputField[2]).attr('readonly', 'readonly');
                removeError(1);
              }
              // console.log(form);
            }
          })
        } else if (isEmpty(1)) {
          showError(1);
        } else if (!phonenumber(inputField[1].value)) {
          errors.mobile_number = "Can't include characters";
          showError(1, errors.mobile_number);
        } else {
          errors.mobile_number = '';
          removeError(1);
        }
        console.log(errors);
      });

      //validate the confirm password
      $(inputField[5]).change(function() {
        if (inputField[5].value != inputField[4].value) {
          errors.confirm_password = "Confirmation Wrong !";
          showError(5, errors.confirm_password);
        } else {
          errors.confirm_password = '';
          removeError(5);
        }
      });

      console.log(inputField);

      function hasError(input) {
        if (input == '') {
          noErrors = 0;
          return true;
        } else {
          noErrors++;
          return false;
        }
      }

      $('#registrationBtn').click(function(event) {
        event.preventDefault();
        SerializeData();
        for (var i = 0; i < form.length; i++) {
          if (hasError(form[i]['value'])) {
            switch (i) {
              case 0:
                errors.name = "This is must filled";
                showError(0, errors.name);
                break;
              case 1:
                errors.mobile_number = "This is must filled";
                showError(1, errors.mobile_number);
                break;
              case 2:
                errors.user_type = "This is must filled";
                showError(2, errors.user_type);
                break;
              case 3:
                errors.user_id = "This is must filled";
                // showError(3, errors.user_id);
                break;
              case 4:
                errors.address = "This is must filled";
                showError(3, errors.address);
                break;
              case 5:
                errors.password = "This is must filled";
                showError(4, errors.password);
                break;
              case 6:
                errors.confirm_password = "This is must filled";
                showError(5, errors.confirm_password);
                break;
            }
          } else {
            console.log('hi');
          }
        }
        console.log(errors);
        console.log(form)
        console.log(form[0]['value']);

        if (noErrors == 7) {
          form.push({
            name: 'function_name',
            value: 'registration'
          });
          $.ajax({
            type: "POST",
            url: "<?php echo URL ?>controllCheckData",
            data: form,
            success: function() {
              console.log('success');
              console.log(form);
              Swal.fire(
                'Updated!',
                'Your file has been updated.',
                'success'
              ).then((result) => {
                <?php setOtp();?>
                location.replace("<?php echo URL?>OtpVerify");
                console.log("Swal called");
              });
            }
          });
        }
        console.log(noErrors);
      });

      //ChangeUserIdByOption
      $(selectField).click(function() {
        // console.log('Select Changed');
        // console.log(selectField[0].value)
        // switch (selectField[0].value) {
        //   case 'accountant':
        //     inputField[2].value = 'ACC-';
        //     break;
        //   case 'agent':
        //     inputField[2].value = 'AGN-';
        //     break;
        //   case 'manager':
        //     inputField[2].value = 'MAN-';
        //     break;
        //   case 'indirect_landowner':
        //     inputField[2].value = 'LAN-';
        //     break;
        //   case 'direct_landowner':
        //     inputField[2].value = 'LAN-';
        //     break;
        //   case 'admin':
        //     inputField[2].value = 'ADM-';
        //     break;
        //     case 'supervisor':
        //     inputField[2].value = 'SUP-';
        //     break;
        //     case 'product_manager':
        //     inputField[2].value = 'ACC-';
        //     break;

        // }
      })
      //Validate User Id
      $(inputField[2]).change(function() {

      })

      // $('#registration_form').click(function(event) {
      //   event.preventDefault();
      //   if (hasNumber(inputField[0].value)) {
      //     inputField[0].value = '';
      //     inputField[0].placeholder = errors.name;
      //     $(inputField[0]).removeClass('input-field input')
      //     $(inputField[0]).addClass('is-invalid');
      //     $(inputField[0].parentNode).addClass('is-invalid');
      //     for (var i = 0; i < 7; i++)
      //       $(icon[i]).addClass('is-invalid');
      //     console.log($('#name_input').hasClass('is-invalid'));
      //     console.log($(inputField[0].parentNode));
      //   }
      //   // console.log(inputField[0].value)
      // });
      //name errors
      if (hasNumber(inputField[0].value)) {
        errors.name = "Name can't contain numbers";
        errorsHandler(0);
      }

      //contact Number errors
      // if (inputField[1].value < 10) {
      //   errors.mobile_number = "There must 10 charchters";
      //   errorsHandler(1);
      // }else if(inputField[1].value >= 10) {
      //   removeError(1);
      // }
    });
  </script>
</body>

</html>