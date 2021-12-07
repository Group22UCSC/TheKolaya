<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style2.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
  <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>
  <div class="sidebar">
    <div class="logo-details">
      <div class="logo_name"><img src="<?php echo URL ?>vendors/images/thekolaya-white.png" alt=""></div>
      <i class="fas fa-bars" id="btn"></i>
    </div>
    <ul class="nav-list">
      
    <li>
        <a href="<?php echo URL?>accountant">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
         <span class="tooltip">Dashboard</span>
      </li>
      
     <li>
       <a href="<?php echo URL?>/accountant/requests">
        <i class="far fa-registered fa-2x"></i>
         <span class="links_name">Requests</span>
       </a>
       <span class="tooltip">Requests</span>
     </li>
     <li>
       <a href="<?php echo URL?>accountant/payments">
        <i class="fas fa-hand-holding-usd fa-2x"></i>
         <span class="links_name">Payments</span>
       </a>
       <span class="tooltip">Payments</span>
     </li>
     <li>
       <a href="<?php echo URL?>accountant/setTeaPrice">
        <i class="fa fa-dollar-sign fa-2x"></i>
         <span class="links_name">Tea Price</span>
       </a>
       <span class="tooltip">Tea Price</span>
     </li>
     <li>
      <a href="<?php echo URL?>accountant/auction">
       <i class="fas fa-chart-line fa-2x"></i>
        <span class="links_name">Auction Deatils</span>
      </a>
      <span class="tooltip">Auction Deatils</span>
    </li>
     <li>
      <a href="<?php echo URL?>/accountant/landowners">
       <i class="fas fa-user-tie fa-2x"></i>
        <span class="links_name">Landowners</span>
      </a>
      <span class="tooltip">Landowners</span>
    </li>
     
    
    </ul>
  </div>
  <section class="home-section">
    <div class="wrapper">
      <div class="navbar">
        <div class="navbar_left">
          <div class="thekolya-logo"><img src="<?php echo URL ?>vendors/images/thekolaya.png" alt=""></div>
        </div>

        <div class="navbar_right">
        <!-- Newly added -->
        <div class="icons">
          <div class="notification">
            <div class="notBtn">
              <?php
              $notificationCount = '';
              if ($_SESSION['NotSeenCount'] >= 100) {
                $notificationCount = 99;
              } else if ($_SESSION['NotSeenCount']) {
                $notificationCount = $_SESSION['NotSeenCount'];
              }
              ?>
              <!-- Using AJAX Update notification_count -->
              <div class="notiNumber" id="notification_count"><?php echo $notificationCount; ?></div>

              <i class="fas fa-bell notification_bell"></i>
              <div class="notiBox">
                <!-- <div style="padding: 15px 0 15px 30px; font-size: 1.5rem; font-weight:bold; background-color:#27ae60;">
                  Notifications
                </div> -->
                <div class="notification_header">
                  <div class="notification_top">Notifications</div>
                  <button id="notification_all_btn">All</button>
                  <button id="notification_unread_btn">Unread</button>
                </div>
                <div class="display">
                  <div class="cont" id="get_nofication">
                    <!-- Get Notification to here Using AJAX-->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- ------------------------------ -->
        <?php include '../app/views/user/profile/navBarProfile.php'; ?>
      </div>
      </div>

      

    </div>