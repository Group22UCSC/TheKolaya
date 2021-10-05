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
    </style>
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/login/style.css" />
  </head>
  <body>
    <div class="container">
      <div class="forms-container">
        <div class="signin-signup">

          <form action="<?php echo URL?>login" class="sign-in-form" method="POST">
            <div class="logo">
            <img src="<?php echo URL?>vendors/images/login/logo.png" alt="">
            </div>
            <h2 class="title">LOG IN</h2>
            <?php flash('register_success');?>
            <div class="input-field <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>">
              <i class="fas fa-phone icon <?php echo (!empty($data['contact_number_err'])) ? 'is-invalid' : ''; ?>"></i>
              <input class="input<?php echo (!empty($data['contact_number_err'])) ? '-is-invalid' : ''; ?>" type="tel" placeholder="<?php (!empty($data['contact_number_err'])) ? print $data['contact_number_err'] : print 'mobile number*'; ?>" name="contact_number"/>
            </div>

            <div class="input-field <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>">
              <i class="fas fa-lock icon <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>"></i>
              <input class="input<?php echo (!empty($data['password_err'])) ? '-is-invalid' : ''; ?>"  type="password" placeholder="<?php (!empty($data['password_err'])) ? print $data['password_err'] : print 'password*'; ?>" name="password"/>
            </div>

            <input type="submit" value="Login" name="login" class="btn solid" />
            
          </form>
          <div style="text-align: center;" class="forget-password">
          <a href="<?php echo URL?>login/forgetPassword">Forget Password?</a></div>
        </div>
      </div>

      <div class="panels-container">
        <div class="panel left-panel">
          <img src="<?php echo URL?>vendors/images/login/login.svg" alt="" class="image">
        </div>
        <div class="panel right-panel">
          <img src="<?php echo URL?>vendors/images/login/register.svg" alt="" class="image">
        </div>
      </div>
    </div>

    <script src="<?php echo URL?>vendors/js/login/app.js"></script>
  </body>
</html>
