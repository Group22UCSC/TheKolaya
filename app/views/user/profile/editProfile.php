<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style2.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/editProfile-style.css">

  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <?php
  $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/top-container.php';
  if (file_exists($file)) {
    include $file;
  } else {
    $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/topContainer.php';
    include $file;
  }
  ?>
  <div class="title-container">
    <h2>Edit Profile</h2>
  </div>
  <div class="middle-container">
    <div class="from-container-outside">
      <div class="form-container">
        <div class="title">Edit Your Profile</div>
        <form action="<?php echo URL . $_SESSION['user_type'] ?>/editProfile" method="POST">
          <div class="form">
            <div class="inputfield">
              <label>Name</label>
              <input type="text" class="input" id="Name" value="<?php echo $_SESSION['name'] ?>" name="name">
            </div>
            <div class="inputfield">
              <label>Mobile Number</label>
              <input type="number" class="input" id="Mobile-number" value="<?php echo  $_SESSION['contact_number'] ?>" name="contact_number">
            </div>
            <div class="inputfield" id="left-btn">
              <a href="<?php echo URL ?>User/changePassword"><input type="button" value="Change Password" class="accept-btn change"></a>
            </div>
            <div class="inputfield" id="right-btn">
              <input type="submit" value="Accept" class="accept-btn" name="accept-btn">
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
  <!-- <script src="<?php echo URL ?>vendors/js/editProfile.js"></script> -->
  <script src="<?php echo URL ?>vendors/js/jquery-3.6.0.min.js"></script>
  <script src="<?php echo URL ?>vendors/js/sweetalert2.all.min.js"></script>
  <script>
    //Change password
    $("#left-btn").click(function(event) {
      event.preventDefault();
      Swal.fire({
        title: 'Are you sure?',
        html: '<div>Do you want to change the password?</div>',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#4DD101',
        cancelButtonColor: '#FF2400',
        confirmButtonText: '<a style="text-decoration:none; color: white" href="<?php echo URL ?>User/changePassword">Yes</a>',
        cancelButtonText: 'No'
      });
      // console.log("Helo")
    });

    //Edit Profile
    // $("#right-btn").click(function(event) {
    //   var 
    //   event.preventDefault();
    //   Swal.fire({
    //     title: 'Are you sure?',
    //     html: '<div>Do you want to edit the profile?</div>',
    //     icon: 'warning',
    //     showCancelButton: true,
    //     confirmButtonColor: '#4DD101',
    //     cancelButtonColor: '#FF2400',
    //     confirmButtonText: '<a style="text-decoration:none; color: white" href="<?php echo URL ?>User/changePassword">Yes</a>',
    //     cancelButtonText: 'No'
    //   });
    //   // console.log("Helo")
    // });
  </script>
  <?php
  $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/bottom-container.php';
  if (file_exists($file)) {
    include $file;
  } else {
    $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/bottomContainer.php';
    include $file;
  }
