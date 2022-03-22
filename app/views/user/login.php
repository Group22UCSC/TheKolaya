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

    #register_here {
      color: black;
    }
    .signin-signup .forget-password #register_here:hover,
    .signin-signup .forget-password #register_here:active {
      border-bottom: 1px solid black;
    }

  </style>
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/login/style.css" />
</head>

<body>
  <div class="container">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="<?php echo URL ?>Login" class="sign-in-form" method="POST" id="loginForm">
          <div class="logo">
            <img src="<?php echo URL ?>vendors/images/login/logo.png" alt="">
          </div>
          <h2 class="title">LOG IN</h2>

          <div class="input-field">
            <i class="fas fa-phone icon"></i>
            <input class="input" type="tel" placeholder="mobile number*" name="contact_number" />
          </div>

          <div class="input-field">
            <i class="fas fa-lock icon"></i>
            <input class="input" type="password" placeholder="password*" name="password" />
          </div>

          <input type="button" value="Login" name="login" class="btn solid" id="login_btn"/>

        </form>
        <div style="text-align: center;" class="forget-password">
          <a href="<?php echo URL ?>Login/forgetPassword">Forget Password?</a>
        </div>
        <div style="text-align: center;" class="forget-password">
          <span style="color: blue; cursor:default">Not a member? </span> <a id="register_here" href="<?php echo URL ?>Registration">Register From Here</a>
        </div>
      </div>
    </div>

    <div class="panels-container">
      <div class="panel left-panel">
        <img src="<?php echo URL ?>vendors/images/login/login.svg" alt="" class="image">
      </div>
      <div class="panel right-panel">
        <img src="<?php echo URL ?>vendors/images/login/register.svg" alt="" class="image">
      </div>
    </div>
  </div>
<?php include 'js/login/loginJs.php'?>
</body>

</html>