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
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/login/style.css" />
</head>

<body>
  <div class="container sign-up-mode">
    <div class="forms-container">
      <div class="signin-signup">

        <form action="<?php echo URL ?>login" class="sign-in-form" method="POST">
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
            <a href="<?php echo URL ?>/login/forgetPassword">Forget Password?</a>
          </div>
          <div style="text-align: center;" class="forget-password">
            <span style="color: blue; cursor:context-menu">Not a member? </span> <a href="<?php echo URL ?>registration">Register Here</a>
          </div>
        </form>


        <form action="<?php echo URL ?>registration" class="sign-up-form" method="POST">
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

          <div class="input-field <?php echo (!empty($data['user_id_err'])) ? 'is-invalid' : ''; ?>">
            <i class="far fa-id-card icon <?php echo (!empty($data['user_id_err'])) ? 'is-invalid' : ''; ?>"></i>
            <input class="input<?php echo (!empty($data['user_id_err'])) ? '-is-invalid' : ''; ?>" type="text" placeholder="<?php (!empty($data['user_id_err'])) ? print $data['user_id_err'] : print 'user id*'; ?>" name="user_id" />
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
</body>

</html>