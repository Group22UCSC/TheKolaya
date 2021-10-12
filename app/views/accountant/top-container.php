<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?php echo TITLE ?></title>
  <link rel="icon" href="<?php echo URL ?>vendors/images/thekolaya2.png" type="image/x-icon">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/style.css">
  <link rel="stylesheet" href="<?php echo URL ?>vendors/css/nav-style.css">
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
     <li class="mobile-nav-icon">
      <a href="#">
        <i class="fas fa-bell"></i>
        <span class="links_name">Notification</span>
      </a>
      <span class="tooltip">Notification</span>
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
          <div class="notifications">
            <div id="bell" class="icon_wrap"><i class="far fa-bell"></i></div>

            <div class="notification_dd">
              <ul class="notification_ul">
                <?php
                for ($i = 0; $i < 4; $i++) {
                  echo '<li class="starbucks success">
                                  <div class="notify_icon">
                                    <span class="icon"><i class="fas fa-bell"></i></span>  
                                  </div>
                                  <div class="notify_data">
                                      <div class="title">
                                          Lorem, ipsum dolor.  
                                      </div>
                                      <div class="sub_title">
                                        Lorem ipsum dolor sit amet consectetur.
                                    </div>
                                  </div>
                                  <div class="notify_status">
                                      <p>Success</p>  
                                  </div>
                                </li>';
                }
                ?>
                <li class="show_all">
                  <p class="link">Show All Activities</p>
                </li>
              </ul>
            </div>

          </div>
          <div class="profile">
            <div class="icon_wrap" id="account-web">
              <img src="<?php echo URL ?>vendors/images/accountant/profile.jpg" alt="profile_pic">
              <span class="name">Pasindu<br>Lakmal</span>
              <i class="fas fa-chevron-down"></i>
            </div>

            <div class="profile_dd">
              <ul class="profile_ul">
                <li class="profile_li">
                  <div class="icon_wrap" id="account">
                    <img src="<?php echo URL ?>vendors/images/accountant/profile.jpg" alt="profile_pic">
                    <span class="name">Pasindu lakmal</span>
                  </div>
                </li>
                <li><a class="profile" href="<?php echo URL ?>accountant/profile"><span class="picon"><i class="fas fa-user-alt"></i></span>Profile</a></li>
                <li><a class="settings" href="<?php echo URL ?>accountant/editProfile"><span class="picon"><i class="fas fa-cog"></i></span>Settings</a></li>
                <li><a class="logout" href="<?php echo URL ?>login/logout"><span class="picon"><i class="fas fa-sign-out-alt"></i></span>Logout</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>

      <div class="popup">
        <div class="shadow"></div>
        <div class="inner_popup">
          <div class="notification_dd">
            <ul class="notification_ul">
              <li class="title">
                <p>All Notifications</p>
                <p class="close"><i class="fas fa-times" aria-hidden="true"></i></p>
              </li>
              <?php
              for ($i = 0; $i < 6; $i++) {
                echo '<li class="starbucks success">
                                  <div class="notify_icon">
                                    <span class="icon"><i class="fas fa-bell"></i></span>  
                                  </div>
                                  <div class="notify_data">
                                      <div class="title">
                                          Lorem, ipsum dolor.  
                                      </div>
                                      <div class="sub_title">
                                        Lorem ipsum dolor sit amet consectetur.
                                    </div>
                                  </div>
                                  <div class="notify_status">
                                      <p>Success</p>  
                                  </div>
                                </li>';
              }
              ?>
            </ul>
          </div>
        </div>
      </div>

    </div>