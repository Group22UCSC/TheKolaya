<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/profile-style.css">
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
<?php include 'topContainer.php';?>
    <div class="title-container">
        <h2>Profile</h2>
    </div>
    
    <div class="middle-container">
        <div class="wrapper-profile">
            <div class="profile-container middle">
                <div class="profile-img middle">
                    <img src="<?php echo URL?>vendors/images/agent/profile.jpg" alt="">
                </div>
                <div class="profile-container-text"><h1><?php echo $_SESSION['name'];?></h1></div>
                <div class="profile-container-text"><?php echo $_SESSION['user_type'];?></div>
            </div>
            <div class="details-container">
                <div class="label-container id">
                    <span class="label-left"><b>ID</b></span><span class="label-right"><?php echo $_SESSION['user_id'];?></span>
                    
                </div>
                <div class="label-container address">
                    <span class="label-left"><b>Address</b></span><span class="label-right"><?php echo $_SESSION['address'];?></span>
                </div>
            </div>
            <div class="profile-edit middle"><a href="<?php echo URL?>Agent/editProfile">Edit Profile</a></div>
            
        </div>
    </div>
<?php include 'bottomContainer.php';?>
