<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title><?php echo TITLE ?></title>
    <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/profile-style.css">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/table-style.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
    <?php include 'top-container.php'; ?>
    <div class="title-container">
        <h2>Profile</h2>
    </div>

    <div class="middle-container">
        <div class="wrapper-profile">
            <div class="profile-container middle">
                <div class="profile-img middle">
                    <img src="<?php echo URL ?>vendors/images/landowner/profile.jpg" alt="">
                </div>
                <div class="profile-container-text">
                    <h1>Sasindu <br> Wijegunasinghe</h1>
                </div>
                <div class="profile-container-text">landowner</div>
            </div>
            <div class="details-container">
                <div class="label-container id">
                    <span class="label-left"><b>ID</b></span><span class="label-right">Lan-006</span>
                </div>
                <div class="label-container address">
                    <span class="label-left"><b>Address</b></span><span class="label-right">Imaduwa, Galle</span>
                </div>
            </div>
            <div class="profile-edit middle"><a href="<?php echo URL ?>landowner/editProfile">Edit Profile</a></div>

        </div>
    </div>
    <?php include 'bottom-container.php'; ?>