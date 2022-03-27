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
  <style>
    .news {
      color: #198d49;
      background: linear-gradient(45deg, #4DD101, #4DD101);
      background-position: center bottom;
      background-size: 0% 4px;
      background-repeat: no-repeat;
      transition: background-size 300ms ease-in-out;
    }

    .news:hover {
      background-size: 100% 4px;
    }

    .edit-profile-btn {
      margin-left: 340px;
      margin-bottom: 10px;
      cursor: pointer;
    }
  </style>
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
        <form action="<?php echo URL . $_SESSION['user_type'] ?>/editProfile" method="POST" id="editProfileForm">
          <div class="form">
            <div class="inputfield">
              <label>Name</label>
              <input type="text" class="input" id="Name" value="<?php echo $_SESSION['name'] ?>" name="name">
            </div>
            <p style="color:red"></p>
            <div class="edit-profile-btn" id="edit_name_btn">
              <a class="news">edit name</a>
            </div>
            <div class="inputfield">
              <label>Mobile Number</label>
              <input type="number" class="input" id="Mobile-number" value="<?php echo  $_SESSION['contact_number'] ?>" name="contact_number" readonly>
            </div>
            <!-- <div class="edit-profile-btn">
              <a class="news">edit mobile</a>
            </div> -->
            <div class="inputfield" id="left-btn">
              <a href="<?php echo URL ?>User/changePassword"><input type="button" value="Change Password" class="accept-btn change"></a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
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
  </script>
  <script>
    $(document).ready(function() {
      var errors = ["", ""];
      var pTags = $("#editProfileForm p");

      function showError(erroMessage, number) {
        $(pTags[number]).html(erroMessage);
      }

      function removeError(number) {
        errors[number] = "";
        $(pTags[number]).html("");
      }

      function hasNumber(string) {
        return /\d/.test(string);
      }

      function hasSpecialCharacters(string) {
        var format = /[`!@#$%^&*()_+\-=\[\]{};':"\\|,.<>\/?~]/;

        if (format.test(string)) {
          return true;
        } else {
          return false;
        }
      }

      $("#Name").keydown(function() {
        removeError(0);
      })
      $("#edit_name_btn").click(function() {
        var name = $("#Name").val();

        if (hasNumber(name)) {
          errors[0] = "*Can't contain numbers";
          showError(errors[0], 0);
        } else if (hasSpecialCharacters(name)) {
          errors.name = "*Can't contain special characters";
          showError(errors[0], 0);
        } else {
          removeError(0);
          Swal.fire({
            title: 'Are you sure?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#01830c',
            cancelButtonColor: '#FF2400',
            confirmButtonText: 'Yes, Update it!'
          }).then((result) => {
            if (result.isConfirmed) {
              $.ajax({
                url: "<?php echo URL?>User/editName",
                type: "POST",
                data: "name=" + name,
                cache: false,
                success: function() {
                  Swal.fire({
                    icon: 'success',
                    title: 'Updated !',
                    text: 'Your file has been updated.',
                    confirmButtonColor: '#01830c'
                  }).then((result) => {
                    location.reload();
                  })
                }
              })
            }
          })

        }
      })
    })
  </script>
  <?php
  $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/bottom-container.php';
  if (file_exists($file)) {
    include $file;
  } else {
    $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/bottomContainer.php';
    include $file;
  }
