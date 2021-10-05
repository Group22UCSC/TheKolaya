<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
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
      <!-- Dashboard -->
      <li>
        <a href="<?php echo URL ?>landowner/index">
          <i class="fas fa-th-large"></i>
          <span class="links_name">Dashboard</span>
        </a>
        <span class="tooltip">Dashboard</span>
      </li>
      <!-- Make Requests -->
      <li>
        <a href="<?php echo URL ?>landowner/Make_Requests">
          <i class="fas fa-handshake fa-2x"></i>
          <span class="links_name">Make Requests</span>
        </a>
        <span class="tooltip">Make Requests</span>
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

      <li class="mobile-nav-icon">
        <a href="#">
          <i class="fas fa-bell"></i>
          <span class="links_name">Notification</span>
        </a>
        <span class="tooltip">Notification</span>
      </li>
      <li class="mobile-nav-icon">
        <a href="#">
          <i class="fas fa-user"></i>
          <span class="links_name">Profile</span>
        </a>
        <span class="tooltip">Profile</span>
      </li>
      <li>
        <a href="<?php echo URL ?>login/logout">
          <i class="fas fa-sign-out-alt"></i>
          <span class="links_name">Logout</span>
        </a>
        <span class="tooltip">Logout</span>
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
    <div class="header">
      <div class="thekolya-logo"><img src="<?php echo URL ?>/vendors/images/thekolaya.png" alt=""></div>
      <ul>
        <li class="bell-notification"><i class="fas fa-bell"></i></li>
        <li class="profile">
          <div class="profile-container">
            <div class="profile-details">
              <div class="name_job">
                <div class="name">Pasindu<br><span>Landowner</span></div>
              </div>
              <img src="<?php echo URL ?>/vendors/images/landowner/profile.jpg" alt="profileImg">
            </div>
          </div>
        </li>
      </ul>
    </div>