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
      <!-- <li>
          <i class='bx bx-search' ></i>
         <input type="text" placeholder="Search...">
         <span class="tooltip">Search</span>
      </li> -->
      <li>
        <a href="<?php echo URL ?>landowner/index">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>

      <!-- Update Tea Availability  -->
      <li>
        <a href="<?php echo URL ?>landowner/Update_Tea_Availability">
          <i class="fas fa-people-carry fa-2x"></i>
          <span class="links_name">Update Tea Availability</span>
        </a>
        <span class="tooltip">Update Tea Availability</span>
      </li>

      <!-- Monthly Income -->
      <li>
        <a href="<?php echo URL ?>landowner/Monthly_Income">
          <i class="fas fa-money-bill-wave fa-2x"></i>
          <span class="links_name">Monthly Income</span>
        </a>
        <span class="tooltip">Monthly Income</span>
      </li>
      <!-- Daily Net Weight -->
      <li>
        <a href="<?php echo URL ?>landowner/Daily_Net_Weight">
          <i class="fas fa-balance-scale fa-2x"></i>
          <span class="links_name">Daily Net Weight</span>
        </a>
        <span class="tooltip">Daily Net Weight</span>
      </li>
      <!-- Monthly Tea Price -->
      <li>
        <a href="<?php echo URL ?>landowner/Monthly_Tea_Price">
          <i class="fas fa-hand-holding-usd fa-2x"></i>
          <span class="links_name">Monthly Tea Price</span>
        </a>
        <span class="tooltip">Monthly Tea Price</span>
      </li>
      <!-- Make Requests -->
      <li>
        <a href="<?php echo URL ?>landowner/Make_Requests">
          <i class="fas fa-handshake fa-2x"></i>
          <span class="links_name">Make Requests</span>
        </a>
        <span class="tooltip">Make Requests</span>
      </li>
      <li>
        <a href="<?php echo URL ?>landowner/test">
          <i class="fas fa-vial fa-2x"></i>
          <span class="links_name">Test</span>
        </a>
        <span class="tooltip">Test</span>
      </li>


      <!-- <li class="profile">
         <div class="profile-details">
           <img src="profile.jpg" alt="profileImg">
           <div class="name_job">
             <div class="name">Prem Shahi</div>
             <div class="job">Web designer</div>
           </div>
         </div>
         <i class='bx bx-log-out' id="log_out" ></i>
     </li> -->

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
              <div class="noti-modal">
                <div class="noti-modal-content">
                  <span class="noti-modal-close-button">×</span>
                  <div>Add Your Content Here !</div>
                </div>
              </div>
            </div>
          </div>
          <!-- ------------------------------ -->
          <?php include '../app/views/user/profile/navBarProfile.php'; ?>
        </div>
      </div>
    </div>