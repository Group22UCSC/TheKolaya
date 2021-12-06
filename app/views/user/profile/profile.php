<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="UTF-8">
    <title><?php echo TITLE ?></title>
    <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style2.css">
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/profile-style.css">
    <!-- <link rel="stylesheet" href="<?php echo URL ?>vendors/css/popup-modal-style.css"> -->
    <link rel="stylesheet" href="<?php echo URL ?>vendors/css/supervisor/table-style.css">
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
        <h2>Profile</h2>
    </div>

    <div class="middle-container">
        <div class="wrapper-profile">
            <div class="profile-container middle">
                <div class="container">
                    <h1>Profile Image Upload</h1>
                    <form action="<?php echo URL ?>User/setProfile" method="POST" enctype="multipart/form-data" id="profile_change_form">
                        <div class="avatar-upload">
                            <div class="avatar-edit">
                                <input type="file" id="imageUpload" name="image_file" accept=".png, .jpg, .jpeg" />
                                <label for="imageUpload"></label>
                            </div>
                            <div class="avatar-preview">
                                <div id="imagePreview" style="background-image: url('<?php echo URL . 'vendors/images/' . $_SESSION['profile_picture'] ?>');">
                                </div>
                            </div>
                        </div>
                        <input style="display:none;" type="submit" value="change profile" name="change_profile_sumbit_btn" id="change_profile_sumbit_btn">
                    </form>
                </div>
                <div class="profile-container-text">
                    <h1><?php echo $_SESSION['name'] ?></h1>
                </div>
                <div class="profile-container-text"><?php echo $_SESSION['user_type'] ?></div>
            </div>

            <div class="details-container">
                <div class="label-container id">
                    <span class="label-left"><b>ID</b></span><span class="label-right"><?php echo $_SESSION['user_id'] ?></span>
                </div>
                <div class="label-container address">
                    <span class="label-left"><b>Address</b></span><span class="label-right"><?php echo $_SESSION['address'] ?></span>
                </div>
            </div>
            <div class="profile-edit middle"><a href="<?php echo URL . $_SESSION['user_type'] ?>/editProfile">Edit Profile</a></div>

        </div>
    </div>

    <?php
    include 'js/profileJS.php';
    $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/bottom-container.php';
    if (file_exists($file)) {
        include $file;
    } else {
        $file = '../app/views/' . strtolower($_SESSION["user_type"]) . '/bottomContainer.php';
        include $file;
    }
    ?>