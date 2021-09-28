<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo TITLE?></title>
    <link rel = "icon" href = "<?php echo URL?>vendors/images/thekolaya2.png" type = "image/x-icon">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/<?php echo $_SESSION['user_type']?>/<?php echo $_SESSION['user_type']?>-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/<?php echo $_SESSION['user_type']?>/<?php echo $_SESSION['user_type']?>-queries.css">
    <link href="https://fonts.googleapis.com/css?family=Merriweather|Montserrat|Sacramento" rel="stylesheet">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/top-bottom-style.css">
    <link rel="stylesheet" href="<?php echo URL?>vendors/css/top-bottom-query.css">
    <script src="https://kit.fontawesome.com/a8f32993e8.js" crossorigin="anonymous"></script>
</head>
<body>
<div class="top-container">
        <nav>
            <div class="nav-bar-left">
                <ul>
                    <li class="nav home">
                        <div>
                            <a href="#"><i class="fas fa-home"></i> HOME</a>
                        </div>
                    </li>
                    <li class="nav notification">
                        <div>
                            <a href="#"><i class="fas fa-bell"></i> NOTIFICATION</a>
                        </div>
                    </li>    
                </ul>
            </div>
            
            <div class="nav-bar-right">
                <ul>
                    <li class="nav profile">
                        <div>
                            <a href="#"><i class="fas fa-user"></i> PROFILE</a>
                        </div>
                    </li>

                    <li class="nav logout">
                        <div>
                            <a href="<?php echo URL?>login/logout"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
        <div class="thekolaya-div">
            <img src="<?php echo URL?>/vendors/images/thekolaya.png" alt="" class="thekolaya">
        </div>
        <div class="mobile-nav-icon" id="open">
            <i class="fas fa-align-justify" onclick="togglemenu()"></i>
        </div>
        <div class="mobile-nav-icon" id="close">
            <i class="fas fa-times" onclick="closemenu()"></i>
        </div>

        <div class="mobile-nav-bar" id="#mnb">
            <ul>
                <li class="mobile home">
                    <div>
                        <a href="#"><i class="fas fa-home"></i> HOME</a>
                    </div>
                </li>
                <li class="mobile profile">
                    <div>
                        <a href="#"><i class="fas fa-user"></i> PROFILE</a>
                    </div>
                </li>
                
                <li class="mobile notification">
                    <div>
                        <a href="#"><i class="fas fa-bell"></i> NOTIFICATION</a>
                    </div>
                </li>

                <li class="mobile logout">
                    <div>
                        <a href="<?php echo URL?>login/logout"><i class="fas fa-sign-out-alt"></i> LOGOUT</a>
                    </div>
                </li>
            </ul>
        </div>

    </div>